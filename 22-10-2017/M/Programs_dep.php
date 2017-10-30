<?php

    //--------------------------------------------ahmed-----------------//
    public function check_in_payment(){
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->group_by("orphans_id_fk");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `payment` WHERE `orphans_id_fk`=' . $row->orphans_id_fk);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->orphans_id_fk] = $arr;
            }
            return $data;
        }
        return false;

}// end CLASS 