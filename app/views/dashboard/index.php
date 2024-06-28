            <?php if($data['userauth']['is_verified'] == 0):?>
            <div class="alert alert-warning text-center" role="alert">
            Akun anda belum terverifikasi, silahkan verifikasi terlebih dahulu
            </div>
            <?php endif?>
            <!-- <div class="alert alert-primary text-center" role="alert">
            Ini adalah Snapshot dari sistem kami. Mungkin terdapat beberapa masalah harap laporkan.
            </div> -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow p-3 rounded text-center  p-4">
                            <i class="fa fa-home fa-3x text-primary ms-3"></i>
                            <div class="ms-3">
                                <p class="mb-2">Post</p>
                                <h6 class="mb-0"><?=count($data['getpropery'])?> Post</h6>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow p-3 rounded text-center  p-4">
                            <i class="fa fa-user fa-3x text-primary ms-3"></i>
                            <div class="ms-3">
                                <p class="mb-2">Penyewa</p>
                                <h6 class="mb-0"><?=$data['residentsCount']['total_Resident']?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow p-3 rounded text-center  p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary ms-3 "></i>
                            <div class="ms-3">
                                <p class="mb-2">Bulan ini : <?= date('F') ?></p>
                                <h6 class="mb-0">Rp. <?= number_format( $data['monthlyRevenue']['total_sales'], 0, ',', '.') ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow p-3 rounded text-center  p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary ms-3"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Pendapatan</p>
                                <h6 class="mb-0">Rp. <?= number_format( $data['revenue']['revenue'], 0, ',', '.') ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          
            <div class="container-fluid pt-4 px-4">
                <div class="card shadow p-3 text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Riwayat Pembayaran [60 Hari]</h6>
                        <a href="<?=BASEURL?>dashboard/payment">Show All</a>
                    </div>
                    <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Paid Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['getPaymentStat'] as $payment):?>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td><?=$payment['created_at']?></td>
                                    <td><?=$payment['name']?></td>
                                    <td><?=$payment['invoice']?></td>
                                    <td>Rp. <?= number_format( $payment['amount'], 0, ',', '.') ?></td>
                                    <td><a class="btn btn-sm <?= $payment['status'] ? 'btn-success' : 'btn-danger' ?>" href=""><?= $payment['status'] ? 'Confirm' : 'Not Confirm' ?></a></td>
                                    <td><a class="btn btn-sm <?= $payment['paid_status']  ? 'btn-success' : 'btn-danger' ?>" href=""><?= $payment['paid_status'] ? 'paid' : 'UnPaid' ?></a></td>
                                    <?php if($payment['paid_status']):?>
                                    <td><a class="btn btn-sm btn-primary" href="<?=BASEURL?>dashboard/paymentdetail/<?=$payment['transactionurl']?>">lihat</a></td>
                                    <?php endif?>
                                </tr>
                                <?php endforeach?>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 card shadow p-3 rounded p-4">
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
                        <div class="h-100 card shadow p-3 rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Request</h6>
                                <a href="<?=BASEURL?>dashboard/request">Show All</a>
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
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 card shadow p-3 rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Kalender</h6>
                               
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                   
                </div>
            </div>

            
            
            