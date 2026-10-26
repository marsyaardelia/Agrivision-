<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edukasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('id')) {
            redirect('auth');
        }
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('edukasi');
        $this->load->view('template/footer');
    }
}
