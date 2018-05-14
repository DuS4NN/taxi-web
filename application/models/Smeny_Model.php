<?php
class Smeny_Model extends CI_Model{

    public function view($id = ""){
        if(empty($id)){
            $query = $this->db->query("SELECT vodici_smena.ID ,vodici.Meno, vodici.Priezvisko, zmena.Zaciatok, zmena.Koniec, auta.Znacka, auta.Model FROM `vodici_smena` INNER JOIN vodici ON vodici.ID = vodici_smena.Vodici_ID INNER JOIN auta ON auta.ID = vodici_smena.Auta_ID INNER JOIN zmena ON Zmena_ID = zmena.ID");
        }else{
            $query = $this->db->query("SELECT vodici_smena.ID, vodici.Meno, vodici.Priezvisko, zmena.Zaciatok, zmena.Koniec, auta.Znacka, auta.Model FROM `vodici_smena` INNER JOIN vodici ON vodici.ID = vodici_smena.Vodici_ID INNER JOIN auta ON auta.ID = vodici_smena.Auta_ID INNER JOIN zmena ON Zmena_ID = zmena.ID HAVING vodici_smena.ID = '".$id."'");
        }
        return $query->result_array();
    }

}