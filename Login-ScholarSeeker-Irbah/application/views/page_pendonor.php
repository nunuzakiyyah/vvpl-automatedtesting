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
        <?php if ($this->session->flashdata('success')): ?>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                Berhasil <strong><?= $this->session->flashdata('success'); ?></strong> data.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <h2>Data Beasiswa</h2>
        <p>Tabel Data Beasiswa <?= $this->session->userdata('username') ?></p>            
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddBeasiswa">TAMBAH BEASISWA</button>
        <br><br>
        <table id="table_pendonor" class="table table-bordered table-hover dt-responsive display" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>Judul</th>
                    <th>Tgl Mulai</th>
                    <th>Tgl Selesai</th>
                    <th>Deskripsi</th>
                    <th>Jenis</th>
                    <th>Poster</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $row ) {?>
                <tr>
                    <td width="150">
                        <?= $row->judul ?></td>
                    <td class="text-center" width="120">
                        <?= $row->tgl_mulai ?></td>
                    <td class="text-center" width="120">
                        <?= $row->tgl_selesai ?></td>
                    <td width="200">
                        <?= substr($row->deskripsi, 0, 120) ?>...</td>
                    <td width="100">
                        <?= $row->jenis ?></td>
                    <td class="text-center">
                        <img src="<?= base_url('upload/poster/') ?><?= $row->poster ?>" alt="" height="100"></td>
                    <td width="250" class="float-left">
                        <a href="<?php echo site_url('pendonor/lihatPendaftar/'.$row->id_beasiswa) ?>"
                            class="btn btn-small"><i class="fas fa-list-alt"></i> Lihat Pendaftar</a>
                        <button type="button" data-toggle="modal" data-target="#modalEditBeasiswa<?= $row->id_beasiswa ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</button>
                        <a onclick="deleteConfirm('<?php echo site_url('pendonor/delBeasiswa/'.$row->id_beasiswa) ?>')"
                            href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>


    
    <!-- Modal AddBeasiswa-->
    <div id="modalAddBeasiswa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Form Tambah Beasiswa</h2>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="<?= site_url('Pendonor/addBeasiswa/'.$this->session->userdata('username'))?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="formGroupExampleInput1">Judul</label>
                <input type="text" class="form-control" id="formGroupExampleInput1" name="judul" placeholder="Judul" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Tanggal Mulai</label>
                <input type="date" class="form-control" id="formGroupExampleInput1" name="tgl_mulai" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Tanggal Selesai</label>
                <input type="date" class="form-control" id="formGroupExampleInput1" name="tgl_selesai" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Deskripsi</label>
                <textarea class="form-control" id="formGroupExampleInput1" name="deskripsi" placeholder="Deskripsi" required></textarea>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Jenis</label>
                <input type="text" class="form-control" id="formGroupExampleInput1" name="jenis" placeholder="Jenis" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Poster</label>
                <input class="form-control-file" type="file" name="poster"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <input  type="submit" class="btn btn-primary" value="Submit" placeholder="Simpan">
            </div>
        </form>
        </div>
        </div>

    </div>
    </div>


    <!-- Modal EditBeasiswa-->
    <?php foreach ($records as $row ) {?>
    <div id="modalEditBeasiswa<?= $row->id_beasiswa ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Edit Beasiswa</h2>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="<?= site_url('Pendonor/editBeasiswa/')?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_beasiswa" value="<?= $row->id_beasiswa?>" />
            <div class="form-group">
                <label for="formGroupExampleInput1">Judul</label>
                <input value="<?= $row->judul?>" type="text" class="form-control" id="formGroupExampleInput1" name="judul" placeholder="Judul" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Tanggal Mulai</label>
                <input value="<?= $row->tgl_mulai ?>" type="date" class="form-control" id="formGroupExampleInput1" name="tgl_mulai" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Tanggal Selesai</label>
                <input value="<?= $row->tgl_selesai ?>"type="date" class="form-control" id="formGroupExampleInput1" name="tgl_selesai" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Deskripsi</label>
                <textarea class="form-control" id="formGroupExampleInput1" name="deskripsi" placeholder="Deskripsi" required><?= $row->deskripsi ?></textarea>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Jenis</label>
                <input value="<?= $row->jenis ?>"type="text" class="form-control" id="formGroupExampleInput1" name="jenis" placeholder="Jenis" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Poster</label>
                <input class="form-control-file" type="file" name="poster"/>
                <input type="hidden" name="old_poster" value="<?= $row->poster ?>" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <input  type="submit" class="btn btn-primary" value="Submit" placeholder="Simpan">
            </div>
        </form>
        </div>
        </div>
    </div>
    </div>
    <?php } ?>

    <!-- Pemanggilan JS dari Bootstrap -->
    <?php $this->load->view("_partials/js.php") ?>

    <!-- Pemanggilan Modal JS dari Bootstrap -->
    <?php $this->load->view("_partials/modal.php") ?>

    <script>
        function deleteConfirm(url){
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
</body>
<script type="text/javascript">
    $(document).ready( function () {
        $('#table_pendonor').DataTable( {
            responsive: true
        } );
    } );
</script>
</html>