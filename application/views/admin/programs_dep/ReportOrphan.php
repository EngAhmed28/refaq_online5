<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['program_to_3'] = 'active'; 
            $this->load->view('admin/finance_resource/main_tabs',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(isset($result))
                        $id = $result[0]->donor_id;
                     else
                        $id = 0;
                        ?>
                        
                        <?php
                        echo"<pre>";
                        print_r($all_family);
                        die;
                        ?>
                        
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>