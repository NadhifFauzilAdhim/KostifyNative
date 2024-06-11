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
        
        if(isset($_SESSION['user'])){
            $data['userauth'] = $_SESSION['user'];
        }
        $data['lists'] = $this->model('Listing_model')->getDetailBySlug($slug);
        $data['title'] =  $data['lists']['propertyname'];
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
    if(isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']){
        if(isset($_SESSION['user']) && $_SESSION['user']['is_verified']){
            if($this->model('Listing_model')->addRequest($_POST) > 0){
                Flasher::setFlash('Request Berhasil','ditambahkan','success');
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
                Flasher::setFlash('Request Gagal','ditambahkan','danger');
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit;
        }else{
            header('Location: ' . BASEURL . 'login');
        }
        
    }else{
        echo '403 Access forbidden';
    }
       
    } 
    public function Comment(){
        if(isset($_SESSION['user']) && $_SESSION['user']['is_verified']){
            if(isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']){
                if($this->model('Listing_model')->addComment($_POST) > 0){
                    Flasher::setFlash('Comment Berhasil','dibuat','success');
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                }
                    Flasher::setFlash('Comment gagal','dibuat','warning');
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
            }else{
                echo '403 Access forbidden';
            }
            
        }else{
            header('Location: ' . BASEURL . 'login');
        }
       
    }
    public function delComment(){
        if(isset($_SESSION['user']) && $_SESSION['user']['is_verified'] ){
            if(isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']){
                if($this->model('Listing_model')->deleteComment($_POST) > 0){
                    Flasher::setFlash('Comment','Dihapus','success');
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                }
                else{
                    Flasher::setFlash('Comment gagal','Dihapus','warning');
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                }
            }else{
                echo '403 Access forbidden';
            }
            

        }else{
            header('Location: ' . BASEURL . 'login');   
        }
       
    }
}