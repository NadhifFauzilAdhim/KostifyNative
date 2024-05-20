<?php 
class Dashboard extends Controller {

    public function index($placename ='name not set'){
        $data['title'] = 'Detail';
        $data['placename'] = $placename;
        $this->view('components/header',$data);
        $this->view('dashboard/index',$data);
    }

    public function page(){
        echo "listing/page";
    }
}