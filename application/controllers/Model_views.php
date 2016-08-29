<?php
class Model_views extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->helper('url_helper');
  }

  public function view($page = 'register') {
    if (!file_exists(APPPATH.'views/model_views/'.$page.'.php')) {
      // whoops don't have a page for that!
      show_404();
    }

    $order_field= "lName";// field to order by
    $order_direction = "asc";//direction of sort

    $row = $this->users_model->get_current_period();
    $year = $row->year;
    $month = $row->month;
    $data['year'] = $year;
    $data['month'] = $month;

    $data['players'] = $this->users_model->get_players($order_field, $order_direction);
    $data['leagues'] = $this->users_model->get_leagues($year);
    
    $this->load->view('templates/header', $data);
    $this->load->view('model_views/'.$page, $data);
    $this->load->view('templates/footer', $data);

  }

}
