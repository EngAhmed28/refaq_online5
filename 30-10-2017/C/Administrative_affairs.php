<?php
public function suspend_DoVacationsApproved(){
    $this->load->model('administrative_affairs_models/Vacation');
    $this->Vacation->suspend_DoVacationsApproved($_POST['id']);
    redirect('Administrative_affairs/VacationsApproved');
}
