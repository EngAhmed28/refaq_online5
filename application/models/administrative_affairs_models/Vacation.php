<?php


    //======================================================
    public function suspend_DoVacationsApproved($id)
    {
        if($_POST['accept'] )
        {
            $update = array(
                'approved' => 1,
                'reason' => $_POST['reason']
            );
        }
        elseif($_POST['refuse'])
        {
            $update = array(
                'approved' => 2 ,
                'reason' => $_POST['reason']
            );
        }elseif ($_POST['back']){
            $update = array(
                'approved' => 0);

        }

        $this->db->where('id', $id);
        if($this->db->update('vacations',$update)) {
            return true;
        }else{
            return false;
        }
    }

    //===================================================================

