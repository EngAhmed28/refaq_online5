<!----------------------------------------------------->

<?php
if(!empty($records) && isset($records) && $records!=null ):?>
    <div class="col-xs-12">
        <div class="panel-body">

            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">تاريخ اليوم</th>
                        <th class="text-center">نوع التبرع</th>
                        <th class="text-center">الإسم</th>
                        <th class="text-center">رقم الهاتف</th>
                        <th class="text-center">رقم البطاقة</th>
                        <th class="text-center">القيمة</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php $a=1;foreach ($records as $record ):?>
                        <tr>
                            <td><?php echo $a ?></td>
                            <td> <?php echo  date('Y-m-d',$record->date); ?></td>
                            <?php
                            $type='';
                            $name='';
                            $phone='';
                            $card_id='';
                            if ($record->donate_type_id_fk ==1){
                                $type='متبرع';
                                $name=$get_name[$record->person_id]->user_name;
                                $phone=$get_name[$record->person_id]->guaranty_mob;
                                $card_id=$get_name[$record->person_id]->national_id_fk;
                            }elseif($record->donate_type_id_fk ==2){
                                $type='غيرذلك';
                                $name=$record->name;
                                $phone=$record->mob;
                                $card_id=$record->card_id;
                            }elseif($record->donate_type_id_fk ==3){
                                $type='كفيل';
                                $name=$get_name[$record->person_id]->user_name;
                                $phone=$get_name[$record->person_id]->guaranty_mob;
                                $card_id=$get_name[$record->person_id]->national_id_fk;
                            }
                            if(empty($card_id)){
                                $card_id ='لا يوجد';
                            }
                            if(empty($phone)){
                                $phone ='لا يوجد';
                            }
                            ?>
                            <td> <?php echo $type; ?></td>
                            <td> <?php echo $name; ?></td>
                            <td> <?php echo $phone; ?></td>
                            <td> <?php echo $card_id; ?></td>
                            <td> <?php echo $record->value ?></td>
                        </tr>
                        <?php $a++;endforeach;  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php else :?>
    <div class="col-lg-12 alert alert-danger" >
        لا يوجد تبرع يومي
    </div>

<?php endif;?>


