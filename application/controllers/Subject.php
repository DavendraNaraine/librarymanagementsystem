<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller{

    public function index(){
        $this->load->database();
        $this->load->model('subjects_model');
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('main/subject');
        $this->load->view('main/footer');

        //$this->output->enable_profiler(TRUE);
    }

    public function viewSubjectSuccess(){
        $this->load->database();
        $this->load->model('subjects_model');
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('responses/success/subject_success');
        $this->load->view('main/subject');
        $this->load->view('main/footer');

        //$this->output->enable_profiler(TRUE);
    }

    public function viewSubjectFail(){
        $this->load->database();
        $this->load->model('subjects_model');
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('responses/fail/subject_fail');
        $this->load->view('main/subject');
        $this->load->view('main/footer');

        //$this->output->enable_profiler(TRUE);
    }
}
?>