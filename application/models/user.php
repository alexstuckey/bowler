<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function getByID($id) {

    /**
    * Fetches a single user from the database
    * Creates a new UserObject and fills it with the data
    */

    $this->load->database();
    $this->db->from('users')->where('id', $id);
    $query = $this->db->get();

    $row = $query->result_array()[0];

    return new UserObject($row['id'], $row['username'], $row['email'], $row['firstName'], $row['lastName'], $row['publicName'], $row['fireflyID']);
  
  }

  function getByFireflyID($fireflyID) {

    /**
    * Fetches a single user from the database
    * Creates a new UserObject and fills it with the data
    */

    $this->load->database();
    $this->db->from('users')->where('fireflyID', $fireflyID);
    $query = $this->db->get();

    $row = $query->result_array()[0];

    return new UserObject($row['id'], $row['username'], $row['email'], $row['firstName'], $row['lastName'], $row['publicName'], $row['fireflyID']);
  
  }

  function getByEmail($fireflyID) {

    /**
    * Fetches a single user from the database
    * Creates a new UserObject and fills it with the data
    */

    $this->load->database();
    $this->db->from('users')->where('email', $email);
    $query = $this->db->get();

    $row = $query->result_array()[0];

    return new UserObject($row['id'], $row['username'], $row['email'], $row['firstName'], $row['lastName'], $row['publicName'], $row['fireflyID']);
  
  }

}


/**
* Custom object model for a user
*/
class UserObject {

  public $id;
  public $username;
  public $email;
  public $firstName;
  public $lastName;
  public $publicName;
  public $fireflyID;

  function __construct($id, $username, $email, $firstName, $lastName, $publicName, $fireflyID) {
    
    $this->id         = $id;
    $this->username   = $username;
    $this->email      = $email
    $this->firstName  = $firstName;
    $this->lastName   = $lastName;
    $this->publicName = $publicName;
    $this->fireflyID  = $fireflyID;

  }

}

/* End of file user.php */
/* Location: ./application/models/user.php */