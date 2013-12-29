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
    $this->db->from('items')->where('id', $id);
    $query = $this->db->get();

    $row = $query->result_array()[0];

    return new ItemObject($row['id'], $row['summary'], $row['body'], $row['week'], $row['year'], $row['created_by']);

  }

  function getByWeek(WeekObject $week) {

    /**
    * Argument is a WeekObject
    * Returns an array of ItemObject s
    */

    $this->load->database();
    $this->db->from('items')->where('week', $week->weekNumber)->where('year', $week->year);
    $query = $this->db->get();

    $itemsFound = array();

    foreach ($query->result_array() as $row) {
      $itemsFound[] = new ItemObject($row['id'], $row['summary'], $row['body'], $row['week'], $row['year'], $row['created_by']);
    }

    return $itemsFound;


  }

  function getByUser(UserObject $user) {

    /**
    * Argument is a UserObject
    * Returns an array of ItemObject s
    */

    $this->load->database();
    $this->db->from('items')->where('created_by', $user->id);
    $query = $this->db->get();

    $itemsFound = array();

    foreach ($query->result_array() as $row) {
      $itemsFound[] = new ItemObject($row['id'], $row['summary'], $row['body'], $row['week'], $row['year'], $row['created_by']);
    }

    return $itemsFound;

  }

  function delete(ItemObject $item) {

    $this->db->from('items')->where('id', $item->id);
    $this->db->delete();

  }

  function save(ItemObject $item) {

    // Check to see if exists
    $this->db->from('items')->where('id', $item->id);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      // Doesn't exist => create
      $this->db->insert('iems', $item);

    } else {
      // Exists => update record
      $update = array(
        'summary'    => $item->summary,
        'body'       => $item->body,
        'year'       => $item->year,
        'weekID'     => $item->weekID,
        'created_by' => $item->created_by
        );
      $this->db->from('items')->where('id', $item->id);
      $this->db->update('items', $update);
    }

  }

  function create($summary, $body, $weekID, $year, $created_by) {

    /**
    * Bundles the data into an array, not an ItemObject.
    * This is because ItemObjects should only apply to DB entries.
    *
    * Returns the relevant item objects
    */

    $newItem = array(
      'summary'    => $summary,
      'body'       => $body,
      'year'       => $year,
      'weekID'     => $weekID,
      'created_by' => $created_by
      );

    $this->db->insert('items', $newItem);

    // Returns an ItemObject
    return $this->getByID($this->db->insert_id());

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