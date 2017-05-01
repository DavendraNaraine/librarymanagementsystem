<?php

class Titles_model extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  function getTitle($title_id){
    $this->db->select('*');
    $this->db->from('titles');
    $this->db->where('title_id', $title_id);
    $query = $this->db->get();

    if($query->num_rows() > 0){
      return $query->result();
    }
    else{
      return 'Title does not exist';
    }
  }

  function listTitles(){
    $this->db->select('*');
    $this->db->from('titles');
    $query = $this->db->get();

    if($query->num_rows() > 0){
      return $query->result();
    }
    else{
      return 'Error loading list';
    }
  }

  function updateTitle($title_id){
    $update = array (
      'title_name' => $this->input->post('title'),
      'title_author' => $this->input->post('author'),
      'title_coauthor' => $this->input->post('coAuthor'),
      'title_edition' => $this->input->post('edition'),
      'title_publisher' => $this->input->post('publisher'),
      'title_isbn' => $this->input->post('isbn')
    );

    $this->db->select('*');
    $this->db->from('titles');
    $this->db->where('title_id', $title_id);
    $query = $this->db->get();

    if($query->num_rows() > 0){
      $this->db->where('title_id', $title_id);
      $this->db->update('titles', $update);
      return $title_id;
    }
    else{
      return 'Title cannot be updated';
    }
  }

  function addTitle(){
    $data = array(
      'title_name' => $this->input->post('title'),
      'title_author' => $this->input->post('author'),
      'title_coauthor' => $this->input->post('coAuthor'),
      'title_edition' => $this->input->post('edition'),
      'title_publisher' => $this->input->post('publisher'),
      'title_isbn' => $this->input->post('isbn')
    );

    $this->db->select('title_isbn');
    $this->db->from('titles');
    $this->db->where('title_isbn' , $data['title_isbn']);  
    $query = $this->db->get();

    if($query->num_rows() > 0){
      return 'Book exists';
    }
    else{
      $this->db->insert('titles', $data); 
      $insert_id = $this->db->insert_id();
      /*
      header("Location: http://librarymanagementsystem--.codeanyapp.com/librarymanagementsystem/index.php/title");
      */
      $subjects = $this->input->post('subjects');
      foreach($subjects as $subject){
        $title_subject_info = array(
          'title_id' => $insert_id,
          'subject_id' => $subject
        );
        $this->db->insert('title_subjects', $title_subject_info);
      }
    } 
  }    
}
?>