<?php
include './connection.php';
if (isset($_POST["simpan_customer"])) {
    #proses simpan new data 
    // tampung data input customer dari user
    $id_customer = $_POST["id_customer"];

$alamat = $_POST["alamat"];
$nomor_hp = $_POST["no_hp"];
$tanggal_lahir = $_POST["tgl_lahir"];
$nama_customer = $_POST["nama_customer"];


// membuat perintah sql untuk insert data ke table customer

$sql = "insert into customer values ('$id_customer','$nama_customer','$alamat','$nomor_hp','$tanggal_lahir')";

//eksekusi perintah SQL
mysqli_query($connect, $sql);
echo $sql;

// direct ke halaman list customer

 header("location:list-customer.php");
}
if (isset($_POST["simpan_customer"])) {
    #tampung data yang akan diupdate
    $id_customer = $_POST["id_customer"];

    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $nama_customer = $_POST["nama_customer"];
    #membuat perintah sql update ke table customer
    $sql ="update customer set nama_customer = '$nama_customer', no_hp ='$no_hp', alamat ='$alamat' , tgl_lahir = '$tgl_lahir'
    where id_customer = '$id_customer' ";

    mysqli_query($connect, $sql);
    header("location:list-customer.php");
}

?>