<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Create_admin extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->model('insert_model');
  }

  public function index() {
    $id_name = $this->input->post('admin');
    $id = $this->input->post($id_name);
    $this->insert_model->set_admin($id);
  }
}
