<?php

class Player_admin extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function admin_view($page="admin_home") {
    if (!file_exists(APPPATH.'views/admin_views/'.$page.'.php')) {
      // whoops don't have a page for that!
      show_404();
    }

    $data['players'] = $this->users_model->get_players();

    $this->load->view('templates/header', $data);
    $this->load->view('admin_views/'.$page, $data);
    $this->load->view('templates/footer', $data);
  }

}
