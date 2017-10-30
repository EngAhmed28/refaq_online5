<?php

  public function payment_kafel(){
       if($this->input->post('add') ){
      $this->Programs_dep->insert_Payment_for_orphan();
       $this->message('success','إضافة صرف ');
         redirect('Programs_depart/payment_kafel/', 'refresh');
        }
        $data['all_member_in']=$this->Programs_dep->all_member_in();
        $data['member']=$this->Programs_dep->member_mothers();
        $data['records']=$this->Programs_dep->all_member_table();
        $data['donors'] = $this->Programs_dep->select_all2();
        $data['donors_t'] = $this->Programs_dep->select_all();
        $data['programs'] = $this->Programs_dep->select();
        $data['table'] = $this->Programs_dep->select34();
        $data['pay'] = $this->Programs_dep->select_all3();
        $data['check_in_payment'] = $this->Programs_dep->check_in_payment();
        $data['payment'] =   $this->Programs_dep->select_Payment();
        $data['payment_today'] =   $this->Programs_dep->select_Payment_today();
        $data['programs'] = $this->Programs_dep->select();
        $data['subview'] = 'admin/programs_dep/payment_kafel';
        $this->load->view('admin_index', $data);
  }
  //-------------------------------------------------- 
  

  
