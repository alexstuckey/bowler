<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function getByID($id) {

    /**
    * Fetches a single item from the database
    * Creates a new ItemObject and fills it with the data
    */

    $this->load->database();
    $this->db->from('quarters')->where('id', $id);
    $query = $this->db->get();

    $row = $query->result_array()[0];

    return new ItemObject($row['id'], $row['summary'], $row['body'], $row['week'], $row['year'], $row['created_by']);

  }

}


/**
* Custom object model for an item
*/
class ItemObject {

  public $id;
  public $summary;
  public $body;
  public $year;
  public $weekID;
  public $created_by;
  
  function __construct($id, $summary, $body, $weekID, $year, $created_by) {
    
    $this->id         = $id;
    $this->summary    = $summary;
    $this->body       = $body;
    $this->year       = $year;
    $this->weekID     = $weekID;
    $this->created_by = $created_by;

  }

}

/* End of file item.php */
/* Location: ./application/models/item.php */