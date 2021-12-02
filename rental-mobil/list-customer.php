<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar customer</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white">Daftar Customer</h4>
            </div>
            <div class="card-body">
                <!-- tombol daftar -->
                <a href="form-customer.php">
                    <button class="btn btn-outline-success btn-block">
                     Tambahkan Customer
                    </button>
                </a>
                <hr>
                <!-- kotak pencarian data customer -->
                <form action="list-customer.php" method="get">
                    <input type="text" name="search"
                    class="form-control mb-3"
                    placeholder="Masukan Keyword Pencarian">
                </form>
                <ul class="list-group">
                    <?php
                    include("connection.php");
                    if (isset($_GET["search"])) {
                        $search = $_GET["search"];
                        $sql = "select * from customer
                        where id_customer like '%$search%'
                        or nama_customer like '%$search%'
                        or tgl_lahir like '%$search%'
                        or alamat like '%$search%'
                        or no_hp like '%$search%'";
                    } else {
                        $sql = "select * from customer";
                    }
                    //eksekusi perintah sql
                    $query = mysqli_query($connect, $sql);
                    while($customer = mysqli_fetch_array($query)){ ?>
                        <li class="list-group-item">
                        <div class="row">
                            <!-- bagian data customer-->
                            <div class="col-lg-10 col-md-10">
                                <h5>Nama customer : <?php echo $customer["nama_customer"];?></h5>
                                <h6>ID customer : <?php echo $customer["id_customer"];?></h6>
                                <h6>Tanggal Lahir : <?php echo $customer["tgl_lahir"];?></h6>
                                <h6>Alamat : <?php echo $customer["alamat"];?></h6>
                                <h6>Telepon : <?php echo $customer["no_hp"];?></h6>
                            </div>

                            <!-- bagian tombol pilihan-->
                            <div class="col-lg-2 col-md-2">
                                <a href="form-customer.php?id_customer=<?=$customer["id_customer"]?>">
                                    <button class="btn btn-block btn-outline-primary mb-1">
                                        Edit
                                    </button>
                                </a>
                                <a href="delete.php?id_customer=<?=$customer["id_customer"]?>">
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