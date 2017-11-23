<?php

class Product_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_current_page_records($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("products");


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    public function get_total()
    {
        return $this->db->count_all("products");
    }

    public function addProduct($data)
    {

        $this->db->insert('products', $data);
        //$this->db->query("INSERT INTO category(name) VALUES ('$name')");
    }
}


