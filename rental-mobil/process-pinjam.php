<?php
include "connection.php";
# menampung data yg dikirim
$id_pinjam = $_POST["id_pinjam"];
$id_customer = $_POST["id_customer"];
$id_karyawan = $_POST["id_karyawan"];
$nopol = $_POST["nopol"];
// print_r($mobil);
$tgl_pinjam = $_POST["tgl_pinjam"];


# perintah SQL untuk insert ke table pinjam
$sql = "insert into pinjam values
('$id_pinjam','$id_customer',
'$id_karyawan','$nopol','$tgl_pinjam')";

mysqli_query($connect, $sql);
    header("location:list-pinjam.php");

?>