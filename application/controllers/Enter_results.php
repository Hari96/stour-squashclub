<?php
  class Enter_results extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('insert_model');
      $this->load->model('users_model');
    }

    public function index() {
      $year = $this->input->post('year');
      $month = $this->input->post('month');
      $div = $this->input->post('div');
      $max = $this->input->post('num_records');
      $faulty_score = false;
      for ($i = 1; $i <= $max; $i++) {
        $num1 = 'p1' . $i;
        $id1 = 'id1' . $i;
        $player1_score = $this->input->post($num1);
        $player1_id = $this->input->post($id1);
        $num2 = 'p2' . $i;
        $id2 = 'id2' . $i;
        $player2_score = $this->input->post($num2);
        $player2_id = $this->input->post($id2);
        if ($player1_score == 3 && $player2_score == 3) {
          $faulty_score = true;
        }
        $dat = 'date' . $i;
        $date = $this->input->post($dat);
        $d = 'day' . $i;
        $day = $this->input->post($d);
        if ($day == "d") {
          $day = "";
        }
        $this->insert_model->update_results($year, $month, $div, $player1_id, $player2_id, $player1_score, $player2_score, $date, $day);
        // Entering results into profiles table
        //decide whether each player has won, drawn or lost
        //**--profile update to be left until end of each period--**
        /*if ($player1_score == $player2_score) {
          if (!($player1_score == 0 && $player2_score == 0)) {//if both scores are zero they have not played!
            $month = ucfirst($month);
            $row = $this->users_model->get_player_profile($player1_id);
            $played = $row->played + 1;
            $won = $row->won;
            $drawn = $row->drawn + 1;
            $lost = $row->lost;
            $average = ($won / $played) * 100;
            $this->insert_model->update_profiles($player1_id, $played, $won, $drawn, $lost, $average, $month, $day, $date);
            $row = $this->users_model->get_player_profile($player2_id);
            $played = $row->played + 1;
            $won = $row->won;
            $drawn = $row->drawn + 1;
            $lost = $row->lost;
            $average = ($row->won / $played) * 100;
            $this->insert_model->update_profiles($player2_id, $played, $won, $drawn, $lost, $average, $month, $day, $date);
          }
        }
        if ($player1_score > $player2_score) {
          $month = ucfirst($month);
          $row = $this->users_model->get_player_profile($player1_id);
          $played = $row->played + 1;
          $won = $row->won + 1;
          $drawn = $row->drawn;
          $lost = $row->lost;
          $average = ($won / $played) * 100;
          $this->insert_model->update_profiles($player1_id, $played, $won, $drawn, $lost, $average, $month, $day, $date);
          $row = $this->users_model->get_player_profile($player2_id);
          $played = $row->played + 1;
          $won = $row->won;
          $drawn = $row->drawn;
          $lost = $row->lost + 1;
          $average = ($won / $played) * 100;
          $this->insert_model->update_profiles($player2_id, $played, $won, $drawn, $lost, $average, $month, $day, $date);
        }
        if ($player2_score > $player1_score) {
          $month = ucfirst($month);
          $row = $this->users_model->get_player_profile($player1_id);
          $played = $row->played + 1;
          $won = $row->won;
          $drawn = $row->drawn;
          $lost = $row->lost + 1;
          $average = ($won / $played) * 100;
          $this->insert_model->update_profiles($player1_id, $played, $won, $drawn, $lost, $average, $month, $day, $date);
          $row = $this->users_model->get_player_profile($player2_id);
          $played = $row->played + 1;
          $won = $row->won + 1;
          $drawn = $row->drawn;
          $lost = $row->lost;
          $average = ($won / $played) * 100;
          $this->insert_model->update_profiles($player2_id, $played, $won, $drawn, $lost, $average, $month, $day, $date);
        }*/
      }
      $order_field = "id";
      $order_direction = "asc";
      $data['players'] = $this->users_model->get_players($order_field, $order_direction);
      $data['results'] = $this->users_model->get_current_results($year, $month);
      if ($faulty_score == true) {
        $data['faulty_score'] = true;
        $data['results_message'] = "WARNING: Results for division " . $div . " have been updated, but at least one of them is scored as 3-3";
      } else {
        $data['faulty_score'] = false;
        $data['results_message'] = "Results for division " . $div . " have been updated";
      }
      $data['year'] = $year;
      $data['month'] = $month;
      $this->load->view('templates/header', $data);
      $this->load->view('admin_views/results_view', $data);
      $this->load->view('templates/footer', $data);

    }
  }
