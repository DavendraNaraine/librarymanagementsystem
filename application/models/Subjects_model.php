<?php

class Subjects_model extends CI_model{

  function __construct(){
    parent::__construct();
  }

  function addSubject($subject){
    $q = $this->db->insert('subjects', $subject);
    return "Subject Added";
    //         $data = array(
    //             'subject_name' => $this->input->post('subject_name')
    //         );

    //         $this->db->select('subject_name');
    //         $this->db->from('subjects');
    //         $this->db->where('subject_name' , $data['subject_name']);  
    //         $query = $this->db->get();

    //         if($query->num_rows() > 0){
    //             return 1;
    //         }
    //         else{
    //             $this->db->insert('subjects', $data);
    //             //header("Location: http://librarymanagementsystem--.codeanyapp.com/librarymanagementsystem/index.php/subject");
    //             return 0;
    //         }
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
    //         $update = array (
    //             'subject_name' => $this->input->post('subject_name')
    //         );

    //         $this->db->select('*');
    //         $this->db->from('subjects');
    //         $this->db->where('subject_id', $subject_id);
    //         $query = $this->db->get();

    //         if($query->num_rows() > 0){
    //             $this->db->where('subject_id', $subject_id);
    //             $this->db->update('subjects', $update);
    //             return $subject_id;
    //         }
    //         else{
    //             return 'Subject cannot be updated';
    //         }
    $q = $this->db->where('subjects.subject_id', $subject_id)->update('subjects', $subject);
    return $q;
  }
}

?>