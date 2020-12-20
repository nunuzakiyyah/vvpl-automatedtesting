<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Beasiswa</title>
    <!-- Pemanggilan Head -->
    <?php $this->load->view("_partials/head.php") ?>
</head>
<style>
  .search-container {
    float: none;
    padding:10px;
  }
  .form-control input[type=text] {
    padding: 6px;
    margin-top: 8px;
    font-size: 17px;
    border: none;
  }
  .search-container button{
    float:right;
    background: orange; 
    border: none; 
    /* position: relative; */
    font-size:17px;
    padding: 7px 16px;
    right: 20px;
    border-radius: 2px;
    cursor: pointer;
  }
  .search-container button:hover{
    background:#FFB732;
  }
  @media screen and(max-width: 600px){
    .search-container{
      float: none;
    }
    .form-control input[type=text], .search-container button{
      float: none;
      display: block;
      text-align: left;
      width: 100%;
      margin: 0;
      padding: 14px;
    }
    .form-control input[type=text]{
      border:1px solid #FFB732;
    }
  }
  table{
    border-collapse: collapse;
    border-spacing:0;
  }
  .dataTables_wrapper .dataTables_filter {
    float: right;
    text-align: right;
    visibility: hidden;
}
</style>
<body class="light-bg">
  <?php $this->load->view("_partials/navbar.php") ?>


  
  <div class="container bg-light" style="margin-top:100px">
  <div class="box">
  <h2>Scholarship</h2>
  <div class="search-container">
      <form action="/Landing.php"class="form-inline" >
        <!-- <div class="form-group mx-sm-2 mb-3"> -->
          <label for="search" class="sr-only">Search</label>
          <input type="text" class="form-control" id="search" placeholder="Search..." name="search" style="width: 95%;">
        <!-- </div> -->
        <button type="submit" class="mb-2 text-white" style="position: relative; top: 4px;"><i class="fa fa-search"></i></button>
      </form>
    </div>
  
  <div class="container">
  <table id="table_beasiswa" class="table dt-responsive display" style="width:100%" datatable="">
            <thead style="display: none;">
                <tr>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($beasiswa as $row) {?>
                <tr>
                    <td width="150"><img src="<?= base_url('upload/poster/') ?><?= $row->poster ?>" alt="" height="100"></td>
                    <td width="600">
                    <h3 style="position: relative; right: 16px;"><a href="<?= site_url('Beasiswa/detailBeasiswa/'.$row->id_beasiswa)?>" class="nav-link text-info"><?= $row->judul?></a></h3> 
                    <h4><?= $row->jenis?></h4>
                    <h6><?= substr($row->deskripsi, 0, 120) ?></h6>
                    </td>
                    <td width="250">
                      <p class=tgl style="font-size: 14px; width=100; position: relative; 
                      top: 24px;" >posted :<?= $row->tgl_mulai?></p>
                      <p class=tgl style="font-size: 14px; position: relative; 
                      top: 24px;">until :<?= $row->tgl_selesai?></p>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

  </div>
  </div>
  </div>
  <!-- Pemanggilan JS dari Bootstrap -->
  <?php $this->load->view("_partials/js.php") ?>

</body>
<script type="text/javascript">
    $(document).ready( function () {
        $('#table_beasiswa').DataTable( {
             responsive: true,
            //  "searching": false
          } );
          var table = $('#table_beasiswa').DataTable();
        $("#search").on("keyup",function(){
          console.log(this.value)
        table.search(this.value).draw();
        })
    } );
</script>

</html>