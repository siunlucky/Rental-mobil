<?php
session_start();
# jika saat load halaman ini, pastikan telah login
# sbg karyawan
if (!isset($_SESSION["karyawan"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Form Peminjaman Mobil</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white">
                    Form Peminjaman Mobil
                </h4>
            </div>
            <div class="card-body">
                <form action="process-pinjam.php"
                method="post">
                <!-- input kode pinjam -->
                Kode Peminjaman
                <input type="text" name="id_pinjam"
                class="form-control mb-2" required />

                <!-- tgl_pinjam dibuat otomatis -->
                <?php
                date_default_timezone_set('Asia/Jakarta');
                ?>
                Tanggal Pinjam
                <input type="text" name="tgl_pinjam"
                class="form-control mb-2" readonly
                value="<?=(date("Y-m-d H:i:s"))?>">

                <!-- pilih customer melalui nama -->
                Pilih Data Anggota
                <select name="id_customer"
                class="form-control mb-2" required>
                <?php
                include "connection.php";
                $sql = "select * from customer";
                $hasil = mysqli_query($connect,$sql);
                while ($customer = mysqli_fetch_array($hasil)) {
                    ?>
                    <option value="<?=($customer["id_customer"])?>">
                        <?=($customer["nama_customer"])?>
                    </option>
                    <?php
                }
                ?>
                </select>
                

                <!-- karyawan ambil dari data login -->
                <input type="hidden" name="id_karyawan"
                value="<?=($_SESSION["karyawan"]["id_karyawan"])?>">

                Petugas
                <input type="text" name="nama_karyawan"
                class="form-control mb-2" readonly
                value="<?=($_SESSION["karyawan"]["nama_karyawan"])?>">

                <!-- tampilkan pilihan mobil yang akan dipinjam -->
                Pilih mobil yang akan dipinjam
                <select name="nopol" class="form-control mb-2"
                required >
                <?php
                $sql = "select * from mobil";
                $hasil = mysqli_query($connect, $sql);
                while ($mobil = mysqli_fetch_array($hasil)) {
                    ?>
                    <option value="<?=($mobil["nopol"])?>">
                        <?=($mobil["merk"])?>
                    </option>
                    <?php
                }
                ?>
                </select>

                <button type="submit"
                class="btn btn-block btn-dark">
                Pinjam
                </button>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>