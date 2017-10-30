            <div class="col-sm-11 col-xs-12">
              <!--  -->
                <?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
               <!--  -->
               
               
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
<!-------------------------------------------------------------------------------------------------------------------------->

    <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
<?php if(isset($result) && $result!=null):?>
  <?php echo form_open_multipart('Administrative_affairs/edit_awards/'.$result[0]->id)?>
    <div class="col-xs-12">
        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> تاريخ اليوم  </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <div class="docs-datepicker">
                        <div class="input-group">
                            <input type="text" class="form-control docs-date" name="date" value="<? echo date('Y-m-d', $result[0]->date); ?>" placeholder="شهر / يوم / سنة ">
                        </div>
                    </div>
                </div>
            </div>
  
  
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> التفاصيل </h4>
                </div>
                <div class="col-xs-6 r-input" >
 <textarea  name="details" id="content"  class="form-control"><? echo $result[0]->details; ?> </textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  إسم الموظف </h4>
                </div>
                <div class="col-xs-6 r-input">

                    <select name="emp_id" id="emp_id" disabled >
                        <option> - اختر - </option>
                        <?php if (!empty($employs)):?>
                            <?php  foreach ($employs as $record):
                                $dis ='';
                                if($result[0]->emp_id == $record->id){
                                    $dis ='selected';

                                }?>
                                <option value="<?php  echo $record->id;?>" <?echo $dis;?>><?php  echo $record->employee;?></option>
                            <?php  endforeach;?>
                        <?php endif;?>
                    </select>

                </div>
            </div>
         
          
            <div class="col-xs-12" id="value" >
                <div class="col-xs-6">
                    <h4 class="r-h4"> قيمة المكافأة </h4>
                </div>
                <div class="col-xs-6 r-input" >
                    <input type="number"  name="value" value="<? echo $result[0]->value;?>" >
                </div>
            </div>
         
        </div>
    </div>
    <div class="col-xs-12 r-inner-btn">

        <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">

            <input type="submit" name="edit" value="تعديل" class="btn center-block" />

        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>

    </div>


<?php else:?>
    <?php echo form_open_multipart('Administrative_affairs/add_awards/')?>
    <div class="col-xs-12">
        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> تاريخ اليوم  </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <div class="docs-datepicker">
                        <div class="input-group">
                            <input type="text" class="form-control docs-date" name="date" placeholder="شهر / يوم / سنة ">
                        </div>
                    </div>
                </div>
            </div>
      
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> التفاصيل </h4>
                </div>
                <div class="col-xs-6 r-input" >
                    <textarea name="details" id="details"  class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  إسم الموظف </h4>
                </div>
                     <div class="col-xs-6 r-input">
                        <?php if($_SESSION['role_id_fk'] ==2):?>
                            <input type="text" name="emp_id" value="<?php echo $get_data['employee'];?>">
                            <?else:?>
                    <select name="emp_id" id="emp_id" >
                        <option> - اختر - </option>
                        <?php if (!empty($employs)):?>
                  <?php  foreach ($employs as $record):?>
                            <option value="<?php  echo $record->id;?>"><?php  echo $record->employee;?></option>
                        <?php  endforeach;?>
                        <?php endif;?>
                        <?php endif;?>
                    </select>
                    
                </div>
            
            </div>
       
            <div class="col-xs-12" id="value" style="">
                <div class="col-xs-6">
                    <h4 class="r-h4"> القيمة </h4>
                </div>
                <div class="col-xs-6 r-input" >
                    <input type="number"  name="value">
                </div>
            </div>
        </div>
    </div>
        <div class="col-xs-12 r-inner-btn">

            <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
            <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">

                <input type="submit" name="add" value="إضافة" class="btn center-block" />

            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>

        </div>

       <?php echo form_close()?>
   <?php endif?>
    </div>

                        <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                        <?php if (!empty($records)):?>

                            <div class="col-xs-12">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>م</th>
                                        <th>تاريخ اليوم</th>
                                        <th>إسم الموظف</th>
                                        <th>الإدارة</th>
                                        <th>القسم</th>
                                        <th>قيمة المكافأة </th>
                                        <th>الاجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody>
<?php  $count=1; foreach($records as $row):?>
<tr>
<td><?php echo $count++?></td>
<td><?php echo date('Y-m-d',$row->date);?></td>
<td><?php echo$get_data2[$row->emp_id][0]->employee;?></td>
<td><?php if(!empty($get_data2[$row->emp_id]))echo $depart_name[$get_data2[$row->emp_id][0]->administration][0]->name;?></td>
<td><?php if(!empty($get_data2[$row->emp_id]))echo$depart_name[$get_data2[$row->emp_id][0]->department][0]->name;?></td>

<td><?php echo $row->value ?></td>
<td> <a href="<?php echo base_url().'Administrative_affairs/edit_awards/'.$row->id?>">
<i class="fa fa-pencil " aria-hidden="true"></i></a>
<a href="<?php echo base_url().'Administrative_affairs/delete_awards/'.$row->id?>">
<i class="fa fa-trash" aria-hidden="true"></i> </a>

</td>
</tr>

            
                                            <!--end-->
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>





                        <?php endif;?>
                        </div>
  
<!-------------------------------------------------------------------------------------------------------------------------->     
                    </div>
                </div>
            </div>
             <!----------------->



