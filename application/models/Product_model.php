<?php

class Product_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    // Function To Current Page Data From List
    public function get_current_page_records($limit, $start)
    {
        // $this->db->limit($limit, $start);
        //$query = $this->db->get('products');
        $query = $this->db->query("select  p.id,p.name,p.image,p.price,c.name as c_name
                                  from products p join category c on category_id=c.id limit $start,$limit");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    // Function To Get Total Products
    public function get_total()
    {
        return $this->db->count_all("products");
    }

    // Function To Add Product In Database
    public function addProduct($data)
    {

        $res = $this->db->insert('products', $data);
        $this->db->last_query();
        return $res;
    }

    // Function To Get Id Of Selected Data
    public function getByDeleteId($id)
    {

        $this->db->where('id', $id);

        $query = $this->db->get('products');

        return $query->row_array();

    }

    // Function To Delete Product From Database
    public function deleteProduct($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('products');
    }

    // Function To Get Categories
    public function getCategories()
    {

        $query = $this->db->get('category');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    // Function To Get Selected Data
    public function getById($id)
    {

        $this->db->where('id', $id);

        $query = $this->db->get('products');

        return $query->row_array();

    }

    // Function To Update Product
    public function updateProduct($id, $data)
    {

        $data1 = array('name' => $data['name'],
            'price' => $data['price'],
            'category_id' => $data['category_id']
        );
        $this->db->set($data1);
        $this->db->where('id', $id);
        $this->db->update('products', $data1);
    }

    // Function To Delete Selected Product/s From Database
    public function deleteCheckedProduct($id)
    {

        $this->db->where('id', $id);
        return $this->db->delete('products');

    }


}


