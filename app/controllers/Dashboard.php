<?php 
class Dashboard extends Controller {

    public function index(){
        if(!isset($_SESSION['user'])){
            header('Location: ' . BASEURL . 'login');
            exit;
        }
        else{
            $data['title'] = 'Dashboard';
            $data['userauth'] = $_SESSION['user'];
            $data['getrequest'] = $this->model('Dashboard_model')->getRequestByOwnerID($data['userauth']['id']);
            $data['getpropery'] = $this->model('Dashboard_model')->getProperyByOwnerID($data['userauth']['id']);
            $this->view('components/dashboard/header',$data);
            $this->view('components/dashboard/sidebarnav',$data);
            $this->view('dashboard/index',$data);
            $this->view('components/dashboard/footer');
        }
        
    }
}