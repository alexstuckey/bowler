<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {

  public function index() {

    $this->load->view('header');

    // Fetch from database
    $this->load->database();
    $query = $this->db->get('quarters');

    if (self::_checkForQuarters($query)) {
      
      $this->load->library('parser');

      $parseData = array(
        'quarters' => array()
        );

      foreach ($query->result() as $row) {
        $newEntry = array(
          'type' => $row->type,
          'start_date' => $row->start_date,
          'end_date' => $row->end_date 
          );
        array_push($parseData['quarters'], $newEntry);
      }

      $this->parser->parse('display_quarters', $parseData);

    } else {
      $this->load->view('no_quarters');
    }

    $this->load->view('footer');
  }

  private function _checkForQuarters($query)  {
    
    if ($query->num_rows() == 0) {
      return false;
    } else {
      return true;
    }

  }

  public function create() {

    // Extract the type of object to create from the URL
    $type = $this->uri->segment(3, 'quarter');

    $this->load->view('header');
    
    if ($type == 'quarter') {
      $this->load->view('quarter_creator');
    } elseif ($type == 'week') {
      $this->load->view('week_creator');
    }

    $this->load->view('footer');

  }

  public function sendCreate() {

    // Extract the type of object to create from the URL
    $type = $this->uri->segment(3, 'quarter');
    
    if ($type == 'quarter') {

      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');

      $formConfig = array(
               array(
                     'field'   => 'inputType', 
                     'label'   => 'Type', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'inputQuarterStart_submit', 
                     'label'   => 'Date Start', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'inputQuarterEnd_submit', 
                     'label'   => 'Date End', 
                     'rules'   => 'required'
                  )
            );

      $this->form_validation->set_rules($formConfig);

      if ($this->form_validation->run() == FALSE) {
        // When failing, refil the form and show an error message
        $passData['failedBefore'] = TRUE;

        $this->load->view('header');
        $this->load->view('quarter_creator', $passData);
        $this->load->view('footer');
      } else {
        // Continue with inserting to database
        $this->load->database();

        $data = array(
          'type' => $this->input->post('inputType'),
          'start_date' => $this->input->post('inputQuarterStart_submit'),
          'end_date' => $this->input->post('inputQuarterEnd_submit')
          );

        $this->db->insert('quarters', $data);

        $this->session->set_flashdata('createdQuarter', TRUE);
        redirect('/schedule/');
      }

    } elseif ($type == 'week') {

      $this->load->view('week_creator');

    }

  }

}

/* End of file schedule.php */
/* Location: ./application/controllers/schedule.php */