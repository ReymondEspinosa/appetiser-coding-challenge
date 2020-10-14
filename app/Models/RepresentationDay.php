<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepresentationDay extends Model
{
    use HasFactory;

    protected $table = 'representation_days';
    protected  $fillable = [
        'mon',
        'tue',
        'wed',
        'thu',
        'fri',
        'sat',
        'sun',
    ];
    
    public function event(){
        return $this->belongsTo(Event::class, 'representation_day_id', 'id');
    }

    static function insert($request){
        return RepresentationDay::create([
            'mon' => $request->mondayCheckbox == 'on' ? 'yes' : 'no',
            'tue' => $request->tuesdayCheckbox == 'on' ? 'yes' : 'no',
            'wed' => $request->wednesdayCheckbox == 'on' ? 'yes' : 'no',
            'thu' => $request->thursdayCheckbox == 'on' ? 'yes' : 'no',
            'fri' => $request->fridayCheckbox == 'on' ? 'yes' : 'no',
            'sat' => $request->saturdayCheckbox == 'on' ? 'yes' : 'no',
            'sun' => $request->sundayCheckbox == 'on' ? 'yes' : 'no',
        ]);
    }
}
