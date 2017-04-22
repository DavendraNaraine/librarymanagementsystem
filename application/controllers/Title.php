<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Title extends CI_Controller{
  
  public function index(){
    $this->load->database();
    $this->load->model('titles_model');
    $this->load->view('main/header');
    $this->load->view('main/navbar');
    $this->load->view('main/title');
    $this->load->view('main/footer');
    
    //$this->output->enable_profiler(TRUE);
  } 
  public function viewTitle(){
    $this->load->database();
    $this->load->model('titles_model');
    $this->load->view('main/header');
    $this->load->view('main/navbar');
    $this->load->view('main/viewtitle');
    $this->load->view('main/footer');
    
    //$this->output->enable_profiler(TRUE);
  }
}
?>