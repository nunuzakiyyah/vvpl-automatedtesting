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
        <h2>
            Profil
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditProfile" style="float:right;"><i class="fas fa-edit"></i> Edit Profil</button>
        </h2>
        <hr>
    <div>

    <div class="container" style="margin-top:30px">
        <div class="row">
            <?php if ($this->session->flashdata('success')): ?>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Berhasil <strong><?= $this->session->flashdata('success'); ?></strong> data.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            
            <?php if($this->session->flashdata('fail')){ ?>
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Gagal <strong><?= $this->session->flashdata('fail'); ?></strong> berkas. Karena berkas belum tersedia.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            <?php }?>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <img src="<?= base_url('upload/avatar/'.$profile->avatar) ?>" class="avatar img-circle img-thumbnail bg-transparent" alt="avatar" width="500px" style="border: none;">
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Personal Info</h5>
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
                                <br>
                                <h5>Berkas</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Berkas anda:</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <a href="<?php echo site_url('profile/downloadBerkas/'.$profile->username) ?>" class="btn btn-small"><i class="fas fa-download"></i> Download</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Upload berkas baru:</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <form action="<?= site_url('Profile/uploadBerkas/')?>" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput1"></label>
                                                <input class="form-control-file" type="file" name="berkas"/>
                                            </div>
                                            <button type="submit" class="btn btn-small" value="Submit"><i class="fas fa-upload"></i> Upload</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <!-- Modal EditProfile-->
    <div id="modalEditProfile" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Edit Profile</h2>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="<?= site_url('Profile/editProfile/')?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_profil" value="<?= $profile->id_profil?>" />
            <div class="form-group">
                <label for="formGroupExampleInput1">Nama</label>
                <input value="<?= $profile->nama?>" type="text" class="form-control" id="formGroupExampleInput1" name="nama" placeholder="Nama Lengkap" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Jenis Kelamin (L/P)</label>
                <input value="<?= $profile->jk?>" type="text" class="form-control" id="formGroupExampleInput1" name="jk" placeholder="Jenis Kelamin" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Tanggal Lahir</label>
                <input value="<?= $profile->tgl_lahir?>" type="date" class="form-control" id="formGroupExampleInput1" name="tgl_lahir" placeholder="Tanggal Lahir" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">No Telepon</label>
                <input value="<?= $profile->no_tlp?>" type="text" class="form-control" id="formGroupExampleInput1" name="no_tlp" placeholder="No Telepon" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Jalan</label>
                <textarea class="form-control" id="formGroupExampleInput1" name="jalan" placeholder="Jalan" required><?= $profile->jalan ?></textarea>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Kota</label>
                <input value="<?= $profile->kota?>" type="text" class="form-control" id="formGroupExampleInput1" name="kota" placeholder="Kota" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Provinsi</label>
                <input value="<?= $profile->provinsi?>" type="text" class="form-control" id="formGroupExampleInput1" name="provinsi" placeholder="Provinsi" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Negara</label>
                <input value="<?= $profile->negara?>" type="text" class="form-control" id="formGroupExampleInput1" name="negara" placeholder="Negara" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Universitas</label>
                <input value="<?= $profile->institusi?>" type="text" class="form-control" id="formGroupExampleInput1" name="institusi" placeholder="Institusi" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Avatar</label>
                <input class="form-control-file" type="file" name="avatar"/>
                <input type="hidden" name="old_avatar" value="<?= $profile->avatar ?>" />
            </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Submit" placeholder="Simpan">
            </div>
        </form>
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