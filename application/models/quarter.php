<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quarter extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function getByID($id) {

    /**
    * Fetches a single quarter from the database
    * Creates a new QuarterObject and fills it with the data
    */

    $this->load->database();
    $this->db->from('quarters')->where('id', $id);
    $query = $this->db->get();

    $row = $query->result_array()[0];

    return new QuarterObject($row['id'], $row['type'], $row['start_date'], $row['end_date'], $row['half_start'], $row['half_end']);
  }

  function getAll() {
    $this->load->database();
    $query = $this->db->get('quarters');
    $quarters = array();

    if (self::_checkForQuarters($query)) {
      foreach ($query->result() as $row) {

        $newEntry = new QuarterObject($row->id, $row->type, $row->start_date, $row->end_date, $row->half_start, $row->half_end);
        array_push($quarters, $newEntry);

        }
    }

    return $quarters;
  }

  function _checkForQuarters($query)  {
    
    if ($query->num_rows() == 0) {
      return false;
    } else {
      return true;
    }

  }

  function delete(QuarterObject $obj) {

    $this->db->from('quarters')->where('id', $obj->id);
    $this->db->delete();

  }

  function save(QuarterObject $obj) {

    // Check to see if exists
    $this->db->from('quarters')->where('id', $obj->id);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      // Doesn't exist => create
      $this->db->insert('quarters', $obj);

    } else {
      // Exists => update record
      $update = array(
        'type'        => $obj->type,
        'start_date'  => $obj->start_date,
        'end_date'    => $obj->end_date,
        'half_start'  => $obj->half_start,
        'half_end'    => $obj->half_end
        );
      $this->db->from('quarters')->where('id', $obj->id);
      $this->db->update('quarters', $update);
    }

  }

}


/**
* Custom object model for a quarter
*/
class QuarterObject {

  public $id;
  public $type;
  public $start_date;
  public $end_date;
  public $half_start;
  public $half_end;

  public $startWeek;
  public $endWeek;
  public $half_startWeek;
  public $half_endWeek;

  public $numberOfWeeks;
  public $numberOfWeeksOfHalfTerm;
  
  function __construct($i, $t, $s, $e, $hs, $he) {
    $this->id = $i;
    $this->type = $t;
    $this->start_date = $s;
    $this->end_date = $e;
    $this->half_start = $hs;
    $this->half_end = $he;

    $CI =& get_instance();
    $CI->load->model('Week');

    $this->startWeek      = WeekObject::withISODate($this->start_date);
    $this->endWeek        = WeekObject::withISODate($this->end_date);
    // Add 1 week to start of half-term, since all half-terms being on a Saturday
    $this->half_startWeek = WeekObject::withISODate($this->half_start);
    $this->half_startWeek = new WeekObject(($this->half_startWeek->weekNumber+1), $this->half_startWeek->year);
    $this->half_endWeek   = WeekObject::withISODate($this->half_end);

    $this->numberOfWeeks = $this->numberOfWeeks();
    $this->numberOfWeeksOfHalfTerm = $this->numberOfWeeksOfHalfTerm();
  }

  function numberOfWeeks() {

    // This takes half-terms into account

    $start = new DateTime($this->start_date);
    $end   = new DateTime($this->end_date);
    $startWeek = $start->format('W');
    $endWeek   = $end->format('W');
    $numberOfWeeksRaw = ($endWeek-$startWeek)+1;
    $numberOfWeeks = ($numberOfWeeksRaw-$this->numberOfWeeksOfHalfTerm());

    return $numberOfWeeks;

  }

  function numberOfWeeksOfHalfTerm() {

    /**
    * Charterhouse tends to have half-terms (exeats) that exceed one
    * week in length, since they usually begin on a Saturday and end
    * on the next Sunday (or the third for two week ones).
    *
    * The general formula for them is as follows:
    * d = 7n+2 (d=number of days; n=number of weeks)
    */

    $half_numberOfWeeks = ($this->daysOfHalfTerm()-2)/7;   

    return $half_numberOfWeeks;

  }

  function daysOfHalfTerm() {

    $half_start = new DateTime($this->half_start);
    $half_end   = new DateTime($this->half_end);
    $half_startWeek = $half_start->format('z');
    $half_endWeek   = $half_end->format('z');
    $half_numberOfDays = ($half_endWeek-$half_startWeek)+1;

    return $half_numberOfDays;
  }

}

/* End of file quarter.php */
/* Location: ./application/models/quarter.php */