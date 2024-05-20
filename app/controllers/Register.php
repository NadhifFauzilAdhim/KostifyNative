<?php 
class Register extends Controller {

    public function index(){
        $data['title'] = 'Register';
        $this->view('auth/register',$data);
    }

    public function page(){
        echo "listing/page";
    }
}