<?php
class Programs_dep extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function insert(){
        $data['program_name']=$this->input->post('program_name');
        $data['monthly_value']=$this->input->post('monthly_value');
        $data['individual_value']=$this->input->post('individual_value');
        $data['cooperate']=$this->input->post('cooperate');
        $data['program_from']=strtotime($this->input->post('program_from'));
        $data['program_to']=strtotime($this->input->post('program_to'));
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $data['publisher']=$_SESSION['user_id'];
        $this->db->insert('programs_depart',$data);
    }
    
    public function insert2(){
        for($x = 0 ; $x < count($this->input->post('program_id_fk')) ; $x++){
            $data['program_id_fk']=$this->input->post('program_id_fk')[$x];
            $data['donor_id']=$this->input->post('donor_id');
            $data['date'] = strtotime(date("Y/m/d"));
            $data['date_s']=time();
            $data['publisher']=$_SESSION['user_id'];
            $this->db->insert('programs_to',$data);
        }
    }
    
    public function select(){
        $this->db->select('*');
        $this->db->from('programs_depart');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
        public function select_mother(){
        $this->db->select('*');
        $this->db->from('mother');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->mother_national_num_fk] = $row;
            }
            return $data;
        }
        return false;
    }
    
     public function select2(){
        $this->db->select('*');
        $this->db->from('programs_to');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->donor_id][] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    
         public function select3(){
        $this->db->select('*');
        $this->db->from('programs_to_orphan');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->member_id][] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    
    public function select_all(){
        $this->db->select('*');
        $this->db->from('donors_t');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    

    
    
        public function select_all2(){
        $this->db->select('*');
        $this->db->from('f_members');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
            public function select_all3(){
        $this->db->select('*');
        $this->db->from('f_members');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
     
    
        public function select34(){
    
        $this->db->select('*');
        $this->db->from('programs_to_orphan');
      
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->member_id][] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_programs_to($id){
        $this->db->select('*');
        $this->db->from('programs_to');
        $this->db->where('donor_id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function getById($id){
        $h = $this->db->get_where('programs_depart', array('id'=>$id));
        return $h->row_array();
    }
    public function get_condition($id){
           $h = $this->db->get_where('participation_money', array('id'=>$id));
        return $h->row_array();
    }
    
    public function update($id){
        $update = array(
            'program_name'=>$this->input->post('program_name'),
            'monthly_value'=>$this->input->post('monthly_value'),
            'individual_value'=>$this->input->post('individual_value'),
            'cooperate'=>$this->input->post('cooperate'),
            'program_from'=>strtotime($this->input->post('program_from')),
            'program_to'=>strtotime($this->input->post('program_to')),
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time(),
            'publisher' =>$_SESSION['user_id']
        );
        
        $this->db->where('id', $id);
        if($this->db->update('programs_depart',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function update2($id){
        $this->db->where('donor_id',$id);
        $this->db->delete('programs_to');
        $this->insert2();
    }
    
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('programs_depart');
    }
     public function delete_contributions($id){
        $this->db->where('id',$id);
        $this->db->delete('participation_money');
    }
    
    
//-------------------------------------------------------------------
   public function member_mothers(){
    
    $this->db->select('id ,mother_national_num_fk ');
    $this->db->from('f_members');
    $this->db->group_by("mother_national_num_fk");
    $this->db->order_by('id','DESC');
    $query = $this->db->get();
    $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
             $query_result[$i]->mother_name = $this->get_mother($row->mother_national_num_fk);
            $query_result[$i]->sub_mem = $this->get_member($row->mother_national_num_fk);
           
            
            $i++;
        }
        return $query_result;
    }
    return false;
   
   }   
//----------------------------
public function get_member($mother_id){
    $this->db->select('*');
    $this->db->from('f_members');
    $this->db->where("mother_national_num_fk",$mother_id);
     $query = $this->db->get();
     $query_result=$query->result();
     return $query_result; 
} 
//-----------------------------
public function get_mother($mother_id){
   
     $h = $this->db->get_where('mother', array("mother_national_num_fk"=>$mother_id));
      $data =$h->row_array();
      $total_name=$data["m_first_name"]." ".$data["m_father_name"]." ".$data["m_grandfather_name"]." ".$data["m_family_name"];
      return $total_name;
}
//---------------------------------    
 public function progams(){
    
      $this->db->select('donor_id ,program_id_fk');
    $this->db->from('programs_to');
    $this->db->group_by("program_id_fk");
    $this->db->order_by('id','DESC');
    $query = $this->db->get();
    $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
            $query_result[$i]->program_name = $this->get_program_name($row->program_id_fk);
            $query_result[$i]->sub_doner = $this->get_doners($row->program_id_fk);
           $i++;
        }
        return $query_result;
    }
    return false;
 } 
//--------------------------------------------------------------
  public function get_doners($program_id_fk){
     $this->db->select('*');
    $this->db->from('programs_to');
    $this->db->where("program_id_fk",$program_id_fk);
     $query = $this->db->get();
    
     $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
             $query_result[$i]->doner_name = $this->get_doner_name($row->donor_id);
            $i++;
        }
        return $query_result;
    }
    return false;
  }  
   //-----------------------------
