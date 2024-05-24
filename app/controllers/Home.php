<?php 
class Home extends Controller{
    public function index(){
        
        $data['title'] = "home";
        if(isset($_SESSION['user'])){
            $data['userauth'] = $_SESSION['user'];
        }
        $data['lists'] = $this->model('Listing_model')->getAllList();
        $this->view('components/header',$data);
        $this->view('components/navbar',$data);
        $this->view('home/index',$data);
    }
    public function detail($slug){
        $data['title'] = $slug;
        if(isset($_SESSION['user'])){
            $data['userauth'] = $_SESSION['user'];
        }
        $data['lists'] = $this->model('Listing_model')->getDetailBySlug($slug);
        $data['comments'] = $this->model('Listing_model')->getCommentByPostSlug($slug);
        $this->view('components/header',$data);
        $this->view('components/navbar',$data);
        $this->view('detail/detail',$data);
       
    }
    public function listing(){
        $data['title'] ='Find';
        $data['lists'] = $this->model('Listing_model')->getAllList();
        $this->view('components/header',$data);
        $this->view('components/navbar');
        $this->view('alllist/listing',$data);
       
    }
    public function addrequest(){

        if($this->model('Listing_model')->addRequest($_POST) > 0){
            Flasher::setFlash('Request Berhasil','ditambahkan','success');
            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        else{
            Flasher::setFlash('Request Gagal','ditambahkan','danger');
            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    } 
}