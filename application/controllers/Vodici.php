<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Vodici extends CI_Controller{

        public function index(){
            $this->load->library('pagination');
            $this->load->model('Vodici_Model');
            //$data['vodici'] = $this->Vodici_Model->view();
            $data['title'] = 'Vodiči';

            $config = array();
            $config['base_url'] = base_url('Vodici/index/');
            $config['total_rows'] = $this->db->count_all('vodici');
            $config['per_page'] = 3;
            $config['num_links'] = 5;
            $config['cur_tag_open'] = '&nbsp;<a class="page-link">';
            $config['cur_tag_close'] = '</a>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Previous';

            $this->pagination->initialize($config);
            if($this->uri->segment(3)){
                $page = ($this->uri->segment(3)) ;
            }
            else{
                $page = 0;
            }

            $data['vodici'] = $this->Vodici_Model->fetch_data($config["per_page"], $page);
            $str_links = $this->pagination->create_links();
            $data["links"] = explode('&nbsp;',$str_links );

            $this->load->view('templates/header');
            $this->load->view('pages/Vodici',$data);
            $this->load->view('templates/footer');
        }

        public function view($id){
            $this->load->model('Vodici_model');
            $data = array();
            $data['title'] = 'Detail vodiča';

            if(!empty($id)){
                $data['vodici'] = $this->Vodici_model->view($id);
                $this->load->view('templates/header');
                $this->load->view('pages/Vodici_view',$data);
                $this->load->view('templates/footer');
            }else{
                redirect('/pages/vodici');
            }
        }

        public function add(){
            $data = array();
            $postData = array();
            $this->load->model('Vodici_model');
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
                    $insert = $this->Vodici_model->insert($postData);
                    redirect('/vodici');
                }

            }
            $data['post'] = $postData;
            $data['title'] = 'Vytvorenie vodiča';
            $data['action'] = 'Pridať';

            $this->load->view('templates/header', $data);
            $this->load->view('pages/Vodici_add-edit', $data);
            $this->load->view('templates/footer');
        }

        public function edit($id){
            $this->load->model('Vodici_model');
            $data = array();
            $data['data'] = $this->Vodici_model->view($id);


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
                $update = $this->Vodici_model->update($postData,$id);
                print_r($postData);
                redirect('/vodici');
            }

            $data['post'] = $postData;
            $data['title'] = 'Vytvorenie vodiča';
            $data['action'] = 'Editovať';

            $this->load->view('templates/header', $data);
            $this->load->view('pages/Vodici_add-edit', $data);
            $this->load->view('templates/footer');
        }

        public function delete($id){
            $this->load->model('Vodici_model');
            if(!empty($id)){
                $delete = $this->Vodici_model->delete($id);
                redirect('/vodici');
            }
        }
    }