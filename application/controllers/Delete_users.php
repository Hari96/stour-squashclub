<?php
  class Delete_users extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('users_model');
    }

    public function index() {
      $user_id = $this->input->get('user_id');
      $this->users_model->delete_user($user_id);
    }
  }
