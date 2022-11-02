<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('include/header', $data);
        $this->load->view('home/dashboard');
        $this->load->view('include/footer');
    }

    public function addCatProduct()
    {
        $this->form_validation->set_rules('catname', 'Nama Kategori', 'max_length[30]|required|trim|is_unique[product_cat.category]');
        $this->form_validation->set_rules('catprefix', 'Kode Prefix', 'exact_length[2]|required|trim|is_unique[product_cat.prefix]');

        if ($this->form_validation->run() == false) {
            redirect('home');
        } else {
            $data = [
                'id' => null,
                'category' => $this->input->post('catname'),
                'prefix' => $this->input->post('catprefix')
            ];

            $this->db->insert('product_cat', $data);

            redirect('home');
        }
    }

    public function addProduct()
    {
        $data['title'] = 'Dashboard - Add Product';
        $this->load->view('include/header', $data);
        $this->load->view('home/addproduct');
        $this->load->view('include/footer');
    }
}
