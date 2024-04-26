<?php
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
                            <h4 class="card-title">Data Users</h4>
                            <hr>
                            <ul class="nav nav-pills mb-3">
                                <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Siswa</a>
                                </li>
                                <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Admin</a>
                                </li>
                                </li>
                            </ul>
                            <hr>
                            <div class="tab-content br-n pn">
                                <div id="navpills-1" class="tab-pane active">
                                    <div class="row align-items-center">
                                        <div class="container">
                                          <form action="" method="post">
                                            <button type="button" class="btn btn-sm btn-info text-white mr-1" data-toggle="modal" data-target="#mt_users">Tambah
                                            </button>
                                            <button type="button" class="btn btn-sm btn-success text-white ml-1 mr-1" data-toggle="modal" data-target="#mi_users">Import
                                            </button>
                                            <input type="submit" name="hapus_usr" value="Hapus" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Data akan dihapus..')">
                                            <div class="table-responsive">
                                                <table class="table table-bordered zero-configuration table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th class="bg bg-dark text-white text-center">No.</th>
                                                            <th class="bg bg-dark text-white text-center">Cek</th>
                                                            <th class="bg bg-dark text-white text-center">Nama User</th>
                                                            <th class="bg bg-dark text-white text-center">Username</th>
                                                            <th class="bg bg-dark text-white text-center">Password</th>
                                                            <th class="bg bg-dark text-white text-center">Role</th>
                                                            <th class="bg bg-dark text-white text-center">Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no=1;
                                                        $pluser = mysqli_query($conn, "SELECT * FROM tb_user WHERE rl_user='Siswa'");
                                                        while($data=mysqli_fetch_array($pluser)){
                                                        ?>
                                                        <tr>
                                                            <td align="center"><?php echo $no++; ?></td>
                                                            <td align="center"><input type="checkbox" name="id_user[]" value="<?php echo $data['id_user']; ?>"></td>
                                                            <td><?php echo $data['nm_user']; ?></td>
                                                            <td><?php echo $data['us_user']; ?></td>
                                                            <td><?php echo $data['ps_user']; ?></td>
                                                            <td><?php echo $data['rl_user']; ?></td>
                                                            <td align="center">
                                                              <div class="btn-group btn-sm">
                                                                  <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Pilih</button>
                                                                  <div class="dropdown-menu">
                                                                      <a class="dropdown-item btn-sm text-danger" id="te_psusers" href="#" data-toggle="modal" data-target="#me_psusers" 
                                                                      data-id="<?php echo $data['id_user']; ?>"
                                                                      data-nm="<?php echo $data['nm_user']; ?>"
                                                                      data-us="<?php echo $data['us_user']; ?>"
                                                                      data-ps="<?php echo $data['ps_user']; ?>"
                                                                      data-rl="<?php echo $data['rl_user']; ?>"
                                                                      >Reset Password</a>
                                                                      <a class="dropdown-item btn-sm text-info" id="te_users" href="#" data-toggle="modal" data-target="#me_users" 
                                                                      data-id="<?php echo $data['id_user']; ?>"
                                                                      data-nm="<?php echo $data['nm_user']; ?>"
                                                                      data-us="<?php echo $data['us_user']; ?>"
                                                                      data-rl="<?php echo $data['rl_user']; ?>"
                                                                      >Edit User</a>
                                                                  </div>
                                                              </div>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                          </form>
                                          <?php
                                          if (isset($_POST['hapus_usr'])) {
                                          $jml = count($_POST['id_user']);

                                          for ($i=0; $i<$jml; $i++) { 
                                          $id = $_POST['id_user'][$i];
                                          $sql = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user = '".$id."'");
                                          $data = mysqli_fetch_array($sql);

                                          $hapus1 = mysqli_query($conn, "DELETE FROM tb_user WHERE id_user = '".$id."' ");
                                              }
                                              if ($hapus1) {
                                              echo '<script>window.location="pg_users.php?toastr=warning_toast"</script>';
                                              }else{
                                              echo '<script>window.location="pg_users.php?toastr=gagal_toast"</script>';
                                              }
                                          }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div id="navpills-2" class="tab-pane">
                                    <div class="row align-items-center">
                                        <div class="container">
                                          <form action="" method="post">
                                            <button type="button" class="btn btn-sm btn-info text-white mr-1" data-toggle="modal" data-target="#mt_admin">Tambah
                                            </button>
                                            <input type="submit" name="hapus_adm" value="Hapus" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Data akan dihapus..')">
                                            <div class="table-responsive">
                                                <table class="table table-bordered zero-configuration table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th class="bg bg-primary text-white text-center">No.</th>
                                                            <th class="bg bg-primary text-white text-center">Cek</th>
                                                            <th class="bg bg-primary text-white text-center">Nama Admin</th>
                                                            <th class="bg bg-primary text-white text-center">Username</th>
                                                            <th class="bg bg-primary text-white text-center">Password</th>
                                                            <th class="bg bg-primary text-white text-center">Role</th>
                                                            <th class="bg bg-primary text-white text-center">Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no=1;
                                                        $pluser = mysqli_query($conn, "SELECT * FROM tb_admin WHERE rl_admin='Admin'");
                                                        while($data=mysqli_fetch_array($pluser)){
                                                        ?>
                                                        <tr>
                                                            <td align="center"><?php echo $no++; ?></td>
                                                            <td align="center"><input type="checkbox" name="id_admin[]" value="<?php echo $data['id_admin']; ?>"></td>
                                                            <td><?php echo $data['nm_admin']; ?></td>
                                                            <td><?php echo $data['us_admin']; ?></td>
                                                            <td><?php echo $data['ps_admin']; ?></td>
                                                            <td><?php echo $data['rl_admin']; ?></td>
                                                            <td align="center">
                                                              <div class="btn-group btn-sm">
                                                                  <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Pilih</button>
                                                                  <div class="dropdown-menu">
                                                                      <a class="dropdown-item btn-sm text-danger" id="te_psadmin" href="#" data-toggle="modal" data-target="#me_psadmin" 
                                                                      data-id="<?php echo $data['id_admin']; ?>"
                                                                      data-nm="<?php echo $data['nm_admin']; ?>"
                                                                      data-us="<?php echo $data['us_admin']; ?>"
                                                                      data-ps="<?php echo $data['ps_admin']; ?>"
                                                                      data-rl="<?php echo $data['rl_admin']; ?>"
                                                                      >Reset Password</a>
                                                                      <a class="dropdown-item btn-sm text-info" id="te_admin" href="#" data-toggle="modal" data-target="#me_admin" 
                                                                      data-id="<?php echo $data['id_admin']; ?>"
                                                                      data-nm="<?php echo $data['nm_admin']; ?>"
                                                                      data-us="<?php echo $data['us_admin']; ?>"
                                                                      data-rl="<?php echo $data['rl_admin']; ?>"
                                                                      >Edit Admin</a>
                                                                  </div>
                                                              </div>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                          </form>
                                          <?php
                                          if (isset($_POST['hapus_adm'])) {
                                          $jml = count($_POST['id_admin']);

                                          for ($i=0; $i<$jml; $i++) { 
                                          $id = $_POST['id_admin'][$i];
                                          $sql = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '".$id."'");
                                          $data = mysqli_fetch_array($sql);

                                          $hapus2 = mysqli_query($conn, "DELETE FROM tb_admin WHERE id_admin = '".$id."' ");
                                              }
                                              if ($hapus2) {
                                              echo '<script>window.location="pg_users.php?toastr=warning_toast"</script>';
                                              }else{
                                              echo '<script>window.location="pg_users.php?toastr=gagal_toast"</script>';
                                              }
                                          }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <section>
            <?php include 'modals/mt_users.php'; ?>
            <?php include 'modals/me_psusers.php'; ?>
            <?php include 'modals/me_users.php'; ?>
            <?php include 'modals/mi_users.php'; ?>
        </section>
        <section>
            <?php include 'modals/mt_admin.php'; ?>
            <?php include 'modals/me_psadmin.php'; ?>
            <?php include 'modals/me_admin.php'; ?>
        </section>

<?php include 'pages/foot.php'; ?>
<script>
      $(document).on("click", "#te_psusers", function(){
          var id = $(this).data('id');
          var nm = $(this).data('nm');
          var us = $(this).data('us');
          var ps = $(this).data('ps');
          var rl = $(this).data('rl');

          $("#me_psusers #id_user").val(id);
          $("#me_psusers #nm_user").val(nm);
          $("#me_psusers #us_user").val(us);
          $("#me_psusers #ps_user").val(ps);
          $("#me_psusers #rl_user").val(rl);
        })

      $(document).ready(function(e){
        $('#form').on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url : 'ae_psusers.php',
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

      $(document).on("click", "#te_psadmin", function(){
          var id = $(this).data('id');
          var nm = $(this).data('nm');
          var us = $(this).data('us');
          var ps = $(this).data('ps');
          var rl = $(this).data('rl');

          $("#me_psadmin #id_admin").val(id);
          $("#me_psadmin #nm_admin").val(nm);
          $("#me_psadmin #us_admin").val(us);
          $("#me_psadmin #ps_admin").val(ps);
          $("#me_psadmin #rl_admin").val(rl);
        })

      $(document).ready(function(e){
        $('#form').on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url : 'ae_psadmin.php',
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

      $(document).on("click", "#te_admin", function(){
          var id = $(this).data('id');
          var nm = $(this).data('nm');
          var us = $(this).data('us');
          var rl = $(this).data('rl');

          $("#me_admin #id_admin").val(id);
          $("#me_admin #nm_admin").val(nm);
          $("#me_admin #us_admin").val(us);
          $("#me_admin #rl_admin").val(rl);
        })

      $(document).ready(function(e){
        $('#form').on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url : 'ae_admin.php',
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
      
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>