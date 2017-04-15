<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller{
  
  public function get_subject(){
    echo "get di subject";
    //$this->output->enable_profiler(TRUE);
  } 
  
  public function list_subjects(){
    echo "list di subject";
    //$this->output->enable_profiler(TRUE);
  }
  
  public function update_subject(){
    echo "update di subject";
    //$this->output->enable_profiler(TRUE);
  }
  
  public function create_subject(){
    $this->load->database();
    $this->load->model('subjects_model');
    $data['response'] = $this->subjects_model->addSubject();
    
    $this->load->view('api/api_view' , $data);
  } 
}
?>