
<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['program_to_6'] = 'active';
            $this->load->view('admin/finance_resource/main_tabs',$data);
            ?>

            <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                    <thead>

                    <div class="col-xs-1">
                        <h5 class="text-center r-delet-mes1 r-check">

                        </h5>
                    </div>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">إسم الكافل</th>
                        <th class="text-center">عدد البرامج المشارك بيها</th>
                        <th class="text-center">الإجمالي</th>

                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                    if(isset($all_records) && $all_records != null){
                        $d=1;
                        foreach ($all_records as $record){
                            $value = 0;
                            foreach ($table[$record->donor_id] as $row)  {

                                $value   +=$programs[$row->program_id_fk]->monthly_value;
                            }
                            ?>
                            <tr>
                            <td><?php echo $d;?></td>
                            <td><?php if(!empty($donors[$record->donor_id]->user_name)): echo $donors[$record->donor_id]->user_name; endif;?></td>
                            <td><?php echo count($table[$record->donor_id]);?></td>
                            <td><?php echo $value;?></td>
                            </tr>
                            <?php $d++; } }?>
                    <!-------------------------------------------->

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

