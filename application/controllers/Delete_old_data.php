<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Delete_old_data extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function index() {
    $this->form_validation->set_rules('year','Year','required|min_length[4]|max_length[4]');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header');
      $this->load->view('admin_views/delete_old_data');
      $this->load->view('templates/footer');
    } else {
      $date = date('Y-m-d');
      $year = date('Y', strtotime($date));
      $chosen_year = $this->input->post('year');
      $from_year = $chosen_year - 1;
      //need to build function 'delete_all_data'
      $data['not_ready_message'] = "Too early for this to be working - please speak to Bob Blake.";
      $this->load->view('templates/header', $data);
      $this->load->view('admin_views/delete_old_data', $data);
      $this->load->view('templates/footer', $data);
    }
  }

}
