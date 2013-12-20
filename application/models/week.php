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

  function isInHalfTerm($quarter) {

    $weeksInHalfTerm = array();

    for ($i=0; $i < ($quarter->numberOfWeeksOfHalfTerm); $i++) {
      $weeksInHalfTerm[] = $quarter->half_startWeek->weekNumber + $i;
    }

    if (in_array($this->weekNumber, $weeksInHalfTerm)) {
      return TRUE;
    } else {
      return FALSE;
    }

  }

}

/* End of file week.php */
/* Location: ./application/models/week.php */