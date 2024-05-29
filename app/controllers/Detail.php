<?php 
class Detail extends Controller {

    public function index($placename ='name not set'){
        $data['title'] = 'Detail';
        $data['placename'] = $placename;
       
        $this->view('components/header',$data);
        $this->view('listing/index',$data);
    }

    public function page(){
        echo "listing/page";
    }
}