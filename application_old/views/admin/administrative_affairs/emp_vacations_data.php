<?php
$query2 =$this->db->query('SELECT * FROM `vacations` WHERE `deleted`=1 AND `emp_id`='.$_POST['valuesx']);
$arr=array();
foreach ($query2->result() as  $row2) {
    $arr[] =$row2;
}
 ?>
  <?php

if (sizeof($arr)>0) {   ?>
    <table class="table table-bordered table-striped "  style="width: 69%; margin-right: 100px; margin-top: 10px;" >
                       <thead>
							<tr>
                            <th style="text-align: center">م</th>
                            <th style="text-align: center">اليوم</th>
                             <th style="text-align: center">نوع الأجازة</th>
                            <th style="text-align: center">المدة</th>
                            </tr>
						</thead>
    					<tbody>
                        <?    $vacation=array('','أجازة سنوية','أجازة مرضية','أجازة بدون أجر');
                        $counter=0;
                        foreach ($arr as  $row):
                            $counter++;
                            $day_from=$row->from_date;
                            $day_to= $row->to_date;

                            $date1 = new DateTime($day_from);
                            $date2 = new DateTime($day_to);

                            $diff = $date2->diff($date1)->format("%a");
                            ?>


                   <?          echo'<tr>
      <td>'.$counter.'</td>
      <td>'.$day_from.'</td>
      <td>'.$vacation[$row->vacation_id].'</td>
      <td>'.$diff.'</td>
    </tr>';
                        endforeach;  }  ?>

<?php
$idea_emp_id=  $_POST['valuesx'];
$depart=  $_POST['depart'];

$query2 =$this->db->query('SELECT * FROM `employees` WHERE `administration`='.$depart.' And `id` !='.$idea_emp_id);
$arr=array();
foreach ($query2->result() as  $row2) {
    $arr[] =$row2;
}

?>
                        <div class="col-xs-12 ">
                            <div class="col-xs-6">
                                <h4 class="r-h4 ">  الموظف القائم بالعمل </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                              <select name="emp_assigned_id"  required id="emp_assigned_id" class="form-control"   >
                                        <option value="">إختر </option>
                                  <?php    foreach($arr as $record): ?>
                                            <option value="<? echo $record->id;?>"><? echo $record->employee;?></option>
                                        <? endforeach;?>
                                        </select>
                            </div>
                        </div>









