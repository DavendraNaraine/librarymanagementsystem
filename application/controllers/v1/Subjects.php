<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller{
  
  public function get_subject($subject_id){
    $this->load->database();
    $this->load->model('subjects_model');
    $data['response'] = $this->subjects_model->getSubject($subject_id);
    
    $this->load->view('api/api_view', $data);
  } 
  
  public function list_subjects(){
    
  }
  
  public function update_subject(){
    
  }
  
  public function create_subject(){
    $this->load->database();
    $this->load->model('subjects_model');
    $data['response'] = $this->subjects_model->addSubject();
    
    $this->load->view('api/api_view' , $data);
  } 
}
?>