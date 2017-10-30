<?php
class Groups extends  CI_Model
{
    public function __construct()
    {
        parent::__construct();
      //  $this->load->model('Permission');
    }
//---------------------------------------------------------
    public function fetch_groups($limit, $start) {
        $this->db->where('group_id_fk',0);
        $this->db->limit($limit, $start);
        $query = $this->db->get("pages");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
//-------------------------------------------------------
    public function addGroup($file){
        $file_in=0;
        if(isset($file) && !empty($file) &&   $file!=null && $file!=''){
            $file_in= $file;
        }
        $data = array(
            'page_title'=>  $this->input->post('page_title'),
            'page_order'=>  $this->input->post('page_order'),
            'page_link'=>$this->input->post('page_link'),
            'page_icon_code'=>$this->input->post('page_icon_code'),
            'group_id_fk'=>0,
            'level'=>0,
            'page_image'=>$file_in);
         $this->db->insert('pages', $data);
    }
//-------------------------------------------------------

    public  function getgroupbyid($id){
        $query= $this->db->get_where('pages',array('page_id'=>$id));
        return $query->row_array();
    }
//----------------------------------------------------
    function updateGroup($id,$file){


           $data = array(
            'page_title'=>  $this->input->post('page_title'),
            'page_order'=>  $this->input->post('page_order'),
            'page_link'=>   $this->input->post('page_link'),
            'page_icon_code'=>$this->input->post('page_icon_code'));
        if(isset($file) && !empty($file) &&   $file!=null && $file!=''){
            $data['page_image']=  $file;
        }
        $this->db->where('page_id', $id);
        $this->db->update('pages', $data);
    }
    //------------------------------------------------
    public function level_groups() {
        $this->db->where('group_id_fk',0);
        $this->db->or_where('level',2);
        $query = $this->db->get("pages");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
  
    //-----------------------------------------------------------

    public function get_categories(){
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where("group_id_fk",0);
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->sub = $this->sub_categories($p_cat->page_id);
            $i++;
        }
        return $categories;
    }
//-----------------------------------------------------------
    public function sub_categories($id){
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where('group_id_fk', $id);
        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->sub = $this->sub_categories($p_cat->page_id);
            $i++;
        }
        return $categories;
    }
//-----------------------------------------------------------
//---------------------------------------------------------
    public function main_fetch_group(){
        $this->db->where('user_id',$_SESSION['user_id']);
        $this->db->where('page_level',0);
        $parent = $this->db->get("permissions");
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->sub = $this->get_date_page($p_cat->page_id_fk);
            $i++;
        }
        return $categories;
    }
//----------------------------------------------------
    public  function get_date_page($id){

        $this->db->where('page_id',$id);
        $query = $this->db->get("pages");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;

    }
//------------------------------------------------------------
    public  function get_group($id ){
        $permetions=$this->Permission->select_per($_SESSION['user_id']);
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where("group_id_fk",$id);
        $data=array();
        $this->db->order_by('page_order','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {
                if(in_array($row->page_id,$permetions)){
                    $data[] = $row;
                }else{
                    continue;
                }
            }
            return $data;
        }
        return false;
    }

}// END CLASS
?>