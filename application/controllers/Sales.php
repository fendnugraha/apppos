<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('include/header');
        $this->load->view('sales/sales');
        $this->load->view('include/footer');
    }

    public function register()
    {
        $this->load->view('include/header');
        $this->load->view('auth/register');
        $this->load->view('include/footer');
    }
}
