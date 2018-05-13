<?php
class Auta_Model extends CI_Model{

    public function view($id = ""){
        if(empty($id)){
            $query = $this->db->get('auta');
        }else{
            $query = $this->db->get_where('auta', array('id' => $id));
        }
        return $query->result_array();
    }

    public function insert($data = array()){
        $insert = $this->db->insert('auta',$data[0]);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function row_count(){
        return $this->db->count_all('auta');
    }

    public function update($data,$id){
        if(!empty($id) && !empty($data)){
            $update = $this->db->update('auta',$data[0],array('ID' => $id));
            return $update? true:false;
        }
    }

    public function delete($id){
        $delete = $this->db->delete('auta',array('ID' => $id));

        return $delete? true:false;
    }

    public function data(){
        $query = $this->db->query("SELECT SUM(CASE WHEN Rok_Vyroby BETWEEN '2010' AND '2012' THEN '1' ELSE '0' END) AS '2010-2012',
                                        SUM(CASE WHEN Rok_Vyroby BETWEEN '2013' AND '2015' THEN '1' ELSE '0' END) AS '2013-2015',
                                        SUM(CASE WHEN Rok_Vyroby BETWEEN '2016' AND YEAR(CURDATE()) THEN '1' ELSE '0' END) AS '2016-2018'
                                        FROM auta")->result_array();

        $data = array();
        $data[0]['number'] = $query[0]['2010-2012'];
        $data[0]['age'] = '2010-2012';
        $data[1]['number'] = $query[0]['2013-2015'];
        $data[1]['age'] = '2013-2015';
        $data[2]['number'] = $query[0]['2016-2018'];
        $data[2]['age'] = '2016-2018';

        return $data;
    }
}