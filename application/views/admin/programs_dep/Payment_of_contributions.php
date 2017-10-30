<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['add_Payment_of_contributions'] = 'active'; 
            $this->load->view('admin/finance_resource/main_tabs',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(isset($result)  && $result !=null){
                        $id = $result['id'];
                        $out['date']=date("Y-m-d",$result['date']);
                     }else{
                        $id = 0;
                        $out['date']=date("Y-m-d");
                        }?>
                        <?php
                        if(isset($result) && $result!= null){
                           ?> 
                           
                           
                            <?php echo form_open_multipart('Programs_depart/edit_contributions/'.$id.'',array("id"=>'form_check'))?>
                    <div class="col-xs-12">
                    
                    
                    
                             <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">تاريخ اليوم:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
				             <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" value="<?php echo date('Y-m-d',$result['date'])?>" name="date" placeholder="شهر / يوم / سنة ">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    
                    
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">الكافل:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
				                <select name="donor_id" id="donor_id" onchange="return sent($('#donor_id').val());"   required  >
					               <option value="">إختر</option>
							         <?php 
                                     if (!empty($donors)):
			                             foreach ($donors as $record):
                                            $selected = '';
                                            if(isset($result) && $record->id == $result['donor_id'])
                                                $selected = 'selected';
                                            ?>
							                 <option value="<?php echo $record->id; ?>" <?php echo $selected ?>><?php echo $record->user_name; ?></option>
							         <?php  
                                        endforeach; 
                                     endif;
                                     ?>
								</select>
                            </div>
                        </div>
                        
                         <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        <div id="optionearea2">
                        
                        
                         <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم البرنامج</th>
                                        <th class="text-center">قيمة البرنامج</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                $val = $result['donor_id'];
                                    $x=0;
                            
                                      $value = 0; 
                                      $final_result =0;     
                                       for($z = 0 ; $z < count($table[$val]) ; $z++){
                                        $value += $programs[$table[$val][$z]->program_id_fk]->monthly_value;
                                        
                                        echo ' 
                                        
                                         <td>'.($x+1).'</td>
                                         <td>'.$programs[$table[$val][$z]->program_id_fk]->program_name.'</td>
                                         <td>'.$programs[$table[$val][$z]->program_id_fk]->monthly_value.'</td>';
                                         $final_result +=$programs[$table[$val][$z]->program_id_fk]->monthly_value;
                                        ?>
              
                                        <?php
             
                                       echo'</tr>
                                         '; 
                                         $x++;
                                          }
                                          
                                          echo'<tr>
                                       <td colspan="2">
                                       الإجمالي
                                       </td>
                                       <td>
                                       '.$final_result.'
                                       </td>
                                       </tr>';
                                    
                                       
                                ?>   
                             
                                   
                                </tbody>
                            </table>
                                        
                            
                            
                                   <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">القيمة المشاركة:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
				                <input type="number" name="value" min="0" id="value" value="<?php echo $result['value']?>" class="form-control" required="required" placeholder="القيمة المشاركة"/>
                            </div>
                            
                            
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">القيمة الإضافية:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
				                <input type="number" name="value_added" min="0" id="value_addes" value="<?php echo $result['value_added']?>" class="form-control" placeholder="القيمة الإضافية"/>
                            </div>
                            
                        </div>
                        
                        
                        
                        </div>
                        
                </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        
                            <div class="col-xs-3 r-inner-btn" style="padding-top: 3px;">
                                <input type="submit" onclick="return check_box();" id="button" role="button" name="update" value="تعديل" class="btn pull-right" />
                            </div>
                            
                        </div>
                            
                        
                    </div>
                    <?php echo form_close()?>
                </div>
                           
                           
                        <?php 
                        }else{
                            
                        
                        
                        
                        ?>
                        
                        
                     <?php echo form_open_multipart('Programs_depart/add_Payment_of_contributions/'.$id.'',array("id"=>'form_check'))?>
                    <div class="col-xs-12">
                    
                    
                    
                             <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">تاريخ اليوم:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
				             <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" value="<?php echo $out['date']?>" name="date" placeholder="شهر / يوم / سنة ">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    
                    
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">الكافل:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
				                <select name="donor_id" id="donor_id" onchange="return sent($('#donor_id').val());"   required  >
					               <option value="">إختر</option>
							         <?php 
                                     if (!empty($donors)):
			                             foreach ($donors as $record):
                                            $selected = '';
                                            if(isset($result) && $record->id == $result[0]->donor_id)
                                                $selected = 'selected';
                                            ?>
							                 <option value="<?php echo $record->id; ?>" <?php echo $selected ?>><?php echo $record->user_name; ?></option>
							         <?php  
                                        endforeach; 
                                     endif;
                                     ?>
								</select>
                            </div>
                        </div>
                        
                         <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        <div id="optionearea2"></div>
                        
                </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        
                            <div class="col-xs-3 r-inner-btn" style="padding-top: 3px;">
                                <input type="submit" onclick="return check_box();" id="button" role="button" name="add" value="حفظ" class="btn pull-right" />
                            </div>
                            
                        </div>
                            
                        
                    </div>
                    <?php echo form_close() ;
                    
                    }
                    ?>
                </div>
                   <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">
            <!-------------------------------------------------------------------------------------------------------------------------->
            <div class="panel-body">
                
                  <?php if(isset($all_records) && $all_records!=null):?>

                <div class="fade in active" id="optionearead">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">م</th>
                            <th class="text-center">تاريخ الإشتراك</th>
                            <th class="text-center">إسم الكافل</th>
                             
                            <th class="text-center">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">

                       <?php
                       $x=0;
                       foreach ($all_records as $record):
                       //echo"<pre>";
                        //print_r($record->donor_id);
                           $x++;?>
                        <tr>
                            <td><?php echo $x;?></td>
                            <td><?php echo date("Y/m/d",$record->date);?></td>
                            
                            <?php
                            
        $this->db->select('*');
        $this->db->from('donors_t');
        $this->db->where('id',$record->donor_id);
         $query=$this->db->get();
         foreach ($query->result() as $row) {?>
        <td><?php echo $row->user_name;?></td>
          <?php }
                            ?>
                           
  <td><a href="<?php echo base_url().'Programs_depart/delete_contributions/'.$record->id?>"><i class="fa fa-trash button" aria-hidden="true"></i></a>/<a href="<?php echo base_url().'Programs_depart/edit_contributions/'.$record->id?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        </tr>
                            <?php endforeach;?>
                       <?php endif;?>
                        </tbody>
                    </table>
                </div>

            </div>


        </div>
    </div>

                
            </div>
        </div>
        
        
        
    </div>
</div>







            <script>
                function sent(valu)
                {
                    //alert(valu);
                    if(valu)
                    {
                        var dataString = 'valu=' + valu;
                        $.ajax({

                            type:'post',
                            url: '<?php echo base_url() ?>Programs_depart/add_Payment_of_contributions/0',
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
