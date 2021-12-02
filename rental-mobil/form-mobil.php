<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form-mobil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container ">
        <div class="card">
            <div class="card-header bg-dg">
                <h4 class=" text-red">
                    FORM MOBIL
                </h4>
            </div>
            <div class="card-body">
                <?php
                if (isset($_GET["nopol"])) {
                    # form untuk edit
                    $nopol = $_GET["nopol"];
                    $sql = "select * from mobil
                    where nopol='$nopol'";
                    include "connection.php";

                    # eksekusi
                    $hasil = mysqli_query($connect, $sql);

                    # konversi ke array
                    $mobil = mysqli_fetch_array($hasil);
                    ?>

                     <form action="process-mobil.php" method="post"
                enctype="multipart/form-data">
                    Nomor Polisi
                    <input type="text" name="nopol" 
                    class="form-control mb-2" required
                    value="<?=$mobil["nopol"]?> " readonly>

                    Harga Sewa
                    <input type="text" name="harga_sewa" 
                    class="form-control mb-2" required
                    value="<?=$mobil["harga_sewa"]?> ">

                    Merk
                    <input type="text" name="merk" 
                    class="form-control mb-2" required
                    value="<?=$mobil["merk"]?> " >

                    Tahun Pembuatan
                    <input type="text" name="tahun_pembuatan" 
                    class="form-control mb-2" required
                    value="<?=$mobil["tahun_pembuatan"]?> ">

                    Cover <br>
                    
                    <img src="cover/<?=$mobil["cover"]?>"
                    width="300 /">
                    <input type="file" name="cover"
                    class="form-control mb-2">

                    <button type="submit" 
                    class="btn btn-info btn-block" name="edit_mobil">
                    Simpan edit
                    </button>

                </form>

                    <?php

                } else {
                    # form untuk insert
                    ?>

                     <form action="process-mobil.php" method="post"
                enctype="multipart/form-data">
                    Nomor Polisi
                    <input type="text" name="nopol" 
                    class="form-control mb-2" required>

                    Harga Sewa
                    <input type="text" name="harga_sewa" 
                    class="form-control mb-2" required>

                    Merk
                    <input type="text" name="merk" 
                    class="form-control mb-2" required>

                    Tahun Pembuatan
                    <input type="text" name="tahun_pembuatan" 
                    class="form-control mb-2" required>

                    Cover
                    <input type="file" name="cover"
                    class="form-control mb-2 " required>

                    <button type="submit" 
                    class="btn btn-info btn-block" name="simpan_mobil">
                    Simpan Form
                    </button>

                </form>

                    <?php
                }
                
                ?>
               
            </div>
        </div>
    </div>
</body>
</html>