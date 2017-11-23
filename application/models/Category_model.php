<?php

class Category_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();


    }

    public function addCategory($name)
    {
        $data=array('name'=>$name);

        $this->db->insert('category', $data);

        //$this->db->query("INSERT INTO category(name) VALUES ('$name')");
    }

    /*public function getAllCategory()
    {
        //echo "hiii";
        $query = $this->db->get('category');
        //select * from category
//        $this->db->last_query();

        return $query;
        //$this->db->last_query();
    }*/

    public function get_current_page_records($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("category");

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    public function get_total()
    {
        return $this->db->count_all("category");
    }

    // Function To Fetch Selected Category Record
    public function getById($id){

        $this->db->where('id',$id);

        $query=$this->db->get('category');

        return $query->row_array();

    }

    public function updateCategory($id,$data){
        $data=array('name'=>$data);
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('category', $data);
    }

    // Function To Fetch Selected Category Record
    public function getByDeleteId($id){

        $this->db->where('id',$id);

        $query=$this->db->get('category');

        return $query->row_array();

    }

    public function deleteCategory($id){

        $this->db->where('id', $id);
        $this->db->delete('category');
    }





// Function To Fetch Selected Student Record
    /*function show_category_id($data){
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
// Update Query For Selected Category
    function update_category_id1($id,$data){
        $this->db->where('id', $id);
        $this->db->update('category', $data);
    }*/






}




?>


