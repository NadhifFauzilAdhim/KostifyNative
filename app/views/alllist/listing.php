
    <section
    class="hero-section d-flex justify-content-center align-items-center"
    id="section_1"
    style="background-image: url('<?=BASEURL?>images/loginbanner.png'); padding-bottom: 0px;"

  >

    <div class="container hero-section-container" >
      <div class="row pb-5">
        
        <div class="col-lg-8 col-12 mx-auto">
       

          <h3 class="text-center text-light mt-5"  data-aos="fade" data-aos-delay="300">
            Cari Disini
          </h3>
       
          <form
            action="/kostifynative/public/home/listing"
            method="GET"
            class="custom-form mt-4 pt-2 mb-5"
            role="search"
            data-aos="fade"
            data-aos-delay="300"
          
          >
            <div class="input-group input-group-lg">
              <span class="input-group-text bi-search" id="basic-addon1">
              </span>

              <input
                name="search"
                type="search"
                class="form-control"
                id="keyword"
                placeholder="Cari Lokasi, Nama dan Tipe Disini"
                aria-label="Search"
                <?php if(isset($_GET['search'])):?>
                value="<?php echo htmlspecialchars($_GET['search'] ?? '', ENT_QUOTES); ?>"
                <?php endif?>
              />

              <button type="submit" class="form-control">Search</button>
            </div>
          </form>
        </div>
      
      </div>
   
    </div>
  </section>

    <section class="explore-section section-padding" id="section_2">
      <div class="container-fluid">
        <div class="row mt-4">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button
                class="nav-link active"
                id="design-tab"
                data-bs-toggle="tab"
                data-bs-target="#kost-tab"
                type="button"
                role="tab"
                aria-controls="kost-tab"
                aria-selected="true"
              >
                Kost
              </button>
            </li>

            <li class="nav-item" role="presentation">
              <button
                class="nav-link"
                id="marketing-tab"
                data-bs-toggle="tab"
                data-bs-target="#paviliun-tab"
                type="button"
                role="tab"
                aria-controls="paviliun-tab"
                aria-selected="false"
              >
                Paviliun
              </button>
            </li>

            <li class="nav-item" role="presentation">
              <button
                class="nav-link"
                id="finance-tab"
                data-bs-toggle="tab"
                data-bs-target="#kontrakan-tab"
                type="button"
                role="tab"
                aria-controls="kontrakan-tab"
                aria-selected="false"
              >
                Kontrakan
              </button>
            </li>
            
            
          </ul>
        </div>
      </div>
         
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="tab-content" id="myTabContent">
              <div
                class="tab-pane fade show active"
                id="kost-tab"
                role="tabpanel"
                tabindex="0"
              >
                <div class="row">
                <?php
                    $kostItems = array_filter($data['lists'], function($list) {
                        return $list['pro_category'] == 'Kost';
                    });

                    if (empty($kostItems)): ?>
                    <h5>No data found</h5>
                    <?php else: ?>
                    <?php foreach ($kostItems as $list): ?>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 mt-4">
                        <div class="property-item mb-30">
                            <a href="home/detail/<?= htmlspecialchars($list['slug']) ?>" class="img">
                            <img src="<?= BASEURL ?>images/kamar1.png" alt="Image" class="img-fluid" />
                            </a>
                            <div class="property-content">
                            <span class="city d-block mb-3">
                                <?= htmlspecialchars($list['propertyname']) ?>
                                <span class="badge <?= $bg_color = ($list['type'] == 'putra') ? 'bg-warning' : 'bg-danger'; ?> rounded-pill ms-2">
                                <?= htmlspecialchars($list['type']) ?>
                                </span>
                            </span>
                            <div class="price mb-2">
                                <span><?= number_format($list['price'], 0, ',', '.') ?></u></strong>/Bulan</span>
                            </div>
                            <div>
                                <span class="d-block mb-2 text-black"><?= htmlspecialchars($list['location']) ?></span>
                                <span class="city d-block mb-3"><?= htmlspecialchars($list['region_name']) ?></span>
                                <div class="specs d-flex mb-4">
                                <span class="d-block d-flex align-items-center me-3">
                                    <span class="icon-bed me-2"></span>
                                    <span class="caption"><?= htmlspecialchars($list['available']) ?> Kamar Tersedia</span>
                                </span>
                                <span class="d-block d-flex align-items-center">
                                    <span class="icon-bath me-2"></span>
                                    <span class="caption">Kamar Mandi Luar</span>
                                </span>
                                </div>
                                <a href="home/detail/<?= htmlspecialchars($list['slug']) ?>" class="btn btn-primary py-2 px-3">See details</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
              </div>

              <div
                class="tab-pane fade"
                id="paviliun-tab"
                role="tabpanel"
                tabindex="0"
              >
              <div class="row">
                  
                  <?php
                    $kostItems = array_filter($data['lists'], function($list) {
                        return $list['pro_category'] == 'Paviliun';
                    });

                    if (empty($kostItems)): ?>
                   
                       <h1 class="text-center mt-5 mb-5">Huhu Ngga Ketemu &#128531;</h1>
                
                    <?php else: ?>
                    <?php foreach ($kostItems as $list): ?>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 mt-4">
                        <div class="property-item mb-30">
                            <a href="home/detail/<?= htmlspecialchars($list['slug']) ?>" class="img">
                            <img src="<?= BASEURL ?>images/kamar1.png" alt="Image" class="img-fluid" />
                            </a>
                            <div class="property-content">
                            <span class="city d-block mb-3">
                                <?= htmlspecialchars($list['propertyname']) ?>
                                <span class="badge <?= $bg_color = ($list['type'] == 'putra') ? 'bg-warning' : 'bg-danger'; ?> rounded-pill ms-2">
                                <?= htmlspecialchars($list['type']) ?>
                                </span>
                            </span>
                            <div class="price mb-2">
                                <span><?= number_format($list['price'], 0, ',', '.') ?></u></strong>/Bulan</span>
                            </div>
                            <div>
                                <span class="d-block mb-2 text-black"><?= htmlspecialchars($list['location']) ?></span>
                                <span class="city d-block mb-3"><?= htmlspecialchars($list['region_name']) ?></span>
                                <div class="specs d-flex mb-4">
                                <span class="d-block d-flex align-items-center me-3">
                                    <span class="icon-bed me-2"></span>
                                    <span class="caption"><?= htmlspecialchars($list['available']) ?> Kamar Tersedia</span>
                                </span>
                                <span class="d-block d-flex align-items-center">
                                    <span class="icon-bath me-2"></span>
                                    <span class="caption">Kamar Mandi Luar</span>
                                </span>
                                </div>
                                <a href="home/detail/<?= htmlspecialchars($list['slug']) ?>" class="btn btn-primary py-2 px-3">See details</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    
                  
               
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="kontrakan-tab"
                role="tabpanel"
                aria-labelledby="finance-tab"
                tabindex="0"
              >
                <div class="row">
                <?php
                    $kostItems = array_filter($data['lists'], function($list) {
                        return $list['pro_category'] == 'Kontrakan';
                    });

                    if (empty($kostItems)): ?>
                   
                       <h1 class="text-center mt-5 mb-5">Huhu Ngga Ketemu &#128531;</h1>
                
                    <?php else: ?>
                    <?php foreach ($kostItems as $list): ?>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 mt-4">
                        <div class="property-item mb-30">
                            <a href="home/detail/<?= htmlspecialchars($list['slug']) ?>" class="img">
                            <img src="<?= BASEURL ?>images/kamar1.png" alt="Image" class="img-fluid" />
                            </a>
                            <div class="property-content">
                            <span class="city d-block mb-3">
                                <?= htmlspecialchars($list['propertyname']) ?>
                                <span class="badge <?= $bg_color = ($list['type'] == 'putra') ? 'bg-warning' : 'bg-danger'; ?> rounded-pill ms-2">
                                <?= htmlspecialchars($list['type']) ?>
                                </span>
                            </span>
                            <div class="price mb-2">
                                <span><?= number_format($list['price'], 0, ',', '.') ?></u></strong>/Bulan</span>
                            </div>
                            <div>
                                <span class="d-block mb-2 text-black"><?= htmlspecialchars($list['location']) ?></span>
                                <span class="city d-block mb-3"><?= htmlspecialchars($list['region_name']) ?></span>
                                <div class="specs d-flex mb-4">
                                <span class="d-block d-flex align-items-center me-3">
                                    <span class="icon-bed me-2"></span>
                                    <span class="caption"><?= htmlspecialchars($list['available']) ?> Kamar Tersedia</span>
                                </span>
                                <span class="d-block d-flex align-items-center">
                                    <span class="icon-bath me-2"></span>
                                    <span class="caption">Kamar Mandi Luar</span>
                                </span>
                                </div>
                                <a href="home/detail/<?= htmlspecialchars($list['slug']) ?>" class="btn btn-primary py-2 px-3">See details</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    
                </div>
              </div>
            </div>
          </div>
        
         
        </div>
      </div>
    
    </section>

   
   
    <div class="site-footer">
      <div class="container ">
        <div class="row ">
          <div class="col-lg-4">
            <div class="widget">
              <h3>Contact</h3>
              <address>Jl. Ring Road Utara, Ngringin, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</address>
              <ul class="list-unstyled links">
                <li><a href="tel://085727785062">+62 85-7277-85062</a></li>
               
                <li>
                  <a href="mailto:info@mydomain.com">nadhiffauzil@students.amikom.ac.id</a>
                </li>
              </ul>
            </div>
      
          </div>
       
          <div class="col-lg-4">
            <div class="widget">
              <h3>Links</h3>
              <ul class="list-unstyled links">
                <li><a href="https://www.arabisgroup.cloud/">Arabis Group</a></li>
                <li><a href="https://ndfproject.my.id/">NDFProject</a></li>
              
              </ul>

             
            </div>
          </div>
          <div class="col-lg-4">
            <div class="widget">
              <h3>Dev </h3>
              <img src="images/kostifydev.png" alt="" width="300px">
             
            </div>
          </div>
        </div>

        <div class="row mt-5">
          <div class="col-12 text-center">
            
            <p>
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              . All Rights Reserved. &mdash; Kostify | <a href="https://www.arabisgroup.cloud/">Arabis Group</a> | <a href="https://ndfproject.my.id/">NDFProject</a>
             
            </p>
          
          </div>
        </div>
      </div>
    </div>

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <script src="<?=BASEURL?>js/bootstrap.bundle.min.js"></script>
    <script src="<?=BASEURL?>js/tiny-slider.js"></script>
    <script src="<?=BASEURL?>js/aos.js"></script>
    <script src="<?=BASEURL?>js/navbar.js"></script>
    <script src="<?=BASEURL?>js/counter.js"></script>
    <script src="<?=BASEURL?>js/custom.js"></script>
  </body>
</html>
