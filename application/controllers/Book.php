<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller{

    public function index(){
        $this->load->database();
        $this->load->model('books_model');
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('main/book');
        $this->load->view('main/footer');

        //$this->output->enable_profiler(TRUE);
    }

    public function viewBook(){
        $this->load->database();
        $this->load->model('books_model');
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('main/viewbook');
        $this->load->view('main/footer');

        //$this->output->enable_profiler(TRUE);
    }
    
     public function borrowBook(){
        $this->load->database();
        $this->load->model('books_model');
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('main/borrow');
        $this->load->view('main/footer');

        //$this->output->enable_profiler(TRUE);
    }
    
     public function returnBook(){
        $this->load->database();
        $this->load->model('books_model');
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('main/return');
        $this->load->view('main/footer');

        //$this->output->enable_profiler(TRUE);
    }
    
     public function searchReturn(){
        $this->load->database();
        $this->load->model('books_model');
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('main/searchreturn');
        $this->load->view('main/footer');

        //$this->output->enable_profiler(TRUE);
    }
}
?>