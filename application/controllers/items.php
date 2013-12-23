<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items extends CI_Controller {

  public function index() {
    
    $this->load->view('header');
    // $this->load->view('header');
    $this->load->view('footer');

  }

  public function viewAll() {

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