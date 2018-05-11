<?php
    class Vodici_Model extends CI_Model{

        public function view($id = ""){
            if(empty($id)){
                $query = $this->db->get('vodici');
            }else{
                $query = $this->db->get_where('vodici', array('id' => $id));
            }
            return $query->result_array();
        }

        public function fetch_data($limit,$start){
            $this->db->limit($limit,$start);
            $query = $this->db->get("vodici");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }

        public function insert($data = array()){
            $insert = $this->db->insert('vodici',$data[0]);
            if($insert){
                return $this->db->insert_id();
            }else{
                return false;
            }
        }

        public function row_count(){
            return $this->db->count_all('vodici');
        }

        public function update($data,$id){
            if(!empty($id) && !empty($data)){
                $update = $this->db->update('vodici',$data[0],array('ID' => $id));
                return $update? true:false;
            }
        }

        public function delete($id){
            $delete = $this->db->delete('vodici',array('ID' => $id));
            return $delete? true:false;
        }
    }