<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
  
  public function index(){
    $this->load->database();
    $this->load->model('user_model');
    $this->load->view('user');
    
    $this->output->enable_profiler(TRUE);
  }
}
?>