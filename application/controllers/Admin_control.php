<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_control extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->model('insert_model');
  }

  public function index() {
    $id_name = $this->input->post('admin');
    $id = $this->input->post($id_name);
    if ($this->input->post('admin_choice') == "d") {
      $this->insert_model->unset_admin($id);
      $data['admin_unset_message'] = "The admin has been unset";
    } else {
      $this->insert_model->set_admin($id);
      $data['admin_create_message'] = "The admin has been created";
    }
    $this->load->view('templates/header', $data);
    $this->load->view('admin_views/admin_home', $data);
    $this->load->view('templates/footer', $data);
  }
}
