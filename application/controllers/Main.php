<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

  public function index(){
      $this->load->database();
      $this->load->view('main/header');
      $this->load->view('main/main');
      $this->load->view('main/footer');
        
      //$this->output->enable_profiler(TRUE);  
    }
}
