<?php
class Zakaznici_Model extends CI_Model{

    public function view($id = ""){
        if(empty($id)){
            $query = $this->db->get('zakaznici');
        }else{
            $query = $this->db->get_where('zakaznici', array('id' => $id));
        }
        return $query->result_array();
    }

    public function insert($data = array()){
        $insert = $this->db->insert('zakaznici',$data[0]);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function row_count(){
        return $this->db->count_all('zakaznici');
    }

    public function update($data,$id){
        if(!empty($id) && !empty($data)){
            $update = $this->db->update('zakaznici',$data[0],array('ID' => $id));
            return $update? true:false;
        }
    }

    public function delete($id){
        $delete = $this->db->delete('zakaznici',array('ID' => $id));

        return $delete? true:false;
    }

    public function data(){
        $query = $this->db->query("SELECT SUBSTRING(Datum, 11,3) as 'hour', COUNT(*) as 'count' FROM zakaznici GROUP BY SUBSTRING(Datum, 11,3)")->result_array();
        return $query;
    }


}