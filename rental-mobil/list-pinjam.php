<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Daftar Peminjaman</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white">
                    Daftar Peminjaman Rental Kilat
                </h4>
            </div>

            <div class="card-body">
            <a href="form-pinjam.php">
                    <button class="btn btn-success btn-block mb-2">
                     Tambah Rental?
                    </button>
                </a>
                <ul class="list-group">
                    <?php
                    include "connection.php";
                    $sql = "select * from
                    pinjam inner join customer
                    on customer.id_customer=pinjam.id_customer
                    inner join karyawan
                    on pinjam.id_karyawan=karyawan.id_karyawan";

                    $hasil = mysqli_query($connect, $sql);
                    while ($pinjam = mysqli_fetch_array($hasil)) {
                        ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <small class="text-info">Kode Pinjam</small>
                                    <h5><?=($pinjam["id_pinjam"])?></h5>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <small class="text-info">Peminjam</small>
                                    <h5><?=($pinjam["nama_customer"])?></h5>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <small class="text-info">Petugas</small>
                                    <h5><?=($pinjam["nama_karyawan"])?></h5>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <small class="text-info">Tgl. Pinjam</small>
                                    <h5><?=($pinjam["tgl_pinjam"])?></h5>
                                </div>
                            </div>
                            
                            <small class="text-success">
                                <u> Mobil yang dipinjam</u>
                            </small>
                            <ul>
                            <?php
                             $id_pinjam= $pinjam["id_pinjam"];
                             $sql = "select * from pinjam
                             inner join mobil on pinjam.nopol = mobil.nopol
                             where id_pinjam = '$id_pinjam'";

                            $hasil_mobil = mysqli_query($connect, $sql);
                            while ($mobil = mysqli_fetch_array($hasil_mobil)) {
                                ?>
                                <li>
                                    <small>
                                        <?=($mobil["merk"])?>
                                    </small>
                                </li>
                                <?php
                            }
                            ?>
                            </ul>
                            
                        </li>
                    <?php }
                    ?>
                </ul>
            </div>     
        </div>
    </div>
</body>
</html>