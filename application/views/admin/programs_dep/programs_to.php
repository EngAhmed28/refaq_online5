<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['program_to'] = 'active'; 
            $this->load->view('admin/finance_resource/main_tabs',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(isset($result))
                        $id = $result[0]->donor_id;
                     else
                        $id = 0;
                    echo form_open_multipart('Programs_depart/programs_to/'.$id.'',array("id"=>'form_check'))?>
                    <div class="col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">الكافل:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
				                <select name="donor_id" required >
					               <option value="">إختر</option>
							         <?php 
                                     if (!empty($donors)):
			                             foreach ($donors as $record):
                                            $selected = '';
                                            if(isset($result) && $record->id == $result[0]->donor_id)
                                                $selected = 'selected';
                                            ?>
							                 <option value="<? echo $record->id; ?>" <?php echo $selected ?>><? echo $record->user_name; ?></option>
							         <?php  
                                        endforeach; 
                                     endif;
                                     ?>
								</select>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">البرامج:</h4>
                            </div>
                            
                            <div class="col-xs-3">
                                <?php
                                if(isset($programs))
                                    foreach($programs as $program){
                                        $checked = '';
                                        if(isset($result))
                                            for($x = 0 ; $x < count($result) ; $x++)
                                                if($program->id == $result[$x]->program_id_fk)
                                                    $checked = 'checked';
                                        echo '<input type="checkbox" name="program_id_fk[]" value="'.$program->id.'" '.$checked.' />'.$program->program_name."<br />";
                                    }
                                ?>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        
                            <div class="col-xs-3 r-inner-btn" style="padding-top: 3px;">
                                <input type="submit" onclick="return check_box();" id="button" role="button" name="add" value="حفظ" class="btn pull-right" />
                            </div>
                            
                        </div>
                            
                        
                    </div>
                    <?php echo form_close()?>
                </div>
                <?php if(isset($table) && $table != null){ ?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم الكفيل</th>
                                        <th class="text-center">إسم البرنامج</th>
                                        <th class="text-center">قيمة البرنامج</th>
                                        <th class="text-center">الإجمالي</th>
                                        <th class="text-center">التحكم</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                for($x = 0 ; $x < count($table) ; $x++){
                                    echo '<tr>
                                            <td rowspan="'.count($table[key($table)]).'">'.($x+1).'</td>
                                            <td rowspan="'.count($table[key($table)]).'">'.$donors[key($table)]->user_name.'</td>';
                                    $value = 0;      
                                    for($z = 0 ; $z < count($table[key($table)]) ; $z++){
                                        $value += $programs[$table[key($table)][$z]->program_id_fk]->monthly_value;
                                        echo '  <td>'.$programs[$table[key($table)][$z]->program_id_fk]->program_name.'</td>
                                                <td>'.$programs[$table[key($table)][$z]->program_id_fk]->monthly_value.'</td>';
                                        if($z == (count($table[key($table)])-1))
                                            echo '<td>'.$value.'</td>
                                                  <td>
                                                    <a href="'.base_url().'Programs_depart/programs_to/'.key($table).'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>
        
                                                    <a  href="'.base_url().'Programs_depart/delete_programs_to/'.key($table).'" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> حذف</a>
                                                    </td>
                                                  </tr>';
                                        else
                                            echo '<tr>';
                                    }
                                    next($table);
                                }
                                ?>   
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
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