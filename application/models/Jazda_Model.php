<?php
class Jazda_Model extends CI_Model{

    public function view($id = ""){
        if(empty($id)){
            $query = $this->db->query("SELECT jazda.ID, Pocet_KM, Cena, Odkial, Kam, Cas_vyzdvihnutia, Cas_vysadenia, zakaznici.Tel_cislo, vodici.Meno, vodici.Priezvisko, auta.Znacka, auta.Model FROM `jazda` 
                                        INNER JOIN zakaznici on Zakaznici_ID = zakaznici.ID 
                                        INNER JOIN vodici_smena ON Vodici_smena_ID = vodici_smena.ID 
                                        INNER JOIN vodici ON vodici.ID = vodici_smena.Vodici_ID 
                                        INNER JOIN auta ON auta.ID = vodici_smena.Auta_ID");
        }else{
            $query = $this->db->query("SELECT jazda.ID, Pocet_KM, Cena, Odkial, Kam, Cas_vyzdvihnutia, Cas_vysadenia, zakaznici.Tel_cislo, vodici.Meno, vodici.Priezvisko, auta.Znacka, auta.Model FROM `jazda` 
                                        INNER JOIN zakaznici on Zakaznici_ID = zakaznici.ID 
                                        INNER JOIN vodici_smena ON Vodici_smena_ID = vodici_smena.ID
                                        INNER JOIN vodici ON vodici.ID = vodici_smena.Vodici_ID 
                                        INNER JOIN auta ON auta.ID = vodici_smena.Auta_ID HAVING jazda.ID = '".$id."'");
        }
        return $query->result_array();
    }

    public function view2($id){
        $query = $this->db->get_where('jazda', array('id' => $id));
        return $query->result_array();
    }

    public function insert($data = array()){
        $insert = $this->db->insert('jazda',$data[0]);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function row_count(){
        return $this->db->count_all('jazda');
    }

    public function update($data,$id){
        if(!empty($id) && !empty($data)){
            $update = $this->db->update('jazda',$data[0],array('ID' => $id));
            return $update? true:false;
        }
    }

    public function delete($id){
        $delete = $this->db->delete('jazda',array('ID' => $id));

        return $delete? true:false;
    }

    public function data(){
        $query = $this->db->query("SELECT DAYOFWEEK(jazda.Cas_vyzdvihnutia) as 'day', SUM(jazda.Cena) as 'cena' FROM `jazda` GROUP BY DAYOFWEEK(jazda.Cas_vyzdvihnutia) ORDER BY DAYOFWEEK(jazda.Cas_vyzdvihnutia)")->result_array();

        $data = array();
        $i = 0;
        foreach ($query as $row){

            switch ($row['day']){
                case '1':
                    $data[$i]['day']='Sunday';
                    $data[$i]['cena']=$row['cena'];
                    $i++;
                    break;
                case '2':
                    $data[$i]['day']='Monday';
                    $data[$i]['cena']=$row['cena'];
                    $i=$i+1;
                    break;
                case '3':
                    $data[$i]['day']='Tuesday';
                    $data[$i]['cena']=$row['cena'];
                    $i=$i+1;
                    break;
                case '4':
                    $data[$i]['day']='Wednesday';
                    $data[$i]['cena']=$row['cena'];
                    $i=$i+1;
                    break;
                case '5':
                    $data[$i]['day']='Thursday';
                    $data[$i]['cena']=$row['cena'];
                    $i=$i+1;
                    break;
                case '6':
                    $data[$i]['day']='Friday';
                    $data[$i]['cena']=$row['cena'];
                    $i=$i+1;
                    break;
                case '7':
                    $data[$i]['day']='Saturday';
                    $data[$i]['cena']=$row['cena'];
                    $i=$i+1;
                    break;
            }
        }
        return $data;

    }
}