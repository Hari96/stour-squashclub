<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Player_profiles extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function load_profiles() {
    $order_field = 'average';
    $order_direction = 'desc';
    $data['profiles'] = $this->users_model->get_player_profiles($order_field, $order_direction);
    $order_field = 'id';
    $order_direction = 'asc';
    $data['players'] = $this->users_model->get_players_for_profile($order_field, $order_direction);//gets all players who have been active
    $this->load->view('templates/header', $data);
    $this->load->view('model_views/profiles', $data);
    $this->load->view('templates/footer', $data);
  }
}
