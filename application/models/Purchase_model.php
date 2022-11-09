<?php defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_model extends CI_Model
{
    public function updateCost($p_id)
    {
        $total_cost = $this->db->query("SELECT sum(price*purchases) as cost, sum(purchases-sales) as stok from product_trace WHERE product_id = '$p_id' and status = 1")->row_array();

        return $total_cost['cost'] / $total_cost['stok'];
    }
}
