<?php 
class Dashboard extends Controller {

    public function index(){
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['is_owner']){
           $data['title'] = 'Dashboard Owner';
           $data['userauth'] = $_SESSION['user'];
           $data['getrequest'] = $this->model('Dashboard_model')->getRequestByOwnerID($_SESSION['user']['id']);
           $data['getpropery'] = $this->model('Dashboard_model')->getProperyByOwnerID($_SESSION['user']['id']);
           $data['getcomment'] = $this->model('Dashboard_model')->getCommentByUserID($_SESSION['user']['id']);
           $data['getPaymentStat'] = $this->model('Dashboard_model')->getPaymentStatusByUserID($_SESSION['user']['id']);
           $data['revenue'] = $this->model('Dashboard_model')->getSumPaymentByUserID($_SESSION['user']['id']);
           $data['monthlyRevenue'] = $this->model('Dashboard_model')->getMonthlyRevenueByUserID($_SESSION['user']['id']);
           $data['residentsCount'] = $this->model('Dashboard_model')->getResidentCount($_SESSION['user']['id']);
           $this->view('components/dashboard/header',$data);
           $this->view('components/dashboard/sidebarnav',$data);
           $this->view('dashboard/index',$data);
           $this->view('components/dashboard/footer');  
           exit;
           }//user dashboards
           elseif(!$_SESSION['user']['is_owner']){
            $data['title'] = 'Dashboard User';
            $data['userauth'] = $_SESSION['user'];
            $data['getcomment'] = $this->model('User_dashboard_model')->getCommentByUserID($_SESSION['user']['id']);
            $data['getrequest'] = $this->model('User_dashboard_model')->getRequestByUserId($_SESSION['user']['id']);
            $data['getpayment'] = $this->model('User_dashboard_model')->getPaymentByUserId($_SESSION['user']['id']);
            $data['getbill'] = $this->model('User_dashboard_model')->getBillByUSerId($_SESSION['user']['id']);
            $data['sumPayment'] = $this->model('User_dashboard_model')->sumOfPayment($_SESSION['user']['id']);
            $this->view('components/dashboard/header',$data);
            $this->view('components/dashboard/sidebarnav',$data);
            $this->view('userdashboard/userindex',$data);
            $this->view('components/dashboard/footer');
           }
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
        echo $isAvailable ? '0' : '1'; 
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

public function requestHandler(){
    if(isset($_SESSION['user'])){
        if(isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']){
            $result = $this->model('Dashboard_model')->requestHandler($_POST['id'],$_POST['action']);
            if($result > 0){
                Flasher::setFlash('Permintaan Diterima, Pembayaran akan dikirimkan kepada penyewa/pembeli setelah dikonfimasi ulang', '', 'success');
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
            Flasher::setFlash('Error', 'Tidak Dapat Melakukan Aksi', 'warning');
            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
            echo '403 Access forbidden';
        
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }
}

public function userrequest(){
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['is_verified']){
            $data['title'] = 'Request';
            $data['userauth'] = $_SESSION['user'];
            $data['request'] = $this->model('user_dashboard_model')->getRequestByUserId($_SESSION['user']['id']);
            $this->view('components/dashboard/header', $data);
            $this->view('components/dashboard/sidebarnav', $data);
            $this->view('userdashboard/userrequest', $data);
            $this->view('components/dashboard/footer');
        }else{
            echo '403 Access forbidden';
        }
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }
}
  
