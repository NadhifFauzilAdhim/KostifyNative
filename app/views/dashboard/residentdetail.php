<div class="container">
            <div class="flasher text-center">
            <?php Flasher::flash()?>
            </div>

            <!-- Modal -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Pembatalan Transaksi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin membatalkan transaksi ini?
                    </div>
                    <div class="modal-footer">
                        <form action="<?=BASEURL?>/dashboard/deleteTransaction" method="POST">
                            <input type="hidden" id="deleteTransactionId" name="id">
                            <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token']?>">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger">Ya, Batalkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            
                <div class="row mt-3">
                <div class="col-12 mt-4">
                        <div class="card shadow p-3">
                            <p class="mb-0 fw-bold h4 text-center">Penyewa <?=htmlspecialchars($data['resident_detail']['name'])?></p>
                        </div>
                    </div>
                 
                    <div class="col-lg-3 mb-lg-0 mb-3">

                        <div class="card shadow p-3">
                            <div class="img-box text-center">
                                <img src="https://img.icons8.com/color/48/user-male-circle--v1.png" alt="" width="100px">
                            </div>
                            <div class="number text-center">
                                <label class="fw-bold" for=""><?=htmlspecialchars($data['resident_detail']['name'])?></label>
                            </div>
                            <div class="text-center">
                                <small><span class="fw-bold">Sejak:</span><span><?=htmlspecialchars($data['resident_detail']['created_at'])?></span></small>
                               
                            </div>
                        </div>
                      
                    </div>
                    <div class="col-lg-6 mb-lg-0 mb-3">
                      
                        <div class="card shadow p-3">
                            <ul>
                                <li><i class="fa-solid fa-house me-1"></i>Property : <?=htmlspecialchars($data['resident_detail']['propertyname'])?></li>
                                <li class="mt-1"><i class="fa-solid fa-money-check-dollar me-1"></i>Tagihan / <?php if($data['resident_detail']['payment_type'] == 1){echo "Bulan";}elseif($data['resident_detail']['payment_type'] == 0){echo " Tunai";}else{echo $data['resident_detail']['payment_type'] . " Bulan";}?> : Rp. <?= number_format($data['resident_detail']['price'], 0, ',', '.') ?></li>
                                <li class="text-info mt-1"><i class="fa-solid fa-clock-rotate-left me-1"></i>Pembayaran Terakhir : <?=$data['last_payment']['created_at']?></li>
                                <li class="text-warning mt-1"><i class="fa-solid fa-receipt me-1"></i>Tagihan Selanjutnya : <?=$data['duedate']?> </li>
                                <li class="mt-1"><i class="fa-regular fa-clock me-1"></i><?= (new DateTime())->diff(new DateTime($data['duedate']))->days . ' hari sebelum tagihan selanjutnya' ?></li>
                                
                            </ul>

                        </div>
                      
                    </div>
                    <div class="col-lg-3 mb-lg-0 mb-3">
                        <div class="card shadow p-3">
                                <label for="amount" class="form-label">Kirim tagihan</label>
                                <small>*tagihan</small>
                                <input type="text" class="form-control" name="amount" value="<?=$data['resident_detail']['price']?>"readonly>
                                <button type="button" class="btn btn-sm btn-info btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#confirmationModal"><i class="bi bi-pencil-square me-2"></i></i>Kirim</button>
                                
                       </div>
                      
                    </div>
                    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModal"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <div class="img-box text-center">
                                <img src="https://img.icons8.com/color/48/user-male-circle--v1.png" alt="" width="100px">
                                 </div>
                                <div class="number text-center mb-4">
                                    <label class="fw-bold" for=""><?=htmlspecialchars($data['resident_detail']['name'])?></label>
                                </div>
                                <form action="<?=BASEURL?>dashboard/addTransaction" method="POST">
                                <div class="mb-3">
                                <label for="amount" class="form-label">Nominal tagihan</label>
                                <small>*masukan nominal</small>
                                <input type="text" class="form-control" name="amount" value="<?=$data['resident_detail']['price']?>"required>
                                </div>
                                <div class="mb-3">
                                <label for="description" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" name="description" placeholder="Masukan Keterangan Disini" required>
                                </div>
                                <input type="hidden" value="<?=$data['resident_detail']['user_id']?>" name="user_id">
                                <input type="hidden" value="<?=$data['resident_detail']['property_id']?>" name="property_id">
                                <input type="hidden" id="csrf_token" name="csrf_token" value="<?= $_SESSION['csrf_token']?>">
                                <button type="sumbit" class="btn btn-sm btn-info btn-info mt-1" ><i class="bi bi-person-x me-2"></i>Kirim</button>
                                </form>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Pengiriman Tagihan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin mengirim tagihan dengan nominal <strong id="confirmAmount"></strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" id="confirmSubmit">Kirim</button>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-12 mt-4">
                        <div class="card shadow p-3">
                            <p class="mb-0 fw-bold h4 text-center">Payment Status</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card shadow p-3">
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
                            <?php foreach($data['getPaymentStat'] as $payment): ?>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td><?=$payment['created_at']?></td>
                                    <td><?=$payment['invoice']?></td>
                                    <td>Rp. <?= number_format( $payment['amount'], 0, ',', '.') ?></td>
                                    <td><a class="btn btn-sm <?= $payment['status'] ? 'btn-success' : 'btn-danger' ?>" href=""><?= $payment['status'] ? 'Confirm' : 'Not Confirm' ?></a></td>
                                    <td><a class="btn btn-sm <?= $payment['paid_status']  ? 'btn-success' : 'btn-danger' ?>" href=""><?= $payment['paid_status'] ? 'paid' : 'UnPaid' ?></a></td>
                                    <?php if($payment['paid_status']): ?>
                                    <td><a class="btn btn-sm btn-primary" href="<?=BASEURL?>dashboard/paymentdetail/<?=$payment['transactionurl']?>">lihat</a></td>
                                    <?php else: ?>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="<?=$payment['id']?>">Batalkan</button>
                                    </td>
                                    <?php endif ?>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                            
                        </table>
                    </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                var confirmDeleteModal = document.getElementById('confirmDeleteModal');
                confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget;
                    var transactionId = button.getAttribute('data-id');
                    var modalInput = confirmDeleteModal.querySelector('#deleteTransactionId');
                    modalInput.value = transactionId;
                });
            });
            </script>

      