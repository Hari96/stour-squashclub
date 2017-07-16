<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Player_preferences extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->model('insert_model');
  }

  public function index() {

  }

  public function load_preferences() {
    $email = $this->session->userdata('email');
    $user_id = $this->users_model->get_id_from_email($email);
    $name = $this->users_model->get_name_from_id($user_id);
    $data['name'] = $name;
    $row = $this->users_model->get_player_preferences($user_id);
    $mon = $row->Mon;
    $tue = $row->Tue;
    $wed = $row->Wed;
    $thu = $row->Thu;
    $fri = $row->Fri;
    $sat = $row->Sat;
    $sun = $row->Sun;
    $day_pref = $row->day_pref;
    $t1 = $row->t1;
    $t2 = $row->t2;
    $t3 = $row->t3;
    $t4 = $row->t4;
    $t5 = $row->t5;
    $t6 = $row->t6;
    $t7 = $row->t7;
    $time_pref = $row->time_pref;
    $data['mon'] = $mon;
    $data['tue'] = $tue;
    $data['wed'] = $wed;
    $data['thu'] = $thu;
    $data['fri'] = $fri;
    $data['sat'] = $sat;
    $data['sun'] = $sun;
    $data['day_pref'] = $day_pref;
    $data['t1'] = $t1;
    $data['t2'] = $t2;
    $data['t3'] = $t3;
    $data['t4'] = $t4;
    $data['t5'] = $t5;
    $data['t6'] = $t6;
    $data['t7'] = $t7;
    $data['time_pref'] = $time_pref;
    $this->load->view('templates/header', $data);
    $this->load->view('model_views/create_preferences', $data);
    $this->load->view('templates/footer', $data);
  }
}
