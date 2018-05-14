<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auta extends CI_Controller{

    public function __construct() {
        Parent::__construct();
        $this->load->model("Auta_Model");
    }

    public function index(){
        $data['title'] = 'Cars';
        $data['result'] = $this->Auta_Model->data();
        $this->load->view('templates/header',$data);
        $this->load->view('pages/Auta',$data);
        $this->load->view('templates/footer');
    }

    public function books_page()
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $query = $this->Auta_Model->view();

        $data = array();

        foreach($query as $r) {

            $data[] = array(
                $r['ID'],
                $r['Znacka'],
                $r['Model'],
                $r['Rok_Vyroby'],
                $r['SPZ'],
                '<a href="'.base_url('Auta/view/'.$r['ID']).'" > <button type="button" class="btn btn-info">Detail</button> </a>' . '<a href="'.base_url('Auta/edit/'.$r['ID']).'"  > <button type="button" class="btn btn-warning">Edit</button> </a>'. '<a href="'.base_url('Auta/delete/'.$r['ID']).'"  > <button type="button" class="btn btn-danger">Delete</button> </a>'
            );
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $this->Auta_Model->row_count(),
            "recordsFiltered" => $this->Auta_Model->row_count(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function view($id){
        $data = array();
        $data['title'] = 'Detail auta';

        if(!empty($id)){
            $data['auta'] = $this->Auta_Model->view($id);
            $this->load->view('pages/Auta_view',$data);
        }else{
            redirect('/pages/Auta');
        }
    }

    public function add(){
        $data = array();
        $postData = array();
        if ($this->input->post('postSubmit')) {

            if ($this->input->post('postSubmit')) {
                $this->form_validation->set_rules('Znacka', 'Znacka', 'required');
                $this->form_validation->set_rules('Model', 'Model', 'required');
                $this->form_validation->set_rules('Rok_Vyroby', 'Rok_Vyroby', 'required');
                $this->form_validation->set_rules('SPZ', 'SPZ', 'required');
            }

            $postData = array();
            $postData[0]['Znacka'] = $this->input->post('Znacka');
            $postData[0]['Model'] = $this->input->post('Model');
            $postData[0]['Rok_Vyroby'] = $this->input->post('Rok_Vyroby');
            $postData[0]['SPZ'] = $this->input->post('SPZ');

            if ($this->form_validation->run() == true) {
                $insert = $this->Auta_Model->insert($postData);
                redirect('/auta');
            }

        }
        $data['post'] = $postData;
        $data['title'] = 'Vytvorenie vodiča';
        $data['action'] = 'Pridať';

        $this->load->view('pages/Auta_add-edit', $data);

    }

    public function edit($id){
        $data = array();
        $data['data'] = $this->Auta_Model->view($id);


        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Znacka', 'Znacka', 'required');
            $this->form_validation->set_rules('Model', 'Model', 'required');
            $this->form_validation->set_rules('Rok_Vyroby', 'Rok_Vyroby', 'required');
            $this->form_validation->set_rules('SPZ', 'SPZ', 'required');
        }

        $postData = array();
        $postData[0]['Znacka'] = $this->input->post('Znacka');
        $postData[0]['Model'] = $this->input->post('Model');
        $postData[0]['Rok_Vyroby'] = $this->input->post('Rok_Vyroby');
        $postData[0]['SPZ'] = $this->input->post('SPZ');

        if ($this->form_validation->run() == true) {
            $update = $this->Auta_Model->update($postData,$id);
            print_r($postData);
            redirect('/auta');
        }

        $data['post'] = $postData;
        $data['title'] = 'Editovanie auta';
        $data['action'] = 'Editovať';

        $this->load->view('pages/Auta_add-edit', $data);
    }

    public function delete($id){
        if(!empty($id)){
            $delete = $this->Auta_Model->delete($id);
            redirect('/auta');
        }
    }
}