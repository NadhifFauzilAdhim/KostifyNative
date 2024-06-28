<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            </div>
        </div> -->
       
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="<?=BASEURL?>" class="navbar-brand mx-4 mb-3">
                   <img src="<?=BASEURL?>images/Kostify.png" alt="" width="150px" >
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="https://img.icons8.com/color/48/user-male-circle--v1.png" alt="" style="width: 60px; height: 60px;">
                      </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?= $data['userauth']['username']?> <A></A></h6>
                        <span class="badge bg-primary rounded-pill mt-1"><?=$usertype = ($data['userauth']['is_owner'] == 1) ? 'Owner' : 'Resident'?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                <?php
                $currentUrl = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
                ?>
                    
                    <a href="<?=BASEURL?>dashboard" class="nav-item nav-link <?= $currentUrl == 'dashboard' ? 'active' : '' ?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <?php if($data['userauth']['is_verified']):?>
                    <?php if($data['userauth']['is_owner']):?>
                    <div class="nav-item dropdown">

                        <a href="#" class="nav-link dropdown-toggle <?= ($currentUrl == 'post' || $currentUrl == 'createpost') ? 'active' : '' ?>" data-bs-toggle="dropdown"><i class="fa-solid fa-house me-2"></i>My Properties</a>
                        <div class="dropdown-menu  border-0">
                            <a href="<?=BASEURL?>dashboard/post" class="dropdown-item mx-3"><i class="fa fa-plus me-2"></i>Post</a>
                        </div>
                        
                    </div>
                    <?php endif?>
                    <?php else:?>
                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-house me-2"></i><span class="badge bg-danger rounded-pill">Not Verified</span></a>
                    </div>
                    <?php endif?>
                    <?php if($data['userauth']['is_owner']):?>
                    <a href="<?=BASEURL?>dashboard/resident" class="nav-item nav-link <?= ($currentUrl == 'resident') ? 'active' : '' ?>"><i class="fa-solid fa-users me-2"></i>Resident</a>
                    <?php endif?>
                    <?php if(!$data['userauth']['is_owner']):?>
                    <a href="<?=BASEURL?>dashboard/rent" class="nav-item nav-link <?= ($currentUrl == 'rent') ? 'active' : '' ?>"><i class="fa-solid fa-house-circle-check me-2"></i>My Rent</a>
                    <?php endif?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-paper-plane me-2"></i>Request</a>
                        <div class="dropdown-menu  border-0">
                             <a href="<?= $data['userauth']['is_owner'] == 1 ? BASEURL . 'dashboard/request' : BASEURL . 'dashboard/userrequest' ?>" class="dropdown-item mx-3"><i class="fa-regular fa-envelope"></i> Request</a>
                          
                        </div>
                    </div>
                    <a href="<?=BASEURL?>dashboard/payment" class="nav-item nav-link <?= $currentUrl == 'payment' ? 'active' : '' ?>"><i class="fa-solid fa-credit-card me-2"></i>Payment</a>
                </div>
                
            </nav>
        </div>

        <div class="content">

            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="<?=BASEURL?>" class="navbar-brand d-flex d-lg-none me-4">
                 
                    <img src=" <?=BASEURL?>images/Kostify.png" alt="" width="80px" >
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Pesan</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="https://img.icons8.com/color/48/user-male-circle--v1.png" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Mengirimkan Permintaan</h6>
                                        <small>15 minutes ago</small>
                                        <hr class="dropdown-divider">
                                    </div>
                                </div>
                            </a>
                            
                           
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notifikasi</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Julian Kiyosaki Membayar</h6>
                                <small>15 minutes ago</small>
                            </a>
                          
                            <hr class="dropdown-divider">
                           
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="https://img.icons8.com/color/48/user-male-circle--v1.png" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?=$data['userauth']['name']?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="<?= BASEURL ?>logout/" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            </nav>