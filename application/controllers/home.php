<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

  public function index() {
    $this->load->view('header');
    $this->load->view('contentt');
    $this->load->view('footer');
  }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */