<?php

class Titles_model extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  function getTitle($title_id){
    $this->db->select('*');
    $this->db->from('titles');
    $this->db->join('subjects', 'titles.subject_id = subject.subject_id');
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
    $this->db->join('title_subjects', 'titles.title_id = title_subjects.title_id');
    $this->db->join('subjects', 'title_subjects.subject_id  = subjects.subject_id');
    $this->db->order_by('titles.title_name', 'asc');
    $query = $this->db->get();

    if($query->num_rows() > 0){
      return $query->result();
    }
    else{
      return 'No titles';
    }
  }

  function updateTitle($title_id = NULL, $title = NULL){
    $q = $this->db->where('titles.title_id', $title_id)->update('titles', $title);
    return $q;
  }

  function addTitle($title){
    $q = $this->db->insert('titles', $title);
    return "Title Added";
    //     $data = array(
    //       'title_name' => $this->input->post('title'),
    //       'title_author' => $this->input->post('author'),
    //       'title_coauthor' => $this->input->post('coAuthor'),
    //       'title_edition' => $this->input->post('edition'),
    //       'title_publisher' => $this->input->post('publisher'),
    //       'title_isbn' => $this->input->post('isbn')
    //     );

    //     $this->db->select('title_isbn');
    //     $this->db->from('titles');
    //     $this->db->where('title_isbn' , $data['title_isbn']);  
    //     $query = $this->db->get();

    //     if($query->num_rows() > 0){
    //       return 1;
    //     }
    //     else{
    //       $this->db->insert('titles', $data); 
    //       $insert_id = $this->db->insert_id();

    //       $subjects = $this->input->post('subjects');
    //       foreach($subjects as $subject){
    //         $title_subject_info = array(
    //           'title_id' => $insert_id,
    //           'subject_id' => $subject
    //         );
    //         $this->db->insert('title_subjects', $title_subject_info);
    //       }

    //       $conditions = $this->input->post('conditions');
    //       $ugids = $this->input->post('ugids');
    //       $i = 0;
    //       foreach($conditions as $condition){
    //         $book_info = array(
    //           'title_id' => $insert_id,
    //           'condition_id' => $condition,
    //           'ug_id' => $ugids[$i]
    //         );
    //         $this->db->insert('books', $book_info);
    //         $i = $i + 1; 
    //       }
    //       return 0;
    //     }
  } 

  function addTitleView(){
    $add = $this->addTitle();
    if($add==0){
      //Title added successfully, redirect to success page
      header("Location: http://librarymanagementsystem--.codeanyapp.com/librarymanagementsystem/index.php/title-success");
    }
    else {
      //Title add was unsuccessful, reidrect to fail page
      header("Location: http://librarymanagementsystem--.codeanyapp.com/librarymanagementsystem/index.php/title-fail");
    }
  }

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
      $this->db->select('*');
      $this->db->from('title_subjects');
      $this->db->join('titles', 'title_subjects.title_id = titles.title_id');
      $this->db->where('subject_id', $subject);
    }

    $query = $this->db->get();

    if($query->num_rows() > 0){
      return $query->result();
    }
    else{
      return 'Title not found';
    }
  }
}
?>