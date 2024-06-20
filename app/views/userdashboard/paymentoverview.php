            <?php 
                $list = $data['lists'];
            
                $image_filenames = $data['lists']['image']; 
                $images = explode(',', $image_filenames);
                
                ?>
            <div class="container-fluid pt-4 px-4">
            <div class="flasher text-center">
            <?php Flasher::flash()?>
            </div>
                <div id="" class="alert alert-warning text-center" role="alert" >
                Rincian
                </div>
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                        <div class="card shadow p-3 rounded d-flex align-items-center  p-4">
                            <i class="fa fa-calendar fa-3x text-primary ms-3"></i>
                            <div class="ms-3 text-center">
                                <p class="mb-2">Pembayaran</p>
                                <h6 class="mb-0"><?php if($list['payment_type'] == 1){echo "Bulanan";}elseif($list['payment_type'] == 0){echo " Tunai";}else{echo $list['payment_type'] . " Bulan";}?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="card shadow p-3 rounded d-flex align-items-center  p-4">
                            <i class="fa fa-credit-card fa-3x text-primary ms-3"></i>
                            <div class="ms-3 text-center">
                                <p class="mb-2">Harga</p>
                                <h6 class="mb-0">Rp. <?= number_format( $list['price'], 0, ',', '.') ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="card shadow p-3 rounded d-flex align-items-center  p-4">
                            <img class=" me-lg-2 ms-4" src="<?= !empty($images[0]) ? BASEURL . 'uploads/' . $images[0] : BASEURL . 'images/kamar1.png' ?>" alt="" width="45px">
                            <div class="ms-3 text-center">
                                <p class="mb-2">Property</p>
                                <h6 class="mb-0"><?=htmlspecialchars($list['propertyname'])?></h6>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="row g-4 mt-1">
                    <div class="col-sm-12 col-xl-12 ">
                        <div class="card shadow p-3 rounded d-flex align-items-center  p-4">
                             <i class="fa-solid fa-location-dot fa-2x text-success"></i>
                            <div class="ms-3">
                                <p class="mb-2">Lokasi</p>
                                <h6 class="mb-0"><?=htmlspecialchars($list['location'])?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-12 ">
                        <div class="card shadow p-3 rounded d-flex align-items-center  p-4">
                              <i class="fa-solid fa-circle-info fa-2x text-warning"></i>
                            <div class="ms-3">
                                <p class="mb-2">Deskripsi</p>
                                <h6 class="mb-0"><?=$list['facility']?></h6>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="row g-4 mt-1">
               <div class="col-sm-12 col-xl-4">
                   <div class="card rounded h-100 p-4">
                           <img src="<?= !empty($images[0]) ? BASEURL . 'uploads/' . $images[0] : BASEURL . 'images/kamar1.png' ?>" alt="Image" class="img-fluid property-image" style=" height: 280px; object-fit: cover;"/>
                          
                   </div>
               </div>
               <div class="col-sm-12 col-xl-4">
                   <div class="card rounded h-100 p-4">
                           <img src="<?= !empty($images[0]) ? BASEURL . 'uploads/' . $images[1] : BASEURL . 'images/kamar1.png' ?>" alt="Image" class="img-fluid property-image" style=" height: 280px; object-fit: cover;"/>
                           
                   </div>
               </div>
               <div class="col-sm-12 col-xl-4">
                   <div class="card rounded h-100 p-4">
                           <img src="<?= !empty($images[0]) ? BASEURL . 'uploads/' . $images[2] : BASEURL . 'images/kamar1.png' ?>" alt="Image" class="img-fluid property-image" style=" height: 280px; object-fit: cover;"/>
                           
                   </div>
               </div>
               <div class="row g-4 mt-1">
                    <div class="col-sm-12 col-xl-12 ">
                        <div class="bg-light rounded d-flex align-items-center  p-4">
                           <form action="<?=BASEURL?>dashboard/confirm" method="POST">
                            <input type="hidden" id="csrf_token" name="csrf_token" value="<?= $_SESSION['csrf_token']?>">
                            <input type="hidden" name="amount" value="<?=$list['price']?>">
                            <input type="hidden" name="property_id" value="<?=$list['id']?>">
                            <?php if(empty(Flasher::flash())): ?>
                            <button type="submit" class="btn btn-primary">Konfirmasi Dan Lanjutkan</button>
                            <?php endif ?>
                           </form>
                        </div>
                    </div>
                </div>
        
               
            
           </div>
            </div>

          
            