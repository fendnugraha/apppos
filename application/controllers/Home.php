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
        $data['product'] = $this->db->join('product_cat', 'product_cat.id = inventory.cat_id')->get('inventory')->result_array();

        $data['title'] = 'Dashboard';
        $this->load->view('include/header', $data);
        $this->load->view('home/dashboard', $data);
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
        $data['cat_product'] = $this->db->get('product_cat')->result_array();
        $kode = "";

        $this->form_validation->set_rules('p_name', 'Nama Produk', 'required|min_length[5]|max_length[90]|alpha_numeric_spaces|trim');
        $this->form_validation->set_rules('p_code', 'Kode Produk', 'required|min_length[2]|alpha_numeric|trim|is_unique[inventory.kode]');
        $this->form_validation->set_rules('p_cost', 'Harga Beli', 'required|numeric|trim');
        $this->form_validation->set_rules('p_sale', 'Harga Jual', 'required|numeric|trim');
        $this->form_validation->set_rules('p_stock', 'Stok Awal', 'required|numeric|trim');
        $this->form_validation->set_rules('p_cat', 'Kategori', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dashboard - Add Product';
            $this->load->view('include/header', $data);
            $this->load->view('home/addproduct');
            $this->load->view('include/footer');
        } else {
            $data = [
                'id' => null,
                'kode' => $this->input->post('p_code'),
                'nama' => $this->input->post('p_name'),
                'cat_id' => $this->input->post('p_cat'),
                'beli' => $this->input->post('p_cost'),
                'jual' => $this->input->post('p_sale'),
                'stok' => $this->input->post('p_stock'),
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('inventory', $data);
            redirect('home/addProduct');
        }
    }
}
