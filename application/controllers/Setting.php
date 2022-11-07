<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['contact'] = $this->db->get('contact')->result_array();

        $data['title'] = 'Setting';
        $this->load->view('include/header', $data);
        $this->load->view('setting/index', $data);
        $this->load->view('include/footer');
    }

    public function addContact()
    {
        $this->form_validation->set_rules('ct_name', 'Nama Kontak', 'required|alpha_numeric_spaces|trim|max_length[60]');
        $this->form_validation->set_rules('ct_desc', 'Deskripsi', 'alpha_numeric_spaces|trim|max_length[160]');

        $data = [
            'id' => null,
            'nama' => $this->input->post('ct_name'),
            'type' => $this->input->post('ct_type'),
            'keterangan' => $this->input->post('ct_desc')
        ];

        if ($this->form_validation->run() == false) {
            redirect('setting');
        } else {
            $this->db->insert('contact', $data);
            redirect('setting');
        }
    }
}
