<?php

namespace App\Traits;

use DateTime;

trait Date{

    public $date, $year, $month, $day, $repDay, $daysHave;

    public function setDate($date){
        $this->date = $date;
        $this->explodeDate();
        $this->setRepDay();
        $this->daysHave = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
    }
    
    public function explodeDate(){
        list($year, $month, $day) = explode('-', $this->date);
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }
    
    public function setRepDay(){
        $this->repDay = date('w', strtotime($this->year.'-'.$this->month.'-1'));
    }

    public function getYear(){
        return $this->year;
    }

    public function getMonth(){
        return $this->month;
    }

    public function getDay(){
        return $this->day;
    }

    public function getRepDay(){
        return $this->repDay;
    }
    
    public function daysHave(){
        return $this->daysHave;
    }

    public function checkDate($date){
        return preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date) ? true : false;
    }

    public  function timeago($date) {
        $datetime1 = new DateTime($date);
        $datetime2 = new DateTime(date('Y-m-d'));

        $interval = $datetime2->diff($datetime1);
        
        $result = $interval->format('%R%a days');
        
        $status = $datetime1 < $datetime2 ? 'pass' : 'future';

        if($result < 0){
            return array($status, abs($result).' day(s) ago');
        }else if($result > 0){
            return array($status, 'In '.abs($result).' day(s)');
        }
        
        return array($status, 'Today');
	}
}