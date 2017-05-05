<?php

class Titles_model extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  function getTitle($title_id){
    $this->db->select('title_id, title_name, title_author, title_publisher, title_edition, title_isbn');
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
    $this->db->select('title_id, title_name, title_author, title_publisher, title_edition, title_isbn');
    $this->db->from('titles');
    $query = $this->db->get();

    if($query->num_rows() > 0){
      return $query->result();
    }
    else{
      return 'No titles';
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
/*
      $conditions = $this->input->post('conditions');
      $ugid = $this->input->post('ugid');
      $i = 0; 
      foreach($conditions as $condition){
        $book_info = array(
          'title_id' => $insert_id,
          'condition_id' => $condition,
          'ug_id' => $ugid[$i];
        );
        $this->db->insert('books', $book_info);
        $i = $i++; 
      }
*/      
    }
  } 
}
/*
  function searchTitle(){
    $title = null;
    $subject = null;
    $author = null;
    $isbn = null; 

    $title = $this->input->post('title');
    $subject = $this->input->post('subject');
    $author = $this->input->post('author'); 
    $isbn = $this->input->post('isbn');

    if($title != null){
      $this->db->select('*');
      $this->db->from('titles');
      $this->db->where('title_name', $title);
    }
    elseif($author != null){
      $this->db->select('*');
      $this->db->from('titles');
      $this->db->where('title_author', $author);
    }
    elseif($isbn != null){
      $this->db->select('*');
      $this->db->from('titles');
      $this->db->where('title_isbn', $isbn);
    }
    else{
      $this->db->select('subject_id');
      $this->db->from('subjects');
      $this->db->where('subject_name', $subject);
      //Complete this!
    }

    $query = $this->db->get();

    if($query->num_rows() > 0){
      return $query->result();
    }
    else{
      return 'Title not found';
    }
  }
  */
?>