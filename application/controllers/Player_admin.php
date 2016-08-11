<?php

class Player_admin extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function crud_view($page="admin_home") {
    if (!file_exists(APPPATH.'views/admin_views/'.$page.'.php')) {
      // whoops don't have a page for that!
      show_404();
    }
    $order_field = "lName";//which field to order by
    $order_direction = "asc";// direction of sort
    $data['players'] = $this->users_model->get_players($order_field, $order_direction);

    $this->load->view('templates/header', $data);
    $this->load->view('admin_views/'.$page, $data);
    $this->load->view('templates/footer', $data);
  }

  public function league_view($page="league_view") {
    if (!file_exists(APPPATH.'views/admin_views/'.$page.'.php')) {
      // whoops don't have a page for that!
      show_404();
    }
    $order_field = "current_league";//which field to order by
    $order_direction = "asc";// direction of sort
    $data['players'] = $this->users_model->get_players($order_field, $order_direction);

    $this->load->view('templates/header', $data);
    $this->load->view('admin_views/'.$page, $data);
    $this->load->view('templates/footer', $data);
  }

}
