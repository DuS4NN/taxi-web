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

        public function data(){
            $query = $this->db->query("SELECT SUM(CASE WHEN YEAR(CURDATE())- Rok_narodenia BETWEEN '18' AND '29' THEN '1' ELSE '0' END) AS '18-29',
                                        SUM(CASE WHEN YEAR(CURDATE())- Rok_narodenia BETWEEN '30' AND '44' THEN '1' ELSE '0' END) AS '30-44',
                                        SUM(CASE WHEN YEAR(CURDATE())- Rok_narodenia BETWEEN '45' AND '70' THEN '1' ELSE '0' END) AS '45-70'
                                FROM vodici")->result_array();

            $data = array();
            $data[0]['number'] = $query[0]['18-29'];
            $data[0]['age'] = '18-29';
            $data[1]['number'] = $query[0]['30-44'];
            $data[1]['age'] = '30-44';
            $data[2]['number'] = $query[0]['45-70'];
            $data[2]['age'] = '45-70';

            return $data;
        }
    }