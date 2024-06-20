<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                <div class="col-sm-6 col-xl-6">
                        <div class="card shadow p-3 rounded d-flex align-items-center  p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="text-center">
                                <p class="mb-2">Total Tagihan</p>
                                <h6 class="mb-0">Rp. <?= number_format( $data['getbill']['Total_tagihan'], 0, ',', '.') ?></h6>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-xl-6">
                        <div class="card shadow p-3 rounded d-flex align-items-center  p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="text-center">
                                <p class="mb-2">Total Pengeluaran</p>
                                <h6 class="mb-0">Rp. <?= number_format( $data['sumPayment']['Total_pengeluaran'], 0, ',', '.') ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          
            <div class="container-fluid pt-4 px-4">
                <div class="card shadow p-3 text-center rounded p-4">
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
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Paid Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['getpayment'] as $payment):?>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td><?=$payment['created_at']?></td>
                                    <td><?=$payment['invoice']?></td>
                                    <td>Rp. <?= number_format( $payment['amount'], 0, ',', '.') ?></td>
                                    <td><a class="btn btn-sm <?= $payment['status'] ? 'btn-success' : 'btn-danger' ?>" href=""><?= $payment['status'] ? 'Confirm' : 'Not Confirm' ?></a></td>
                                    <td><a class="btn btn-sm <?= $payment['paid_status']  ? 'btn-success' : 'btn-danger' ?>" href=""><?= $payment['paid_status'] ? 'paid' : 'UnPaid' ?></a></td>
                                    
                                    <td><a class="btn btn-sm btn-primary" href="<?=BASEURL?>dashboard/paymentprocess/<?=$payment['transactionurl']?>">Bayar</a></td>
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
                        <div class="h-100 card shadow p-3 rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Komentar Kamu</h6>
                                <a href="">Show All</a>
                            </div>
                            <?php foreach($data['getcomment'] as $comment):?>
                                <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="https://img.icons8.com/color/48/user-male-circle--v1.png" alt="" style="width: 40px; height: 40px;">

                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0"><?=$comment['username']?> di <a href="<?=BASEURL?>home/detail/<?=$comment['slug']?>"><?=$comment['propertyname']?></a></h6>
                                        <small><?=$comment['created_at']?></small>
                                    </div>
                                    <span><?=htmlspecialchars($comment['comment_body'])?></span> <br>
                                </div>
                            </div>
                            <?php endforeach?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 shadow p-3 rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Your Request</h6>
                                <a href="request.html">Show All</a>
                            </div>
                            <?php foreach($data['getrequest'] as $request):?>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0"><?=htmlspecialchars($request['propertyname'])?></h6>
                                        <small>Tersedia <?=htmlspecialchars($request['available'])?></small>
                                    </div>
                                    <span>Status : <?php
                                    if ($request['status'] == 0) {
                                        echo 'Menunggu ..';
                                    } elseif ($request['status'] == 1) {
                                        echo 'Diterima';
                                    } elseif ($request['status'] == -1) {
                                        echo 'Ditolak';
                                    }
                                     ?></span>
                                </div>
                            </div>
                            <?php endforeach?>
                        </div>
                    </div>
                   
                </div>
            </div>