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

        <h2>Data Berita</h2>          
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddBerita">TAMBAH BERITA</button>
        <br><br>
        <table id="table_pendonor" class="table table-striped table-bordered dt-responsive display" style="width:100%">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Tanggal</th>
                    <th>Dilihat</th>
                    <th>Penulis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $row ) {?>
                <tr>
                    <td width="150">
                        <?= $row->judul ?></td>
                    <td width="150">
                        <img src="<?= base_url('upload/gambar/') . $row->gambar ?>" height="100"></td>
                    <td width="120">
                        <?= $row->tanggal ?></td>
                    <td width="120">
                        <?= $row->view ?> kali</td>
                    <td width="120">
                        <?= $row->penulis ?></td>
                    <td width="200">
                        <a data-toggle="modal" data-target="#modalEditBerita<?= $row->id_berita ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                        <a onclick="deleteConfirm('<?php echo site_url('Berita/delBerita/'.$row->id_berita) ?>')"
                            href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>


    
    <!-- Modal AddBerita-->
    <div id="modalAddBerita" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Form Tambah Berita</h2>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="<?= site_url('Berita/addBerita/'.$this->session->userdata('username'))?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="formGroupExampleInput1">Judul</label>
                <input type="text" class="form-control" id="formGroupExampleInput1" name="judul" placeholder="Judul" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Tanggal</label>
                <input type="date" class="form-control" id="formGroupExampleInput1" name="tanggal" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Isi</label>
                <textarea name="isi" class="form-control" id="formGroupExampleInput1" required></textarea>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Gambar</label>
                <input class="form-control-file" type="file" name="gambar"/>
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


    <!-- Modal EditBerita-->
    <?php foreach ($records as $row) {?>
    <div id="modalEditBerita<?= $row->id_berita ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Edit Berita</h2>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="<?= site_url('Berita/editBerita/')?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_berita" value="<?= $row->id_berita?>" />
            <input type="hidden" name="tanggal" value="<?= $row->tanggal?>" />
            <input type="hidden" name="old_poster" value="<?= $row->gambar?>" />
            <div class="form-group">
                <label for="formGroupExampleInput1">Judul</label>
                <input type="text" class="form-control" id="formGroupExampleInput1" name="judul" placeholder="Judul" value="<?= $row->judul ?>" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Isi</label>
                <textarea name="isi" class="form-control" id="formGroupExampleInput1" required><?= $row->isi ?></textarea>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Gambar</label><br>
                <!-- <img src="<?= base_url('upload/gambar/') . $row->gambar ?>" height="100"></td> -->
                <input class="form-control-file" type="file" name="gambar"/>
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