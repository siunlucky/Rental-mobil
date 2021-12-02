<?php
include './connection.php';
if (isset($_POST["simpan_karyawan"])) {
    #proses simpan new data 
    // tampung data input karyawan dari user
$id_karyawan = $_POST["id_karyawan"];
$alamat = $_POST["alamat"];
$nomor_hp = $_POST["no_hp"];
$nama_karyawan = $_POST["nama_karyawan"];
$username = $_POST["username"];
$password = $_POST["password"];



// membuat perintah sql untuk insert data ke table karyawan

$sql = "insert into karyawan values ('$id_karyawan','$nama_karyawan','$alamat','$nomor_hp','$username','$password')";

//eksekusi perintah SQL
mysqli_query($connect, $sql);
echo $sql;

// direct ke halaman list karyawan

 header("location:list-karyawan.php");
}
if (isset($_POST["simpan_karyawan"])) {
    #tampung data yang akan diupdate
    $id_karyawan = $_POST["id_karyawan"];

    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $nama_karyawan = $_POST["nama_karyawan"];
    $username = $_POST["username"];
$password = $_POST["password"];

    #membuat perintah sql update ke table karyawan
    $sql ="update karyawan set nama_karyawan = '$nama_karyawan', no_hp ='$no_hp', alamat ='$alamat' where id_karyawan = '$id_karyawan'
    username = '$username' password ='$password' ";

    mysqli_query($connect, $sql);
    header("location:list-karyawan.php");
}

?>