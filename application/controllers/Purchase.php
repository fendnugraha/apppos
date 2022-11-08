<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('purchase_model');
    }

    public function index()
    {
        $this->db->select('a.*, b.nama as supplier, c.nama as product, d.username');
        $this->db->join('contact b', 'b.id = a.contact_id', 'left');
        $this->db->join('inventory c', 'c.id = a.product_id', 'left');
        $this->db->join('user d', 'd.id = a.user_id', 'left');
        $data['purchase'] = $this->db->get('purchase a')->result_array();

        $data['title'] = 'Pembelian';
        $this->load->view('include/header', $data);
        $this->load->view('purchase/index', $data);
        $this->load->view('include/footer');
    }

    public function addPurchase()
    {
        $data['product'] = $this->db->get('inventory')->result_array();
        $data['contact'] = $this->db->get('contact')->result_array();
        $user_id = $this->session->userdata('user_id');

        $this->form_validation->set_rules('p_date', 'Tanggal', 'required');
        $this->form_validation->set_rules('p_sup', 'Supplier', 'required');
        $this->form_validation->set_rules('p_id', 'Product', 'required');
        $this->form_validation->set_rules('p_qty', 'Jumlah', 'required|numeric|trim');
        $this->form_validation->set_rules('p_price', 'Harga', 'required|numeric|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pembelian - Add Purchase';
            $this->load->view('include/header', $data);
            $this->load->view('purchase/purchase', $data);
            $this->load->view('include/footer');
        } else {
            $sisa_stok = $this->db->select('stok')->get_where('inventory', ['id' => $this->input->post('p_id')])->row_array();
            $update_stok = $sisa_stok['stok'] + $this->input->post('p_qty');

            $data = [
                'id' => null,
                'waktu' => $this->input->post('p_date'),
                'contact_id' => $this->input->post('p_sup'),
                'product_id' => $this->input->post('p_id'),
                'harga' => $this->input->post('p_price'),
                'jumlah' => $this->input->post('p_qty'),
                'user_id' => $user_id,
                'date_created' => time(),
                'status' => 1
            ];

            $this->db->trans_begin();

            $this->db->insert('purchase', $data);
            $this->db->update('inventory', ['stok' => $update_stok], ['id' => $this->input->post('p_id')]);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
                $update_cost = $this->purchase_model->updateCost($this->input->post('p_id'));
                $this->db->update('inventory', ['beli' => $update_cost], ['id' => $this->input->post('p_id')]);
            }
            redirect('purchase/addPurchase');
        }
    }

    public function edit_purchase($po_id)
    {
        $data['product'] = $this->db->get('inventory')->result_array();
        $data['purchase'] = $this->db->get_where('purchase', ['id' => $po_id])->row_array();
        $data['contact'] = $this->db->get('contact')->result_array();
        $user_id = $this->session->userdata('user_id');
        $po_id = $this->input->post('po_id');

        $this->form_validation->set_rules('p_date', 'Tanggal', 'required');
        $this->form_validation->set_rules('p_sup', 'Supplier', 'required');
        $this->form_validation->set_rules('p_id', 'Product', 'required');
        $this->form_validation->set_rules('p_qty', 'Jumlah', 'required|numeric|trim');
        $this->form_validation->set_rules('p_price', 'Harga', 'required|numeric|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Pembelian - Edit Purchase';
            $this->load->view('include/header', $data);
            $this->load->view('purchase/edit_purchase', $data);
            $this->load->view('include/footer');
        } else {
            $sisa_stok = $this->db->select('stok')->get_where('inventory', ['id' => $this->input->post('p_id')])->row_array();
            $update_stok = $sisa_stok['stok'] + $this->input->post('p_qty');

            $data = [
                'waktu' => $this->input->post('p_date'),
                'contact_id' => $this->input->post('p_sup'),
                'product_id' => $this->input->post('p_id'),
                'harga' => $this->input->post('p_price'),
                'jumlah' => $this->input->post('p_qty'),
                'user_id' => $user_id,
                'date_created' => time(),
                'status' => 1
            ];

            $this->db->trans_begin();

            $this->db->update('purchase', $data, ['id' => $po_id]);
            $this->db->update('inventory', ['stok' => $update_stok], ['id' => $this->input->post('p_id')]);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
                $update_cost = $this->purchase_model->updateCost($this->input->post('p_id'));
                $this->db->update('inventory', ['beli' => $update_cost], ['id' => $this->input->post('p_id')]);
            }
            redirect('purchase/edit_purchase/' . $po_id);
        }
    }
}
