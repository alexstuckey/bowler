<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {

  public function index() {

    $this->load->view('header');

    // Fetch from database
    $this->load->model('Quarter');
    $this->load->model('Item');
    $quarters = $this->Quarter->getAll();
    $parseData['quarters'] = array();

    foreach ($quarters as $q) {

      $this->load->model('Week');
      $weeks = array();

      foreach ($q->arrayOfWeeks as $w) {

        $weeks[] = array(
          'number' => $q->weekNumberInQuarter($w),
          'numberOfItems' => count($this->Item->getByWeek($w))
          );
        
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
        'weeks' => $weeks
        );

      $parseData['quarters'][] = $newEntry;

    }

    if (count($parseData['quarters']) > 0) {

      $this->load->library('parser');
      $this->parser->parse('display_quarters', $parseData);

    } else {
      $this->load->view('no_quarters');
    }

    $this->load->view('footer');

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
                  ),
               array(
                     'field'   => 'inputHalfStart_submit', 
                     'label'   => 'Half-term Date End', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'inputHalfEnd_submit', 
                     'label'   => 'Half-term Date End', 
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
        $this->load->model('Quarter');

        $insertedQuarter = $this->Quarter->create(
          $this->input->post('inputType'),
          $this->input->post('inputQuarterStart_submit'),
          $this->input->post('inputQuarterEnd_submit'),
          $this->input->post('inputHalfStart_submit'),
          $this->input->post('inputHalfEnd_submit')
          );

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