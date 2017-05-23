<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Titles extends CI_Controller{

  public function get_title($title_id){
    $this->load->database();
    $this->load->model('titles_model');
    $data['response'] = $this->titles_model->getTitle($title_id);

    $this->load->view('api/api_view', $data);
  } 

  public function list_titles(){
    $this->load->database();
    $this->load->model('titles_model');
    $data['response'] = $this->titles_model->listTitles();
    $this->load->view('api/api_view', $data);
  }

  public function update_title($title_id){
    $this->load->database();
    $this->load->model('titles_model');

    $title = json_decode($this->input->raw_input_stream);


    if(!is_numeric($title_id) || $title != NULL) {
      $data['response'] = $this->titles_model->updateTitle($title_id, $title);
      $this->load->view('api/api_view', $data);
    } 
    else {
      $this->load->view("api/api_view", array(
        "response" => "bare problems"));
    }
  }

  public function create_title(){
    $this->load->database();
    $this->load->model('titles_model');
    $title = json_decode($this->input->raw_input_stream);
    $data['response'] = $this->titles_model->addTitle($title);
    $this->load->view('api/api_view', $data);
  }

  public function search_title(){
    $this->load->database();
    $this->load->model('titles_model');
    $data['response'] = $this->titles_model->searchTitle();

    $this->load->view('api/api_view', $data);    
  }

}
?>