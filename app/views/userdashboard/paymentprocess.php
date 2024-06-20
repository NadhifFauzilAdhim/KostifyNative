<?php 
$paymentdata = $data['getPaymentInfo'];
$paysuccess = $data['getSuccessPayment'];
?>
<div class="container">
                <div class="row mt-5">
                <div class="flasher text-center">
                <?php Flasher::flash()?>
                </div>
                <?php if($paymentdata['paid_status']):?>
                <div class="alert alert-success text-center" role="alert">
               Anda Sudah Melakukan Konfirmasi Pembayaran pada <?=$paysuccess['created_at']?>
                </div>
                <?php else:?>
                    <div class="alert alert-success text-center" role="alert">
                    Silahkan Lakukan Konfirmasi Pembayaran
                </div>
                <?php endif?>
                    <div class="col-lg-4 mb-lg-0 mb-3">
                    <div class="card p-3">
                            <div class="img-box">
                                <img src="<?=BASEURL?>images/paymentlogo/bripayment.png" alt="" width="200px">
                            </div>
                            <div class="number">
                            <label class="fw-bold" for="">
                                <?= $paymentdata['bricardnumber'] ?? 'Metode Pembayaran Tidak Tersedia' ?>
                            </label>
                                </div>
                            <div class="d-flex align-items-center justify-content-between">
                                
                                <small><span class="fw-bold">Name:</span><span>  <label class="fw-bold" for="">
                                <?= $paymentdata['briname'] ?? '-' ?>
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
                                <?= $paymentdata['mandiricardnumber'] ?? 'Metode Pembayaran Tidak Tersedia' ?>
                            </label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                               
                                <small><span class="fw-bold">Name:</span><span>  <label class="fw-bold" for="">
                                <?= $paymentdata['mandiriname'] ?? '-' ?>
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
                                <?= $paymentdata['bcacardnumber'] ?? 'Metode Pembayaran Tidak Tersedia' ?>
                            </label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                
                                <small><span class="fw-bold">Name:</span><span>  <label class="fw-bold" for="">
                                <?= $paymentdata['bcaname'] ?? '-' ?>
                            </label></span></small>
                            </div>
                        </div>
                    </div>
                    <?php if($paymentdata['paid_status'] && !empty($paysuccess)):?>
                        <div class="modal fade" id="imagepreview" tabindex="-1" aria-labelledby="imagepreviewLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imagepreviewLabel">Preview</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                        <img class="img-preview mb-3 col-sm-6e mt-2 img-fluid" src="<?=BASEURL?>public/transactions/<?=$paysuccess['image']?>" alt="">
                                        </div>  
                                    </div>
                                </div>
                            </div>
                    <div class="col-lg-4 mb-lg-0 mb-3">
                    <div class="card p-3 d-flex align-items-center">
                    <p>*Ketuk untuk Pertinjau</p>
                    <a  data-bs-toggle="modal" data-bs-target="#imagepreview" class="text-center"><img class="img-preview img-fluid mb-3 col-sm-6 property-image mt-2" src="<?=BASEURL?>public/transactions/<?=$paysuccess['image']?>" alt=""></a>
                    
                        </div>
                    </div>
                    <div class="col-lg-8 mb-lg-0 mb-3">
                    <div class="card p-3 ">
                    <p class="h4 mb-0">Summary</p>
                    <p class="mb-0"><span class="fw-bold">Product:</span><span class="c-green">: <?=$paymentdata['propertyname']?></span></p>
                    <p class="mb-0"><span class="fw-bold">Price:</span><span class="c-green">:<strong>Rp. <?= number_format( $paymentdata['amount'], 0, ',', '.') ?></strong></span></p>
                    <p class="mb-0">Pembayaran Kost di <?=$paymentdata['propertyname']?> </p>
                        </div>
                    <div class="card p-3 ">
                    <label for="" class="form__label">Bank</label>
                    <input class="form-control" type="text" value="<?=$paysuccess['bankname']?>" aria-label="readonly input example" readonly>
                    <label for="" class="form__label mt-2">No Transaksi</label>
                    <input class="form-control" type="text" value="<?=$paysuccess['transactionnumber']?>" aria-label="readonly input example" readonly>
                    <label for="" class="form__label mt-2">Nama Pengirim</label>
                    <input class="form-control" type="text" value="<?=$paysuccess['sendername']?>" aria-label="readonly input example" readonly>
                    <label for="" class="form__label mt-2">Tanggal Transaksi</label>
                    <input class="form-control" type="text" value="<?=$paysuccess['date']?>" aria-label="readonly input example" readonly>
                        </div>
                   
                        
                    </div>
                    <?php endif?>
                    
                    <div class="col-12 mt-4">
                        <div class="card p-3">
                            <p class="mb-0 fw-bold h4">Bukti Pembayaran</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card p-3">
                            <div class="card-body border p-0">
                                <p>
                                    <a class="btn btn-primary w-100 h-100 d-flex align-items-center justify-content-between"
                                        data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                        aria-controls="collapseExample">
                                        <span class="fw-bold">Summary</span>
                                        
                                        </span>
                                    </a>
                                </p>
                                <div class="collapse show p-3 pt-0" id="collapseExample">
                                    <div class="row">
                                        <div class="col-8">
                                      
                                            <p class="h4 mb-0">Summary</p>
                                            <p class="mb-0"><span class="fw-bold">Product:</span><span class="c-green">: <?=$paymentdata['propertyname']?></span></p>
                                            <p class="mb-0"><span class="fw-bold">Price:</span><span
                                                    class="c-green">: <strong>Rp. <?= number_format( $paymentdata['amount'], 0, ',', '.') ?></strong></span></p>
                                            <p class="mb-0">Pembayaran Kost di <?=$paymentdata['propertyname']?> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(!$paymentdata['paid_status']):?>
                            <div class="card-body border p-0">
                                <p>
                                    <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between"
                                        data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                        aria-controls="collapseExample">
                                        <span class="fw-bold">Bukti Pembayaran</span>
                                       
                                    </a>
                                </p>
                                <div class="collapse p-3 pt-0 show" id="collapseExample">
                                    <div class="row">
                                        <div class="col-lg-5 mb-lg-0 mb-3">
                                            <p class="h4 mb-0">Summary</p>
                                            <p class="mb-0"><span class="fw-bold">Product:</span><span class="c-green">: <?=$paymentdata['propertyname']?></span></p>
                                            <p class="mb-0"><span class="fw-bold">Price:</span><span
                                                    class="c-green">:<strong>Rp. <?= number_format( $paymentdata['amount'], 0, ',', '.') ?></strong></span></p>
                                            <p class="mb-0">Pembayaran Kost di <?=$paymentdata['propertyname']?> </p>
                                            <div class="image">
                                                <img class="img-preview img-fluid mb-3 col-sm-6 property-image mt-2" src="" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <form action="<?=BASEURL?>dashboard/storeTransaction" class="form" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                <input type="hidden" value="<?=$_SESSION['csrf_token']?>" name="csrf_token">
                                                <input type="hidden" value="<?=$paymentdata['id']?>" name="transaction_id">
                                                    <div class="col-8">
                                                        <div class="form__div">
                                                            <input type="text" class="form-control" name="transactionnumber" placeholder="" required>
                                                            <label for="" class="form__label">No Transaksi</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form__div">
                                                        <select class="form-select" name="bank_name" required>
                                                            <option selected>Pilih Bank</option>
                                                            <option value="BRI">BRI</option>
                                                            <option value="BCA">BCA</option>
                                                            <option value="Mandiri">Mandiri</option>
                                                            <option value="BTN">BTN</option>
                                                            <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                        <label for="" class="form__label">Nama Bank</label>
                                                    </div>
        
                                                    <div class="col-6 mt-2">
                                                        <div class="form__div">
                                                            <input type="date" class="form-control" name="date" placeholder=" " required>
                                                            <label for="" class="form__label">Tanggal Transaksi</label>
                                                        </div>
                                                    </div>
        
                                                    <div class="col-6 mt-2">
                                                        <div class="form__div">
                                                            <input type="text" class="form-control" name="sendername" placeholder=" " required>
                                                            <label for="" class="form__label">Nama Pengirim</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3 mt-2">
                                                        <div class="form__div">
                                                        <label for="formFile" class="form-label">Upload Bukti Pembayaran Disini</label>
                                                        <input class="form-control " type="file" id="image" name="image" onchange="previewImage('#image', '.img-preview')" required>
                                                        </div>
                                                    </div>
                                                    
                                    
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary w-100">Sumbit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif?>
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
 