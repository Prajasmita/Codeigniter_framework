<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller
{
    public function __construct()
    {
        // load database in autoload libraries
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('upload');


    }

    // Default Function
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

            //print_r($data);

            $config['base_url'] = base_url() . 'product/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;

            // style pagination
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

    // Function To Delete Data From Database
    public function delete()
    {

        $page_name = 'product/delete';
        $data = ['page_name' => $page_name];

        $id = $this->uri->segment(3);

        $data["result"] = $this->Product_model->getByDeleteId($id);

        if ($data) {
            $this->Product_model->deleteProduct($id);
            redirect(base_url() . "product/index");
        } else {
            $this->load->view('index', $data);

        }
    }

    // Function To Add Data In Database
    public function add()
    {
        $page_name = 'product/add';
        $data1 = ['page_name' => $page_name];

        $data1['result'] = $this->Product_model->getCategories();
        // print_r($data1);

        $postdata = $this->input->post();
        if ($postdata) {

            $this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('price', 'Product Price', 'trim|required');


            if ($this->form_validation->run() == TRUE) {

                $config['upload_path'] = './public/photo/';
                $config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('image')) {
                    echo "error";
                    $data1['error'] = array('error' => $this->upload->display_errors());
                    // print_r($error);
                    //$this->load->view('index', array('error' => ' ' ));
                    $this->load->view('index', $data1);

                } else {
                    $data = array('image' => $this->upload->data()['file_name'],
                        'name' => $this->input->post('product_name'),
                        'price' => $this->input->post('price'),
                        'category_id' => $this->input->post('category')
                    );
                    $this->Product_model->addProduct($data);
                    $this->session->set_flashdata('success', 'Product Added Successfully');

                    $this->load->view('index', $data1);
                }
            } else {
                $this->load->view('index', $data1);
            }
        } else {
            $this->load->view('index', $data1);
        }
    }

    // Function To Edit Data In Database
    public function edit()
    {
        // $data = array();
        $page_name = 'product/edit';
        $data = ['page_name' => $page_name];

        $data['result'] = $this->Product_model->getCategories();
        $id = $this->uri->segment(3);
        $data['product'] = $this->Product_model->getById($id);
        $postdata = $this->input->post();
        if ($postdata) {
            $this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('price', 'Product Price', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './public/photo/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('image')) {
                    // echo "error";
                    $error = array('error' => $this->upload->display_errors());
                    // print_r($error);
                    //$this->load->view('index', array('error' => ' ' ));
                    $this->load->view('index', array($data, $error));
                } else {
                    $id = $this->input->post('id');

                    $data1 = array(
                        'image' => $this->upload->data()['file_name'],
                        'name' => $this->input->post('product_name'),
                        'price' => $this->input->post('price'),
                        'category_id' => $this->input->post('category')
                    );
                    $this->Product_model->updateProduct($id, $data1);
                    $this->session->set_flashdata('success', 'Product Updated Successfully');
                    $this->load->view('index', $data);
                }
            } else {
                $this->load->view('index', $data);
            }
        } else {
            $this->load->view('index', $data);
        }
    }

    public function bulkDelete()
    {
//        print_r($this->input->post('id'));
//        print_r(json_decode($this->input->post('id')));
        $ids = json_decode($this->input->post('id'));

        if ($ids) {
            foreach ($ids as $i) {
                //print_r($i);exit;
                $this->Product_model->deleteCheckedProduct($i);
            }
                echo true;
                exit;
            }
            else
            {
                echo false;
                exit;
            }
    }
}




























