
<div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="acceptModalLabel">Konfirmasi Penerimaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menerima permintaan ini?
            </div>
            <div class="modal-footer">
                <form action="<?=BASEURL?>dashboard/requestHandler" method="POST" id="acceptForm">
                    <input type="hidden" id="csrf_token" name="csrf_token" value="<?= $_SESSION['csrf_token']?>">
                    <input type="hidden" id="acceptPropertyId" name="id">
                    <input type="hidden" id="action" name="action" value="1">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Terima</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="declineModal" tabindex="-1" aria-labelledby="declineModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="declineModalLabel">Konfirmasi Penolakan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menolak permintaan ini?
            </div>
            <div class="modal-footer">
                <form action="<?=BASEURL?>dashboard/requestHandler" method="POST" id="declineForm">
                    <input type="hidden" id="csrf_token" name="csrf_token" value="<?= $_SESSION['csrf_token']?>">
                    <input type="hidden" id="declinePropertyId" name="id">
                    <input type="hidden" id="action" name="action" value="0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-4 px-4">
            <div class="flasher text-center">
            <?php Flasher::flash()?>
            </div>
                
                <div class="card shadow p-3  text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Request</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Penyewa</th>
                                    <th scope="col">Penyewaan di</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['request'] as $data):?>
                                    <?php 
                                        $image_filenames = $data['image']; 
                                        $images = explode(',', $image_filenames);
                                        ?>
                                <tr class="<?php if($data['payment_type'] == 0){ echo 'table-info'; } ?>">
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td><?=$data['created_at']?></td>
                                    <td><?=$data['name']?></td>
                                    
                                    <td ><div class="d-flex align-items-center border-bottom py-3">
                                        <a href=""><img class="flex-shrink-0" src="<?= !empty($images[0]) ? BASEURL . 'uploads/' . $images[0] : BASEURL . 'images/kamar1.png' ?>" alt="" style="width: 40px; height: 40px;"></a>
                                        <div class="w-100 ms-3">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-0"><?=$data['propertyname']?></h6>
                                            </div>
                                            <span><?=$data['available']?> Tersedia</span>
                                            
                                        </div>
                                    </div></td>
                                    <td><h6 class="mb-0">Rp. <?= number_format( $data['price'], 0, ',', '.') ?></u></strong>/<?php if($data['payment_type'] == 1){echo "Bulan";}elseif($data['payment_type'] == 0){echo " Tunai";}else{echo $data['payment_type'] . " Bulan";}?></h6></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary" onclick="confirmAccept(<?=$data['id']?>)">Terima</button>
                                        <button class="btn btn-sm btn-danger" onclick="confirmDecline(<?=$data['id']?>)">Tolak</button>
                                    </td>
                                    </td>
                                </tr>
                                <?php endforeach?>
                               
                               
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
            <html>
           
            <script>
    function confirmAccept(propertyId) {
        document.getElementById('acceptPropertyId').value = propertyId;
        var acceptModal = new bootstrap.Modal(document.getElementById('acceptModal'));
        acceptModal.show();
    }

    function confirmDecline(propertyId) {
        document.getElementById('declinePropertyId').value = propertyId;
        var declineModal = new bootstrap.Modal(document.getElementById('declineModal'));
        declineModal.show();
    }
</script>