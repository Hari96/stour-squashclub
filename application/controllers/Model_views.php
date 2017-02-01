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
    $year = date("Y");
    $month_num = date("m");
    if ($page !== 'register' && $page !== 'login') {
      if($page=="divisions") {
      $month = $this->users_model->get_month($month_num);
      $data['year'] = $year;
      $data['month'] = $month;
      $data['players'] = $this->users_model->get_players($order_field, $order_direction);
      $data['leagues'] = $this->users_model->get_leagues($year);
      if($month_num == '12') {
        $nextyear = intval($year) + 1;
        $year = strval($nextyear);
        $month_num = '01';
      } else {
        $month_num = intval($month_num) + 1;
        $month_num = ($month_num < 10) ? '0'.strval($month_num): strval($month_num);
      }
      $month = $this->users_model->get_month($month_num);
      $data['viewable'] = $this->users_model->get_viewable_state($year, $month);//check to see if next month's league is available
      $this->load->view('templates/header', $data);
      $this->load->view('model_views/'.$page, $data);
      $this->load->view('templates/footer', $data);
    } else {
      if($month_num == '12') {
        $nextyear = intval($year) + 1;
        $year = strval($nextyear);
        $month_num = '01';
      } else {
        $month_num = intval($month_num) + 1;
        $month_num = ($month_num < 10) ? '0'.strval($month_num): strval($month_num);
      }
      $month = $this->users_model->get_month($month_num);      
      $data['year'] = $year;
      $data['month'] = $month;
      $data['players'] = $this->users_model->get_players($order_field, $order_direction);
      $data['leagues'] = $this->users_model->get_leagues($year);
      $this->load->view('templates/header', $data);
      $this->load->view('model_views/'.$page, $data);
      $this->load->view('templates/footer', $data);
    }
    }
    else {
      $this->load->view('templates/header');
      $this->load->view('model_views/'.$page);
      $this->load->view('templates/footer');
    }
  }

}
