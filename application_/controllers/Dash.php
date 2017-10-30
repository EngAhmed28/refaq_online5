<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dash extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        /*
        $this->load->model('Contact');
        $this->mass = $this->Contact->getallinbox();
        $this->load->model('Question');
        $this->mass2 = $this->Question->getallinbox();*/
    }
    //-------------------------------------------------------
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    //-------------------------------------------------------
    public  function  index(){
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->model('system_management/Groups');
        $data["main_groups"]=$this->Groups->fetch_groups("","");
        $data['subview'] = 'admin/main';
        $data['title']='الرئيسية';
        $data['metakeyword']='الرئيسية';
        $data['metadiscription']='الرئيسية';
        $this->load->view('index_main', $data);


    }
    public  function  home(){
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->model('system_management/Groups');
        $data["main_groups"]=$this->Groups->main_fetch_group();

        $this->test($data["main_groups"]);
        $data['title']='الرئيسية';
        $data['metakeyword']='الرئيسية';
        $data['metadiscription']='الرئيسية';
        $data['subview'] = 'admin/home';
        $this->load->view('index_without_sidebar', $data);
    }
   //-------------------------------------------------------
    public function mian_group($id)
    {
        $this->load->model('system_management/Groups');
        $this->load->model('Difined_model');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $_SESSION["group_number"] = $id;
        $date_table = $this->Groups->getgroupbyid($id);
        $data['title_name'] = $date_table["page_title"];
        $data["groups"] = $this->Groups->get_group($id);
        $data['title'] = $date_table["page_title"];
        $data['metakeyword'] = $date_table["page_title"];
        $data['metadiscription'] = $date_table["page_title"];
        $data['subview'] = 'admin/sub_main';
       
        $this->load->view('index_main', $data);
    }
    //-------------------------------------------------------
    public function sub_sub_main($id)
    {
        $this->load->model('system_management/Groups');
        $_SESSION["group_number"] = $id;
        $data["sub_groups"] = $this->Groups->get_group($id);
        $data['title'] = 'الرئيسية';
        $data['metakeyword'] = 'الرئيسية';
        $data['metadiscription'] = 'الرئيسية';
        $data['subview'] = 'admin/sub_sub_main';
        $this->load->view('index_main', $data);
    }


}//END CLASS
?>