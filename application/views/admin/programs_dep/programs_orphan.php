
<style>
.r-pop-up {
    padding: 0;
}

.r-pop-up img {
    width: 93%;
    height: 150px;
}

.r-pop-up .chip {
    margin-top: 20px;
}

.r-pop-up .chip iframe {
    width: 96%;
    height: 180px;
}

.r-pop-up .closebtn {
    padding-left: 10px;
    color: #888;
    font-weight: bold;
    float: right;
    font-size: 20px;
    cursor: pointer;
    position: absolute;
    top: 0;
    right: 8%;
}

.r-pop-up .closebtn:hover {
    color: #000;
}
.modal1{
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    display: none;
    overflow: hidden;
    -webkit-overflow-scrolling: touch;
    outline: 0;
}
.r-sss{
    width: 100px;
    height: auto;
    background-color: #0c1e56;
    color: #fff;

}
.r-sss:hover{
    color: #0c1e56;
    background-color: #fff;
}
</style>

<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['program_to_4'] = 'active'; 
            $this->load->view('admin/finance_resource/main_tabs',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">

                <?php if(isset($table) && $table != null){ ?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم اليتيم</th>
                                        <th class="text-center"> إسم الأم</th>
                                        <th class="text-center">عدد البرامج المشارك بيها</th>
                                        <th class="text-center">إسم البرنامج</th>
                                        <th class="text-center">قيمة البرنامج</th>
                                        <th class="text-center">حالة البرنامج</th>
                                       
                                        
                                        <th class="text-center">أسم الكفيل</th>
                                      
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                $d=0;
                                for($x = 0 ; $x < count($table) ; $x++){
                                    echo '<tr>
                                            <td rowspan="'.count($table[key($table)]).'">'.($x+1).'</td>
                                            <td rowspan="'.count($table[key($table)]).'">'.$donors[key($table)]->member_name.'</td>';
      $this->db->select('*');
        $this->db->from('mother');
        $this->db->where('mother_national_num_fk',$donors[key($table)]->mother_national_num_fk);
         $query=$this->db->get();
         foreach ($query->result() as $row) {
         echo '  <td rowspan="'.count($table[key($table)]).'">'.$row->m_first_name.'</td>';
          }
                                           echo' <td rowspan="'.count($table[key($table)]).'">'.count($table[key($table)]).'</td>
                                            ';
                                   
                                   
                                    $value = 0;      
                                    for($z = 0 ; $z < count($table[key($table)]) ; $z++){
                                        $value += $programs[$table[key($table)][$z]->program_id_fk]->monthly_value;
                                        echo '  <td>'.$programs[$table[key($table)][$z]->program_id_fk]->program_name.'</td>
                                                <td>'.$programs[$table[key($table)][$z]->program_id_fk]->monthly_value.'</td>';
                                        
                                         if($programs[$table[key($table)][$z]->program_id_fk]->program_to > strtotime(date("Y/m/d")))
                                        $status = 'جاري';
                                    else   
                                        $status = 'منتهي';
                                        
                                        echo'<td>'.$status.'</td>';
                                        
                                        ?>
                                       <?php
                                       echo' 
                                       <td>'.$donors_t[$table[key($table)][$z]->donor_id]->user_name.'</td>                                      
                                       </tr>'; 
                   
                                          }
                                  
                                    next($table);
                              
                              
                                }
                                ?>   
                             
                                   
                                </tbody>
                            </table>
       
                            
                            
                        </div>
                    </div>
                </div>
                
                
                
               
                   
                
                
                <?php } 
               
                ?>
                
            </div>
        </div>
    </div>
</div>
</div>

<script>
function check_box(){
  var atLeastOneIsChecked = false;
  $('input:checkbox').each(function () {
    if ($(this).is(':checked')) {
      atLeastOneIsChecked = true;
    }
  });
  if(atLeastOneIsChecked != true){
        alert("إختر على الأقل برنامج واحد");
        return false;
  }
};
</script>