<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASEURL?>css/bootstrap.css" />
    <link rel="stylesheet" href="<?= BASEURL?>css/mainstyle.css" />
</head>
<body  class="profilebody">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav " data-aos="fade-down" data-aos-delay="300">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
           <img src="<?=BASEURL?>images/Kostifyop.png" alt="" width="100px" class="image-fluid" >

            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
            >
              <li class="active"><a href="<?= BASEURL ?>">Home</a></li>
              <li class="has-children">
                <a href="properties.html">Property</a>
                <ul class="dropdown">
                  <li><a href="<?=BASEURL?>/home/listing?search=kost">Kost</a></li>
                  <li><a href="<?=BASEURL?>/home/listing?search=paviliun">Paviliun</a></li>
                  <li><a href="<?=BASEURL?>/home/listing?search=kontrakan">Kontrakan</a></li>
                </ul>
              </li>
      
              <li><a href="">About</a></li>
              <li class="has-children">
                <?php if(isset($data['userauth'])):?>
                <a href="#">HAI <?= $data['userauth']['username']?></a>
                <ul class="dropdown">
                  <li><a href="<?= BASEURL ?>dashboard/"><i class="bi bi-speedometer2 me-1"></i>DASHBOARD</a></li>
                  <li><a href=""><i class="bi bi-person-lines-fill me-1"></i>PROFILE</a></li>
                  <li><a href="<?= BASEURL ?>logout/"><i class="bi bi-box-arrow-right me-1"></i>LOGOUT</a></li>
                </ul>
                <?php else:?>
                  <a href="#">HAI Guest</a>
                <ul class="dropdown">
                  <li><a href="<?=BASEURL?>login"><i class="bi bi-box-arrow-in-left me-1"></i>Login</a></li>
                </ul>
                <?php endif?>
              </li>
              
              
              <img src="https://img.icons8.com/color/48/user-male-circle--v1.png" class="navbar-icon bi-person smoothscroll" alt="">
            </ul>

            <a
              href="#"
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
              data-toggle="collapse"
              data-target="#main-navbar"
            >
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>
<section class="h-100 gradient-custom-2" style="padding-top: 100px;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center">
      <div class="col col-lg-9 col-xl-8">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-image:  url('<?= BASEURL; ?>images/pattern.jpg');">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 150px; z-index: 1">
              <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-dark text-body" data-mdb-ripple-color="dark" style="z-index: 1;">
                Edit profile
              </button>
            </div>
            <div class="ms-3" style="margin-top: 130px;">
              <h5>Andy Horwitz</h5>
              <p>New York</p>
            </div>
          </div>
          <div class="p-4 text-black bg-body-tertiary">
            <div class="d-flex justify-content-end text-center py-1 text-body">
              <div>
                <p class="mb-1 h5">253</p>
                <p class="small text-muted mb-0">Photos</p>
              </div>
              <div class="px-3">
                <p class="mb-1 h5">1026</p>
                <p class="small text-muted mb-0">Followers</p>
              </div>
              <div>
                <p class="mb-1 h5">478</p>
                <p class="small text-muted mb-0">Following</p>
              </div>
            </div>
          </div>
          <div class="card-body p-4 text-black">
            <div class="mb-5  text-body">
              <p class="lead fw-normal mb-1">About</p>
              <div class="p-4 bg-body-tertiary">
                <p class="font-italic mb-1">Web Developer</p>
                <p class="font-italic mb-1">Lives in New York</p>
                <p class="font-italic mb-0">Photographer</p>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>