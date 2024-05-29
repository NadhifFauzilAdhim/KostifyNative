
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
                                <h6 class="mb-0">3 Postingan</h6>
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
                        <h6 class="mb-0">Riwayat Pembayaran</h6>
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
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>25 Mar 2024</td>
                                    <td>INV-0456</td>
                                    <td>Muhajir Faturahman</td>
                                    <td>Rp1.200.000</td>
                                    <td ><a class="btn btn-sm btn-success" href="">Paid</a></td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>10 Apr 2024</td>
                                    <td>INV-0876</td>
                                    <td>Julian Kiyosaki H</td>
                                    <td>Rp1.200.000</td>
                                    <td ><a class="btn btn-sm btn-success" href="">Paid</a></td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>15 May 2024</td>
                                    <td>INV-0234</td>
                                    <td>Dwi Ferdiyanto</td>
                                    <td>Rp1.300.000</td>
                                    <td ><a class="btn btn-sm btn-success" href="">Paid</a></td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>20 Jun 2024</td>
                                    <td>INV-0987</td>
                                    <td>Rif'aa Surososastro S</td>
                                    <td>Rp1.200.000</td>
                                    <td ><a class="btn btn-sm btn-success" href="">Paid</a></td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>05 Jul 2024</td>
                                    <td>-</td>
                                    <td>Suci Prasetia Ningrum</td>
                                    <td>Rp1.200.000</td>
                                    <td ><a class="btn btn-sm btn-danger" href="">Un Paid</a></td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
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
                                <h6 class="mb-0">Komentar Post</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="images/author1.png" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Julian Kiyosaki H</h6>
                                        <small>2 hari lalu</small>
                                    </div>
                                    <span>Waduhh jadi pengen</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="images/author2.png" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Dwi Ferdiyanto</h6>
                                        <small>1 hari lalu</small>
                                    </div>
                                    <span>Boleh bawa ortu engga?</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="images/suci.png" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Suci Prasetia Ningrum</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>ada ngga kosan yang gratis ?</span>
                                </div>
                            </div>
                           
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
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-light rounded h-100 p-4">
                        
                            <a href="<?=BASEURL?>home/detail/<?=$property['slug']?>" class="img">
                                <img src="<?=BASEURL?>images/kamar1.png" alt="Image" class="img-fluid" />
                            </a>
                            <span class="city d-block mb-3 mt-3 fw-bold"><?=$property['propertyname']?> <span class="badge bg-warning rounded-pill ms-auto">Putra</span></span>
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
            