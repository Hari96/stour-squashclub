<?php
class Update_profiles extends CI_Controller {

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
    //$player_arr = array();
    $player_array = $this->users_model->find_players_in_div($div);//finds players in each div and sorts by last name
    foreach ($player_array as $row) {
      $player_id = $row['id'];
      $lastDate[$player_id] = 0;//initialises each player with date of zero
      $lastDay[$player_id] = "";//array for storing day of latest match
    }
    for ($i = 1; $i <= $max; $i++) {
      $num1 = 'p1' . $i;
      $id1 = 'id1' . $i;
      $player1_score = $this->input->post($num1);
      $player1_id = $this->input->post($id1);
      $num2 = 'p2' . $i;
      $id2 = 'id2' . $i;
      $player2_score = $this->input->post($num2);
      $player2_id = $this->input->post($id2);
      $dat = 'date' . $i;
      $date = $this->input->post($dat);
      $d = 'day' . $i;
      $day = $this->input->post($d);
      if ($day == "d") {
        $day = "";
      }
      if ($date > $lastDate[$player1_id]) {//ensures date and day of latest match is stored
        $lastDate[$player1_id] = $date;
        $lastDay[$player1_id] = $day;
      }
      if ($date > $lastDate[$player2_id]) {
        $lastDate[$player2_id] = $date;
        $lastDay[$player2_id] = $day;
      }
      // Entering results into profiles table
      //decide whether each player has won, drawn or lost
      //**--profile update to be left until end of each period--**
      if ($player1_score == $player2_score) {
        if (!($player1_score == 0 && $player2_score == 0)) {//if both scores are zero they have not played!
          $month = ucfirst($month);
          $row = $this->users_model->get_player_profile($player1_id);
          $played = $row->played + 1;
          $won = $row->won;
          $drawn = $row->drawn + 1;
          $lost = $row->lost;
          $average = ($won / $played) * 100;
          $this->insert_model->update_profiles($player1_id, $played, $won, $drawn, $lost, $average, $month, $lastDay[$player1_id], $lastDate[$player1_id]);
          $row = $this->users_model->get_player_profile($player2_id);
          $played = $row->played + 1;
          $won = $row->won;
          $drawn = $row->drawn + 1;
          $lost = $row->lost;
          $average = ($row->won / $played) * 100;
          $this->insert_model->update_profiles($player2_id, $played, $won, $drawn, $lost, $average, $month, $lastDay[$player2_id], $lastDate[$player2_id]);
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
        $this->insert_model->update_profiles($player1_id, $played, $won, $drawn, $lost, $average, $month, $lastDay[$player1_id], $lastDate[$player1_id]);
        $row = $this->users_model->get_player_profile($player2_id);
        $played = $row->played + 1;
        $won = $row->won;
        $drawn = $row->drawn;
        $lost = $row->lost + 1;
        $average = ($won / $played) * 100;
        $this->insert_model->update_profiles($player2_id, $played, $won, $drawn, $lost, $average, $month, $lastDay[$player2_id], $lastDate[$player2_id]);
      }
      if ($player2_score > $player1_score) {
        $month = ucfirst($month);
        $row = $this->users_model->get_player_profile($player1_id);
        $played = $row->played + 1;
        $won = $row->won;
        $drawn = $row->drawn;
        $lost = $row->lost + 1;
        $average = ($won / $played) * 100;
        $this->insert_model->update_profiles($player1_id, $played, $won, $drawn, $lost, $average, $month, $lastDay[$player1_id], $lastDate[$player1_id]);
        $row = $this->users_model->get_player_profile($player2_id);
        $played = $row->played + 1;
        $won = $row->won + 1;
        $drawn = $row->drawn;
        $lost = $row->lost;
        $average = ($won / $played) * 100;
        $this->insert_model->update_profiles($player2_id, $played, $won, $drawn, $lost, $average, $month, $lastDay[$player2_id], $lastDate[$player2_id]);
      }
    }
    $order_field = "id";
    $order_direction = "asc";
    $this->insert_model->record_profile_update($div);
    $data['players'] = $this->users_model->get_players($order_field, $order_direction);
    $data['results'] = $this->users_model->get_current_results($year, $month);
    $data['divisions'] =  $this->users_model->get_divs($year, $month);
    $data['profiles_update_message'] = "Profiles for division " . $div . " have been updated";
    $data['year'] = $year;
    $data['month'] = $month;
    $this->load->view('templates/header', $data);
    $this->load->view('admin_views/profiles_update_view', $data);
    $this->load->view('templates/footer', $data);
  }
}
