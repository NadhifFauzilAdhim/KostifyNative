<?php 

$countKost = 0;
$countKontrakan = 0;
$countPaviliun = 0;

foreach ($data['lists'] as $properti) {
    if ($properti['category_id'] === 1) {
        $countKost++;
    } elseif ($properti['category_id'] === 2) {
        $countKontrakan++;
    } elseif ($properti['category_id'] === 3) {
        $countPaviliun++;
    }
}
?>

<!-- POP UP Informasi -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel1">Informasi</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           Anda tidak akan pernah ketinggalan informasi terbaru tentang properti yang Anda minati. Kami memahami bahwa ketersediaan properti dapat berubah dengan cepat, dan itulah mengapa kami menyediakan pembaruan secara real-time agar Anda selalu dapat membuat keputusan yang tepat.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- POP UP sewa Property -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel2">Sewa Property</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           Anda dapat dengan mudah menemukan dan menyewa tempat tinggal yang sesuai dengan kebutuhan dan preferensi Anda. Kami memahami betapa pentingnya menemukan tempat tinggal yang nyaman dan cocok dengan gaya hidup Anda, dan itulah mengapa kami menyediakan solusi yang praktis dan efisien untuk membantu Anda mencapai hal tersebut.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- POP UP Bayar -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel3">Bayar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           Anda dapat mengelola pembayaran sewa properti dengan mudah dan efisien. Kami memahami betapa pentingnya kelancaran proses pembayaran dalam pengalaman menyewa tempat tinggal Anda, dan itulah mengapa kami menyediakan solusi yang praktis untuk membantu Anda dalam hal ini.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- POP UP TEMPATI -->
    <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel4">Tempati</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Anda dapat dengan mudah menempati tempat tinggal pilihan Anda dengan cepat dan tanpa ribet. Kami memahami betapa pentingnya memiliki tempat tinggal yang sesuai dengan kebutuhan dan preferensi Anda, dan itulah mengapa kami menyediakan solusi yang nyaman dan efisien untuk membantu Anda dalam proses ini
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <section
    class="hero-section d-flex justify-content-center align-items-center"
    id="section_1"
  

  >

    <div class="container hero-section-container" >
      <div class="row pb-5">
        
        <div class="col-lg-8 col-12 mx-auto">
          <img
            src="<?= BASEURL?>images/Kostifyop.png"
            alt=""
            width="200px"
            class="rounded mx-auto d-block pt-5"
            data-aos="fade"
            data-aos-delay="300"
            
          />

          <h4 class="text-center text-light"  data-aos="fade" data-aos-delay="300">
            Tempat terbaik mencari kos dan tempat tinggal yang sesuai dengan
            kebutuhan Anda.
          </h4>
       
          <form
            action="/kostifynative/public/"
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
                value="<?= htmlspecialchars($_GET['search'] ?? '', ENT_QUOTES); ?>"
                <?php endif?>
              />

              <button type="submit"  class="form-control">Search</button>
            </div>
          </form>
        </div>
      
      </div>
      <div class="header-shape pt-5">
        <svg
        class="waves"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 25 210 27"
        preserveAspectRatio="none"
        shape-rendering="auto"
      >
        <defs>
          <path
            id="gentle-wave"
            d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"
          />
        </defs>
        <g class="parallax">
            
            <use
              xlink:href="#gentle-wave"
              x="48"
              y="5"
              fill="rgba(0, 32, 74, 0.3)"
            />
            <use xlink:href="#gentle-wave" x="48" y="7" fill="#F2F4F6" />
          </g>
      </svg>
      </div>
    </div>
  </section>

    <section class="features-1">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="400">
            <div class="box-feature">
              <img src="<?= BASEURL?>images/checklist.png" alt="" width="70px">
              <h3 class="mb-3">Informasi </h3>
              <p>
                Dapatkan update real-time tentang ketersediaan properti .
              </p>
              <button type="button" class="btn btn-primary" id="showModal1Button">Selengkapnya</button>
            </div>
          </div>
          <div class="col-12 col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="300">
            <div class="box-feature">
              <img src="<?= BASEURL?>images/house.png" alt="" width="70px">
              <h3 class="mb-3">Sewa Property</h3>
              <p>
                Temukan dan sewa tempat tinggal yang sesuai dengan kebutuhanmu.
              </p>
              
              <button type="button" class="btn btn-primary" id="showModal2Button">Selengkapnya</button>
            </div>
          </div>
          <div class="col-12 col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="500">
            <div class="box-feature">
              <img src="<?= BASEURL?>images/Pay.png" alt="" width="70px">
              <h3 class="mb-3">Bayar</h3>
              <p>
                Kelola pembayaran sewa properti secara mudah dan efisien.
              </p>
              <button type="button" class="btn btn-primary" id="showModal3Button">Selengkapnya</button>
            </div>
          </div>
         
          <div class="col-12 col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="600">
            <div class="box-feature">
              <img src="<?= BASEURL?>images/deal.png" alt="" width="70px">
              <h3 class="mb-3">Tempati</h3>
              <p>
                Tempati Tempat tinggal pilihan anda <br><br>
              </p>
              <button type="button" class="btn btn-primary" id="showModal4Button">Selengkapnya</button>
            </div>
          </div>
        </div>
        <div class="row section-counter mt-5 pb-5 text-center">
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="300"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-dark"><?=$countKost?></span></span
              >
              <span class="caption text-black-50">KOST LIST</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="400"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-dark"><?=$countKontrakan?></span></span
              >
              <span class="caption text-black-50">KONTRAKAN LIST</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="500"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-dark"><?=$countPaviliun?></span></span
              >
              <span class="caption text-black-50">PAVILIUN LIST</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="600"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary"><?=count($data['lists'])?></span></span
              >
              <span class="caption text-black-50">TOTAL</span>
            </div>
          </div>
        </div>
      </div>
     
    </section>

    <div class="section " data-aos="fade-up" data-aos-delay="300">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-lg-6">
            <h2 class="font-weight-bold text-dark heading">
             Post Terbaru
            </h2>
          </div>
          <div class="col-lg-6 text-lg-end">
            <p>
              <a
                href="home/listing"
                class="btn btn-primary text-white py-3 px-4"
                >Lihat Semua</a
              >
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="property-slider-wrap">
              <div class="property-slider">
                <?php foreach($data['lists']as $list) :?>
                <div class="property-item">
                  <a href="home/detail/<?=$list['slug'] ?>" class="img">
                    <img src=" <?= BASEURL ?>images/kamar1.png" alt="Image" class="img-fluid" />
                  </a>
                 
                  <div class="property-content">
                    <span class="city d-block mb-3"><?=$list['propertyname']?><span class="badge <?= $bg_color = ($list['type'] == 'Putra') ? 'bg-primary' : 'bg-danger'; ?> rounded-pill ms-2"><?=$list['type']?></span></span>
                    <div class="price mb-2"><span><?= number_format( $list['price'], 0, ',', '.') ?></u></strong>/Bulan</span></div>
                    <div>
                      <span class="d-block mb-2 text-black"
                        ><?=$list['location']?></span
                      >
                      <span class="city d-block mb-3"><?=$list['region_name']?></span>

                      <div class="specs d-flex mb-4">
                        <span class="d-block d-flex align-items-center me-3">
                          <span class="icon-bed me-2"></span>
                          <span class="caption"><?=$list['available']?> Kamar Tersedia</span>
                        </span>
                        <span class="d-block d-flex align-items-center">
                          <span class="icon-bath me-2"></span>
                          <span class="caption">Kamar Mandi <?= htmlspecialchars($list['km']) ?></span>
                        </span>
                      </div>

                      <a
                        href="home/detail/<?=$list['slug'] ?>"
                        class="btn btn-primary py-2 px-3"
                        >See details</a
                      >
                    </div>
                  </div>
                </div>
               <?php endforeach?>
              </div>

              <div
                id="property-nav"
                class="controls"
                tabindex="0"
                aria-label="Carousel Navigation"
              >
                <span
                  class="prev"
                  data-controls="prev"
                  aria-controls="property"
                  tabindex="-1"
                  >Prev</span
                >
                <span
                  class="next"
                  data-controls="next"
                  aria-controls="property"
                  tabindex="-1"
                  >Next</span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    <div class="section sec-testimonials">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-md-6">
            <h2 class="font-weight-bold heading text-dark mb-4 mb-md-0">
              Ulasan Customer
            </h2>
          </div>
          <div class="col-md-6 text-md-end">
            <div id="testimonial-nav">
              <span class="prev" data-controls="prev">Prev</span>

              <span class="next" data-controls="next">Next</span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4"></div>
        </div>
        <div class="testimonial-slider-wrap">
          <div class="testimonial-slider">
            <div class="item">
              <div class="testimonial">
                <img
                  src="images/author.png"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <h3 class="h5 text-primary mb-4">Nadhif Fauzil Adhim</h3>
                <blockquote>
                  <p>
                    &ldquo;Saya sangat terkesan dengan pengalaman saya menggunakan aplikasi Kostify. Dari awal, proses pendaftaran hingga menemukan tempat tinggal yang sempurna sangatlah lancar dan intuitif. Aplikasi ini sangat membantu saya dalam mencari kos yang sesuai dengan kebutuhan saya di daerah kampus.&rdquo;
                  </p>
                </blockquote>
                <p class="text-black-50">Customer</p>
              </div>
            </div>

         

            <div class="item">
              <div class="testimonial">
                <img
                  src="<?= BASEURL?>images/author1.png"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <h3 class="h5 text-primary mb-4">Julian Kiyosaki H</h3>
                <blockquote>
                  <p>
                    &ldquo;Saya baru-baru ini menggunakan aplikasi Kostify untuk mencari tempat tinggal di kota yang baru saya tinggali. Secara keseluruhan, saya cukup puas dengan pengalaman penggunaan aplikasi ini. Fitur pencarian yang disediakan memungkinkan saya untuk dengan mudah menemukan properti yang sesuai dengan preferensi dan anggaran saya.&rdquo;
                  </p>
                </blockquote>
                <p class="text-black-50">Customer</p>
              </div>
            </div>

            <div class="item">
              <div class="testimonial">
                <img
                  src="<?= BASEURL?>images/author2.png"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
              
                </div>
                <h3 class="h5 text-primary mb-4">Dwi Ferdiyanto</h3>
                <blockquote>
                  <p>
                    &ldquo;Saya telah menggunakan aplikasi Kostify untuk mencari tempat tinggal di daerah perkotaan. Meskipun proses pendaftaran dan navigasi di dalam aplikasi cukup mudah, saya agak kecewa dengan keterbatasan properti yang tersedia. Saya berharap ada lebih banyak variasi properti yang ditawarkan.&rdquo;
                  </p>
                </blockquote>
                <p class="text-black-50">Customer</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section section-4 bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-5">
            <h2 class="font-weight-bold heading text-primary mb-4">
              ADS : KOST PUTRI JOGJA <span class="badge bg-danger rounded-pill ms-auto">Putri</span>
            </h2>
            <p class="text-black-50">
             Kost Nyaman, Bebas Akses 24 jam, Bersih Rapi, Ibu Kost ngga galak
            </p>
          </div>
        </div>
        <div class="row justify-content-between mb-5">
          <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
            <div class="img-about dots">
              <img src="property-image/kamar3.png" alt="Image" class="img-fluid" />
            </div>
          </div>
          <div class="col-lg-4">
            <div class="d-flex feature-h">
              <span class="wrap-icon me-3">
                <span class="icon-bed me-2"></span>
              </span>
              <div class="feature-text">
                <h3 class="heading">Kamar</h3>
                <p class="text-black-50">
                  2 Kamar Tersedia
                </p>
              </div>
            </div>

            <div class="d-flex feature-h">
              <span class="wrap-icon me-3">
                <span class="icon-bath me-2"></span>
              </span>
              <div class="feature-text">
                <h3 class="heading">Kamar Mandi</h3>
                <p class="text-black-50">
                  Kamar Mandi Luar
                </p>
              </div>
            </div>

            <div class="d-flex feature-h">
              <span class="wrap-icon me-3">
                <span class="icon-attach_money"></span>
              </span>
              <div class="feature-text">
                <h3 class="heading">Harga</h3>
                <p class="text-info">
                  <span class="fs-5 fw-bold">Rp.1.500.000</span>
                   / Bulan
                </p>
              </div>
            </div>
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
      // Menampilkan Modal
      document.getElementById('showModal1Button').addEventListener('click', function() {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal1'));
        myModal.show();
      });
  
      document.getElementById('showModal2Button').addEventListener('click', function() {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal2'));
        myModal.show();
      });

      document.getElementById('showModal3Button').addEventListener('click', function() {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal3'));
        myModal.show();
      });

       document.getElementById('showModal4Button').addEventListener('click', function() {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal4'));
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
