<?php

class Player_admin extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->model('insert_model');
  }

  public function index() {
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];
    $this->insert_model->update_role($email, $role);
    $order_field = "lName";//which field to order by
    $order_direction = "asc";// direction of sort
    $data['players'] = $this->users_model->get_players($order_field, $order_direction);
    $this->load->view('templates/header', $data);
    $this->load->view('admin_views/admin_home', $data);
    $this->load->view('templates/footer', $data);
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

  public function result_view($page="results_view") {
    if (!file_exists(APPPATH.'views/admin_views/'.$page.'.php')) {
      // whoops don't have a page for that!
      show_404();
    }

    $data['results'] = $this->users_model->get_results();

    $this->load->view('templates/header', $data);
    $this->load->view('admin_views/'.$page, $data);
    $this->load->view('templates/footer', $data);

  }
}