public function get_doner_name($donor_id){
   
     $h = $this->db->get_where('donors_t', array("id"=>$donor_id));
      $data =$h->row_array();
      $total_name=$data["user_name"]."(".$data["donor_mediator_name"].
                     $data["father_name"]." ".$data["grand_father_name"]." ".$data["family_name"]." )";
      return $total_name;
}
//---------------------------------  

public function get_program_name($program_id_fk){
   
     $h = $this->db->get_where('programs_depart', array("id"=>$program_id_fk));
      $data =$h->row_array();
      $total_name=$data["program_name"];
      return $total_name;
}
//-------------------------------------------------
public function insert_programs_orphan(){
       $arr=explode("-",$this->input->post('member_id'));
      $data['member_id']=$arr[0];
      $data['mother_national_num_fk']=$arr[1];
    for($x = 0 ; $x < count($this->input->post('programs')) ; $x++){
        $id_program=$this->input->post('programs')[$x];
      $data['program_id_fk']=$id_program;
      $data['donor_id']=$this->input->post('doners_id'.$id_program);
    $data['date'] = strtotime(date("Y/m/d"));
    $data['date_s']=time();
    $data['publisher']=$_SESSION['user_username'];
    $this->db->insert('programs_to_orphan',$data); 
    } 
}
//-------------------------------------------------
public function all_member_in(){
       $this->db->select('*');
        $this->db->from('programs_to_orphan');
         $this->db->group_by("member_id");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->member_id;
            }
            return $data;
        }
        return false;
}
//--------------------------------------------------
public function all_member_table(){
  $this->db->select('member_id');
    $this->db->from('programs_to_orphan');
   $this->db->group_by("member_id");
     $query = $this->db->get();
     $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
             $query_result[$i]->members_name = $this->get_member_name($row->member_id);
             $query_result[$i]->sub_members = $this->get_member_prog($row->member_id);
            $i++;
        }
        return $query_result;
    }
    return false;
}
//--------------------------------------------------------------
  public function get_member_prog($member_id){
     $this->db->select('*');
    $this->db->from('programs_to_orphan');
    $this->db->where("member_id",$member_id);
     $query = $this->db->get();
     $query_result=$query->result();
    if ($query->num_rows() > 0) {
        $i=0;
        foreach ($query_result as $row) {
             $query_result[$i]->doner_name = $this->get_doner_name($row->donor_id);
             $query_result[$i]->program_name = $this->get_program_name($row->program_id_fk);
             $query_result[$i]->sub_doner = $this->get_doners($row->program_id_fk);
            $i++;
        }
        return $query_result;
    }
    return false;
  }  
  //---------------------------------  

public function get_member_name($member_id){
   
     $h = $this->db->get_where('f_members', array("id"=>$member_id));
      $data =$h->row_array();
      $total_name=$data["member_name"];
      return $total_name;
}
//-------------------------------------------------
    public function get_member_progr_in($member_id){
        $this->db->select('*');
        $this->db->from('programs_to_orphan');
        $this->db->where("member_id",$member_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->program_id_fk;
            }
            return $data;
        }
        return false;
    }

