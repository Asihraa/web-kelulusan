<?php
    include '../config/koneksi.php';
    $si_jurusan = $_POST['si_jurusan'];
    $option = $_POST['opsi'];
    if($option == '1'){
        $sql = mysqli_query($conn, "SELECT nm_kelas FROM tb_kelas WHERE jr_kelas = '$si_jurusan'");
        if ($sql) {
            echo "<option value=''> ... </option>";
            while($data = mysqli_fetch_array($sql)){
                echo "<option value='".$data['nm_kelas']."'>".$data['nm_kelas']."</option>";
            }
        }
    }
?>