 public function overview($slug){
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['is_verified']){
            if($this->model('user_dashboard_model')->checkValid($_SESSION['user']['id'], $slug) > 0){
                $data['title'] = 'Overview';
                $data['userauth'] = $_SESSION['user'];
                $data['lists'] = $this->model('Listing_model')->getDetailBySlug($slug);
                $this->view('components/dashboard/header', $data);
                $this->view('components/dashboard/sidebarnav', $data);
                $this->view('userdashboard/paymentoverview', $data);
                $this->view('components/dashboard/footer');
            }
            else{
                echo '403 Access forbidden';
            }
          
        }
     }else{
        header('Location: ' . BASEURL . 'login');
        exit;
     }
 }

 public function confirm(){
    if(isset($_SESSION['user'])){
        if(isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']){
            $result = $this->model('user_dashboard_model')->addPayment($_POST);
            if($result){
                Flasher::setFlash('Silahkan Cek Menu Pembayaran', '', 'success');
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
            Flasher::setFlash('Gagal', '', 'danger');
            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }
 }

 public function payment(){
    if(isset($_SESSION['user'])){   
        if($_SESSION['user']['is_verified'] && $_SESSION['user']['is_owner']){
            $data['title'] = 'Payment';
            $data['userauth'] = $_SESSION['user'];
            $data['cardinfo'] = $this->model('Dashboard_model')->getAccountByUserId($_SESSION['user']['id']);
            $data['getPaymentStat'] = $this->model('Dashboard_model')->getPaymentStatusByUserID($data['userauth']['id']);
            $this->view('components/dashboard/header', $data);
            $this->view('components/dashboard/sidebarnav', $data);
            $this->view('dashboard/payment', $data);
            $this->view('components/dashboard/footer');

        }elseif($_SESSION['user']['is_verified'] && !$_SESSION['user']['is_owner']){
            $data['title'] = 'Payment';
            $data['userauth'] = $_SESSION['user'];
            $data['getpayment'] = $this->model('User_dashboard_model')->getPaymentByUserId($_SESSION['user']['id']);
            $data['getbill'] = $this->model('User_dashboard_model')->getBillByUSerId($_SESSION['user']['id']);
            $data['sumPayment'] = $this->model('User_dashboard_model')->sumOfPayment($_SESSION['user']['id']);
            $this->view('components/dashboard/header', $data);
            $this->view('components/dashboard/sidebarnav', $data);
            $this->view('userdashboard/userpayment', $data);
            $this->view('components/dashboard/footer');
        }else{
            echo '403 Access forbidden';
        }
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }
 }

 public function editAccount(){
    if(isset($_SESSION['user'])){
        if(isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']){
            $result = $this->model('Dashboard_model')->editAccount($_POST,$_SESSION['user']['id']);
            if($result){
                Flasher::setFlash('Berhasil', 'Menambahkan', 'success');
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
        }else{
            echo '403 Access forbidden';
        }
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }
 }

 public function paymentprocess($url){
    if(isset($_SESSION['user'])){   
        if($_SESSION['user']['is_verified'] && !$_SESSION['user']['is_owner']){
            if ($this->model('User_dashboard_model')->checkPaymentValidation($_SESSION['user']['id'], $url) > 0){
                $data['title'] = 'Payment';
                $data['userauth'] = $_SESSION['user'];
                $data['getPaymentInfo'] = $this->model('User_dashboard_model')->getPaymentInfo($url);
                $data['getSuccessPayment'] = $this->model('User_dashboard_model')->getSuccessPayment($data['getPaymentInfo']['id']);
                $this->view('components/dashboard/header', $data);
                $this->view('components/dashboard/sidebarnav', $data);
                $this->view('userdashboard/paymentprocess', $data);
                $this->view('components/dashboard/footer');
                exit;
            } else{
                echo '403 Access forbidden';
            }
        } else {
            echo '403 Access forbidden';
        }
    } else {
        header('Location: ' . BASEURL . 'login');
        exit;
    }
}


public function storeTransaction(){
    if(isset($_SESSION['user'])){
        if(isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']){
            $transaction_id = $_POST['transaction_id'];
            $transactionnumber = $_POST['transactionnumber'];
            $bankname = $_POST['bank_name'];
            $date = $_POST['date'];
            $sender = $_POST['sendername'];
            $image = $_FILES['image'];
            $result = $this->model('User_dashboard_model')->insertTransaction($transaction_id,$transactionnumber,$bankname,$date,$sender,$image);
            switch ($result) {
                case $result > 0:
                    Flasher::setFlash('Berhasil', 'Mengirimkan Bukti Mengunggu Pemilik Mengkonfirmasi', 'success');
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                    break;
                case 0:
                    Flasher::setFlash('Gagal', 'Mengirimkan Bukti', 'danger');
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                    break;
                case -2:
                    Flasher::setFlash('File', 'Tidak Valid', 'danger');
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                    break;
                case -3:
                    Flasher::setFlash('File', 'Terlalu Besar', 'danger');
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                    break;
            }
        }else{
            echo '403 Access forbidden';
        }
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }
}

 public function addTransaction(){
    if(isset($_SESSION['user'])){
        if(isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']){
            $result = $this->model('Dashboard_model')->addTransaction($_POST);
            if($result){
                Flasher::setFlash('Berhasil Mengirimkan Tagihan Kepada Penyewa', '', 'success');
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
            else{
                Flasher::setFlash('Gagal Mengirimkan Tagihan Kepada Penyewa', '', 'danger');
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }

        }else{
            echo '403 Access forbidden';
        }
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }
 }

public function paymentdetail($url){
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['is_verified'] && $_SESSION['user']['is_owner']){
            if($this->model('Dashboard_model')->checkPaymentValidation($_SESSION['user']['id'], $url) > 0){
                $data['title'] = 'Payment Detail';
                $data['userauth'] = $_SESSION['user'];
                $data['cardinfo'] = $this->model('Dashboard_model')->getAccountByUserId($_SESSION['user']['id']);
                $data['getPaymentInfo'] = $this->model('Dashboard_model')->getPaymentInfo($url);
                $data['checkResident'] = $this->model('Dashboard_model')->checkResident($data['getPaymentInfo']['id']);
                $this->view('components/dashboard/header', $data);
                $this->view('components/dashboard/sidebarnav', $data);
                $this->view('dashboard/paymentdetail', $data);
                $this->view('components/dashboard/footer');
            }else{
                $this->view('error/error404');
            }
           
        }else{
            echo '403 Access forbidden';
        }
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }
}
public function paymentconfirm(){
    if(isset($_SESSION['user'])){
        if(isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token'] && $_SESSION['user']['is_verified'] && $_SESSION['user']['is_owner']){

            $result = $this->model('Dashboard_model')->confirmPayment($_POST);
            switch ($result) {
                case $result > 0:
                    Flasher::setFlash('Berhasil', 'Mengkonfirmasi Pembayaran', 'success');
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                    break;
                case 0:
                    Flasher::setFlash('Gagal', 'Mengkonfirmasi Pembayaran', 'danger');
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                    break;
                }
        }else{
            echo '403 Access forbidden';
        }
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }
}

public function addresident(){
    if(isset($_SESSION['user'])){
        if(isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token'] && $_SESSION['user']['is_verified'] && $_SESSION['user']['is_owner']){

            $result = $this->model('Dashboard_model')->addResident($_POST);
            switch ($result) {
                case $result > 0:
                    Flasher::setFlash('Berhasil', 'Menambahkan Penyewa Cek menu Penyewa', 'success');
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                    break;
                case 0:
                    Flasher::setFlash('Gagal', 'Menambahkan', 'danger');
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                    break;
                }
        }else{
            echo '403 Access forbidden';
        }
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }
}

public function resident(){
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['is_verified'] && $_SESSION['user']['is_owner']){
            $data['title'] = 'Penyewa';
            $data['userauth'] = $_SESSION['user'];
            $data['getpropery'] = $this->model('Dashboard_model')->getProperyResidentByOwnerID($data['userauth']['id']);
            $this->view('components/dashboard/header', $data);
            $this->view('components/dashboard/sidebarnav', $data);
            $this->view('dashboard/resident', $data);
            $this->view('components/dashboard/footer');
        }else{
            echo '403 Access forbidden';
        }
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }
}

