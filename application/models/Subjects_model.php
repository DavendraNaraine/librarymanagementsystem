<?php

class Subjects_model extends CI_model{

  function __construct(){
    parent::__construct();
  }



  function addSubject($subject){
    $this->db->select('subject_name');
    $this->db->from('subjects');
    $this->db->where('subject_name', $subject->subject_name); 

    $query = $this->db->get();

    if($query->num_rows() > 0){
      return "Subject exist";
    }
    else{   
      $q = $this->db->insert('subjects', $subject);
      return "Subject Added";
    }
  }



  function addSubjectView(){
    $add = $this->addSubject();
    if($add==0){
      //Subject added successfully, redirect to success page
      header("Location: http://librarymanagementsystem--.codeanyapp.com/librarymanagementsystem/index.php/subject-success");
    }
    else {
      //Subject add was unsuccessful, reidrect to fail page
      header("Location: http://librarymanagementsystem--.codeanyapp.com/librarymanagementsystem/index.php/subject-fail");
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
    $this->db->select('*');
    $this->db->from('subjects');
    $query = $this->db->get();

    if($query->num_rows() > 0){
      return $query->result();
    }
    else{
      return 'Error loading list';
    }
  }



  function updateSubject($subject_id = NULL, $subject = NULL){
    $this->db->select('subject_id');
    $this->db->from('subjects');
    $this->db->where('subject_id', $subject_id); 

    $query = $this->db->get();

    if($query->num_rows() == 1){
      $q = $this->db->where('subjects.subject_id', $subject_id)->update('subjects', $subject);
      return $q;
    }
    else{
      return "Subject cannot be updated";
    }
  }
}

?>