<div class="container-fluid pt-4 px-4">
                <div class="row g-4 ">
                   
                        <?php 
                        $image_filenames = $data['getpost']['image']; 
                        $images = explode(',', $image_filenames);
                        ?>
                    <div class="col-sm-12 col-xl-4">
                        <div class="card shadow p-3 rounded h-100 p-4">
                                <img src="<?= !empty($images[0]) ? BASEURL . 'uploads/' . $images[0] : BASEURL . 'images/kamar1.png' ?>" alt="Image" class="img-fluid property-image" style=" height: 280px; object-fit: cover;"/>
                                <h6 class="mt-2 text-center">Poster</h6>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="card shadow p-3 rounded h-100 p-4">
                                <img src="<?= !empty($images[0]) ? BASEURL . 'uploads/' . $images[1] : BASEURL . 'images/kamar1.png' ?>" alt="Image" class="img-fluid property-image" style=" height: 280px; object-fit: cover;"/>
                                <h6 class="mt-2 text-center">Gambar 1</h6>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="card shadow p-3 rounded h-100 p-4">
                                <img src="<?= !empty($images[0]) ? BASEURL . 'uploads/' . $images[2] : BASEURL . 'images/kamar1.png' ?>" alt="Image" class="img-fluid property-image" style=" height: 280px; object-fit: cover;"/>
                                <h6 class="mt-2 text-center">Gambar 2</h6>
                        </div>
                    </div>
             
                    
                 
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="card shadow p-3 rounded h-100 p-4">
                        <?php Flasher::flash()?>
                            <h5 class="mb-4 text-center">Edit Post <br><strong class="text-primary "><?=$data['getpost']['propertyname']?></strong></h5>
                            <form method="post" enctype="multipart/form-data" action="<?=BASEURL?>dashboard/editpost">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?=$data['getpost']['id']?>">
                                <div class="mb-3">
                                    <label for="propertyname"  class="form-label">Nama Tempat Tinggal</label>

                                    <input type="text" class="form-control" id="propertyname" name="propertyname" value="<?=$data['getpost']['propertyname']?>">
                                   
                                </div>
                                
                                <label for="category" class="form-label">Jenis Tempat Tinggal</label>
                                <div class="input-group mb-3">
                                    
                                    <select class="form-select" aria-label="Default select example" name="category" id="category" required>
                                        <option selected>Pilih Jenis Tempat Tinggal</option>
                                        <?php foreach($data['getcategories'] as $category):?>
                                            <option value="<?=$category['id']?>"><?=$category['pro_category']?></option>
                                        <?php endforeach?>
                                    </select>

                                </div>
                                <label for="type" class="form-label">Jenis</label>
                                <div class="input-group mb-3">
                                    
                                    <select class="form-select " aria-label="Default select example" name="type" id="type" required>
                                        <?php foreach($data['gettype'] as $type):?>
                                            <option value="<?=$type['id']?>"><?=$type['type_name']?></option>
                                        <?php endforeach?>
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="available"  class="form-label">Jumlah Tersedia</label>
                                    <input type="text" class="form-control" id="available" name="available" value="<?=$data['getpost']['available']?>" required> 
                                </div>
                                <div class="mb-3">
                                    <label for="km"  class="form-label">Kamar Mandi</label>
                                    <input type="text" class="form-control" id="km" name="km" value="<?=$data['getpost']['km']?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price"  class="form-label">Harga</label>
                                    <input type="text" class="form-control" id="price" name="price" value="<?=$data['getpost']['price']?>"required> 
                                </div>
                                <label for="payment_type" class="form-label">Tipe Pembayaran</label>
                                <div class="input-group mb-3">
                                    
                                    <select class="form-select " aria-label="Default select example" name="payment_type" id="payment_type" required>
                                      <option value="0">Tunai</option>
                                      <option value="1">/Bulan</option>
                                      <option value="2">/2 Bulan</option>
                                      <option value="3">/3 Bulan</option>
                                      <option value="4">/4 Bulan</option>
                                      <option value="5">/5 Bulan</option>
                                      <option value="6">/6 Bulan</option>
                                      <option value="7">/7 Bulan</option>
                                      <option value="8">/8 Bulan</option>
                                      <option value="9">/9 Bulan</option>
                                      <option value="10">/10 Bulan</option>
                                      <option value="11">/11 Bulan</option>
                                      <option value="12">/12 Bulan</option>
                                    </select>

                                </div>
                                <label for="region" class="form-label">Lokasi</label>
                                <div class="input-group mb-3">
                                    
                                    <select class="form-select " aria-label="Default select example" name="region" id="region" required>
                                    <?php foreach($data['getregion'] as $region){?>
                                        <option value="<?=$region['id']?>"><?=$region['region_name']?></option>
                                      <?php }?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="location"  class="form-label">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="location" name="location" value="<?=$data['getpost']['location']?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="facility" class="form-label">Tulis tentang tempat tinggal</label>
                                    <input id="facility" type="hidden" name="facility" value="<?=$data['getpost']['facility']?>" required>
                                    <trix-editor input="facility"></trix-editor>
                                </div>
                                <div class="mb-3">
                                    <div class="container mt-5">
                                      <div class="card">
                                          <div class="card-body">
                                            <label for="image" class="form-label">Upload Gambar Poster <em>*Jpg Png Webp Jpeg</em></label>
                                            <div class="d-flex justify-content-center mt-3">
                                            <img class="img-preview img-fluid mb-3 col-sm-6 property-image" src="" alt="">
                                            </div>
                                            
                                            <input class="form-control " type="file" id="image" name="image" onchange="previewImage('#image', '.img-preview')">
                                           
                                          </div>
                                      </div>
                                  </div>
                                  </div>
                                  <div class="mb-3">
                                    <div class="container mt-5">
                                      <div class="card">
                                          <div class="card-body">
                                            <label for="image2" class="form-label">Upload Gambar 1 <em>*Jpg Png Webp Jpeg</em></label>
                                            <div class="d-flex justify-content-center mt-3">
                                            <img class="img-preview2 img-fluid mb-3 col-sm-6 property-image" src="" alt="">
                                            </div>
                                            <input class="form-control " type="file" id="image2" name="image2" onchange="previewImage('#image2', '.img-preview2')">
                                          </div>
                                      </div>
                                  </div>
                                  </div>
                                  <div class="mb-3">
                                    <div class="container mt-5">
                                      <div class="card">
                                          <div class="card-body">
                                            <label for="image3" class="form-label">Upload Gambar 2 <em>*Jpg Png Webp Jpeg</em></label>
                                            <div class="d-flex justify-content-center mt-3">
                                            <img class="img-preview3 img-fluid mb-3 col-sm-6 property-image" src="" alt="">
                                            </div>
                                            <input class="form-control " type="file" id="image3" name="image3" onchange="previewImage('#image3', '.img-preview3')">
                                          </div>
                                      </div>
                                  </div>
                                  </div>
                                  
                                  
                               
                                <button type="submit" class="btn btn-primary">Buat Post</button>
                            </form>
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
    </script>

    <script>
        function previewImage(inputId, previewId){
            const imageInput = document.querySelector(inputId);
            const imgPreview = document.querySelector(previewId);
            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(imageInput.files[0]);
            ofReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>


</body>



