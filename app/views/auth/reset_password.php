<!DOCTYPE html>
<html lang="en">
<head>
<title>Kostify | <?=$data['title']?></title>
    <meta name="author" content="Kostify" />
    <link rel="shortcut icon" href="<?=BASEURL?>images/Kostifyop.png" />
    <link href="<?= BASEURL?>css/bootstrap.css" rel="stylesheet" />
    <link href="<?= BASEURL?>css/bootstrap-icons.css" rel="stylesheet" />
    <link href="<?= BASEURL?>css/login.css" rel="stylesheet" />
</head>
<body style="background-image:url('<?= BASEURL?>images/loginbanner.png');">
    
  <section class="h-100 gradient-form ">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-6">
          <div class="card rounded-3 text-black">
                <div class="card-body p-md-5 mx-md-4 text-center ">
                    <div class="badge  p-3 mb-4 rounded-circle">
                        <img src="<?= BASEURL?>images/forgot-password-icon.png" alt="" width="100px"" alt="" width="100px">
                    </div>
                  <h5 class="mb-3 ">Reset Password</h5>
                  <?php Flasher::flash()?>
                  <p>Silahkan Buat Password Baru</p>
                  <form action="<?=BASEURL?>/login/handleResetPassword" method="POST" id="resetForm">
                
                    <div class="form-outline mb-4">
                        <input type="hidden" id="token" name="token" value="<?= $data['token']?>" />
                    </div>
                    <div class="form-outline mb-4">
                        <input type="password" id="password" name="password" class="form-control"
                          placeholder="Masukkan Password Baru Anda" required/>
                    </div>                 
                    <div class="text-center pt-1 mb-5 pb-1">
                        <button class="btn btn-warning mb-3" type="submit">Reset</button>
                    </div>
                </form>
                </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
</body>
</html>