
<div class="flasher text-center">
            <?php Flasher::flash()?>
            </div>
            
          
            <div class="container-fluid pt-4 px-4">
            <?php 
// Count the occurrences of each property_id
$property_counts = array_count_values(array_column($data['getpropery'], 'property_id'));
?>

<div class="row g-4">
    <?php 
    $processed_ids = [];

    foreach ($data['getpropery'] as $list): 
        if (in_array($list['property_id'], $processed_ids)) {
            continue; 
        }
        $processed_ids[] = $list['property_id']; 

        $image_filenames = $list['image']; 
        $images = explode(',', $image_filenames);
    ?>
        <div class="col-sm-12 col-xl-4">
            <div class="card shadow p-3 rounded h-100 p-4">
                <a href="<?= BASEURL ?>dashboard/residentmanagement/<?= $list['slug'] ?>" class="img">
                    <img src="<?= !empty($images[0]) ? BASEURL . 'uploads/' . $images[0] : BASEURL . 'images/kamar1.png' ?>" alt="Image" class="img-fluid property-image" style="height: 280px; object-fit: cover; width:auto"/>
                </a>
                <span class="city d-block mb-3 mt-3 fw-bold"><?= htmlspecialchars($list['propertyname']) ?><span class="badge <?= $bg_color = ($list['type'] == 1 || $list['type'] == 3) ? 'bg-primary' : 'bg-danger'; ?> rounded-pill ms-2"><?= $list['type_name'] ?></span></span>
                <div class="price mb-2"><span>Rp. <strong><?= number_format($list['price'], 0, ',', '.') ?></strong></span></div>
                <div>
                    <div class="specs d-flex mb-4">
                        <span class="d-block d-flex align-items-center me-3">
                            <i class="fa fa-bed me-2 text-primary"></i>
                            <h6 class="mb-0"><?= $list['available'] ?> Kamar</h6>
                        </span>
                        <span class="d-block d-flex align-items-center me-3">
                        <i class="fa-solid fa-users me-2 text-primary"></i>
                            <h6 class="mb-0">Penyewa: <?= $property_counts[$list['property_id']] ?></h6>
                        </span>
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
    
</body>

</html>
