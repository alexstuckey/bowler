<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {

  public function index() {

    $this->load->view('header');
    $this->load->view('no_quarters');
    $this->load->view('footer');
  }

  public function create() {
    $this->load->view('header');
    $this->load->view('quarter_creator');
    $this->load->view('footer');
  }

}

/* End of file schedule.php */
/* Location: ./application/controllers/schedule.php */