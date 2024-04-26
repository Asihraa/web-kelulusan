
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>&reg; Powered by <a href="#">Kang Mahmud</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="../assets/plugins/common/common.min.js"></script>
    <script src="../assets/js/custom.min.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/gleek.js"></script>
    <script src="../assets/js/styleSwitcher.js"></script>

    <script src="../assets/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
    <script src="../assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        <?php
        if (@$_GET['toastr']) {
            if (@$_GET['toastr'] == 'success_toast') {
                ?>
                    Swal.fire(
                      'Ok .. Siap Bosque ...',
                      'Data Sukses ditambahkan ...',
                      'success'
                    )
                <?php
            }elseif (@$_GET['toastr'] == 'warning_toast') {
                ?>
                    Swal.fire(
                      'Ok .. Aman Bosque ...',
                      'Data Sukses diubah ...',
                      'warning'
                    )
                <?php
            }elseif (@$_GET['toastr'] == 'error_toast') {
                ?>
                    Swal.fire(
                      'Oppss .. Maaf Bosque ...!',
                      'Ubah data gagal',
                      'error'
                    )
                <?php
            }elseif (@$_GET['toastr'] == 'confirmnis_toast') {
                ?>
                    Swal.fire(
                      'Oppss .. Maaf Bosque ...!',
                      'NIS or NISN Sudah ada ...',
                      'error'
                    )
                <?php
            }elseif (@$_GET['toastr'] == 'confirmkode_toast') {
                ?>
                    Swal.fire(
                      'Oppss .. Maaf Bosque ...!',
                      'Kode Mapel Sudah ada ...',
                      'error'
                    )
                <?php
            }elseif (@$_GET['toastr'] == 'gagal_toast') {
                ?>
                    Swal.fire(
                      'Oppss ...!',
                      'Pilih data dulu ...',
                      'error'
                    )
                <?php
            }elseif (@$_GET['toastr'] == 'okeresetpassword_toast') {
                ?>
                    Swal.fire(
                      'Password Direset ...!',
                      'Password Default "123456"',
                      'success'
                    )
                <?php
            }elseif (@$_GET['toastr'] == 'sesiaktif_toast') {
                ?>
                    Swal.fire(
                      'Maaf ...!',
                      'Anda Harus Logout Dulu',
                      'error'
                    )
                <?php
            }
        }
        ?>

        $(function(){
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
        $('#myModal').modal('show');

    </script>

</body>

</html>