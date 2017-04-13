<?php

class Subject_model extends CI_model{
  
  function __construct(){
    parent::__construct();
  }
  
  function addSubject(){
    $data = array(
    'subject_name' => $this->input->post('subject_name');
    );
    
    $this->db->insert('subjects', $data);
  }
  
  function viewSubject(){
    
  }
  
  function updateSubject(){
    
  }
}
?>