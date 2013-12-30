<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items extends CI_Controller {

  public function index() {
    
    $this->load->view('header');

    // Fetch from database
    $this->load->model('Quarter');
    $this->load->model('Week');
    $this->load->model('Item');
    $this->load->model('User');
    $quarters = $this->Quarter->getAll();
    $parseData['quarters'] = array();

    foreach ($quarters as $q) {

      $this->load->model('Week');
      $items = array();

      foreach ($q->arrayOfWeeks as $w) {

        foreach ($this->Item->getByWeek($w) as $i) {

          // Fetch creating user
          $user = $this->User->getByID($i->created_by);

          $items[] = array(
            'item-id'         => $i->id,
            'summary'         => $i->summary,
            'body'            => $i->body,
            'year'            => $i->year,
            'weekID'          => $i->weekID,
            'user_publicName' => $user->publicName,
            'user_email'      => $user->email
            );

        }
        
      }

      $newEntry = array(
        'id' => $q->id,
        'type' => $q->type,
        'start_date' => $q->start_date,
        'end_date' => $q->end_date,
        'half_start' => $q->half_start,
        'half_end' => $q->half_end,
        'numberOfWeeks' => $q->numberOfWeeks,
        'numberOfWeeksOfHalfTerm' => $q->numberOfWeeksOfHalfTerm,
        'items' => $items
        );

        $parseData['quarters'][] = $newEntry;


    }

    $this->load->library('parser');
    $this->parser->parse('display_items', $parseData);

    $this->load->view('footer');

  }

  public function view() {

    $this->load->view('header');

    $this->load->database();
    $this->load->model('Quarter');
    $this->load->model('Week');
    $this->load->model('Item');

    $requestedID = $this->uri->segment(2, '1');
    $parseData['item'] = $this->Item->getByID($requestedID);

    $this->load->view('display_item', $parseData);

    $this->load->view('footer');

  }

}

/* End of file items.php */
/* Location: ./application/controllers/items.php */