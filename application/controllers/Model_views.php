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

    $data['title'] = ucfirst($page); // Capitalize the first letter

    $order_field= "current_league";// field to order by
    $order_direction = "asc";//direction of sort

    $data['players'] = $this->users_model->get_players($order_field, $order_direction);
    $data['title'] = 'Players List';

    $this->load->view('templates/header', $data);
    $this->load->view('model_views/'.$page, $data);
    $this->load->view('templates/footer', $data);

  }  

}
