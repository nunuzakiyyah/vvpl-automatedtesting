<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Pemanggilan Head -->
    <?php $this->load->view("_partials/head.php") ?>

    <style>
        input.hidden {
            position: absolute;
            left: -9999px;
        }
        #profile-image1 {
            cursor: pointer;	
            width: 100px;
            height: 100px;
            border:2px solid #03b1ce ;}
            .tital{ font-size:16px; font-weight:500;}
            .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0
        }
    </style>

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
    </div>

    <div class="container">
	    <div class="row">
            <div class="col-md-7 ">
                <div class="panel panel-default">
                    <div class="panel-heading">  <h4 >User Profile</h4></div>
                    <div class="panel-body">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="col-sm-6">
                                    <div align="center">
                                        <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive">
                                        <input id="profile-image-upload" class="hidden" type="file">
                                        <div style="color:#999;" >click here to change profile image</div>
                                    <!--Upload Image Js And Css-->
                                    </div>
                                    <br>
                                <!-- /input-group -->
                                </div>
                                <div class="col-sm-6">
                                    <h4 style="color:#00b1b1;">Prasad Shankar Huddedar </h4></span>
                                    <span><p>Aspirant</p></span>            
                                </div>
                                <div class="clearfix"></div>
                                <hr style="margin:5px 0 5px 0;">
                                <div class="col-sm-5 col-xs-6 tital " >First Name:</div><div class="col-sm-7 col-xs-6 ">Prasad</div>
                                    <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 tital " >Middle Name:</div><div class="col-sm-7"> Shankar</div>
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 tital " >Last Name:</div><div class="col-sm-7"> Huddedar</div>
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 tital " >Date Of Joining:</div><div class="col-sm-7">15 Jun 2016</div>

                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 tital " >Date Of Birth:</div><div class="col-sm-7">11 Jun 1998</div>

                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 tital " >Place Of Birth:</div><div class="col-sm-7">Shirdi</div>

                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 tital " >Nationality:</div><div class="col-sm-7">Indian</div>

                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 tital " >Relition:</div><div class="col-sm-7">Hindu</div>
                            <!-- /.box-body -->
                            </div>
                        <!-- /.box -->
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

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