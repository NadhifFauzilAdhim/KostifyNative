<?php 
    $list = $data['lists'];
  
    ?>
  
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel1">Ajukan Penyewaan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Permintaan Anda akan dikirimkan kepada pemilik properti. Pastikan untuk memeriksa pilihan Anda dengan teliti sebelum mengirimkan permintaan. Untuk melihat status permintaan Anda, silakan masuk ke dashboard akun Anda.
            <form action="<?=BASEURL?>home/addrequest" method="POST">
            <div class="mb-3"> 
              <input type="hidden" class="form-control" id="property_id" name="property_id" value="<?=$list['id']?>">
            </div>
            <div class="mb-3">
              <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?=$list['user_id']?>"> 
            </div>
            <br> <p class="text-warning">Ketuk tombol "Konfirmasi" untuk Melanjutkan.</p>
            <button type="submit" class="btn btn-primary">Konfirmasi</button>
          </form>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
          </div>
        </div>
      </div>
    </div>

  
    <div
      class="hero page-inner overlay"
      style="background-image: url('<?= BASEURL?>images/kamar1.png')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up"><?= $list['propertyname']?><span class="badge <?= $bg_color = ($list['type'] == 'putra') ? 'bg-warning' : 'bg-danger'; ?> rounded-pill ms-2"><?= $list['type']?></span></h1>
            <hp class="heading" data-aos="fade-up"><?= $list['location']?></hp>
           
          </div>
        </div>
      </div>
    </div>

    <div class="section"  data-aos="fade" data-aos-delay="300">
      <div class="container">
        <div class="row text-left mb-5 text-center">
          <div class="col-12">
            <h2 class="font-weight-bold heading text-primary mb-4">Detail <?= $list['pro_category']?></h2>
          </div>
          <div class="col-lg-12 ">
            <q>
            <?= $list['facility']?>
            </q>
          </div>
          
        </div>
      </div>
    </div>

    <div class="section pt-0" >
      <div class="container">
     
        <div class="row justify-content-between mb-2">
          <div class="col-lg-4 "  data-aos="fade" data-aos-delay="300">
            <div class="d-flex feature-h">
              <span class="wrap-icon me-3">
                <span class="icon-bed me-2"></span>
              </span>
              <div class="feature-text">
                <h3 class="heading">Kamar</h3>
                <p class="text-black-50">
                <?= $list['available']?> Kamar Tersedia
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4"  data-aos="fade" data-aos-delay="300">
            <div class="d-flex feature-h">
              <span class="wrap-icon me-3">
                <span class="icon-bath me-2"></span>
              </span>
              <div class="feature-text">
                <h3 class="heading">Kamar Mandi</h3>
                <p class="text-black-50">
                  Kamar Mandi <?= $list['km']?>
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4"  data-aos="fade" data-aos-delay="300">
            <div class="d-flex feature-h">
              <span class="wrap-icon me-3">
                <span class="icon-attach_money"></span>
              </span>
              <div class="feature-text">
                <h3 class="heading">Harga</h3>
                <p class="text-info">
                <span class="fs-5 fw-bold"><?= number_format( $list['price'], 0, ',', '.') ?></u></strong></span>
                   / Bulan
                </p>
              </div>
            </div>
          </div>
          </div>  
          <div class="row justify-content-start mb-5">
            <div class="col-lg-4" data-aos="fade" data-aos-delay="300">
              <div class="d-flex feature-h">
                <span class="wrap-icon me-3">
                  <svg  xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 92.3 132.3"><path fill="#1a73e8" d="M60.2 2.2C55.8.8 51 0 46.1 0 32 0 19.3 6.4 10.8 16.5l21.8 18.3L60.2 2.2z"/><path fill="#ea4335" d="M10.8 16.5C4.1 24.5 0 34.9 0 46.1c0 8.7 1.7 15.7 4.6 22l28-33.3-21.8-18.3z"/><path fill="#4285f4" d="M46.2 28.5c9.8 0 17.7 7.9 17.7 17.7 0 4.3-1.6 8.3-4.2 11.4 0 0 13.9-16.6 27.5-32.7-5.6-10.8-15.3-19-27-22.7L32.6 34.8c3.3-3.8 8.1-6.3 13.6-6.3"/><path fill="#fbbc04" d="M46.2 63.8c-9.8 0-17.7-7.9-17.7-17.7 0-4.3 1.5-8.3 4.1-11.3l-28 33.3c4.8 10.6 12.8 19.2 21 29.9l34.1-40.5c-3.3 3.9-8.1 6.3-13.5 6.3"/><path fill="#34a853" d="M59.1 109.2c15.4-24.1 33.3-35 33.3-63 0-7.7-1.9-14.9-5.2-21.3L25.6 98c2.6 3.4 5.3 7.3 7.9 11.3 9.4 14.5 6.8 23.1 12.8 23.1s3.4-8.7 12.8-23.2"/></svg>
                </span>
                <div class="feature-text">
                  <h3 class="heading">Lokasi</h3>
                  <a href=""></a>
                  <p class="text-black-50">
                  <?= $list['location']?> <a href="https://www.google.com/maps/place/<?= $list['location']?>">Lihat Maps</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4" data-aos="fade" data-aos-delay="300">
              <div class="d-flex feature-h">
                <span class="wrap-icon me-3">
                <img src="<?=BASEURL?>images/author.png" alt="" width="80px" class="rounded-circle"
                >
                </span>
                <div class="feature-text">
                  <h3 class="heading">Owner</h3>
                  <p class="text-black-50">
                  <?= $list['name']?> <br>
                    <a href=""><?= $list['phone']?></a>
                  </p>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-4" data-aos="fade" data-aos-delay="300">
              <div class="d-flex feature-h">
                <span class="wrap-icon me-3" style="background-color: greenyellow;" >
                  <span class="icon-check-square-o"></span>
                </span>
                <div class="feature-text">
                  <h3 class="heading">Anjukan Penyewaan</h3>
                  <button type="button" class="btn btn-primary" id="showModal1Button">Minta</button>
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>

      <div class="section-">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <iframe
                        src="https://maps.google.com/maps?q=<?= $list['location']?>/@-7.7897521,110.3473608,17z&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0"
                        style="border: 0; width: 100%; height: 500px"
                        allowfullscreen
                    ></iframe>
            </div>
          </div>
        </div>
      </div>

      <div class="section">
        <div class="container">
          <div class="row">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
              <img src="<?=BASEURL?>images/kamar1.png" alt="Image" class="img-fluid" />
            </div>
            <div class="col-md-4 mt-lg-5" data-aos="fade-up" data-aos-delay="100">
              <img src="<?=BASEURL?>images/kamar2.png" alt="Image" class="img-fluid" />
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
              <img src="<?=BASEURL?>images/kamar3.png" alt="Image" class="img-fluid" />
            </div>
          </div>
        
        </div>
      </div>
      <div class="section bg-light">
        <div class="container mt-5 ">
          <div class="row  d-flex justify-content-center">
              <div class="col-md-12">
                  <div class="headings d-flex justify-content-between align-items-center mb-3">
                      <h5>Comment</h5>
                  </div>
                 <?php if($data['comments']):?>
                  <?php foreach($data['comments'] as $comment):?>
                  <div class="card p-3 ">
                      <div class="d-flex justify-content-between align-items-center">
                    <div class="user d-flex flex-row align-items-center">
                      <img src="https://img.icons8.com/color/48/user-male-circle--v1.png" width="30" class="user-img rounded-circle mx-3">
                      <span><span class="font-weight-bold text-primary"><?= $comment['name']?> <span class="badge <?= $bg_color = ($comment['user_id'] == $list['user_id']) ? 'bg-warning' : 'bg-primary'; ?> rounded-pill ms-3"><?= $role = ($comment['user_id'] == $list['user_id']) ? 'Owner' : 'User'; ?></span></span> <br> <small class="font-weight-bold"> <?= $comment['comment_body']?></small></span>
                    </div>
                    <small>2 days ago</small>
                    </div>
                    <div class="action d-flex justify-content-between mt-2 align-items-center">
                      <div class="reply px-4">
                          <small>Remove</small>
                          <small>Reply</small>
                          
                      </div>
                      <div class="icons align-items-center">
                          <i class="fa fa-star text-warning"></i>
                          <i class="fa fa-check-circle-o check-icon"></i>
                      </div>
                    </div>
                  </div>
                  <?php endforeach?>
                  <?php else:?>
                    <h1 class="text-center">Tidak Ada Komentar</h1>
                  <?php endif?>
              </div>
          </div>
      </div>
      </div>

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
                <img src="<?= BASEURL?>images/kostifydev.png" alt="" width="300px">
                
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
  
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    <script>
      
        document.getElementById('showModal1Button').addEventListener('click', function() {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal1'));
        myModal.show();
      });
  
    </script>

    
    <script src="<?= BASEURL?>js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASEURL?>js/tiny-slider.js"></script>
    <script src="<?= BASEURL?>js/aos.js"></script>
    <script src="<?= BASEURL?>js/navbar.js"></script>
    <script src="<?= BASEURL?>js/counter.js"></script>
    <script src="<?= BASEURL?>js/custom.js"></script>
  </body>
</html>