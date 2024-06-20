<div class="container">
            <div class="flasher text-center">
            <?php Flasher::flash()?>
            </div>
                     <div class="col-12 mt-4">
                        <div class="card p-3">
                            <p class="mb-0 fw-bold h4">Metode Pembayaran</p>
                        </div>
                    </div>
                <div class="row pt-5">
                    <div class="col-lg-4 mb-lg-0 mb-3">
                        <div class="card p-3">
                            <div class="img-box">
                                <img src="<?=BASEURL?>images/paymentlogo/bripayment.png" alt="" width="200px">
                            </div>
                            <div class="number">
                            <label class="fw-bold" for="">
                                <?= $data['cardinfo']['bricardnumber'] ?? 'Belum ada data' ?>
                            </label>
                                </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <small><span class="fw-bold">Name:</span><span>  <label class="fw-bold" for="">
                                <?= $data['cardinfo']['briname'] ?? 'Belum ada data' ?>
                            </label></span></small>
                            </div>
                            <button type="button" class="btn btn-sm btn-info btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#brichange"><i class="bi bi-pencil-square me-2"></i></i>Ubah</button>
                        </div>
                    </div>
                    <div class="modal fade" id="brichange" tabindex="-1" aria-labelledby="brichange" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="brichange">Account Pembayaran BRI</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <div class="text-center">
                                <img src="<?=BASEURL?>images/paymentlogo/bripayment.png" alt="" class="text-center" width="300px">
                                </div>
                                    <form action="<?=BASEURL?>/dashboard/editAccount" method="POST">
                                    <input type="hidden" id="csrf_token" name="csrf_token" value="<?= $_SESSION['csrf_token']?>">
                                    <div class="mb-3">
                                        <label for="cardnumber" class="form-label">Card Number</label>
                                        <input type="text" class="form-control" id="cardnumber" name="cardnumber" value=" <?= $data['cardinfo']['bricardnumber'] ?? 'Belum ada data' ?>">
                                        <div id="cardnumber" class="form-text">Pastikan Nomor Benar</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $data['cardinfo']['briname'] ?? 'Belum ada data' ?>">
                                    </div>
                                    <input type="hidden" name="cardselected" value="1">
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                    </form>
                                </div>
                                
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
                                <?= $data['cardinfo']['mandiricardnumber'] ?? 'Belum ada data' ?>
                            </label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <small><span class="fw-bold">Name:</span><span>  <label class="fw-bold" for="">
                                <?= $data['cardinfo']['mandiriname'] ?? 'Belum ada data' ?>
                            </label></span></small>
                            </div>
                            <button type="button" class="btn btn-sm btn-info btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#mandirichange"><i class="bi bi-pencil-square me-2"></i></i>Ubah</button>
                        </div>
                    </div>
                    <div class="modal fade" id="mandirichange" tabindex="-1" aria-labelledby="mandirichange" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mandirichange">Account Pembayaran Mandiri</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <div class="text-center">
                                <img src="<?=BASEURL?>images/paymentlogo/mandiripayment.png" alt="" class="text-center" width="300px">
                                </div>
                                    <form action="<?=BASEURL?>/dashboard/editAccount" method="POST">
                                    <input type="hidden" id="csrf_token" name="csrf_token" value="<?= $_SESSION['csrf_token']?>">
                                    <div class="mb-3">
                                        <label for="cardnumber" class="form-label">Card Number</label>
                                        <input type="text" class="form-control" id="cardnumber" name="cardnumber" value=" <?= $data['cardinfo']['mandiricardnumber'] ?? 'Belum ada data' ?>">
                                        <div id="cardnumber" class="form-text">Pastikan Nomor Benar</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $data['cardinfo']['mandiriname'] ?? 'Belum ada data' ?>">
                                    </div>
                                    <input type="hidden" name="cardselected" value="2">
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                    </form>
                                </div>
                                
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
                                <?= $data['cardinfo']['bcacardnumber'] ?? 'Belum ada data' ?>
                            </label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <small><span class="fw-bold">Name:</span><span>  <label class="fw-bold" for="">
                                <?= $data['cardinfo']['bcaname'] ?? 'Belum ada data' ?>
                            </label></span></small>
                            </div>
                            <button type="button" class="btn btn-sm btn-info btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#bcachange"><i class="bi bi-pencil-square me-2"></i></i>Ubah</button>
                        </div>
                    </div>
                    <div class="modal fade" id="bcachange" tabindex="-1" aria-labelledby="bcachange" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="bcachange">Account Pembayaran Mandiri</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <div class="text-center">
                                <img src="<?=BASEURL?>images/paymentlogo/bcapayment.png" alt="" class="text-center" width="300px">
                                </div>
                                    <form action="<?=BASEURL?>/dashboard/editAccount" method="POST">
                                    <input type="hidden" id="csrf_token" name="csrf_token" value="<?= $_SESSION['csrf_token']?>">
                                    <div class="mb-3">
                                        <label for="cardnumber" class="form-label">Card Number</label>
                                        <input type="text" class="form-control" id="cardnumber" name="cardnumber" value=" <?= $data['cardinfo']['bcacardnumber'] ?? 'Belum ada data' ?>">
                                        <div id="cardnumber" class="form-text">Pastikan Nomor Benar</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $data['cardinfo']['bcaname'] ?? 'Belum ada data' ?>">
                                    </div>
                                    <input type="hidden" name="cardselected" value="3">
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="card p-3">
                            <p class="mb-0 fw-bold h4">Status Pembayaran</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card p-3">
                            <div class="card-body border p-0">
                                <p>
                                    <a class="btn btn-primary w-100 h-100 d-flex align-items-center justify-content-between"
                                        data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                        aria-controls="collapseExample">
                                        <span class="fw-bold">Qris</span>
                                        
                                        </span>
                                    </a>
                                </p>
                                <div class="collapse p-3 pt-0" id="collapseExample">
                                    <div class="row">
                                        <div class="col-8">
                                      
                                            <p class="h4 mb-0">Summary</p>
                                            <p class="mb-0"><span class="fw-bold">Product:</span><span class="c-green">: Kost Jogja Mami Siti</span></p>
                                            <p class="mb-0"><span class="fw-bold">Price:</span><span
                                                    class="c-green">:Rp. 1.200.000</span></p>
                                            <p class="mb-0">Pembayaran Kost di Kostify</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border p-0">
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
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>