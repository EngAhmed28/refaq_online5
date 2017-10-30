
            <div class="col-sm-11 col-xs-12">
                 <!--  -->
                   <?php
            $data['program_to_5'] = 'active'; 
            $this->load->view('admin/finance_resource/main_tabs',$data); 
            ?>
                    <!--  -->
                <!---table------>
                
    
                     <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">الطفل اليتيم :</h4>
                            </div>
                            <div class="col-xs-3 r-input">
                                <select class="selectpicker form-control" id="member_id" name="member_id" onchange="return sent($('#member_id').val());">
                                    <option>إختر </option>
                                                <?php
          
        for($x=0 ;$x< count($all_family) ; $x++){
         
        $this->db->select('*');
        $this->db->from('f_members');
        $this->db->where('mother_national_num_fk =',$all_family[$x]->mother_national_num);
         $query3=$this->db->get();
         foreach ($query3->result() as $row4) {
          ?>
           
           
              <option value="<?php echo $row4->id ;?>"><?php echo $row4->member_name ?> </option>
            
         <?php   }
                    
             }        
                ?>
                                   
                                </select>
                            </div>
                        </div>
                      
                      <div  id="optionearea2">
                       </div>
                      
                      </div>
                      </div> 
    
        <!------------------------------------------------------------------------------>
            <script>
                function sent(valu)
                {
                    //alert(valu);
                    if(valu)
                    {
                        var dataString = 'valu=' + valu;
                        $.ajax({

                            type:'post',
                            url: '<?php echo base_url() ?>Programs_depart/programs_to_orphan_one/0',
                            data:dataString,
                            dataType: 'html',
                            cache:false,
                            success: function(html){
                                $('#optionearea2').html(html);
                            }
                        });
                        return false;
                    }
                    else
                    {
                        $('#optionearea2').html('');
                        return false;
                    }

                }
            </script>