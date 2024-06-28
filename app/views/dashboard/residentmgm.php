<div class="container">
    <!-- Modal -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan Penyewa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus Penyewa ini?
                            </div>
                            <div class="modal-footer">
                                <form action="<?=BASEURL?>dashboard/deleteResident" method="POST">
                                    <input type="hidden" id="deleteResidentId" name="id">
                                    <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token']?>">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                <div class="flasher text-center">
                <?php Flasher::flash()?>
                </div>
                <div class="col-12 mt-4">
                        <div class="card shadow p-3">
                            <p class="mb-0 fw-bold h4 text-center">Penyewa</p>
                        </div>
                    </div>
                    <?php foreach( $data['getResident'] as $resident): ?>
                    <div class="col-lg-3 mb-lg-0 mb-3">
                        <div class="card shadow p-3">
                            <div class="img-box text-center">
                                <img src="https://img.icons8.com/color/48/user-male-circle--v1.png" alt="" width="100px">
                            </div>
                            <div class="number text-center">
                                <label class="fw-bold" for=""><?=$resident['name']?></label>
                            </div>
                            <div class="text-center">
                                <small><span class="fw-bold">Sejak:</span><span><?=$resident['created_at']?></span></small>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="<?=BASEURL?>dashboard/residentdetail/<?=$resident['url']?>" class="btn btn-sm btn-info btn-primary mt-1 me-2"><i class="bi bi-pencil-square me-2"></i>Detail</a>
                                <button type="button" class="btn btn-sm btn-info btn-warning mt-1" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="<?=$resident['id']?>"><i class="bi bi-person-x me-2"></i>Hapus</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <div class="col-12 mt-4">
                        <div class="card shadow p-3 ">
                            <p class="mb-0 fw-bold h4 ">Payment Status</p>
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

            <script>
            document.addEventListener('DOMContentLoaded', function() {
                var confirmDeleteModal = document.getElementById('confirmDeleteModal');
                confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget;
                    var residentId = button.getAttribute('data-id');
                    var modalInput = confirmDeleteModal.querySelector('#deleteResidentId');
                    modalInput.value = residentId;
                });
            });
            </script>