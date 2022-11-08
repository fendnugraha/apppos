<?php defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_model extends CI_Model
{
    public function updateCost($p_id)
    {
        $total_cost = $this->db->query("SELECT sum(harga*jumlah) as cost from purchase WHERE product_id = '$p_id' and status = 1")->row_array();
        $stock = $this->db->get_where('inventory', ['id' => $p_id])->row_array();

        return $total_cost['cost'] / $stock['stok'];
    }
}
