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
    $this->load->database();
    $this->load->model('subjects_model');
    $data['response'] = $this->subjects_model->listSubjects();

    $this->load->view('api/api_view', $data);
  }

  public function update_subject($subject_id){
    $this->load->database();
    $this->load->model('subjects_model');
    $subject = json_decode($this->input->raw_input_stream);

    if(!is_numeric($subject_id) || $subject != NULL) {
      $data['response'] = $this->subjects_model->updateSubject($subject_id, $subject);
      $this->load->view('api/api_view', $data);
    } 
    else {
      $this->load->view("api/api_view", array(
        "response" => "bare problems"));
    }
  }

  public function create_subject(){
    $this->load->database();
    $this->load->model('subjects_model');
    $subject = json_decode($this->input->raw_input_stream);
    $data['response'] = $this->subjects_model->addSubject($subject);
    $this->load->view('api/api_view', $data);
  } 
}
?>