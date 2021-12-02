<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar karyawan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Daftar Karyawan</h4>
            </div>
            <div class="card-body">
                <!-- tombol daftar -->
                <a href="form-karyawan.php">
                    <button class="btn btn-success btn-block">
                     Tambahkan Karyawan
                    </button>
                </a>
                <hr>
                <!-- kotak pencarian data -->
                <form action="list-karyawan.php" method="get">
                    <input type="text" name="search"
                    class="form-control mb-2"
                    placeholder="Masukan Keyword Pencarian">
                </form>
                <ul class="list-group">
                    <?php
                    include("connection.php");
                    if (isset($_GET["search"])) {
                      
                        $search = $_GET["search"];
                        $sql = "select * from karyawan
                        where id_karyawan like '%$search%'
                        or nama_karyawan like '%$search%'
                        or alamat like '%$search%'
                        or no_hp like '%$search%'";
                    } else {
                        $sql = "select * from karyawan";
                    }

                    $hasil = mysqli_query($connect, $sql);
                    while($karyawan = mysqli_fetch_array($hasil)){ ?>
                        <li class="list-group-item">
                        <div class="row">

                        <div class="col-lg-10 col-md-10">
                                <h5>Nama karyawan : <?php echo $karyawan["nama_karyawan"];?></h5>
                                <h6>ID karyawan : <?php echo $karyawan["id_karyawan"];?></h6>
                                <h6>Telepon : <?php echo $karyawan["no_hp"];?></h6>
                            </div>


                            <div class="col-lg-2 col-md-2">
                                <a href="form-karyawan.php?id_karyawan=<?=$karyawan["id_karyawan"]?>">
                                    <button class="btn btn-block btn-primary mb-1">
                                        Edit
                                    </button>
                                </a>
                                <a href="delete.php?id_karyawan=<?=$karyawan["id_karyawan"]?>">
                                    <button class="btn btn-block btn-danger"
                                    onclick="return confirm('Apakah anda yakin?')">
                                        Remove
                                    </button>
                                </a>
                            </div>
                        </div>
                        </li>
                    <?php
                    }
                    ?>
                    
                </ul>
            </div>
        </div>
    </div>
</body>
</html>