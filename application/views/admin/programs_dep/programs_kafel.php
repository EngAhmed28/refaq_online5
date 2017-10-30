
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
            $data['program_to_3'] = 'active'; 
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
                                        <th class="text-center">إسم الكفيل</th>
                                        <th class="text-center">عدد البرامج المشارك بيها</th>
                                        <th class="text-center">إسم البرنامج</th>
                                        <th class="text-center">قيمة البرنامج</th>
                                        <th class="text-center">عدد الايتام</th>
                                        <th class="text-center">أسماء الأيتام</th>
                                        
                                        <th class="text-center">أسم الأم</th>
                                      
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                $d=0;
                                for($x = 0 ; $x < count($table) ; $x++){
                                    echo '<tr>
                                            <td rowspan="'.count($table[key($table)]).'">'.($x+1).'</td>
                                            <td rowspan="'.count($table[key($table)]).'">'.$donors[key($table)]->user_name.'</td>
                                            <td rowspan="'.count($table[key($table)]).'">'.count($table[key($table)]).'</td>
                                            ';
                                   
                                   
                                    $value = 0;      
                                    for($z = 0 ; $z < count($table[key($table)]) ; $z++){
                                        $value += $programs[$table[key($table)][$z]->program_id_fk]->monthly_value;
                                        echo '  <td>'.$programs[$table[key($table)][$z]->program_id_fk]->program_name.'</td>
                                                <td>'.$programs[$table[key($table)][$z]->program_id_fk]->monthly_value.'</td>';
                                        ?>
                                        <?php
                                       
                                        
        $this->db->select('*');
        $this->db->from('programs_to_orphan');
        $this->db->where('donor_id',$donors[key($table)]->id);
        $this->db->where('program_id_fk',$programs[$table[key($table)][$z]->program_id_fk]->id);
         $query=$this->db->get();
   
        
        
                
                          echo '<td >'.count($query->result()).'</td>';
       
                                        
                                        ?>
                                        <?php
                                        if(count($query->result()) == 0){
                                            echo '<td >لا يوجد</td>';
                                            
                                           }else{
                                            echo'
                                          
                                           <td> '; 
                                           }
              if($query->num_rows() != 0)
            {   
                
                foreach ($query->result() as $row) {
                
                  $this->db->select('*');
        $this->db->from('f_members');
        $this->db->where('id',$row->member_id);
         $query2=$this->db->get();
         foreach ($query2->result() as $row2) {
            //echo"<pre>";
           // print_r($row2);
         
               echo'
              '.$row2->member_name.'</br> </br> ';
            
                }
                
                
                       }
                 
                 
                 
                 
                 
                 
                 }
                   echo'
                                       </td>
                                       <td>';
                                if($query->num_rows() != 0)
            {           
        foreach ($query->result() as $row3) {
                
         $this->db->select('*');
        $this->db->from('mother');
        $this->db->where('mother_national_num_fk',$row3->mother_national_num_fk);
         $query3=$this->db->get();
         foreach ($query3->result() as $row4) {
            
             echo'
              '.$row4->m_first_name.'</br> </br> ';
            }
            }
              }else{
                echo"لا يوجد";
              }                         
                                       
                                       
                                       echo' 
                                       </td>                                      
                                       
                                       </tr>'; 
                   
                                          }
                                                 
                    
                               
                                    next($table);
                              
                              
                                }
                                ?>   
                             
                                   
                                </tbody>
                            </table>
                            
                            
                            <?php
                           
                                       echo '<div class="modal1 fade bs-example-modal-lg'.($d+1).'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                        <div class="modal-dialog modal-lg'.($d+1).'" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close store-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"> جدول التقارير</h4>
                                                </div>
                                                <div class="modal-body">
                                                
                                                
                                                    <table style="width:100%">
                                                    ';
        
        
                                                    
                                                      echo'  <tr>
                                                            <th>م</th>
                                                            <th>الاسم</th>
                                                            <th>التقارير</th>

                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>احمد</td>
                                                            <td>50</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>محمد</td>
                                                            <td>94</td>
                                                        </tr>
                                                    </table>
                                                    
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button " class="btn btn-default  store-btn1" data-dismiss="modal">إغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                           
                                           
                                           '; 
                                            
                                            
                                  
                              
                                            
                                            $d++;
                            
                            ?>
                            
                            
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