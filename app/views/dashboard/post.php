  <!-- Konfirmasi Hapus -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel2">Set Post Privasi</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body text-center">
          <img
                    src="<?= BASEURL?>/images/privacy.png" 
                    class="custom-block-image-featured img-fluid mx-auto d-block"
                    alt=""
                    width="200px"
                  />
                  <br>
        <p>Set Privacy</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Apakah Anda yakin ingin menghapus post ini?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center"><strong>Aksi ini akan menghapus</strong> </p>
                <p class="text-center"><i class="fa-regular fa-circle-xmark"></i> Menghapus <strong class="text-danger">Postingan</strong></p>
                <p class="text-center"><i class="fa-regular fa-circle-xmark"></i> Menghapus <strong class="text-danger">Komentar</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
            </div>
          </div>
        </div>
      </div>
            <div class="flasher text-center">
            <?php Flasher::flash()?>
            </div>
            
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                   
                    <div class="col-sm-6 col-xl-3">
                            <div class="ms-3">
                                
                                <a class="btn btn-sm btn-primary" href="<?=BASEURL?>dashboard/createpost"><i class="fa fa-pen-to-square text-light"></i> Buat Post Baru</a>
                            </div>
                    </div>
                </div>
            </div>

          
          
        
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <?php foreach($data['getpropery'] as $list):?>
                        <?php 
                        $image_filenames = $list['image']; 
                        $images = explode(',', $image_filenames);
                        ?>
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-light rounded h-100 p-4">

                            <a href="detail.html" class="img">
                                <img src="<?= !empty($images[0]) ? BASEURL . 'uploads/' . $images[0] : BASEURL . 'images/kamar1.png' ?>" alt="Image" class="img-fluid" style=" height: 280px; object-fit: cover;"/>
                            </a>
                            <span class="city d-block mb-3 mt-3 fw-bold"><?=htmlspecialchars($list['propertyname'])?><span class="badge <?= $bg_color = ($list['type'] == 1 || $list['type'] == 3) ? 'bg-primary' : 'bg-danger'; ?> rounded-pill ms-2"><?=$list['type_name']?></span></span>
                            <div class="price mb-2"><span>Rp. <?= number_format( $list['price'], 0, ',', '.') ?></span></div>
                            <div>



                                <div class="specs d-flex mb-4">
                                    <span class="d-block d-flex align-items-center me-3">
                                        <i class="fa fa-bed me-2" ></i>
                                        <h6 class="mb-0"><?=$list['available']?> Kamar</h6>
                                       
                                    </span>
                                    <span class="d-block d-flex align-items-center me-3">
                                        <i class="fa fa-bath me-2" ></i>
                                        <h6 class="mb-0">Km <?=$list['km']?></h6>
                                       
                                    </span> 
                                  
                                </div>
                                <div class="specs d-flex mb-4 ">
                                    <span class="d-block d-flex align-items-center me-3">
                                        
                                        <a class="btn btn-sm btn-warning" href="postedit.html"> <i class="fa-regular fa-pen-to-square me-1"></i>Edit</a>
                                       
                                    </span>
                                    <span class="d-block d-flex align-items-center me-3">
                                        <form action="<?=BASEURL?>dashboard/visibility" method="POST">
                                            <input type="hidden" name="visibility" value="<?= $list['visibility'] == 0 ? 1 : 0 ?>">
                                            <input type="hidden" name="postid" value="<?=$list['id']?>">
                                            <button type="submit" class="btn btn-sm btn-info <?= $list['visibility'] == 1 ? 'btn-info' : 'btn-danger' ?>"><i class="bi <?= $list['visibility'] == 1 ? 'bi-eye' : 'bi-eye-slash' ?> me-1"></i><?= $list['visibility'] == 1 ? 'Public' : 'Private' ?></button>
                                        </form>
                                    </span>
                                    
                                        <div class="btn-group">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                  Action
                                                </button>
                                        <ul class="dropdown-menu text-center">
                                                    <li><button class="btn btn-sm btn-danger" id="showModal1Button"><i class="fa-solid fa-trash me-1"></i>Hapus</button></li>
                                                    
                                        </ul>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php endforeach?>
                 
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-12 text-center">
                            <p>
                            Copyright &copy;
                                <script>
                                  document.write(new Date().getFullYear());
                                </script>
                                 &mdash;  Develop with &#10084; by  <a href="https://www.arabisgroup.cloud/">Arabis Group</a> | <a href="https://ndfproject.my.id/">NDFProject</a>
                               
                              </p>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="<?=BASEURL?>js/bootstrap.bundle.min.js"></script>
    <script src="<?=BASEURL?>js/main.js"></script>
    <script>

        // Function to show modal when any button with class 'showModal1Button' is clicked
        var showModalButtons = document.querySelectorAll('#showModal1Button');
        showModalButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal1'));
                myModal.show();
            });
           
        });
         document.getElementById('showModal2Button').addEventListener('click', function() {
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal2'));
                 myModal.show();
            });
    </script>
</body>

</html>
