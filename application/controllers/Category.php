<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller
{
    public function __construct()
    {
        //load database in autoload libraries
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->library("pagination");
        $this->load->library('form_validation');
        $this->load->library('session');

    }

    public function index()
    {

        $page_name = 'category/list';

        $data = ['page_name' => $page_name,];


        $limit_per_page = 5;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->Category_model->get_total();

        if ($total_records > 0) {
            // get current page records
            $data["results"] = $this->Category_model->get_current_page_records($limit_per_page, $start_index);

            $config['base_url'] = base_url() . 'category/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;

            //style pagination
            $config['full_tag_open'] = "<div class='pagination_listing'><ul>";
            $config['full_tag_close'] = '</ul></div>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['cur_tag_open'] = ' <li><a href="#" class="active">';
            $config['cur_tag_close'] = '</a></li>';

            $config['prev_link'] = 'Prev';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';


            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';


            $this->pagination->initialize($config);

            // build paging links
            $data["links"] = $this->pagination->create_links();
        }

        $this->load->view('index', $data);
    }

    // mycode before pagination
    /* $page_name = 'category/list';

   $data = ['page_name' => $page_name,];
   $data['Fetch_data'] = $this->Category_model->getAllCategory();
   $this->load->view('category/list.php', $data);
   $this->load->view('index', $data);
   }*/


    public function add()
    {

        $page_name = 'category/add';
        $data = ['page_name' => $page_name];
        // $name="";
        // if($this->input->post('submit')){
        $postdata = $this->input->post();
        if ($postdata) {
            $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|min_length[5]');
            $name = $this->input->post('category_name');
            if ($this->form_validation->run() == TRUE) {
                $this->Category_model->addCategory($name);
                $this->session->set_flashdata('success', 'Category Added Successfully');
            }
        }
        $this->load->view('index', $data);

    }

     public function edit(){
         $page_name = 'category/edit';
         $data = ['page_name' => $page_name];

         $id = $this->uri->segment(3);

         $data["result"] = $this->Category_model->getById($id);
        // print_r($data);die;
         $postdata = $this->input->post();
         if ($postdata) {
             $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|min_length[5]');
             $name = $this->input->post('category_name');
             $id = $this->input->post('id');
             if ($this->form_validation->run() == TRUE) {
                 $this->Category_model->updateCategory($id,$name);
                 $this->session->set_flashdata('success', 'Category Updated Successfully');
             }
         }
             $this->load->view('index', $data);
     }

    public function delete(){

         $page_name = 'category/delete';
         $data = ['page_name' => $page_name ];

         $id = $this->uri->segment(3);

         $data["result"] = $this->Category_model->getByDeleteId($id);

         if($data){
             $this->Category_model->deleteCategory($id);
             redirect(base_url());
         }
      else{
          $this->load->view('index', $data);

      }

    }
}


?>