<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/finance_resource/main_tabs');   ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12">

      <?php if(isset($result) && $result!=null && !empty($result)):  ?>
        <?php  echo form_open_multipart('Programs_depart/UpdateProgramsToOrphan/'.$result['member_id']) ?>
          <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
              <div class="col-xs-2">
                  <h4 class="r-h4">إسم اليتيم :</h4>
                  <input type="hidden" name="member_id" value="<?php echo $result['member_id']."-".$result['mother_national_num_fk'];?>" />
              </div>
              <div class="col-xs-2 r-input">
                  <input type="text" placeholder="إسم اليتيم" value="<?php echo $member_name?>" class="r-inner-h4 "  readonly="">
              </div>

              <div class="col-xs-1">
                  <h4 class="r-h4">إسم الأم</h4>
              </div>
              <div class="col-xs-3 r-input">
                  <input type="text" placeholder="إسم الام " value="<?php echo $mother_name?>" class="r-inner-h4 " readonly="">
              </div>
              <div class="col-xs-2">
                  <h4 class="r-h4">رقم السجل المدنى للام :</h4>
              </div>
              <div class="col-xs-2 r-input">
                  <input type="text" placeholder="رقم السجل المدنى للام" value="<?php echo $result['mother_national_num_fk']?>" class="r-inner-h4 " readonly="">
              </div>

          </div>
          <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">

              <table style="width:100%">
                  <tr>
                      <th>#</th>
                      <th>البرنامج</th>
                      <th>الكفيل</th>
                  </tr>
                  <?php if(isset($member_data)&& $member_data!=null):?>
                      <?php  foreach($member_data as  $rows):?>
                          <tr>
                              <td><input type="checkbox" name="programs[]" value="<?php echo $rows->program_id_fk ?>" checked=""></td>
                              <td><?php echo $rows->program_name?></td>
                              <td><select class="form-control" name="doners_id<?php echo $rows->program_id_fk ?>">
                                      <option> إختر الكفيل   </option>
                                      <?php  foreach($rows->sub_doner as  $row_sub):
                                          $selected='';if($row_sub->donor_id == $rows->donor_id){$selected="selected";}
                                          ?>
                                          <option value="<?php echo $row_sub->donor_id ?>" <?php echo $selected?>> <?php echo $row_sub->doner_name ?>  </option>
                                      <?php endforeach;?>
                                  </select>
                              </td>
                          </tr>

                      <?php endforeach;?>
                  <?php endif;?>
                  <?php if(isset($programs)&& $programs!=null):?>
                      <?php  foreach($programs as  $key):
                          if(in_array($key->program_id_fk,$member_progr_in)){continue;}
                          ?>
                          <tr>
                              <td><input type="checkbox" name="programs[]" value="<?php echo $key->program_id_fk ?>"></td>
                              <td><?php echo $key->program_name?></td>
                              <td><select class="form-control" name="doners_id<?php echo $key->program_id_fk ?>">
                                      <option> إختر الكفيل   </option>
                                      <?php  foreach($key->sub_doner as  $row):?>
                                          <option value="<?php echo $row->donor_id ?>"> <?php echo $row->doner_name ?>  </option>
                                      <?php endforeach;?>
                                  </select>
                              </td>
                          </tr>
                      <?php endforeach;?>
                  <?php endif;?>
              </table>

          </div>
              <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3 r-inner-btn" style="padding-top: 3px;">
                                <input type="submit" onclick="" id="button" role="button" name="update" value="تعديل" class="btn pull-right" />
                            </div>
                        </div> 
          
          
          
      <?php else:?>
                    <?php  echo form_open_multipart('Programs_depart/ProgramsToOrphan') ?>
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">الطفل اليتيم :</h4>
                            </div>
                            <div class="col-xs-3 r-input">
                                <select class="selectpicker form-control" name="member_id" >
                                    <option>إختر </option>
                                    <?php if(isset($member) && !empty($member) && $member!=null):
                                        foreach($member as $row){
                                            ?>
                                            <optgroup label="<?php echo $row->mother_name?>" data-max-options="2">
                                                <?php foreach($row->sub_mem as $one_member){
                                                    if(in_array($one_member->id,$all_member_in) ){continue;}
                                                    ?>
                                                    <option value="<?php echo $one_member->id."-".$one_member->mother_national_num_fk?>"><?php echo $one_member->member_name?></option>
                                                <?php }?>
                                            </optgroup>
                                        <?php }
                                    endif?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">

                                <table style="width:100%">
                                    <tr>
                                        <th>#</th>
                                        <th>البرنامج</th>
                                        <th>الكفيل</th>
                                    </tr>
                <?php if(isset($programs)&& $programs!=null):?>
                    <?php  foreach($programs as  $key):?>
                    <tr>
                        <td><input type="checkbox" name="programs[]" value="<?php echo $key->program_id_fk ?>"></td>
                        <td><?php echo $key->program_name?></td>
                        <td><select class="form-control" name="doners_id<?php echo $key->program_id_fk ?>">
                                <option> إختر الكفيل   </option>
                                <?php  foreach($key->sub_doner as  $row):?>
                                    <option value="<?php echo $row->donor_id ?>"> <?php echo $row->doner_name ?>  </option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                <?php endforeach;?>
                <?php endif;?>
                                </table>

                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3 r-inner-btn" style="padding-top: 3px;">
                                <input type="submit" onclick="" id="button" role="button" name="add" value="حفظ" class="btn pull-right" />
                            </div>
                        </div>
                        <?php endif;?>
                        <?php echo form_close()?>
                    </div>
                </div>
                <!---------------------------------------------------------------------------->
                <?php $count=1; if(isset($records)&& $records!=null):?>
                    <div class="col-xs-12 r-inner-details">
                        <div class="panel-body">
                            <div class="fade in active">
                                <table id="sample_1" class="table table-bordered table-hover table-striped" cellspacing="0"  width="99%" style="margin-right: 6px; direction:rtl;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th >إسم اليتيم</th>
                                        <th >الإجراء</th>
                                    </tr>
                                    </thead>
                                    <?php  foreach($records as  $key):?>
                                        <tr>
                                            <td>   <?php echo $count++?> </td>
                                            <td>   <?php echo $key->members_name?> </td>
                                            <td>
                                                <a href="<?php echo base_url()."Programs_depart/UpdateProgramsToOrphan/".$key->member_id?> "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>
                                                <a  href="<?php echo base_url()."Programs_depart/DeleteProgramsToOrphan/".$key->member_id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');"><i class="fa fa-trash" aria-hidden="true"></i> حذف</a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
                <!----------------------------------------------------------------------------->
            </div>
        </div>
    </div>
</div>