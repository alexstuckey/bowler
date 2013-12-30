<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weeks extends CI_Controller {

  public function week() {

    $this->load->view('header');

    /*
    * Week details contained in URL
    * e.g. /week/YEAR/WEEK_NUMBER
    **/

    $this->load->model('Week');
    $this->load->model('Item');
    $this->load->model('User');

    $year   = $this->uri->segment(2);
    $weekID = $this->uri->segment(3);

    $week = new WeekObject($weekID, $year);

    $parseData = array(
      'weekID' => $weekID,
      'year'   => $year
      );

    foreach ($this->Item->getByWeek($week) as $i) {

      // Fetch creating user
      $user = $this->User->getByID($i->created_by);
  
      $parseData['items'][] = array(
        'item-id'         => $i->id,
        'summary'         => $i->summary,
        'body'            => $i->body,
        'year'            => $i->year,
        'weekID'          => $i->weekID,
        'user_publicName' => $user->publicName,
        'user_email'      => $user->email
        );

    }

    $this->load->library('parser');
    $this->parser->parse('display_item', $parseData);

    $this->load->view('footer');

  }

}

/* End of file weeks.php */
/* Location: ./application/controllers/weeks.php */