<?php
session_start();
error_reporting(0);
include 'pages/head.php';
include '../config/koneksi.php';
?>
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Users</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Profil</h4>
                            <hr>
                            <div class="container">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <?php
                                            $nama = $_SESSION['nm_user'];
                                            $pluser = mysqli_query($conn, "SELECT * FROM tb_user WHERE nm_user='$nama'");
                                            $data=mysqli_fetch_array($pluser);
                                            ?>
                                            <tr>
                                                <td width="20%">Nama User </td>
                                                <td> : <?php echo $data['nm_user']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Username </td>
                                                <td> : <?php echo $data['us_user']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Password </td>
                                                <td> : <?php echo $data['ps_user']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                  <a href="index.php" class="btn btn-sm btn-warning text-white">Kembali</a>
                                                  
                                                  <a class="btn btn-sm btn-info text-white ml-2" id="te_users" href="#" data-toggle="modal" data-target="#me_users" 
                                                  data-id="<?php echo $data['id_user']; ?>"
                                                  data-nm="<?php echo $data['nm_user']; ?>"
                                                  data-us="<?php echo $data['us_user']; ?>"
                                                  data-rl="<?php echo $data['rl_user']; ?>"
                                                  >Edit Profil</a>
                                                </td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <section>
            <?php include 'modals/me_users.php'; ?>
        </section>

<?php include 'pages/foot.php'; ?>
<script>
      $(document).on("click", "#te_users", function(){
          var id = $(this).data('id');
          var nm = $(this).data('nm');
          var us = $(this).data('us');
          var ps = $(this).data('ps');
          var rl = $(this).data('rl');

          $("#me_users #id_user").val(id);
          $("#me_users #nm_user").val(nm);
          $("#me_users #us_user").val(us);
          $("#me_users #rl_user").val(rl);
        })

      $(document).ready(function(e){
        $('#form').on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url : 'ae_users.php',
                type : 'POST',
                data : new FormData(this),
                contentType : false,
                cache : false,
                processData : false,
                success : function(msg){
                    $('.table').html(msg);
                }
            });
        });
      })
</script>