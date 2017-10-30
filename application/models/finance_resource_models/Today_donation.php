<?php

class Today_donation extends CI_Model
{
    public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }

    //===================================================insert=================================

    public  function  insert(){
        $data['person_id']=$this->chek_Null( $this->input->post('person_id'));
        $data['donate_type_id_fk']=$this->chek_Null( $this->input->post('type'));
        $data['mob']=0;
        if($this->input->post('mob')){
         $data['mob']=$this->chek_Null( $this->input->post('mob'));
        }
        $data['card_id']=0;
        if($this->input->post('mob')){
            $data['card_id']=$this->chek_Null( $this->input->post('card_id'));
        }
        $data['name']='null';
        if($this->input->post('mob')){
            $data['name']=$this->chek_Null( $this->input->post('name'));
        }
        $data['value']=$this->chek_Null( $this->input->post('value'));
        $data['month']=$this->chek_Null( date('m',time()));
        $data['year']=$this->chek_Null(date('Y',time()));
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $this->db->insert('cash_donations',$data);
    }

    //=======================================================
    public  function  update($id){

        $data['person_id']=$this->chek_Null( $this->input->post('person_id'));
        $data['donate_type_id_fk']=$this->chek_Null( $this->input->post('type'));
        $data['mob']=0;
        if($this->input->post('mob')){
            $data['mob']=$this->chek_Null( $this->input->post('mob'));
        }
        $data['card_id']=0;
        if($this->input->post('mob')){
            $data['card_id']=$this->chek_Null( $this->input->post('card_id'));
        }
        $data['name']=null;
        if($this->input->post('mob')){
            $data['name']=$this->chek_Null( $this->input->post('name'));
        }
        $data['value']=$this->chek_Null( $this->input->post('value'));
        $data['month']=$this->chek_Null( date('m',time()));
        $data['year']=$this->chek_Null(date('Y',time()));
        $this->db->where('id', $id);
        $this->db->update('cash_donations',$data);

    }

    //=================================================
    public function select_name($id){
        $h = $this->db->get_where('donors_t', array('id'=>$id));
        return $h->row_array();
    }
    //======================================================
    public function select_guarantees(){
        $this->db->select('*');
        $this->db->from('guarantees');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->name = $this->select_name($row->guarantee_id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }


    public function select(){
        $this->db->select('*');
        $this->db->from('donors_t');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }



    //--------------------------------------------------------------------
    public function get_details_beetween_dates($from,$to,$type)
    {
        $this->db->select('*');
        $this->db->from('cash_donations');
        $this->db->where('date>=',$from);
        $this->db->where('date <= ',$to);
        if($type !=4){
          $this->db->where('donate_type_id_fk',$type);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

}

