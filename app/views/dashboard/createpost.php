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
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                        <?php Flasher::flash()?>
                            <h5 class="mb-4 text-center">Buat Post Baru</h5>
                            <form method="post" enctype="multipart/form-data" action="<?=BASEURL?>dashboard/storePost">
                                <div class="mb-3">
                                    <label for="propertyname"  class="form-label">Nama Tempat Tinggal</label>

                                    <input type="text" class="form-control" id="propertyname" name="propertyname">
                                   
                                </div>
                                <label for="slug" class="form-label">Custom Link</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3">https://kostify.my.id/detail/</span>
                                    <input type="text" class="form-control" id="slug" name="slug" required>
                                    <div id="slugFeedback" class="invalid-feedback">
                                        Slug sudah digunakan, silakan gunakan yang lain.
                                    </div>
                                    <div id="slugFeedbackValid" class="valid-feedback">
                                        Slug tersedia.
                                    </div>
                                </div>
                                <label for="category" class="form-label">Jenis Tempat Tinggal</label>
                                <div class="input-group mb-3">
                                    
                                    <select class="form-select" aria-label="Default select example" name="category" id="category">
                                        <option selected>Pilih Jenis Tempat Tinggal</option>
                                        <?php foreach($data['getcategories'] as $category):?>
                                            <option value="<?=$category['id']?>"><?=$category['pro_category']?></option>
                                        <?php endforeach?>
                                    </select>

                                </div>
                                <label for="type" class="form-label">Jenis</label>
                                <div class="input-group mb-3">
                                    
                                    <select class="form-select " aria-label="Default select example" name="type" id="type">
                                        <?php foreach($data['gettype'] as $type):?>
                                            <option value="<?=$type['id']?>"><?=$type['type_name']?></option>
                                        <?php endforeach?>
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="available"  class="form-label">Jumlah Tersedia</label>
                                    <input type="text" class="form-control" id="available" name="available">
                                </div>
                                <div class="mb-3">
                                    <label for="km"  class="form-label">Kamar Mandi</label>
                                    <input type="text" class="form-control" id="km" name="km">
                                </div>
                                <div class="mb-3">
                                    <label for="price"  class="form-label">Harga</label>
                                    <input type="text" class="form-control" id="price" name="price">
                                </div>
                                <label for="payment_type" class="form-label">Tipe Pembayaran</label>
                                <div class="input-group mb-3">
                                    
                                    <select class="form-select " aria-label="Default select example" name="payment_type" id="payment_type">
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
                                    
                                    <select class="form-select " aria-label="Default select example" name="region" id="region">
                                    <?php foreach($data['getregion'] as $region){?>
                                        <option value="<?=$region['id']?>"><?=$region['region_name']?></option>
                                      <?php }?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="location"  class="form-label">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="location" name="location">
                                </div>
                                <div class="mb-3">
                                    <label for="facility" class="form-label">Tulis tentang tempat tinggal</label>
                                    <input id="facility" type="hidden" name="facility">
                                    <trix-editor input="facility"></trix-editor>
                                </div>
                                <div class="mb-3">
                                    <div class="container mt-5">
                                      <div class="card">
                                          <div class="card-body">
                                            <label for="image" class="form-label">Upload Gambar Poster (max 5 mb)</label>
                                            <img class="img-preview img-fluid mb-3 col-sm-6" src="" alt="">
                                            <input class="form-control " type="file" id="image" name="image" onchange="previewImage()">
                                           
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
        function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
    imgPreview.style.display='block';
    const ofReader = new FileReader();
    ofReader.readAsDataURL(image.files[0]);
    ofReader.onload = function(oFREvent){
        imgPreview.src= oFREvent.target.result;
    }
}
    </script>

<script>
$(document).ready(function() {
    $('#slug').on('change', function() {
        var slug = $(this).val();
        $.ajax({
            url: '<?= BASEURL; ?>dashboard/checkSlug',
            type: 'POST',
            data: {slug: slug},
            success: function(response) {
                if(response == '1') {
                    $('#slug').removeClass('is-valid').addClass('is-invalid');
                    $('#slugFeedback').show();
                    $('#slugFeedbackValid').hide();
                } else {
                    $('#slug').removeClass('is-invalid').addClass('is-valid');
                    $('#slugFeedback').hide();
                    $('#slugFeedbackValid').show();
                }
            }
        });
    });
});
</script>
</body>

</html>

