<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Event extends Model
{
    use HasFactory;

    // protected $table = 'events';
    protected  $fillable = [
        'event_name',
        'event_date_from',
        'event_date_to',
        'representation_day_id',
    ];
    
    public function representationDay(){
        return $this->hasOne(RepresentationDay::class, 'id', 'representation_day_id');
    }

    static function rule($request){
        return [
            'eventName' => 'required',
            'dateFrom' => 'required',
            'dateTo' => 'required',
        ];
    }

    static function insert($request){
        $validate = Validator::make($request->all(),self::rule($request));
        
        if($validate->fails()){
            return response()->json([
                'error' => $validate->messages(),
                'message' => 'error', 
            ]);
        }

        $insertRepresentationDay = RepresentationDay::insert($request);

        $insertEvent = Event::create([
            'event_name' => $request->eventName,
            'event_date_from' => $request->dateFrom,
            'event_date_to' => $request->dateTo,
            'representation_day_id' => $insertRepresentationDay->id,
        ]);

        return $insertEvent;
    }
}
