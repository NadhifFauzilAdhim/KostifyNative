<?php 
class Dashboard extends Controller {

    public function index(){
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['is_owner']){
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
                }else{
                    echo '403 Access forbidden';
                }
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
        if(isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']){
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
                switch ($result) {
                    case $result > 0:
                        Flasher::setFlash('Post', 'Dibuat', 'success');
                        header('Location: ' . BASEURL . 'dashboard/post');
                        exit;
                        break;
                    case 0:
                        Flasher::setFlash('Post', 'Gagal Dibuat', 'danger');
                        header('Location: ' . BASEURL . 'dashboard/createPost');
                        exit;
                        break;
                    case -1:
                        Flasher::setFlash('Upload', 'Gagal', 'danger');
                        break;
                    case -2:
                        Flasher::setFlash('Ekstensi', 'Tidak didukung', 'warning');
                        break;
                    case -3:
                        Flasher::setFlash('Ukuran File', 'Terlampaui', 'warning');
                        break;
                }
            } else {
                echo '403 Access forbidden';
            }
        }else{
            echo '403 Access forbidden';
        }
       
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }
    
}

public function deletePost(){
    if(isset($_SESSION['user'])){
        if(isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']){
            if($_SESSION['user']['is_verified'] && $_SESSION['user']['is_owner']){
                $result = $this->model('Dashboard_model')->deletePost($_POST);
                switch ($result) {
                    case $result > 0:
                        header('Location: ' . BASEURL . 'dashboard/post');
                        Flasher::setFlash('Post', 'Dihapus', 'success');
                        exit;
                        break;
                    case -1:
                        header('Location: ' . BASEURL . 'dashboard/post');
                        Flasher::setFlash('Gambar', 'Gagal Dihapus', 'danger');
                        exit;
                        break;
                    case -2:
                        header('Location: ' . BASEURL . 'dashboard/post');
                        Flasher::setFlash('Gambar', 'Tidak Ditemukan', 'danger');
                        exit;
                        break;
                    case -3:
                        header('Location: ' . BASEURL . 'dashboard/post');
                        Flasher::setFlash('Post', 'Tidak Ditemukan', 'danger');
                        exit;
                        break;
                    default:
                        header('Location: ' . BASEURL . 'dashboard/post');
                        Flasher::setFlash('Post', 'Gagal Dihapus', 'danger');
                        exit;
                        break;
                }
            }else{
                echo '403 Access Action';
            }
        }else{
            echo '403 Access forbidden';
        }
        
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }
}

public function edit($slug){
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['is_verified'] && $_SESSION['user']['is_owner']){
            $data['title'] = 'Edit Post';
            $data['userauth'] = $_SESSION['user'];
            $data['getpost'] = $this->model('Dashboard_model')->getPostBySlug($slug, $_SESSION['user']['id']);

            if ($data['getpost'] === null) {
                Flasher::setFlash('Post', 'Tidak ditemukan', 'warning');
                header('Location: ' . BASEURL . 'dashboard/post');
                exit;
            }

            $data['getregion'] = $this->model('Dashboard_model')->getRegion();
            $data['gettype'] = $this->model('Dashboard_model')->getType();
            $data['getcategories'] = $this->model('Dashboard_model')->getCategories();
            $this->view('components/dashboard/header', $data);
            $this->view('components/dashboard/sidebarnav', $data);
            $this->view('dashboard/editpost', $data);
            $this->view('components/dashboard/footer');
        } else {
            echo '403 Access forbidden';
        }
    } else {
        header('Location: ' . BASEURL . 'login');
        exit;
    }
}
public function editpost(){
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['is_verified'] && $_SESSION['user']['is_owner']){
            $propertyid = $_POST['id'];
            $propertyname = $_POST['propertyname'];
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
            $result = $this->model('Dashboard_model')->editPost($category,$propertyname,$propertyid,$type,$price,$location,$region,$available,$facility,$image,$km,$payment_type,$image2,$image3);
            switch ($result) {
                case $result > 0:
                    Flasher::setFlash('Post', 'Diubah', 'success');
                    header('Location: ' . BASEURL . 'dashboard/post');
                    exit;
                    break;
                case 0:
                    Flasher::setFlash('Post', 'Gagal Diubah', 'danger');
                    header('Location: ' . BASEURL . 'dashboard/post');
                    exit;
                    break;
                case -1:
                    Flasher::setFlash('Upload', 'Gagal', 'danger');
                    break;
                case -2:
                    Flasher::setFlash('Ekstensi', 'Tidak didukung', 'warning');
                    break;
                case -3:
                    Flasher::setFlash('Ukuran File', 'Terlampaui', 'warning');
                    break;
            }
        } else {
            echo '403 Access forbidden';
        }
    } else {
        header('Location: ' . BASEURL . 'login');
        exit;
    }
}

public function request(){
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['is_verified'] && $_SESSION['user']['is_owner']){
            $data['title'] = 'Edit Post';
            $data['userauth'] = $_SESSION['user'];
            $data['request'] = $this->model('Dashboard_model')->getRequestByOwnerID($_SESSION['user']['id']);
            $this->view('components/dashboard/header', $data);
            $this->view('components/dashboard/sidebarnav', $data);
            $this->view('dashboard/request', $data);
            $this->view('components/dashboard/footer');
        }else{
            echo '403 Access forbidden';
        }
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }
}

public function acceptRequest(){
    if(isset($_SESSION['user'])){
        if(isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']){
            $result = $this->model('Dashboard_model')->acceptRequest($_POST['property_id']);
            if($result > 0){
                Flasher::setFlash('Permintaan Diterima, Pembayaran akan dikirimkan kepada penyewa', '', 'success');
                header('Location: ' . BASEURL . 'dashboard/request');
                exit;
            }
            Flasher::setFlash('Error', 'Tidak Dapat Melakukan Aksi', 'warning');
            header('Location: ' . BASEURL . 'dashboard/request');
            exit;
        }else{
            echo '403 Access forbidden';
        }
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }
}

}