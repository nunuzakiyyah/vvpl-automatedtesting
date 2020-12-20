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
        <h2>Data Pendaftaran</h2>
        <p>Tabel Data Pendaftar Beasiswa dari User: <?= $this->session->userdata('username') ?></p>
        <br>
        <table id="table_application" class="table table-bordered table-hover dt-responsive display" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Judul Beasiswa</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $num = 1; foreach ($apps as $row ) {?>
                <tr>
                    <td class="text-center">
                        <?= $num++ ?></td>
                    <td>
                        <?= $row->judul ?></td>
                    <td class="text-center">
                        <?= $row->tanggal ?></td>
                    <td class="text-center">
                        <?= $row->status ?></td>
                    <td>
                        <a href="<?= site_url('Beasiswa/detailBeasiswa/'.$row->id_beasiswa)?>" class="btn btn-small"><i class="fas fa-info-circle"></i> Lihat Detail Beasiswa</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>

    <!-- Pemanggilan Footer -->
    <?php $this->load->view("_partials/footer.php") ?>

    <!-- Pemanggilan JS dari Bootstrap -->
    <?php $this->load->view("_partials/js.php") ?>

</body>
<script type="text/javascript">
    $(document).ready( function () {
        $('#table_application').DataTable( {
            responsive: true
        } );
    } );
</script>
</html>