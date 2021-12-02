<?php
include './connection.php';

$id_customer = $_GET['id_customer'];



$sql ="delete from customer where id_customer = '".$id_customer."'" ;

$result = mysqli_query($connect,$sql);

if ($result) {
    header('Location:list-customer.php');
} else {
    printf('Gagal ya'.mysqli_error($connect));
    exit();
}

?>