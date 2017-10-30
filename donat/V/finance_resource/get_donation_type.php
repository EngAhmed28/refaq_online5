<?php

$type=$_POST['values'];

if(isset($type)){?>



<?php if($type ==1):?>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4"> المتبرعون </h4>
            </div>
            <div class="col-xs-6 r-input">
                <select class=" form-control" name="person_id"  id="person_id"  data-show-subtext="true" data-live-search="true">
                    <option value="">إختر</option>
                    <?php if($donors): foreach ($donors as $record):?>
                        <option value="<?php echo $record->id;?>"><?php echo $record->user_name;?></option>
                    <?php endforeach; endif;?>
                </select>
            </div>
        </div>


 <?php elseif ($type ==2):?>
        
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">الإسم</h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="text" class="r-inner-h4" name="name" >
            </div>
        </div>

        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">رقم الهاتف</h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="number" class="r-inner-h4" name="mob" >
            </div>
        </div>

        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">رقم البطاقة</h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="number" class="r-inner-h4" name="card_id" >
            </div>
        </div>


  <?php elseif ($type ==3):?>


        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4"> الكفلاء </h4>
            </div>
            <div class="col-xs-6 r-input">
                <select class=" form-control" name="person_id"  id="person_id"  data-show-subtext="true" data-live-search="true">
                    <?php if($guarantees): foreach ($guarantees as $record):?>
                        <option value="<?php echo $record->id;?>"><?php echo $record->name['user_name'];?></option>
                    <?php endforeach; endif;?>
                </select>
            </div>
        </div>

  <?php endif;?>
    <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4">قيمة التبرع</h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="number" class="r-inner-h4" name="value" >
        </div>
    </div>

<? }?>
 <!-- first if-->

