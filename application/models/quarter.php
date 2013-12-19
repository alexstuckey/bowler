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

    return new QuarterObject($row['id'], $row['type'], $row['start_date'], $row['end_date']);
  }

  function getAll() {
    $this->load->database();
    $query = $this->db->get('quarters');
    $quarters = array();

    if (self::_checkForQuarters($query)) {
      foreach ($query->result() as $row) {

        $newEntry = new QuarterObject($row->id, $row->type, $row->start_date, $row->end_date);
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

}


/**
* Custom object model for a quarter
*/
class QuarterObject {

  public $id;
  public $type;
  public $start_date;
  public $end_date;
  
  function __construct($i, $t, $s, $e) {
    $this->id = $i;
    $this->type = $t;
    $this->start_date = $s;
    $this->end_date = $e;
  }

}

/* End of file quarter.php */
/* Location: ./application/models/quarter.php */