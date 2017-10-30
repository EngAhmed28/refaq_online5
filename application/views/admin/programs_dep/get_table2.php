<?php
$val = $_POST['valu'];

if(!empty($val)){
     if(isset($table[$val]))  {
         echo'<pre>';
         var_dump($val);
         echo'</pre>';
?>
<br />
<br />

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
                                       }else{
                                        echo('
                                        <br />
                                        <br />
                                         <div class="col-xs-12 alert alert-danger" >لا توجد  نتائج</div>
                                        ');
                                       }
                                ?>   
                             
                                   
                                </tbody>
                            </table>
                                        
                            
                            
                                   <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">القيمة المشاركة:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
				                <input type="number" name="value" min="0" id="value" class="form-control" required="required" placeholder="القيمة المشاركة"/>
                            </div>
                            
                            
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">القيمة الإضافية:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
				                <input type="number" name="value_added" min="0" id="value_addes" class="form-control" placeholder="القيمة الإضافية"/>
                            </div>
                            
                        </div>
                            
       

    <?php }else{ ?>
    <br />
<br />
        <div class="col-xs-12 alert alert-danger" >لا توجد  نتائج</div>
    <?php } 
    
    
     ?>

