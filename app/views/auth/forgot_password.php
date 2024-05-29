<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <img src="<?= BASEURL?>images/forgot-password-icon.png" alt="" width="100px">
                    </div>
                    <?php Flasher::flash()?>
                  <h5 class="mb-3 ">Lupa Password?</h5>
                  <p>Jangan Khawatir kami akan mengirimkan instruksi kepada anda</p>
                  <form action="<?=BASEURL?>login/requestResetPassword" method="POST">
                     <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control" 
                          placeholder="Masukan Email Anda" autofocus required/>
                      </div>
                      <div class="text-center pt-1 mb-5 pb-1">
                        <button class="btn btn-warning mb-3" type="sumbit">Reset</button>
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