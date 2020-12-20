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
          <div class="login col-sm-12">
            <h2 class="text-center">SIGN IN</h2>
            <?php
            if ($this->session->flashdata('alert')): ?>
              <?php echo $this->session->flashdata('alert'); ?>
            <?php endif; ?>
            <div class="row">
              <div class="col-sm-12">
                <form action="<?php echo site_url('User_controller/signin') ?>" method="post">

                  <div class="form-group col-sm-6 col-sm-offset-3">
                    <label for="email"></label>
                    <input type="email" class="form-control" placeholder="email" name="email" required autofocus>
                    <label for="pwd"></label>
                    <input type="password" class="form-control" id="pwd" placeholder="Password" name="password" required autofocus>
                  </div>
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4">
                    <!-- 
                            <input class="form-check-input" type="checkbox">Remember me?
                          --> <br>Belum punya akun? <a style="color: black" href="<?php echo site_url('Landing/register') ?>">Register</a><br> <br>
                    <button type="submit" class="btn btn-primary">SIGN IN</button>
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