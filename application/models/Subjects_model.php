<?php

class Subjects_model extends CI_model{
  
  function __construct(){
    parent::__construct();
  }
  
  function addSubject(){
    $data = array(
    'subject_name' => $this->input->post('subject_name')
    );
    
    $this->db->select('subject_name');
    $this->db->from('subjects');
    $this->db->where('subject_name' , $data['subject_name']);  
    $query = $this->db->get();
    
    if($query->num_rows() > 0){
      return 'Subject exists';
    }
    else{
      $this->db->insert('subjects', $data);
      return 'Subject added';
    }
  }
  
  function getSubject($subject_id){
    $this->db->select('*');
    $this->db->from('subjects');
    $this->db->where('subject_id', $subject_id);
    $query = $this->db->get();
    
    if($query->num_rows() > 0){
      return $query->result();
    }
    else{
      return 'Subject does not exist';
    }
  }
  
  function listSubjects(){
    
  }
  
  function updateSubject(){
    
  }
}
?>