//----------------------------------------------------------------


  public function family($case){
 $this->db->select('basic.* ,
                  devices.mother_national_num_fk as dev_id,
                  father.mother_national_num_fk as fat_id,father.f_first_name,
                  financial.mother_national_num_fk as mon_id ,
                  houses.mother_national_num_fk as hos_id,
                  mother.mother_national_num_fk as mother_id,mother.m_first_name,
                  mother.m_father_name,mother.m_grandfather_name,mother.m_family_name,mother.mother_national_num_fk');
      $this->db->from('basic'); 
      $this->db->join('devices', ' devices.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('father', ' father.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('houses', ' houses.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('financial', ' financial.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('mother', ' mother.mother_national_num_fk = basic.mother_national_num', 'left');
      $this->db->where("basic.suspend",$case);
      $this->db->group_by('basic.mother_national_num');
      $query = $this->db->get(); 
            if($query->num_rows() != 0)
            {   foreach ($query->result() as $row) {
                 $data[] = $row;
                 }
            return $data;
            }
            else
            {
                return false;
            }
    
    
    
  }
  
  //-------------------------------------------------
public function insert_Payment(){
    
       $arr=explode("-",$this->input->post('date'));
      $data['month']=$arr[1];
      $data['year']=$arr[0];
      $data['donor_id']=$this->input->post('donor_id');
    $data['date'] = strtotime(date("Y/m/d"));
    $data['date_s']=time();
    $data['value']=$this->input->post('value');
    $data['value_added']=$this->input->post('value_added');
    $this->db->insert('participation_money',$data); 
    
}
public function select_Payment(){
    
       $arr=explode("/",(date("Y/m/d")));
      $month=$arr[1];
      $year=$arr[0];

    //$this->db->insert('participation_money',$data); 
           $this->db->select('*');
        $this->db->from('participation_money');
        $this->db->where("month",$month);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    
}

public function select_Payment_today(){
    
       $arr=explode("/",(date("Y/m/d")));
      $month=$arr[1];
      $year=$arr[0];

    //$this->db->insert('participation_money',$data); 
           $this->db->select('*');
        $this->db->from('cash_donations');
        $this->db->where("month",$month);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    
}
public function insert_Payment_for_orphan(){

        for($x=0;$x<count($_POST['values']);$x++){
         $arr=explode("-",$_POST['values'][$x]);  
       
         
         
          $this->db->select('*');
        $this->db->from('programs_to_orphan');
        $this->db->where('member_id',$arr[1]);
        $query = $this->db->get();
      
        if ($query->num_rows() > 0) {
              $arr2='';
            foreach ($query->result() as $row) {
               $arr2[]=$row->program_id_fk;
               
            }
             $data['programs']=serialize($arr2);
       
            }
        $data['orphans_id_fk']=$arr[1];
        $data['total']=$arr[0];
        
               $arr4=explode("/",(date("Y/m/d")));
      $month=$arr4[1];
      $year=$arr4[0];
     $data['month'] = $month;
      $data['year'] = $year;
        
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $data['publisher']=$_SESSION['user_id'];
        $data['last_payment_month'] = $month ;
        $this->db->insert('payment',$data);
         
         
    }
}


    //--------------------------------------------ahmed-----------------//
    public function check_in_payment(){
        /*$this->db->select('*');
        $this->db->from('payment');
        $this->db->group_by("orphans_id_fk");
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
               // $query_result[$i]->all = $this->get_by_($row->orphans_id_fk);
                //$query_result[$i]->sub_mem = $this->get_member($row->mother_national_num_fk);
                $i++;
            }
            return $query_result;
        }
        return false;*/
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


        //---
      /*$this->db->select('*');
        $this->db->from('payment');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->orphans_id_fk;
            }
            return $data;
        }
        return false;*/
    }

    public function get_by_()
    {
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->group_by("orphans_id_fk");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->orphans_id_fk;
            }
            return $data;
        }
        return false;

    }



    public function get_by_2()
    {
        $this->db->select('*');
        $this->db->from('programs_to_orphan');
        $this->db->group_by("member_id");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->member_id;
            }
            return $data;
        }
        return false;

    }



}// end CLASS 