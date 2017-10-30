<?php
$val = $_POST['valu'];

if(!empty($val)){
     if(isset($table[$val]))  { 
?>


 <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                    
                                        <th class="text-center">إسم البرنامج</th>
                                        <th class="text-center">قيمة البرنامج</th>
                                        <th class="text-center">أسم الكفيل</th>
                                        <th class="text-center">حالة البرنامج</th>
                                      
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                $d=0;
                                $x=0;
                              // for($x = 0 ; $x < count($table) ; $x++){
                                    echo '<tr>
                                        ';
                                   
                                   
                                    $value = 0; 
                                    $x=0; 
                                   
                                    for($z = 0 ; $z < count($table[$val]) ; $z++){
                                        $value += $programs[$table[$val][$z]->program_id_fk]->monthly_value;
                                        echo ' 
                                        
                                        
                                        <td>'.($x+1).'</td>
                                         <td>'.$programs[$table[$val][$z]->program_id_fk]->program_name.'</td>
                                                <td>'.$programs[$table[$val][$z]->program_id_fk]->monthly_value.'</td>';
                                        
                                         if($programs[$table[$val][$z]->program_id_fk]->program_to > strtotime(date("Y/m/d")))
                                        $status = 'جاري';
                                    else   
                                        $status = 'منتهي';
                                        
                                        
                                        ?>
                                       <?php
                                       echo' 
                                       <td>'.$donors_t[$table[$val][$z]->donor_id]->user_name.'</td> 
                                       <td>'.$status.'</td>                                     
                                       </tr>'; 
                                        $x++;
                                          }
                                          }else{?>
                                             <div class="col-xs-12 alert alert-danger" >لا توجد  نتائج</div>
                                         <?php }
                                  
                                    //next($table);
                              
                              
                                //}
                                ?>   
                             
                                   
                                </tbody>
                            </table>
                
       

    <?php 
    }else{ ?>
        <div class="col-xs-12 alert alert-danger" >لا توجد  نتائج</div>
    <?php  } 
    
    
     ?>

