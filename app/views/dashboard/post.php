
            <div class="flasher text-center">
            <?php Flasher::flash()?>
            </div>
            
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                   
                    <div class="col-sm-6 col-xl-3">
                            <div class="ms-3">
                                
                                <a class="btn btn-sm btn-primary" href="<?=BASEURL?>dashboard/createpost"><i class="fa fa-pen-to-square text-light"></i> Buat Post Baru</a>
                            </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <?php foreach($data['getpropery'] as $list): ?>
            <?php 
            $image_filenames = $list['image']; 
            $images = explode(',', $image_filenames);
            ?>
            <div class="col-sm-12 col-xl-4">
                <div class="card shadow p-3 rounded h-100 p-4">
                    <a href="<?= BASEURL ?>/home/detail/<?=$list['slug']?>" class="img">
                        <img src="<?= !empty($images[0]) ? BASEURL . 'uploads/' . $images[0] : BASEURL . 'images/kamar1.png' ?>" alt="Image" class="img-fluid property-image" style="height: 280px; object-fit: cover; width:auto"/>
                    </a>
                    <span class="city d-block mb-3 mt-3 fw-bold"><?= htmlspecialchars($list['propertyname']) ?><span class="badge <?= $bg_color = ($list['type'] == 1 || $list['type'] == 3) ? 'bg-primary' : 'bg-danger'; ?> rounded-pill ms-2"><?= $list['type_name'] ?></span></span>
                    <div class="price mb-2"><span>Rp. <?= number_format($list['price'], 0, ',', '.') ?></span></div>
                    <div>
                        <div class="specs d-flex mb-4">
                            <span class="d-block d-flex align-items-center me-3">
                                <i class="fa fa-bed me-2"></i>
                                <h6 class="mb-0"><?= $list['available'] ?> Kamar</h6>
                            </span>
                            <span class="d-block d-flex align-items-center me-3">
                                <i class="fa fa-bath me-2"></i>
                                <h6 class="mb-0">Km <?= $list['km'] ?></h6>
                            </span>
                        </div>
                        <div class="specs d-flex mb-4">
                            <span class="d-block d-flex align-items-center me-3">
                                <a class="btn btn-sm btn-success" href="<?=BASEURL?>dashboard/edit/<?=$list['slug']?>"><i class="fa-regular fa-pen-to-square me-1"></i>Edit</a>
                            </span>
                            <span class="d-block d-flex align-items-center me-3">
                            <form id="visibility-form-<?= $list['id'] ?>">
                            <input type="hidden" name="postid" value="<?= $list['id'] ?>">
                             <button type="button" class="btn btn-sm toggle-visibility" data-id="<?= $list['id'] ?>" data-visibility="<?= $list['visibility'] ?>">
                              <i class="bi"></i><span></span>
                            </button>
                            </form>


                            </span>
                            <div class="btn-group   ">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                                <ul class="dropdown-menu text-center">
                                    <li>
                                        <form action="<?= BASEURL ?>/dashboard/deletePost" method="POST" id="deleteForm-<?= $list['id'] ?>">
                                            <input type="hidden" name="property_id" value="<?= $list['id'] ?>">
                                            <input type="hidden" value="<?=$_SESSION['csrf_token']?>" name="csrf_token">
                                            <button type="button" class="btn btn-sm btn-info btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal-<?= $list['id'] ?>"><i class="bi bi-trash me-1"></i>Hapus</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="deleteConfirmationModal-<?= $list['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel-<?= $list['id'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                           
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            
                        <p class="text-center"><strong> Apakah Anda yakin ingin menghapus Property ini?</strong> </p>
                        <h4 class="text-center"><strong> <?= htmlspecialchars($list['propertyname']) ?></strong> </h4>
                        <p class="text-center mb-3"><strong>Aksi ini akan menghapus</strong> </p>
                        <p class="text-center"><i class="fa-regular fa-circle-xmark"></i> Menghapus <strong class="text-danger">Postingan</strong></p>
                        <p class="text-center"><i class="fa-regular fa-circle-xmark"></i> Menghapus <strong class="text-danger">Komentar</strong></p>
                        <p class="text-center"><i class="fa-regular fa-circle-xmark"></i> Menghapus <strong class="text-danger">Resident</strong></p>
                        <p class="text-center"><i class="fa-regular fa-circle-xmark"></i> Menghapus <strong class="text-danger">Payment Status</strong></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-danger confirm-delete" data-id="<?= $list['id'] ?>">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-12 text-center">
                            <p>
                            Copyright &copy;
                                <script>
                                  document.write(new Date().getFullYear());
                                </script>
                                 &mdash;  Develop with &#10084; by  <a href="https://www.arabisgroup.cloud/">Arabis Group</a> | <a href="https://ndfproject.my.id/">NDFProject</a>
                               
                              </p>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="<?=BASEURL?>js/bootstrap.bundle.min.js"></script>
    <script src="<?=BASEURL?>js/main.js"></script>
    
    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.confirm-delete').forEach(function(button) {
                    button.addEventListener('click', function() {
                        var id = this.getAttribute('data-id');
                        var form = document.getElementById('deleteForm-' + id);
                        if (form) {
                            form.submit();
                        }
                    });
                });
            });
    </script>
    <script>
                document.addEventListener('DOMContentLoaded', function() {
                var toggleVisibilityButtons = document.querySelectorAll('.toggle-visibility');

                toggleVisibilityButtons.forEach(function(button) {
                var initialVisibility = button.getAttribute('data-visibility');
                updateButtonAppearance(button, initialVisibility);

                button.addEventListener('click', function() {
                    var postId = this.getAttribute('data-id');
                    var currentVisibility = this.getAttribute('data-visibility');
                    var newVisibility = currentVisibility == 1 ? 0 : 1;
                    var button = this; 
                    updateButtonAppearance(button, newVisibility);
                    button.setAttribute('data-visibility', newVisibility);

                    // AJAX request to server
                    fetch('<?= BASEURL ?>dashboard/visibility', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'postid=' + postId + '&visibility=' + newVisibility
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (!data.success) {
                            updateButtonAppearance(button, currentVisibility);
                            button.setAttribute('data-visibility', currentVisibility);
                            alert('Error updating visibility');
                        } else {
                          var statusElement = document.querySelector('#status-' + postId);
                            if (statusElement) {
                                statusElement.textContent = newVisibility == 1 ? 'Public' : 'Private';

                            }
                        }
                    })
                    .catch(error => {
                    
                        console.error('Error:', error);
                    });
                });
                });

                function updateButtonAppearance(button, visibility) {
                var icon = button.querySelector('i');
                var text = button.querySelector('span');

                if (visibility == 1) {
                    icon.className = 'bi bi-eye me-1';
                    text.textContent = 'Public';
                    button.className = 'btn btn-sm btn-info toggle-visibility';
                } else {
                    icon.className = 'bi bi-eye-slash me-1';
                    text.textContent = 'Private';
                    button.className = 'btn btn-sm btn-danger toggle-visibility';
                }
                }
                });


    </script>
</body>

</html>
