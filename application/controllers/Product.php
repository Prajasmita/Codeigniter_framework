<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller
{
    public function __construct()
    {
        //load database in autoload libraries
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->library('form_validation');




    }

    public function index()
    {

        $page_name = 'product/list';

        $data = ['page_name' => $page_name,];


        $limit_per_page = 5;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->Product_model->get_total();

        if ($total_records > 0) {
            // get current page records
            $data["results"] = $this->Product_model->get_current_page_records($limit_per_page, $start_index);

            $config['base_url'] = base_url() . 'product/index';
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


    public function add()
    {
        $page_name = 'product/add';
        $data = ['page_name' => $page_name];

        $postdata = $this->input->post();
        if ($postdata) {
            $this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('price', 'Product Price', 'trim|required|min_length[5]');


            if ($this->form_validation->run() == TRUE) {

                $data = array(
                    'name' => $this->input->post('product_name'),
                    'price' => $this->input->post('price'),
                    'image' => $this->input->post('image')

                );

                print_r($data);
                if ($this->upload->do_upload()) {
                    $this->Product_model->addProduct($data);
                    $this->session->set_flashdata('success', 'Category Added Successfully');
                }
                else
                {
                    echo "error";
                }
            }
            else
            {
                $this->load->view('index', $data);
            }
        }
        else
        {
            $this->load->view('index', $data);
        }
    }

    public function do_upload(){
        $config = array(
            'upload_path' => "./photo/",
            'allowed_types' => "jpg|png",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
        );
        $this->load->library('upload', $config);
        /*if($this->upload->do_upload())
        {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success',$data);
        }
        else
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('file_view', $error);
        }*/
    }


}
