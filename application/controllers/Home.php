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
        $data['product'] = $this->db->query('SELECT *, inventory.id as inv_id FROM inventory JOIN product_cat ON product_cat.id = inventory.cat_id')->result_array();

        $data['total_inv'] = $this->db->query('SELECT sum(beli*stok) as total_inv FROM inventory')->row_array();

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
                'stok' => 0,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('inventory', $data);
            redirect('home/addProduct');
        }
    }

    public function pr_detail($pr_id)
    {
        $data['product'] = $this->db->query("SELECT *, inventory.id as inv_id FROM inventory JOIN product_cat ON product_cat.id = inventory.cat_id WHERE inventory.id = '$pr_id'")->row_array();

        $data['title'] = 'Dashboard - Product Detail - ' . $data['product']['nama'];
        $this->load->view('include/header', $data);
        $this->load->view('home/product_detail', $data);
        $this->load->view('include/footer');
    }

    public function edit_product($pr_id)
    {
        $data['product'] = $this->db->get_where('inventory', ['id' => $pr_id])->row_array();
        $data['cat_product'] = $this->db->get('product_cat')->result_array();

        $this->form_validation->set_rules('p_name', 'Nama Produk', 'required|min_length[5]|max_length[90]|alpha_numeric_spaces|trim');
        $this->form_validation->set_rules('p_sale', 'Harga Jual', 'required|numeric|trim');
        $this->form_validation->set_rules('p_cat', 'Kategori', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dashboard - Edit Detail - ' . $data['product']['nama'];
            $this->load->view('include/header', $data);
            $this->load->view('home/edit_product', $data);
            $this->load->view('include/footer');
        } else {
            $data = [
                'nama' => $this->input->post('p_name'),
                'cat_id' => $this->input->post('p_cat'),
                'jual' => $this->input->post('p_sale'),
            ];

            $p_id = $this->input->post('p_id');

            $this->db->update('inventory', $data, ['id' => $p_id]);
            redirect('home/edit_product/' . $p_id);
        }
    }
}
