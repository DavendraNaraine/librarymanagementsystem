<?php

class Books_model extends CI_Model{

  var $id; 
  var $subject; 
  var $title;
  var $author;
  var $coAuthor;
  var $publisher;
  var $edition;
  var $page;
  var $isbn;
  var $noOfBooks; 
  var $active;
  
  var $borrowDate;
  var $intendedReturnDate;
  var $actualReturnDate;
  var $borrowed;

  function __construct(){
    parent::__construct();
  }
  
  function addBook(){
    
  }
  
  function viewBook(){
    
  }
  
  function viewBookByName(){
    
  }
  
  function viewBookByAuthor(){
    
  }
  
  function viewBookBySubject(){
    
  }
  
  function updateBook(){
    
  }
  
  function deleteBook(){
    
  }
  
  function borrowBook(){
    
  }
  
  function returnBook(){
    
  }
}
?>