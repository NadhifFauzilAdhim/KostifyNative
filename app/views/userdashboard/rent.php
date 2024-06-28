
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
                <a href="<?= BASEURL ?>dashboard/myrent/<?= $list['url'] ?>" class="img">
                    <img src="<?= !empty($images[0]) ? BASEURL . 'uploads/' . $images[0] : BASEURL . 'images/kamar1.png' ?>" alt="Image" class="img-fluid property-image" style="height: 280px; object-fit: cover; width:auto"/>
                </a>
                <span class="city d-block mb-3 mt-3 fw-bold"><?= htmlspecialchars($list['propertyname']) ?><span class="badge <?= $bg_color = ($list['type'] == 1 || $list['type'] == 3) ? 'bg-primary' : 'bg-danger'; ?> rounded-pill ms-2"><?= $list['type_name'] ?></span></span>
                <div class="price mb-2"><i class="fa-solid fa-money-bills me-2 text-info"></i><span>Rp. <strong><?= number_format($list['price'], 0, ',', '.') ?></strong>/<?php if($list['payment_type'] == 1){echo "Bulan";}elseif($list['payment_type'] == 0){echo " Tunai";}else{echo $list['payment_type'] . " Bulan";}?></span></div>
                <div class="location mb-2"><i class="fa-solid fa-location-dot me-3 text-info"></i><span><?= $list['location'] ?></span></div>
                <div class=" mb-2"><i class="fa-solid fa-clock me-2 text-info"></i><span><?= $list['RentStart'] ?></span></div>
                <div>
               
            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>
           