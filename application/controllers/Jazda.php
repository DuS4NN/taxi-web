<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jazda extends CI_Controller{

    public function __construct() {
        Parent::__construct();
        $this->load->model("Jazda_Model");
        $this->load->model("Zakaznik_Model");
        $this->load->model("Smeny_Model");
    }

    public function index(){
        $data['title'] = 'Rides';
        $data['result'] = $this->Jazda_Model->data();
        $this->load->view('templates/header',$data);
        $this->load->view('pages/Jazda',$data);
        $this->load->view('templates/footer');
    }

    public function books_page()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $query = $this->Jazda_Model->view();

        $data = array();

        foreach($query as $r) {

            $data[] = array(
                $r['ID'],
                $r['Pocet_KM'],
                $r['Cena'],
                $r['Odkial'],
                $r['Kam'],
                $r['Cas_vyzdvihnutia'],
                $r['Cas_vysadenia'],
                $r['Tel_cislo'],
                $r['Meno'],
                $r['Priezvisko'],
                $r['Znacka'],
                $r['Model'],
                '<a href="'.base_url('Jazda/view/'.$r['ID']).'" > <button type="button" class="btn btn-info">Detail</button> </a>' . '<a href="'.base_url('Jazda/edit/'.$r['ID']).'"  > <button type="button" class="btn btn-warning">Edit</button> </a>'. '<a href="'.base_url('Jazda/delete/'.$r['ID']).'"  > <button type="button" class="btn btn-danger">Delete</button> </a>'
            );
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $this->Jazda_Model->row_count(),
            "recordsFiltered" => $this->Jazda_Model->row_count(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function view($id){
        $data = array();
        $data['title'] = 'Detail jazdy';

        if(!empty($id)){
            $data['jazda'] = $this->Jazda_Model->view($id);
            $this->load->view('pages/Jazda_view',$data);
        }else{
            redirect('/pages/Jazda');
        }
    }

    function check_default($array)
    {
        return TRUE;
    }


    public function add(){
        $data = array();
        $postData = array();
        if ($this->input->post('postSubmit')) {

            if ($this->input->post('postSubmit')) {
                $this->form_validation->set_rules('Pocet_KM', 'Pocet_KM', 'required');
                $this->form_validation->set_rules('Cena', 'Cena', 'required');
                $this->form_validation->set_rules('Odkial', 'Odkial', 'required');
                $this->form_validation->set_rules('Kam', 'Kam', 'required');
                $this->form_validation->set_rules('Cas_vyzdvihnutia', 'Cas_vyzdvihnutia', 'required');
                $this->form_validation->set_rules('Cas_vysadenia', 'Cas_vysadenia', 'required');
                $this->form_validation->set_rules('Zakaznici_ID', 'Zakaznici_ID', 'required|callback_check_default');
                $this->form_validation->set_message('check_default', 'You need to select something other than the default');
                $this->form_validation->set_rules('Vodici_smena_ID', 'Vodici_smena_ID', 'required');
            }

            $postData = array();
            $postData[0]['Pocet_KM'] = $this->input->post('Pocet_KM');
            $postData[0]['Cena'] = $this->input->post('Cena');
            $postData[0]['Odkial'] = $this->input->post('Odkial');
            $postData[0]['Kam'] = $this->input->post('Kam');
            $postData[0]['Cas_vyzdvihnutia'] = $this->input->post('Cas_vyzdvihnutia');
            $postData[0]['Cas_vysadenia'] = $this->input->post('Cas_vysadenia');
            $postData[0]['Zakaznici_ID'] = $this->input->post('Zakaznici_ID');
            $postData[0]['Vodici_smena_ID'] = $this->input->post('Vodici_smena_ID');

            if ($this->form_validation->run() == true) {
                $insert = $this->Jazda_Model->insert($postData);
                redirect('/jazda');
            }else{

            }

        }
        $data['post'] = $postData;
        $data['title'] = 'Vytvorenie jazdy';
        $data['action'] = 'Pridať';
        $data['zakaznik'] = $this->Zakaznik_Model->view();
        $data['smeny'] = $this->Smeny_Model->view();

        $this->load->view('pages/Jazda_add-edit', $data);

    }

    public function edit($id){
        $data = array();
        $data['data'] = $this->Jazda_Model->view2($id);



        if ($this->input->post('postSubmit')) {
            $this->form_validation->set_rules('Pocet_KM', 'Pocet_KM', 'required');
            $this->form_validation->set_rules('Cena', 'Cena', 'required');
            $this->form_validation->set_rules('Odkial', 'Odkial', 'required');
            $this->form_validation->set_rules('Kam', 'Kam', 'required');
            $this->form_validation->set_rules('Cas_vyzdvihnutia', 'Cas_vyzdvihnutia', 'required');
            $this->form_validation->set_rules('Cas_vysadenia', 'Cas_vysadenia', 'required');
            $this->form_validation->set_rules('Zakaznici_ID','Zakaznici_ID','required|callback_check_default');
            $this->form_validation->set_message('check_default', 'You need to select something other than the default');
            $this->form_validation->set_rules('Vodici_smena_ID', 'Vodici_smena_ID', 'required');
        }

        $postData = array();
        $postData[0]['Pocet_KM'] = $this->input->post('Pocet_KM');
        $postData[0]['Cena'] = $this->input->post('Cena');
        $postData[0]['Odkial'] = $this->input->post('Odkial');
        $postData[0]['Kam'] = $this->input->post('Kam');
        $postData[0]['Cas_vyzdvihnutia'] = $this->input->post('Cas_vyzdvihnutia');
        $postData[0]['Cas_vysadenia'] = $this->input->post('Cas_vysadenia');
        $postData[0]['Zakaznici_ID'] = $this->input->post('Zakaznici_ID');
        $postData[0]['Vodici_smena_ID'] = $this->input->post('Vodici_smena_ID');

        if ($this->form_validation->run() == true) {
            $update = $this->Jazda_Model->update($postData,$id);
            redirect('/jazda');
        }

        $data['post'] = $postData;
        $data['title'] = 'Editovanie jazdy';
        $data['action'] = 'Editovať';

        $data['zakaznik'] = $this->Zakaznik_Model->view();
        $data['smeny'] = $this->Smeny_Model->view();

        $this->load->view('pages/Jazda_add-edit', $data);
    }

    public function delete($id){
        if(!empty($id)){
            $delete = $this->Jazda_Model->delete($id);
            redirect('/Jazda');
        }
    }
}