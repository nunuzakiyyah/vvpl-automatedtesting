<!DOCTYPE html>
<html lang="en">

<head>
  <title>SIGN IN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/css/a.css" ?>">
</head>

<body>
  <div class="container">
    <div class="row ">
      <div class="col-sm-3 align-items-center  justify-content-center" style="margin-top: 200px;">
        <img src="<?php echo base_url("assets/logo-ss.png") ?>" width="200"><br> <span style="color: white; font-family:'Lato', sans-serif;">is the future as expensive as <br> college? dont't worry.<br>we facilitized students for the <br> bright future. join us and find your <br> perfect college. </span><br><br><a href="<?php echo site_url('Landing/index') ?>" class=" btn btn-lg btn-outline-light btn-custom " style="color: white">Learn More</a>
      </div>
      <div class="col-sm-9">
        <section class="Sign In text-center">
          <div class="register col-sm-12">
            <h2 class="text-center">SIGN UP</h2>
            <?= form_error('email', '<em class="error text-danger">', '</em>') ?>
            <?= form_error('username', '<em class="error text-danger">', '</em>') ?>
            <?= form_error('password', '<em class="error text-danger">', '</em>') ?>
            <?= form_error('cpassword', '<em class="error text-danger">', '</em>') ?>
            <div class="row">
              <div class="col-sm-12">
                <form action="<?php echo site_url('User_controller/register') ?>" method="post">

                  <div class="form-group col-sm-6 col-sm-offset-3">
                    <label for="email"></label>
                    <input type="email" class="form-control" id="username" placeholder="email" name="email" required autofocus>

                    <label for="username"></label>
                    <input type="text" class="form-control" id="pwd" placeholder="Username" name="username" required autofocus>

                    <label for="pwd"></label>
                    <input type="password" class="form-control" id="pwd" placeholder="Password" name="password" required autofocus>

                    <label for="pwd1"></label>
                    <input type="password" class="form-control" id="pwd" placeholder="Confirm Password" name="cpassword" required autofocus>
                  </div>

                  <div class="form-group col-sm-6 col-sm-offset-3">
                    <div class="radio">
                      <label><input type="radio" value="1" name="level" checked>Mahasiswa</label>
                      <label><input type="radio" value="2" name="level">Pemberi Beasiswa</label>
                    </div>
                    <div class="radio">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-2">
                        <br> <br>
                        <button type="submit" class="btn btn-primary">SIGN UP</button>
                      </div>
                      <div class="col-sm-3"></div>
                </form>
              </div>
            </div>

          </div>
      </div>
    </div>
    </section>
  </div>

  </div>
  </div>
</body>

</html>