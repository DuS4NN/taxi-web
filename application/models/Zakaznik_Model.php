<?php
class Zakaznik_Model extends CI_Model{

    public function view($id = ""){
        if(empty($id)){
            $query = $this->db->get('zakaznici');
        }else{
            $query = $this->db->get_where('zakaznici', array('id' => $id));
        }
        return $query->result_array();
    }

}