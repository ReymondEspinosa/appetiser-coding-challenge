<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Traits\Date;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    use Date;

    public function appetiserIndex(Request $request){
        $checkbox = array(
            'Mon' => 'mondayCheckbox',
            'Tue' => 'tuesdayCheckbox',
            'Wed' => 'wednesdayCheckbox',
            'Thu' => 'thursdayCheckbox',
            'Fri' => 'fridayCheckbox',
            'Sat' => 'saturdayCheckbox',
            'Sun' => 'sundayCheckbox',
        );

        $date = date('Y-m-d');

        if($request->date != null){
            if($this->checkDate($request->date)){
                $date = $request->date;
            }else{
                return redirect()->route('calendar');
            }
        }
        
        $this->setDate($date);

        $event = Event::with('representationDay')
                        ->where([['event_date_from', '<=', $this->getYear().'-'.$this->getMonth().'-01'],
                                    ['event_date_to', '>=', $this->getYear().'-'.$this->getMonth().'-'.$this->daysHave]])
                        ->get();
        
        $data = array(
            'year' => $this->getYear(),
            'month' => $this->getMonth(),
            'day' => $this->getDay(),
            'weekRepresentation' => $this->getRepDay(),
            'daysHave' => $this->daysHave,
            'dayCount' => 1,
            'monthYear' => date('F Y', strtotime($date)),
            'date' => $date,
            'dateSelected' => date('d F Y', strtotime($date)),
            'timeAgo' => $this->timeago($date)[1],
            'event' => $event
        );

        return view('appetiser-calendar.index', compact('checkbox', 'data'));
    }

    public function appetiserAddEvent(Request $request){
        return Event::insert($request);
    }
}
