<?php
class Product_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_products($search = null, $startLength = null, $ordering = null)
    {

        if ($search != null) {
            $this->db->like('name', $search);
            $this->db->or_like('price', $search);
        }

        if ($startLength != null) {
            $this->db->limit($startLength["length"], $startLength["start"]);
        }

        if ($ordering != null) {
            $columns = array('id', 'picture', 'name', 'price', 'discount');
            $this->db->order_by($columns[$ordering["orderColumnIndex"]], $ordering["orderDir"]);
        } else {
            $this->db->order_by('id', 'desc');
        }

        $query = $this->db->get('products');

        return $query->result_array();
    }

    public function get_products_with_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function insert_product($data)
    {
        return $this->db->insert('products', $data);
    }

    public function update_product($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    public function delete_product($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('products');
    }
}
