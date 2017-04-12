<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller{
  
  public function index(){
    $this->load->database();
    $this->load->model('subject_model');
    $this->load-view('main/header');
    $this->load-view('main/subject');
    $this->load-view('main/footer');
    
    $this->output->enable_profiler(TRUE);
  }
}
?>