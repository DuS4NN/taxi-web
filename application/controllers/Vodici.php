<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Vodici extends CI_Controller{

        public function __construct() {
            Parent::__construct();
            $this->load->model("Vodici_Model");
        }

        public function index(){
            $data['title'] = 'Drivers';
            $data['result'] = $this->Vodici_Model->data();
            $this->load->view('templates/header',$data);
            $this->load->view('pages/Vodici',$data);
            $this->load->view('templates/footer');
        }

        public function books_page()
        {
            // Datatables Variables
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));


            $query = $this->Vodici_Model->view();

            $data = array();

            foreach($query as $r) {

                $data[] = array(
                    $r['ID'],
                    $r['Meno'],
                    $r['Priezvisko'],
                    $r['Mesto'],
                    $r['Ulica'],
                    $r['Rok_narodenia'],
                    '<a href="'.base_url('Vodici/view/'.$r['ID']).'" > <button type="button" class="btn btn-info">Detail</button> </a>' . '<a href="'.base_url('Vodici/edit/'.$r['ID']).'"  > <button type="button" class="btn btn-warning">Edit</button> </a>'. '<a href="'.base_url('Vodici/delete/'.$r['ID']).'"  > <button type="button" class="btn btn-danger">Delete</button> </a>'
                );
            }

            $output = array(
                "draw" => $draw,
                "recordsTotal" => $this->Vodici_Model->row_count(),
                "recordsFiltered" => $this->Vodici_Model->row_count(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        }

        public function view($id){
            $data = array();
            $data['title'] = 'Detail vodiča';

            if(!empty($id)){
                $data['vodici'] = $this->Vodici_Model->view($id);
                $this->load->view('pages/Vodici_view',$data);
            }else{
                redirect('/pages/vodici');
            }
        }

        public function add(){
            $data = array();
            $postData = array();
            if ($this->input->post('postSubmit')) {

                $this->form_validation->set_rules('Meno', 'Meno', 'required');
                $this->form_validation->set_rules('Priezvisko', 'Priezvisko', 'required');
                $this->form_validation->set_rules('Mesto', 'Mesto', 'required');
                $this->form_validation->set_rules('Ulica', 'Ulica', 'required');
                $this->form_validation->set_rules('Rok_narodenia', 'Rok_narodenia', 'required');

                $postData = array();
                $postData[0]['Meno'] = $this->input->post('Meno');
                $postData[0]['Priezvisko'] = $this->input->post('Priezvisko');
                $postData[0]['Mesto'] = $this->input->post('Mesto');
                $postData[0]['Ulica'] = $this->input->post('Ulica');
                $postData[0]['Rok_narodenia'] = $this->input->post('Rok_narodenia');

               if ($this->form_validation->run() == true) {
                    $insert = $this->Vodici_Model->insert($postData);
                    redirect('/vodici');
                }

            }
            $data['post'] = $postData;
            $data['title'] = 'Vytvorenie vodiča';
            $data['action'] = 'Pridať';

            $this->load->view('pages/Vodici_add-edit', $data);

        }

        public function edit($id){
            $data = array();
            $data['data'] = $this->Vodici_Model->view($id);


            if ($this->input->post('postSubmit')) {
                $this->form_validation->set_rules('Meno', 'Meno', 'required');
                $this->form_validation->set_rules('Priezvisko', 'Priezvisko', 'required');
                $this->form_validation->set_rules('Mesto', 'Mesto', 'required');
                $this->form_validation->set_rules('Ulica', 'Ulica', 'required');
                $this->form_validation->set_rules('Rok_narodenia', 'Rok narodenia', 'required');
            }

            $postData = array();
            $postData[0]['Meno'] = $this->input->post('Meno');
            $postData[0]['Priezvisko'] = $this->input->post('Priezvisko');
            $postData[0]['Mesto'] = $this->input->post('Mesto');
            $postData[0]['Ulica'] = $this->input->post('Ulica');
            $postData[0]['Rok_narodenia'] = $this->input->post('Rok_narodenia');

            if ($this->form_validation->run() == true) {
                $update = $this->Vodici_Model->update($postData,$id);
                print_r($postData);
                redirect('/vodici');
            }

            $data['post'] = $postData;
            $data['title'] = 'Vytvorenie vodiča';
            $data['action'] = 'Editovať';

            $this->load->view('pages/Vodici_add-edit', $data);
        }

        public function delete($id){
            if(!empty($id)){
                $delete = $this->Vodici_Model->delete($id);
                redirect('/vodici');
            }
        }
    }