<?php 
class Home extends Controller{
    public function index(){
        
        $data['title'] = "home";
        $data['username'] = $this->model('User_model')->getUser();
        $data['lists'] = $this->model('Listing_model')->getAllList();
        $this->view('components/header',$data);
        $this->view('components/navbar');
        $this->view('home/index',$data);
    }
    public function detail($slug){
        $data['title'] = $slug;
        // $data['username'] = $this->model('User_model')->getUser();
        $data['lists'] = $this->model('Listing_model')->getDetailBySlug($slug);
        $data['comments'] = $this->model('Listing_model')->getCommentByPostSlug($slug);
        $this->view('components/header',$data);
        $this->view('components/navbar');
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
            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    } 
}