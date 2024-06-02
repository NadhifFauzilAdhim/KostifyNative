            <?php if($data['userauth']['is_verified'] == 0):?>
            <div class="alert alert-warning text-center" role="alert">
            Akun anda belum terverifikasi, silahkan verifikasi terlebih dahulu
            </div>
            <?php endif?>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center  p-4">
                            <i class="fa fa-home fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Post</p>
                                <h6 class="mb-0"><?=count($data['getpropery'])?> Post</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center  p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Bulan ini</p>
                                <h6 class="mb-0">Rp.1.200.000</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center  p-4">
                            <i class="fa fa-user fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Penghuni</p>
                                <h6 class="mb-0">5</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center  p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Pendapatan</p>
                                <h6 class="mb-0">Rp.6.100.000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Riwayat Pembayaran [60 Hari]</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Resident</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['getPaymentStat'] as $payment):?>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>

                                    <td><?=$payment['created_at']?></td>
                                    <td><?=$payment['invoice']?></td>
                                    <td><?=$payment['name']?></td>
                                    <td>Rp. <?= number_format( $payment['amount'], 0, ',', '.') ?></td>
                                    <td><a class="btn btn-sm <?= $payment['status'] == 1 ? 'btn-success' : 'btn-danger' ?>" href=""><?= $payment['status'] == 1 ? 'Paid' : 'Unpaid' ?></a></td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>

                               <?php endforeach?>
                            </tbody>

                            
                        </table>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-8">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Komentar Post [ 30 hari ]</h6>
                                <a href="">Show All</a>
                            </div>
                            <?php foreach($data['getcomment'] as $comment):?>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="https://img.icons8.com/color/48/user-male-circle--v1.png" alt="" style="width: 40px; height: 40px;">

                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0"><?=$comment['username']?></h6>
                                        
                                        <small><?=$comment['created_at']?></small>
                                        
                                    </div>



                                    <span><?=htmlspecialchars($comment['comment_body'])?></span> <br>
                                    <a href="<?=BASEURL?>home/detail/<?=$comment['slug']?>"><span>Reply<span class="icon-share-square-o"></span></span></a>
                                    
                                </div>
                            </div>

                           <?php endforeach?>
                           
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Request</h6>
                                <a href="request.html">Show All</a>
                            </div>
                            <?php foreach($data['getrequest'] as $request):?>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0"><?=$request['name']?></h6>
                                        <small><?= (new DateTime())->diff(new DateTime($request['created_at']))->days . ' hari yang lalu' ?></small>
                                    </div>
                                    <span><?=$request['propertyname']?></span>
                                </div>
                            </div>
                            <?php endforeach?>
                        </div>
                    </div>
                   
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 ">
                    <?php foreach( $data['getpropery'] as $property):?>
                        <?php 
                        $image_filenames = $property['image']; 
                        $images = explode(',', $image_filenames);
                        ?>
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-light rounded h-100 p-4">
                        
                            <a href="<?=BASEURL?>home/detail/<?=$property['slug']?>" class="img">
                                <img src="<?= !empty($images[0]) ? BASEURL . 'uploads/' . $images[0] : BASEURL . 'images/kamar1.png' ?>" alt="Image" class="img-fluid" style=" height: 280px; object-fit: cover;"/>
                            </a>
                            <span class="city d-block mb-3 mt-3 fw-bold"><?=$property['propertyname']?> <span class="badge <?= $bg_color = ($property['type'] == 1) ? 'bg-primary' : 'bg-danger'; ?> rounded-pill ms-2"><?=$property['type_name']?></span></span>
                            <div class="price mb-2"><span><?= number_format( $property['price'], 0, ',', '.') ?></u></strong>/Bulan</span></div>
                            <div>
                                <div class="specs d-flex mb-4">
                                    <span class="d-block d-flex align-items-center me-3">
                                        <i class="fa fa-bed me-2" ></i>
                                        <h6 class="mb-0">4 Kamar</h6>
                                       
                                    </span>
                                    <span class="d-block d-flex align-items-center me-3">
                                        <i class="fa fa-bath me-2" ></i>
                                        <h6 class="mb-0">Km Luar</h6>
                                       
                                    </span> 
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach?>
                    
                 
                </div>
            </div>
            
            