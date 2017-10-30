<?php

//-----------------------------------------reports-------------------------------//
public function orphans_donations_transfer(){
    $data['donors'] = $this->Programs_dep->select_all2();
    $data['programs'] = $this->Programs_dep->select();
    $data['table'] = $this->Programs_dep->select34();
    $data['programs'] = $this->Programs_dep->select();
    $data['subview'] = 'admin/reports/orphans_donations_transfer';
    $this->load->view('admin_index', $data);
}



public function guarantees_donors_subscriptions(){
    $this->load->model('Difined_model');
    $data['donors'] = $this->Programs_dep->select_all();
    $data['all_records'] = $this->Difined_model->select_all('participation_money','','','','');
    $data['programs'] = $this->Programs_dep->select();
    $data['table'] = $this->Programs_dep->select2();
    $data['subview'] = 'admin/reports/guarantees_donors_subscriptions';
    $this->load->view('admin_index', $data);
}
