<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mobil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4c class="text-white">
                    Daftar Mobil
                </h4>
            </div>

            <div class="card-body">
            <a href="form-mobil.php">
                    <button class="btn btn-success btn-block mb-2">
                     Tambahkan Mobil
                    </button>
                </a>
                <form action="list-mobil.php" method="get">
                    <input type="text" name="search" 
                    class="form-control mb-2"
                    placeholder="Masukan Keyword Pencarian" />
                </form>

                <ul class="list-group">
                    <?php
                    include "connection.php";
                    if(isset($_GET["search"])) {
                        $search = $_GET["search"];
                        $sql = "select * from mobil where merk like '%$search%'
                        or harga_sewa like '%$search%'
                        or tahun_pembuatan like '%$search%'";
                    }
                    else {
                        $sql = "select * from mobil";
                    }

                    # eksekusi
                    $hasil = mysqli_query($connect, $sql);
                    while ($mobil = mysqli_fetch_array($hasil)) {
                        ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-4">
                                    <!-- untuk gambar -->
                                    <img src="cover/<?=$mobil["cover"]?>"
                                    width="300" />
                                </div>
                                <div class="col-lg-6">
                                    <!-- untuk deskripsi mobil -->
                                    <h5>Merk Mobil : <?=$mobil["merk"]?></h5>
                                    <h6>Harga Sewa : <?=$mobil["harga_sewa"]?></h6>
                                    <h6>Tahun Pembuatan : <?=$mobil["tahun_pembuatan"]?></h6>
                                </div>
                                <div class="col-lg-2">
                                    <a href="form-mobil.php?nopol=<?=$mobil["nopol"]?>">
                                    <button class="btn btn-info btn-block mb-2">
                                    Edit
                                </button>
                                    </a>
                                    
                                    <a href="process-mobil.php?nopol=<?=$mobil["nopol"]?>"
                                    onclick="return confirm ('are you sure')">
                                    <button class="btn btn-danger btn-block">
                                        Delete
                                    </button>
                                    </a>
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