
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
                        <th class="text-center">إسم اليتيم</th>
                        <th class="text-center">عدد البرامج المشارك بيها</th>
                        <th class="text-center">الإجمالي</th>

                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                    if(isset($table) && $table != null){
                        $d=1;
                        foreach ($table as $k =>$record):
                            $value = 0;
                            $final_result_2=0;
                            for($z = 0 ; $z < count($table[$k]) ; $z++){
                                $final_result_2 +=$programs[$table[$k][$z]->program_id_fk]->monthly_value;
                            }
                            ?>
                            <tr>
                            <td><?php echo $d;?></td>
                            <td><?php echo $donors[$k]->member_name;?></td>
                            <td><?php echo count($table[$k]);?></td>
                            <td><?php echo $final_result_2;?></td>
                            </tr>
                            <?php $d++; endforeach; }?>
                    <!-------------------------------------------->

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

