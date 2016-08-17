<?php
  class Update_leagues extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('insert_model');
      $this->load->model('users_model');
    }

    public function index() {
      $year = $this->input->post('year');
      $this->insert_model->create_new_league($year);//checks if league already exists
      $month_no = $this->input->post('month');
      switch ($month_no) {
        case 1:
          $month = 'jan';
          break;
        case 2:
          $month = 'feb';
          break;
        case 3:
          $month = 'mar';
          break;
        case 4:
          $month = 'apr';
          break;
        case 5:
          $month = 'may';
          break;
        case 6:
          $month = 'jun';
          break;
        case 7:
          $month = 'jul';
          break;
        case 8:
          $month = 'aug';
          break;
        case 9:
          $month = 'sep';
          break;
        case 10:
          $month = 'oct';
          break;
        case 11:
          $month = 'nov';
          break;
        case 12:
          $month = 'dec';
          break;
      }
      $max = $this->input->post('num_records');
      for ($i = 1; $i <= $max; $i++) {
        $num = 'curr' . $i;
        $id = 'id' . $i;
        $league_num = $this->input->post($num);
        $user_id = $this->input->post($id);
        $data_players = array(
          'current_league' => $league_num
        );
        $data_leagues = array(
          $month => $league_num
        );
        $this->insert_model->update_users($data_players, $user_id);
        $this->insert_model->update_leagues($data_leagues, $user_id, $year);
      }
      $data['leagues_message'] = 'Leagues changed successfully';
      //Loading View
      $this->load->view('templates/header', $data);
      $this->load->view('admin_views/admin_home', $data);
      $this->load->view('templates/footer', $data);

    }
  }
