<?php

class Category_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();


    }

    // Function To Ass Category
    public function addCategory($name)
    {
        $data=array('name'=>$name);

        $this->db->insert('category', $data);

    }

    // Function To Fetch Current Page Category Record
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

    // Function To Get Total Category Record
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

    // Update Query For Selected Category
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
    // Function To Delete Selected Category
    public function deleteCategory($id){

        $this->db->where('id', $id);
        $this->db->delete('category');
    }

    // Function To Delete Selected Category/s From Database
    public function deleteCheckedCategory($id)
    {

        $this->db->where('id', $id);
        return $this->db->delete('category');
    }

}




?>


