<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zakaznici extends CI_Controller{

    public function __construct() {
        Parent::__construct();
        $this->load->model("Zakaznici_Model");
    }

    public function index(){
        $data['title'] = 'Customers';
        $data['result'] = $this->Zakaznici_Model->data();
        $this->load->view('templates/header',$data);
        $this->load->view('pages/Zakaznici',$data);
        $this->load->view('templates/footer');
    }

    public function books_page()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $query = $this->Zakaznici_Model->view();

        $data = array();

        foreach($query as $r) {

            $data[] = array(
                $r['ID'],
                $r['Tel_cislo'],
                $r['Datum'],
                '<a href="'.base_url('Zakaznici/view/'.$r['ID']).'" > <button type="button" class="btn btn-info">Detail</button> </a>' . '<a href="'.base_url('Zakaznici/edit/'.$r['ID']).'"  > <button type="button" class="btn btn-warning">Edit</button> </a>'. '<a href="'.base_url('Zakaznici/delete/'.$r['ID']).'"  > <button type="button" class="btn btn-danger">Delete</button> </a>'
            );
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $this->Zakaznici_Model->row_count(),
            "recordsFiltered" => $this->Zakaznici_Model->row_count(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function view($id){
        $data = array();
        $data['title'] = 'Detail zákazníka';

        if(!empty($id)){
            $data['zakaznici'] = $this->Zakaznici_Model->view($id);
            $this->load->view('pages/Zakaznici_view',$data);
        }else{
            redirect('/pages/Zakaznici');
        }
    }

    public function add(){
        $data = array();
        $postData = array();
        if ($this->input->post('postSubmit')) {

            $this->form_validation->set_rules('Tel_cislo', 'Tel_cislo', 'required');
            $this->form_validation->set_rules('Datum', 'Datum', 'required');

            $postData = array();
            $postData[0]['Tel_cislo'] = $this->input->post('Tel_cislo');
            $postData[0]['Datum'] = $this->input->post('Datum');


            if ($this->form_validation->run() == true) {
                $insert = $this->Zakaznici_Model->insert($postData);
                redirect('/zakaznici');
            }

        }
        $data['post'] = $postData;
        $data['title'] = 'Vytvorenie zákaznika';
        $data['action'] = 'Pridať';

        $this->load->view('pages/Zakaznici_add-edit', $data);

    }

    public function edit($id){
        $data = array();
        $data['data'] = $this->Zakaznici_Model->view($id);

        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Tel_cislo', 'Tel_cislo', 'required');
            $this->form_validation->set_rules('Datum', 'Datum', 'required');
        }

        $postData = array();
        $postData[0]['Tel_cislo'] = $this->input->post('Tel_cislo');
        $postData[0]['Datum'] = $this->input->post('Datum');

        if ($this->form_validation->run() == true) {
            $update = $this->Zakaznici_Model->update($postData,$id);
            redirect('/zakaznici');
        }

        $data['post'] = $postData;
        $data['title'] = 'Editovanie zákazníka';
        $data['action'] = 'Editovať';

        $this->load->view('pages/Zakaznici_add-edit', $data);
    }

    public function delete($id){
        if(!empty($id)){
            $delete = $this->Zakaznici_Model->delete($id);
            redirect('/zakaznici');
        }
    }
}