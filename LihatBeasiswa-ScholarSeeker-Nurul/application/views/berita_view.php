<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>News</title>
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
</style>
<body class="light-bg">
  <?php $this->load->view("_partials/navbar.php") ?>


  
  <div class="container bg-light" style="margin-top:100px">
  <div class="box">
  <h2>News</h2>
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
  <table id="tabel_berita" class="table table-bordered table-hover dt-responsive display"style="width:100%">
    <thead>
        <tr>
            <!-- <th></th>
            <th></th>
            <th></th> -->
        </tr>
    </thead>
    <tbody>
      <?php foreach ($news as $row) {?>
        <tr>
            <td class="text-center">
              <img src="<?= base_url('upload/gambar/') ?><?= $row->gambar ?>" alt="" height="100"></td>
            </td>
            <td width="600">
              <h3><?= $row->judul?></h3>
              <h6><?= substr($row->isi, 0, 120) ?></h6>
            </td>
            <td width="250">
              <p class=tgl style="font-size: 14px; width=100" >posted :<?= $row->tanggal?></p>
            </td>
        </tr>
      <?php } ?>
    </tbody>
</table>

  </div>
  <!-- Pemanggilan JS dari Bootstrap -->
  <?php $this->load->view("_partials/js.php") ?>

</body>

<script type="text/javascript">
    $(document).ready( function () {
        $('#table_berita').DataTable( {
             responsive: true,
            //  "searching": false
          } );
          var table = $('#table_berita').DataTable();
        $("#search").on("keyup",function(){
          console.log(this.value)
        table.search(this.value).draw();
        })
    } );
</script>




</html>