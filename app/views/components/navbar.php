<body>
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
              <li class="active"><a href="/kostifynative/public/">Home</a></li>
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