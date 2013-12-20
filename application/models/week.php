<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Week extends CI_Model {

  function __construct() {
    parent::__construct();
  }

}


/**
* Custom object model for a quarter
*/
class WeekObject {

  public $weekNumber;
  public $year;
  public $start_date;
  public $end_date;
  
  function __construct($w, $y) {
    $this->weekNumber = $w;
    $this->year = $y;

    // Start
    $this->start_date = self::ISODateFromYearWeekDay($this->year, $this->weekNumber, 1);
    // End
    $this->end_date = self::ISODateFromYearWeekDay($this->year, $this->weekNumber, 7);

  }

  static function withISODate($date) {

    $datetime = new DateTime($date);
    $instance = new self($datetime->format('W'), $datetime->format('Y'));

    return $instance;

  }

  function ISODateFromYearWeekDay($year, $week, $day) {

    $date = new DateTime();
    $date->setISODate($this->year, $this->weekNumber, $day);
    return $date->format('Y-m-d');

  }

}

/* End of file week.php */
/* Location: ./application/models/week.php */