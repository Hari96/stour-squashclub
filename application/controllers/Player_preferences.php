<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Player_preferences extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->model('insert_model');
  }

  public function index() {
    $data['pref_message'] = "Your preferences have been updated";
    $user_id = $this->input->post('user_id');
    $preference_data = array(
      'mon'=> $this->input->post('mon'),
      'tue'=> $this->input->post('tue'),
      'wed' => $this->input->post('wed'),
      'thu' =>$this->input->post('thu'),
      'fri' => $this->input->post('fri'),
      'sat' => $this->input->post('sat'),
      'sun' => $this->input->post('sun'),
      't1' => $this->input->post('t1'),
      't2' => $this->input->post('t2'),
      't3' => $this->input->post('t3'),
      't4' => $this->input->post('t4'),
      't5' => $this->input->post('t5'),
      't6' => $this->input->post('t6'),
      't7' => $this->input->post('t7'),
      'day_pref' => $this->input->post('day_pref'),
      'time_pref' => $this->input->post('time_pref'),
      'comments' => $this->input->post('comments')
    );
    $this->insert_model->update_preferences($user_id, $preference_data);
    $data['announcements'] = $this->users_model->get_announcements();
    $this->load->view('templates/header', $data);
    $this->load->view('pages/home', $data);
    $this->load->view('templates/footer', $data);
  }

  public function load_preferences() {
    $email = $this->session->userdata('email');
    $user_id = $this->users_model->get_id_from_email($email);
    $name = $this->users_model->get_name_from_id($user_id);
    $data['user_id'] = $user_id;
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
    $comments = $row->comments;
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
    $data['comments'] = $comments;
    $this->load->view('templates/header', $data);
    $this->load->view('model_views/create_preferences', $data);
    $this->load->view('templates/footer', $data);
  }

  public function preferences_view() {
    $user_id = $this->input->get('user_id');
    $name = $this->users_model->get_name_from_id($user_id);
    $data['name'] = $name;
    $row = $this->users_model->get_player_preferences($user_id);
    $day_output = "";
    $mon = $row->Mon;
    if($mon == 1) { $day_output .= "Monday, "; }
    $tue = $row->Tue;
    if($tue == 1) { $day_output .= "Tuesday, "; }
    $wed = $row->Wed;
    if($wed == 1) { $day_output .= "Wednesday, "; }
    $thu = $row->Thu;
    if($thu == 1) { $day_output .= "Thursday, "; }
    $fri = $row->Fri;
    if($fri == 1) { $day_output .= "Friday, "; }
    $sat = $row->Sat;
    if($sat == 1) { $day_output .= "Saturday, "; }
    $sun = $row->Sun;
    if($sun == 1) { $day_output .= "Sunday"; }
    $day_pref = $row->day_pref;
  switch ($day_pref) {
    case 8:
    $day_pref_output = "Don't mind";
    break;
    case 9:
    $day_pref_output = "Any weekday";
    break;
    case 10:
    $day_pref_output = "Weekends";
    break;
    case 0:
    $day_pref_output = "";
    break;
  }
    $time_output = "";
    $t1 = $row->t1;
    if($t1 == 1) { $time_output .= "08:30 - 10:00, "; }
    $t2 = $row->t2;
    if($t2 == 1) { $time_output .= "10:00 - 12:00 , "; }
    $t3 = $row->t3;
    if($t3 == 1) { $time_output .= "12:00 - 14:00 , "; }
    $t4 = $row->t4;
    if($t4 == 1) { $time_output .= "14:00 - 16:00 , "; }
    $t5 = $row->t5;
    if($t5 == 1) { $time_output .= "16:00 - 18:00 , "; }
    $t6 = $row->t6;
    if($t6 == 1) { $time_output .= "18:00 - 20:00 , "; }
    $t7 = $row->t7;
    if($t7 == 1) { $time_output .= "20:00 onwards"; }
    $time_pref = $row->time_pref;
    switch ($time_pref) {
      case 8:
      $time_pref_output = "Don't mind";
      break;
      case 9:
      $time_pref_output = "Mornings";
      break;
      case 10:
      $time_pref_output = "Afternoons";
      break;
      case 11:
      $time_pref_output = "Evenings";
      break;
      case 0:
      $time_pref_output = "";
      break;
    }
    $comments = $row->comments;
    $data['day_output'] = $day_output;
    $data['time_output'] = $time_output;
    $data['day_pref_output'] = $day_pref_output;
    $data['time_pref_output'] = $time_pref_output;
    $data['comments'] = $comments;
    $this->load->view('templates/header', $data);
    $this->load->view('model_views/show_preferences', $data);
    $this->load->view('templates/footer', $data);
  }
}
