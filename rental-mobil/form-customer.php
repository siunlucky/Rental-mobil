<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form customer</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Form Customer</h4>
            </div>

            <div class="card-body">
                <?php
                if (isset($_GET["id_customer"])) {
                    // memeriksa ketika load file ini
                    // apakah membawa data GET dg nama "id_customer"
                    // jika true, maka form customer digunakan utk edit

                    # mengakses data customer dari id_customer yg dikirim
                    include "connection.php";
                    $id_customer = $_GET["id_customer"];
                    $sql = "select * from customer where id_customer='$id_customer'";
                    # eksekusi perintah sql
                    $hasil = mysqli_query($connect, $sql);
                    # konversi hasil query ke bentuk array
                    $customer = mysqli_fetch_array($hasil);
                    ?>

                <form action="process-customer.php" method="post">
                    ID
                    <input type="text" name="id_customer"
                    class="form-control mb-2" required
                    value="<?=$customer["id_customer"] ?>" readonly>

                    Nama 
                    <input type="text" name="nama_customer"
                    class="form-control mb-2" required
                    value="<?=$customer["nama_customer"] ?>">

                    Tanggal Lahir
                    <input type="date" name="tgl_lahir"
                    class="form-control mb-2" required
                    value="<?=$customer["tgl_lahir"] ?>">

                    Alamat 
                    <input type="text" name="alamat"
                    class="form-control mb-2" required
                    value="<?=$customer["alamat"] ?>">

                    Nomor Telepon
                    <input type="text" name="no_hp"
                    class="form-control mb-2" required
                    value="<?=$customer["no_hp"] ?>">

                    <button type="submit" class="btn btn-primary btn-block"
                    name="simpan_customer" onclick="return confirm('Apakah anda yakin?')">
                        Save
                    </button>
                </form>

                    <?php
                }else {
                    // jika false, maka form customer digunakan utk insert
                    ?>

                <form action="process-customer.php" method="post">
                    ID 
                    <input type="text" name="id_customer"
                    class="form-control mb-2" required>

                    Nama
                    <input type="text" name="nama_customer"
                    class="form-control mb-2" required>

                    Tanggal Lahir
                    <input type="date" name="tgl_lahir"
                    class="form-control mb-2" required>

                    Alamat 
                    <input type="text" name="alamat"
                    class="form-control mb-2" required>

                    Nomor Telepon
                    <input type="text" name="no_hp"
                    class="form-control mb-2" required>

                    <button type="submit" class="btn btn-primary btn-block"
                    name="simpan_customer" onclick="return confirm('Apakah anda yakin?')">
                        Save
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