<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kostify | <?=$data['title']?></title>
    <link rel="shortcut icon" href="<?= BASEURL?>images/Kostifyop.png" />
    <link href="<?= BASEURL?>css/bootstrap.css" rel="stylesheet" />
    <link href="<?= BASEURL?>css/bootstrap-icons.css" rel="stylesheet" />
    <link href="<?= BASEURL?>css/login.css" rel="stylesheet" />
</head>
<body style="background-image:url('<?= BASEURL?>images/loginbanner.png');">
    
  <section class="h-100 gradient-form ">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
  
                  <div class="text-center">
                    <img src="<?= BASEURL?>/images/Kostify.png"
                      style="width: 185px;" alt="logo">
                  
                  </div>
                  <?php Flasher::flash()?>
                  <form action="<?=BASEURL?>register/adduser" method="POST">
                    <p class="text-center">Create An Account</p>
                    
                    <div class="form-outline mb-2">
                      <label class="form-label" for="is_owner">User Type</label>
                        <select id="is_owner" name="is_owner" class="form-select">
                          <option value="1">Pemilik Property</option>
                          <option value="0">Penghuni Property</option>
                        </select>
                  </div>

                    <div class="form-outline mb-2">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" 
                          placeholder="Username" />  
                    </div>

                    <div class="form-outline mb-2">
                        <label class="form-label" for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control "
                          placeholder="Name" />
                          
                    </div>
                    
                    <label class="form-label" for="phone">No.Telp</label>
                    <div class="input-group mb-2">
                        
                        <span class="input-group-text" id="basic-addon3">+62</span>
                        <input type="text" name="phone" id="phone" class="form-control"
                          placeholder="85XXXXXXXXX" aria-describedby="basic-addon3" />
                          
                      </div>
                      
  
                    <div class="form-outline mb-2">
                        <label class="form-label" for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control"
                        placeholder="Email address" />
                       
                    </div>
  
                    <div class="form-outline mb-2">
                        <label class="form-label" for="password">Password</label>
                      <input type="password" id="password" name="password" class="form-control " />
                      
                    </div>
  
                    <div class="text-center pt-1 mb-5 pb-1">
                      <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="sumbit">Sign Up</button>
                      
                    </div>
                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">Sudah Memiliki Akun?</p>
                      <a href="<?=BASEURL?>login">
                        <button type="button" class="btn btn-outline-warning">Log In</button>
                      </a>
                      
                    </div>
  
                  </form>
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <img class="mb-4" src="images/registerlogo.png" alt="" width="350px">
               
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 
</body>
</html>