<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewtitle extends CI_Controller{
  
  public function index(){
    $this->load->database();
    $this->load->model('viewtitles_model');
    $this->load->view('main/header');
    $this->load->view('main/navbar');
    $this->load->view('main/viewtitle');
    $this->load->view('main/footer');
    
    //$this->output->enable_profiler(TRUE);
  }
}
?>