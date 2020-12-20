<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Pemanggilan Head -->
    <?php $this->load->view("_partials/head.php") ?>

</head>

<body class="light-bg">
    <!-- Pemanggilan Navbar jika belum login -->
    <?php $this->load->view("_partials/navbar.php") ?>

    <div class="container " style="margin-top:100px">
        <h2>Profile: <?= $profile->username ?></h2>
        <hr>
        <a class="btn btn-primary" href="<?= site_url('Pendonor/lihatPendaftar/'.$id_beasiswa) ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div>

    <div class="container" style="margin-top:30px">
        <div class="row">
            <!-- Untuk Alert -->
        </div>
        <div class="row">
            <div class="col-sm-3 text-center">
                <img src="<?= base_url('upload/avatar/'.$profile->avatar) ?>" class="img-circle img-thumbnail bg-transparent" alt="avatar" width="300px">
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Personal info</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Nama</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <?= $profile->nama ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                    <?= $profile->tgl_lahir ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <?php
                                        if($profile->jk == "L"){
                                            echo "Laki-laki";
                                        }
                                        else {
                                            echo "Perempuan";
                                        } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Nomor Telepon</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <?= $profile->no_tlp ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Universitas</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <?= $profile->institusi ?>
                                    </div>
                                </div>
                                <br>
                                <h5>Alamat</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Jalan</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <?= $profile->jalan ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Kota</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <?= $profile->kota ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Provinsi</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <?= $profile->provinsi ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Negara</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <?= $profile->negara ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <!-- Pemanggilan Footer -->
    <?php $this->load->view("_partials/footer.php") ?>
    
    <!-- Pemanggilan JS dari Bootstrap -->
    <?php $this->load->view("_partials/js.php") ?>

</body>
</html>