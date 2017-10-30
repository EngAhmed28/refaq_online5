
<div class="col-xs-12 center-logo">

    <div class="col-xs-12 r-section">
        <div class="container">

            <?php if(isset($main_groups) && $main_groups!=null && !empty($main_groups)){ ?>
                <?php  foreach ($main_groups as $row): ?>
            <div class="col-md-3 col-sm-4 ">
                <div class="col-xs-12 r-sec-img">
                    <a href="<?php  // echo  base_url()."Dash/mian_group/".$row->sub[0]->page_id?>">
                        <img src="<?php  echo  base_url()."uploads/images/".$row->sub[0]->page_image?>" alt="" class="center-block">
                        <h3 class="text-center"> <?php echo  $row->sub[0]->page_title?> </h3>
                    </a>
                </div>
            </div>
               <?php endforeach;?>
            <?php }?>
            </div>
    </div>
    <div class="col-xs-12">
        <div class="copy-right">
            <p class="text-center"> جميع الحقوق محفوظة لدى شركة الأثير © <?php echo date("Y",time())?></p>
        </div>
    </div>
</div>
