<?phpclass Users extends CI_Model{    public function __construct() {        parent::__construct();    }  public function chek_Null($post_value){        if($post_value == '' || $post_value==null || (!isset($post_value))){            $val='';            return $val;        }else{            return $post_value;        }    }//---------------------------------------------    public function check_user_data(){        $this->db->select('*');        $this->db->from('users');        $this->db->where('users.user_username',$this->input->post('user_name'));        $this->db->where('users.user_pass',sha1(md5($this->input->post('user_pass'))));        $this->db->join('department_jobs', 'users.role_id_fk = department_jobs.id');        $query=$this->db->get();        if($query->num_rows()>0){            return $query->row_array();        }else{            return false;        }    }//----------------------------------------------   public function insert(){       $user_rol=explode("-",$this->chek_Null($this->input->post('role_id_fk')));              $data['user_name']=$this->chek_Null($this->input->post('user_name')) ;         $data['user_username']=$this->chek_Null($this->input->post('user_name'));               $password=$this->input->post('user_pass',true);            $password=sha1(md5($password));         $data['emp_code']=$this->input->post('emp_code');            $data['user_pass'] = $password;         $data['role_id_fk'] =$user_rol[0];          $data['dep_job_id_fk'] =$user_rol[1];               /*   $data['user_email'] = $this->input->post('mother_national_num');         $data['user_phone'] =strtotime(date("Y-m-d",time()));         $data['user_photo']= time();        */        $this->db->insert('users',$data);    }//-----------------------------------------------   public function update($id){         $user_rol=explode("-",$this->chek_Null($this->input->post('role_id_fk')));                $data['user_name']=$this->chek_Null($this->input->post('user_name'));         $data['user_username']=$this->chek_Null($this->input->post('user_name'));            if($this->input->post('user_pass')!=''){               $password=$this->input->post('user_pass',true);            $password=sha1(md5($password));         $data['emp_code']=$this->input->post('emp_code');            $data['user_pass'] = $password;         }         $data['role_id_fk'] =$user_rol[0];          $data['dep_job_id_fk'] =$user_rol[1];      /* $data['user_email'] = $this->input->post('mother_national_num');         $data['user_phone'] =strtotime(date("Y-m-d",time()));         $data['user_photo']= time();        */        $this->db->where('user_id',$id);        $this->db->update('users',$data);    }//-----------------------------------------------    public function getById($id){        $h = $this->db->get_where('users', array('user_id'=>$id));        return $h->row_array();    }  //-------------------------------------------  public function select_by_rol_id(){        $this->db->select("*");    $this->db->from("users");    $query = $this->db->get();        if ($query->num_rows() > 0) {            foreach ($query->result() as $row) {                $data[] = $row->role_id_fk;            }            return $data;        }        return false;  }//------------------------------------------ public function jobs_id(){     $this->db->select("*"); $this->db->from('department_jobs');    $query = $this->db->get();        if ($query->num_rows() > 0) {            foreach ($query->result() as $row) {                $data[$row->id] = $row;            }            return $data;        }        return false;}//----------------------------------------  public function getBy($id){        $h = $this->db->get_where('department_jobs', array('id'=>$id));        return $h->row_array();    }  //---------------------------------    public function update_last_login($id){          $data['last_login']=time();       $this->db->where('user_id',$id);        $this->db->update('users',$data);    }}// END CLASS 