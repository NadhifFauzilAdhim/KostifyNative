<?php 
$paymentdata =  $data['getPaymentInfo'];
$cardinfo =  $data['cardinfo'];
?>
<div class="container">
                <div class="row mt-5">
                <div class="flasher text-center">
                <?php Flasher::flash()?>
                </div>
                
                <div class="alert alert-success text-center" role="alert">
               <strong><?=$paymentdata['name']?></strong> Sudah Melakukan Konfirmasi Pembayaran pada <?=$paymentdata['created_at']?>
                </div>
                
                
                    <div class="col-lg-4 mb-lg-0 mb-3">
                    <div class="card p-3">
                            <div class="img-box">
                                <img src="<?=BASEURL?>images/paymentlogo/bripayment.png" alt="" width="200px">
                            </div>
                            <div class="number">
                            <label class="fw-bold" for="">
                                <?= $cardinfo['bricardnumber'] ?? 'Metode Pembayaran Tidak Tersedia' ?>
                            </label>
                                </div>
                            <div class="d-flex align-items-center justify-content-between">
                                
                                <small><span class="fw-bold">Name:</span><span>  <label class="fw-bold" for="">
                                <?= $cardinfo['briname'] ?? '-' ?>
                            </label></span></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-lg-0 mb-3">
                    <div class="card p-3">
                            <div class="img-box">
                                <img src="<?=BASEURL?>images/paymentlogo/mandiripayment.png"
                                    alt="" width="200px">
                            </div>
                            
                            <div class="number">
                            <label class="fw-bold" for="">
                                <?= $cardinfo['mandiricardnumber'] ?? 'Metode Pembayaran Tidak Tersedia' ?>
                            </label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                               
                                <small><span class="fw-bold">Name:</span><span>  <label class="fw-bold" for="">
                                <?= $cardinfo['mandiriname'] ?? '-' ?>
                            </label></span></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-lg-0 mb-3">
                    <div class="card p-3">
                            <div class="img-box">
                                <img src="<?=BASEURL?>images/paymentlogo/bcapayment.png"
                                    alt="" width="200px">
                            </div>
                            <div class="number">
                            <label class="fw-bold" for="">
                                <?= $cardinfo['bcacardnumber'] ?? 'Metode Pembayaran Tidak Tersedia' ?>
                            </label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                
                                <small><span class="fw-bold">Name:</span><span>  <label class="fw-bold" for="">
                                <?= $cardinfo['bcaname'] ?? '-' ?>
                            </label></span></small>
                            </div>
                        </div>
                    </div>
                 
                        <div class="modal fade" id="imagepreview" tabindex="-1" aria-labelledby="imagepreviewLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imagepreviewLabel">Preview</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                        <img class="img-preview mb-3 col-sm-6e mt-2 img-fluid" src="<?=BASEURL?>public/transactions/<?=$paymentdata['image']?>" alt="">
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <?php if(!$paymentdata['status']):?>
                <div class="alert alert-warning text-center" role="alert">
                    Anda Belum melakukan Konfirmasi Pembayaran Masuk
                </div>
                <?php endif?>
                    <div class="col-lg-4 mb-lg-0 mb-3">
                        
                    <div class="card p-3 d-flex align-items-center">
                    <p>*Ketuk untuk Pertinjau</p>
                    <a  data-bs-toggle="modal" data-bs-target="#imagepreview" class="text-center"><img class="img-preview img-fluid mb-3 col-sm-6 property-image mt-2" src="<?=BASEURL?>public/transactions/<?=$paymentdata['image']?>" alt=""></a>
                    </div>
                    </div>
                    <div class="col-lg-8 mb-lg-0 mb-3">
                    <div class="card p-3">
                        <p class="h4 mb-0">Summary</p>
                            <p class="mb-0"><span class="fw-bold">Product:</span><span class="c-green">: <?=$paymentdata['propertyname']?></span></p>
                            <p class="mb-0"><span class="fw-bold">Price:</span><span class="c-green">: <strong>Rp. <?= number_format( $paymentdata['amount'], 0, ',', '.') ?></strong></span></p>
                            <p class="mb-0">Pembayaran di <?=$paymentdata['propertyname']?> </p>
                        </div>
                    <div class="card p-3 ">
                    <label for="" class="form__label">Bank</label>
                    <input class="form-control" type="text" value="<?=$paymentdata['bankname']?>" aria-label="readonly input example" readonly>
                    <label for="" class="form__label mt-2">No Transaksi</label>
                    <input class="form-control" type="text" value="<?=$paymentdata['transactionnumber']?>" aria-label="readonly input example" readonly>
                    <label for="" class="form__label mt-2">Nama Pengirim</label>
                    <input class="form-control" type="text" value="<?=$paymentdata['sendername']?>" aria-label="readonly input example" readonly>
                    <label for="" class="form__label mt-2">Tanggal Transaksi</label>
                    <input class="form-control" type="text" value="<?=$paymentdata['date']?>" aria-label="readonly input example" readonly>
                    <div class="row text-center mt-3 justify-content-center">
                        <div class="col-4">
                        <?php if(!$paymentdata['status']):?>
                        <form action="<?=BASEURL?>dashboard/paymentconfirm" method="POST">
                        <input type="hidden" value="<?=$_SESSION['csrf_token']?>" name="csrf_token">
                        <input type="hidden" value="<?=$paymentdata['id']?>" name="transaction_id">
                        <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
                        </form>
                        <?php else:?>
                        <button type="button" class="btn btn-success">Terkonfirmasi</button>
                        <?php endif?>
                        </div>
                        <div class="col-4">
                        <?php if(!$data['checkResident']):?>
                        <form action="<?=BASEURL?>dashboard/addresident" method="POST">
                        <input type="hidden" value="<?=$_SESSION['csrf_token']?>" name="csrf_token">
                        <input type="hidden" value="<?=$paymentdata['user_id']?>" name="user_id">
                        <input type="hidden" value="<?=$paymentdata['property_id']?>" name="property_id">
                        <button type="submit" class="btn btn-info">Tambahkan Ke Penyewa</button>
                        </form>
                        <?php else:?>
                        <button type="button" class="btn btn-success">Sudah Ditambahkan</button>
                        <?php endif?>
                    
                        </div>
                    </div>
                   
                    </div>
                    
                    </div>
                </div>
            </div>

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
 