<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Pemanggilan Head -->
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body class="light-bg">
    <!-- Pemanggilan Navbar jika belum login -->
    <?php $this->load->view("_partials/navbar.php") ?>

    <div class="container " style="margin-top:120px">
        <div class="row">
            <?php if ($this->session->flashdata('success')): ?>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Berhasil <strong><?= $this->session->flashdata('success'); ?></strong>. Silahkan tunggu konfirmasi.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('fail')): ?>
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    Anda <strong><?= $this->session->flashdata('fail'); ?></strong>. Silahkan tunggu konfirmasi.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('mustMahasiswa')): ?>
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Anda <strong><?= $this->session->flashdata('mustMahasiswa'); ?></strong> login sebagai mahasiswa untuk mendaftar beasiswa.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
        <h3>
            <?php 
                $action = site_url('Beasiswa/daftar/'.$beasiswa->id_beasiswa);
                if($this->session->userdata('role') != "mahasiswa"){
                    $action = site_url('Beasiswa/detailBeasiswa/'.$beasiswa->id_beasiswa);
                    $this->session->set_flashdata('mustMahasiswa', 'harus');
                }
            ?>
            <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
                <?= $beasiswa->judul; ?>
                <input type="hidden" name="username" value="<?= $username;?>">
                <input type="hidden" name="id_beasiswa" value="<?= $beasiswa->id_beasiswa;?>">
                
                <input type="submit" class="btn btn-primary" style="float:right;" value="Daftar">
                
            </form>
        </h3>
        <hr>
    <div>
    <div class="container" style="margin-top:30px">
        <div class="card" style="max-width:1000px">
            <img class="card-img-top" src="<?= base_url('upload/poster/').$beasiswa->poster ?>" alt="Card image">
            <div class="card-body">
                <h4 class="card-title text-center"><?= $beasiswa->jenis ?></h4>
                <p class="card-text text-center"><?= $beasiswa->deskripsi ?></p>
            </div>
        </div>
    </div>


    <!-- Pemanggilan Footer -->
    <?php $this->load->view("_partials/footer.php") ?>
    
    <!-- Pemanggilan JS dari Bootstrap -->
    <?php $this->load->view("_partials/js.php") ?>

</body>
</html>