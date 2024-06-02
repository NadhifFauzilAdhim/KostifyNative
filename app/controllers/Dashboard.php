<?php 
class Dashboard extends Controller {

    public function index(){
        if(isset($_SESSION['user'])){
            // Jika User Bukan Merupakan Owner
            if($_SESSION['user']['is_owner']){
                //OWNER MAIN DASG
           $data['title'] = 'Dashboard';
           $data['userauth'] = $_SESSION['user'];

           $data['getrequest'] = $this->model('Dashboard_model')->getRequestByOwnerID($data['userauth']['id']);
           $data['getpropery'] = $this->model('Dashboard_model')->getProperyByOwnerID($data['userauth']['id']);
           $data['getcomment'] = $this->model('Dashboard_model')->getCommentByUserID($data['userauth']['id']);
           $data['getPaymentStat'] = $this->model('Dashboard_model')->getPaymentStatusByUserID($data['userauth']['id']);
           // $data['getSumPayment'] = $this->model('Dashboard_model')->getSumPaymentByUserID($data['userauth']['id']);
           $this->view('components/dashboard/header',$data);
           $this->view('components/dashboard/sidebarnav',$data);
           $this->view('dashboard/index',$data);
           $this->view('components/dashboard/footer');
           exit;
           }
           echo '403 Access forbidden, Anda Bukan Owner';
        }
        else{
            header('Location: ' . BASEURL . 'login');
            exit;
        }

        
    }
    public function post(){
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['is_verified'] && $_SESSION['user']['is_owner']){
                $data['title'] = 'Post';
                $data['userauth'] = $_SESSION['user'];
        
                $data['getpropery'] = $this->model('Dashboard_model')->getProperyByOwnerID($data['userauth']['id']);
                $this->view('components/dashboard/header',$data);
                $this->view('components/dashboard/sidebarnav',$data);
                $this->view('dashboard/post',$data);
                }
                echo '403 Access forbidden';
        }
        else {
            header('Location: ' . BASEURL . 'login');
            exit;
        }
        
    }

    public function visibility(){
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['is_verified'] && $_SESSION['user']['is_owner']){
            if($this->model('Dashboard_model')->setVisibility($_POST) > 0){
                header('Location: ' . BASEURL . 'dashboard/post');
                Flasher::setFlash('Visibilitas','Diubah','success');
                exit;
            }
        }
        echo '403 Access forbidden';
    }else{
        header('Location: ' . BASEURL . 'login');
            exit;
    }
    }

    public function createPost(){
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['is_verified'] && $_SESSION['user']['is_owner']){
                $data['title'] = 'Create Post';
                $data['userauth'] = $_SESSION['user'];
                $data['getregion'] = $this->model('Dashboard_model')->getRegion();
                $data['gettype'] = $this->model('Dashboard_model')->getType();
                $data['getcategories'] = $this->model('Dashboard_model')->getCategories();
                $this->view('components/dashboard/header',$data);
                $this->view('components/dashboard/sidebarnav',$data);
    
                $this->view('dashboard/createpost',$data);
                }else{
                    echo '403 Access forbidden';
                }
               
        }else{
            header('Location: ' . BASEURL . 'login');
            exit;
        }
       
    }



   public function checkSlug(){
    if(isset($_POST['slug'])){
        $slug = $_POST['slug'];
        $isAvailable = $this->model('Dashboard_model')->checkSlugAvailability($slug);
        echo $isAvailable ? '0' : '1'; // Mengembalikan '0' jika tersedia, '1' jika tidak
        exit;
    }
}


public function storePost() {
    if(isset($_SESSION['user'])){
        if ($_SESSION['user']['is_verified'] && $_SESSION['user']['is_owner']) {
            $user_id = $_SESSION['user']['id'];
            $propertyname = $_POST['propertyname'];
            $slug = $_POST['slug'];
            $category = $_POST['category'];
            $type = $_POST['type'];
            $available = $_POST['available'];
            $price = $_POST['price'];
            $payment_type = $_POST['payment_type'];
            $region = $_POST['region'];
            $location = $_POST['location'];
            $facility = $_POST['facility'];
            $km = $_POST['km'];
            $image = $_FILES['image'];
            $image2 = $_FILES['image2'];
            $image3 = $_FILES['image3'];
            $result = $this->model('Dashboard_model')->insertPost($category,$user_id,$propertyname,$type,$slug,$price,$location,$region,$available,$facility,$image,$km,$payment_type,$image2,$image3);
            if ( $result > 0) {
                Flasher::setFlash('Post', 'Created', 'success');
    
                header('Location: ' . BASEURL . 'dashboard/post');
                exit;
            } 
            elseif($result == 0){
                Flasher::setFlash('Post', 'Failed to create', 'danger');
                header('Location: ' . BASEURL . 'dashboard/createPost');
                exit;
            }elseif($result == -1){
                Flasher::setFlash('Upload', 'Gagal', 'danger');
                header('Location: ' . BASEURL . 'dashboard/createPost');
                exit;
            }
            elseif($result == -2){
                Flasher::setFlash('Ekstensi', 'Tidak didukung', 'danger');
                header('Location: ' . BASEURL . 'dashboard/createPost');
                exit;
            }
            elseif($result == -3){
                Flasher::setFlash('File Size', 'Terlampaui', 'danger');
                header('Location: ' . BASEURL . 'dashboard/createPost');
                exit;
            }
        } else {
            echo '403 Access forbidden';
        }
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }
    
}
}