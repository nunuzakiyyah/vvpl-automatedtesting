<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Pemanggilan Head -->
    <?php $this->load->view("_partials/head.php") ?>

</head>

<body class="light-bg">
    <!-- Pemanggilan Navbar jika belum login -->
    <?php $this->load->view("_partials/navbar.php") ?>

    <div class="container bg-light" style="margin-top:100px">
    <div class="box">
        <?php if ($this->session->flashdata('success')){ ?>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                Berhasil <strong><?= $this->session->flashdata('success'); ?></strong> data.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        <?php } elseif($this->session->flashdata('fail')){ ?>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                Gagal <strong><?= $this->session->flashdata('fail'); ?></strong> berkas. Karena berkas belum tersedia.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        <?php }?>
        <h2>Data Pendaftar</h2>
        <p>Tabel Data Pendaftar Beasiswa dari User Pendonor : <?= $this->session->userdata('username') ?></p>    
        <a class="btn btn-primary" href="<?= site_url('Pendonor') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
        <br><br>
        <table id="table_pendaftar" class="table table-bordered table-hover dt-responsive display" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Pendaftar</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Berkas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $num = 1; foreach ($pendaftar as $row ) {?>
                <tr>
                    <td class="text-center">
                        <?= $num++ ?></td>
                    <td class="text-center">
                        <?= $row->username ?></td>
                    <td class="text-center">
                        <?= $row->tanggal ?></td>
                    <td class="text-center">
                        <?= $row->status ?></td>
                    <td>
                        <a href="<?php echo site_url('pendonor/downloadBerkas/'.$row->username.'/'.$row->id_beasiswa) ?>" class="btn btn-small"><i class="fas fa-download"></i> Download</a>
                    </td>
                    <td>
                        <a href="<?php echo site_url('pendonor/lihatProfilePendaftar/'.$row->username.'/'.$row->id_beasiswa) ?>" class="btn btn-small"><i class="fas fa-info-circle"></i> Lihat Detail Profile</a>
                        
                        <a onclick="statusConfirm('<?php echo site_url('pendonor/editStatus/'.$row->id_pendaftaran.'/'.$row->id_beasiswa.'/'.$row->username) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-edit"></i> Ubah Status</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>

    <!-- Ubah Status -->
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Status diterima Pendaftar</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Pilih apakah Pendaftar diterima atau tidak!</div>
        <div class="modal-footer">
            <a id="btn-terima" class="btn btn-success" href="#">Terima</a>
            <a id="btn-pending" class="btn btn-warning" href="#">Pending</a>
            <a id="btn-tidak" class="btn btn-danger" href="#">Tolak</a>
        </div>
        </div>
    </div>
    </div>

    <!-- Pemanggilan JS dari Bootstrap -->
    <?php $this->load->view("_partials/js.php") ?>

    <script>
        function statusConfirm(url){
            $('#btn-terima').attr('href', url+"/a");
            $('#btn-pending').attr('href', url+"/p");
            $('#btn-tidak').attr('href', url+"/r");
            $('#statusModal').modal();
        }
    </script>
</body>
<script type="text/javascript">
    $(document).ready( function () {
        $('#table_pendaftar').DataTable( {
            responsive: true
        } );
    } );
</script>
</html>