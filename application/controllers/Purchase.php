<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase extends CI_Controller
{

    public function index()
    {
        $this->load->view('include/header');
        $this->load->view('purchase/purchase');
        $this->load->view('include/footer');
    }

    public function register()
    {
        $this->load->view('include/header');
        $this->load->view('auth/register');
        $this->load->view('include/footer');
    }
}
