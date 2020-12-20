<div class="nav-menu fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-dark navbar-expand-lg">
                    <a class="navbar-brand" href="#"><img src="<?= base_url('assets/img/logo-ss.png'); ?>" alt="logo" height="50"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> 
                        <span class="navbar-toggler-icon"></span> 
                    </button>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav ml-auto">
                            <?php
                            #Pengaturan Navbar untuk setiap Role
                            $home = site_url('Landing/index');
                            $scholar = site_url('Landing/index#scholar');
                            $news = site_url('Landing/index#news');
                            $status = "SIGN IN";
                            $link_button = site_url('Landing/login');
                            ?>
                            <li class="nav-item"> <a class="nav-link active" href="#home">HOME <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#about">ABOUT</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#scholar">SCHOLAR</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#news">NEWS</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#faq">FAQ</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#contact">CONTACT</a> </li>
                            <?php
                                if($this->session->userdata('logged_in')) {
                                    $username = $this->session->userdata('username');
                                    $status = "SIGN OUT";
                                    $link_button = site_url('User_controller/logout');
                                    $role = $this->session->userdata('role');
                                    if($role == "pendonor"){
                                        #Set link ke profile pendonor
                                        $link_profile = site_url('Pendonor/profile');
                                        $link_role = site_url('Pendonor');
                                        $manage = "Manage Scholars";
                                    }
                                    elseif($role == "admin"){
                                        #Set link ke profile admin
                                        $link_profile = site_url('Berita/profile');
                                        $link_role = site_url('Berita');
                                        $manage = "Manage News";
                                    }
                                    else{
                                        #Set link ke profile mahasiswa
                                        $link_profile = site_url('Profile');
                                        $link_role = site_url('Mahasiswa');
                                        $manage = "Applications";
                                    }
                            ?>
                                    <!-- Dropdown -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                            <?= $username ?>
                                        </a>
                                        <div class="dropdown-menu bg-light text-center">
                                            <a class="dropdown-item" href="<?= $link_profile?>">Profile</a>
                                            <a class="dropdown-item" href="<?= $link_role?>"><?= $manage ?></a>
                                            <a class="dropdown-item" href="#">Help</a>
                                        </div>
                                    </li>
                            <?php
                                }
                            ?>
                            <li class="nav-item"><a href="<?= $link_button ?>" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3"><?= $status ?></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div> 