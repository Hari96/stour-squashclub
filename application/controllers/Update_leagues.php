<?php
  class Update_leagues extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('insert_model');
      $this->load->model('users_model');
    }

    public function index() {
      $this->form_validation->set_rules('year','Year','required|min_length[4]|max_length[4]');
      $this->form_validation->set_rules('month','Month','required|min_length[3]|max_length[3]');
      if ($this->form_validation->run() == FALSE) {
        $data['val_message'] = "Update failed due to following errors:";
        $data['val_direct'] = "player_admin/league_view/leagues_view";
        $data['val_amessage'] = "Back to leagues";
        $this->load->view('templates/header', $data);
        $this->load->view('admin_views/admin_home', $data);
        $this->load->view('templates/footer', $data);
      } else {
        $year = $this->input->post('year');
        $this->insert_model->create_new_league($year);//checks if league already exists
        $month = $this->input->post('month');
        $max = $this->input->post('num_records');
        //inserting current league into players and divisions into year league table
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
        } //end of for loop
        //inserting players and their divisions into results table
        $player_arr = array();
        for ($divs = 1; $divs <= 6; $divs++) {
          if ($this->users_model->find_players_in_div($divs) !== false) {
            $player_array = $this->users_model->find_players_in_div($divs);//finds players in each div and sorts by last name
            $c = 0;
            foreach ($player_array as $row) {
              $player_arr[$c] = $row['id'];
              $c++;
            }
            $num = count($player_arr);
            switch($num) {
              case 0:
              case 1:
                break;
              case 2:
                $player1_id = $player_arr[0];
                $player2_id = $player_arr[1];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                break;
              case 3:
                $player1_id = $player_arr[0];
                $player2_id = $player_arr[1];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[0];
                $player2_id = $player_arr[2];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[1];
                $player2_id = $player_arr[2];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                break;
              case 4:
                $player1_id = $player_arr[0];
                $player2_id = $player_arr[1];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[0];
                $player2_id = $player_arr[2];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[0];
                $player2_id = $player_arr[3];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[1];
                $player2_id = $player_arr[2];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[1];
                $player2_id = $player_arr[3];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[2];
                $player2_id = $player_arr[3];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                break;
              case 5:
                $player1_id = $player_arr[0];
                $player2_id = $player_arr[1];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[0];
                $player2_id = $player_arr[2];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[0];
                $player2_id = $player_arr[3];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[0];
                $player2_id = $player_arr[4];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[1];
                $player2_id = $player_arr[2];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[1];
                $player2_id = $player_arr[3];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[1];
                $player2_id = $player_arr[4];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[2];
                $player2_id = $player_arr[3];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[2];
                $player2_id = $player_arr[4];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[3];
                $player2_id = $player_arr[4];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                break;
              case 6:
                $player1_id = $player_arr[0];
                $player2_id = $player_arr[1];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[0];
                $player2_id = $player_arr[2];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[0];
                $player2_id = $player_arr[3];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[0];
                $player2_id = $player_arr[4];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[0];
                $player2_id = $player_arr[5];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[1];
                $player2_id = $player_arr[2];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[1];
                $player2_id = $player_arr[3];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[1];
                $player2_id = $player_arr[4];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[1];
                $player2_id = $player_arr[5];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[2];
                $player2_id = $player_arr[3];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[2];
                $player2_id = $player_arr[4];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[2];
                $player2_id = $player_arr[5];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[3];
                $player2_id = $player_arr[4];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[3];
                $player2_id = $player_arr[5];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                $player1_id = $player_arr[4];
                $player2_id = $player_arr[5];
                $this->insert_model->insert_into_results($year, $month, $divs, $player1_id, $player2_id);
                break;
            }
          }
        }// end of for loop
        $data['leagues_message'] = 'Leagues changed successfully';
        //Loading View
        $this->load->view('templates/header', $data);
        $this->load->view('admin_views/admin_home', $data);
        $this->load->view('templates/footer', $data);
      }
    }
  }
