<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Report';
        $this->load->view('include/header', $data);
        $this->load->view('report/index', $data);
        $this->load->view('include/footer');
    }
}