public function residentmanagement($slug){
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['is_verified'] && $_SESSION['user']['is_owner']){
            if($this->model('Dashboard_model')->checkOwner($slug, $_SESSION['user']['id']) > 0){
            $data['title'] = 'Management';
            $data['userauth'] = $_SESSION['user'];
            $data['getPaymentStat'] = $this->model('Dashboard_model')->getPaymentStatusByUserIDAndSlug($_SESSION['user']['id'],$slug);
            $data['getResident'] = $this->model('Dashboard_model')->getResidentInfoBySlug($slug);
            $this->view('components/dashboard/header', $data);
            $this->view('components/dashboard/sidebarnav', $data);
            $this->view('dashboard/residentmgm', $data);    
            $this->view('components/dashboard/footer');
            }else{
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
public function residentDetail($slug){
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['is_verified'] && $_SESSION['user']['is_owner']){
           if($this->model('Dashboard_model')->checkResidentOwner($slug, $_SESSION['user']['id']) > 0){
            $data['userauth'] = $_SESSION['user'];
            $data['resident_detail'] = $this->model('Dashboard_model')->getResidentDetailByUrl($slug);
            $data['title'] =  $data['resident_detail']['name'];
            $data['getPaymentStat'] = $this->model('User_dashboard_model')->getPaymentByUserId( $data['resident_detail']['user_id']);
            usort($data['getPaymentStat'], function($a, $b) {
                return strtotime($b['created_at']) - strtotime($a['created_at']);
            });
            $data['last_payment'] = $data['getPaymentStat'][0];
            $paymentType = $data['resident_detail']['payment_type'];
            $lastPaymentDate = new DateTime( $data['last_payment']['created_at']);

                if ($paymentType == 0) {
                    $dueDate = "Tidak ada tanggal jatuh tempo (Tunai)";
                } else {
                    $lastPaymentDate->modify("+$paymentType month");
                    $dueDate = $lastPaymentDate->format('Y-m-d');
                }
            $data['duedate'] = $dueDate;

            $this->view('components/dashboard/header', $data);
            $this->view('components/dashboard/sidebarnav', $data);
            $this->view('dashboard/residentdetail', $data);    
            $this->view('components/dashboard/footer');

           }else{
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

public function rent(){
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['is_verified'] && !$_SESSION['user']['is_owner']){
            $data['title'] = 'My Rent';
            $data['userauth'] = $_SESSION['user'];
            $data['getpropery'] = $this->model('User_dashboard_model')->getProperyResidentByUserID($data['userauth']['id']);
            $this->view('components/dashboard/header', $data);
            $this->view('components/dashboard/sidebarnav', $data);
            $this->view('userdashboard/rent', $data);
            $this->view('components/dashboard/footer');
        }else{
            echo '403 Access forbidden';
        }
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
    }   
}
public function myrent($url){
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['is_verified'] && !$_SESSION['user']['is_owner']){
            $data['title'] = 'My Rent';
            $data['userauth'] = $_SESSION['user'];
            $data['getpropery'] = $this->model('User_dashboard_model')->getProperyResidentByUserID($data['userauth']['id']);
            
            $this->view('components/dashboard/header', $data);
            $this->view('components/dashboard/sidebarnav', $data);
            $this->view('userdashboard/myrent', $data);
            $this->view('components/dashboard/footer');
        }else{
            echo '403 Access forbidden';
        }
    }else{
        header('Location: ' . BASEURL . 'login');
        exit;
}
}   
public function deleteTransaction(){
    if(isset($_SESSION['user'])){
        if(isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']){
          $result = $this->model('Dashboard_model')->deleteTransaction($_POST['id']);
          if($result > 0){
              Flasher::setFlash('Berhasil', 'Menghapus Transaksi', 'success');
              header('location: ' . $_SERVER['HTTP_REFERER']);
              exit;
          }else{
              Flasher::setFlash('Gagal', 'Menghapus Transaksi', 'danger');
              header('location: ' . $_SERVER['HTTP_REFERER']);
              exit;
          }
        }   
    }
}

public function deleteResident(){
    if(isset($_SESSION['user'])){
        if(isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']){
          $result = $this->model('Dashboard_model')->deleteResident($_POST['id']);
          if($result > 0){
              Flasher::setFlash('Berhasil', 'Menghapus Penyewa', 'success');
              header('location: ' . $_SERVER['HTTP_REFERER']);
              exit;
          }else{
              Flasher::setFlash('Gagal', 'Menghapus Penyewa', 'danger');
              header('location: ' . $_SERVER['HTTP_REFERER']);
              exit;
          }
        }   
    }
}

}