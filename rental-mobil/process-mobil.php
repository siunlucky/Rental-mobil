<?php
include("connection.php");

# untuk insert mobil
if (isset($_POST["simpan_mobil"])) {
    // tampung data input mobil dari user
    $nopol = $_POST["nopol"];
    $merk = $_POST["merk"];
    $harga_sewa = $_POST["harga_sewa"];
    $tahun_pembuatan = $_POST["tahun_pembuatan"];
    
    
    # mmanage upload file
    $fileName = $_FILES["cover"]["name"]; // file name
    $extension = pathinfo($_FILES["cover"]["name"]);
    $ext = $extension["extension"]; //extensi file

    $cover = time()."-".$fileName;

    #proses upload
    $folderName = "cover/$cover";
    if (move_uploaded_file($_FILES["cover"]["tmp_name"],$folderName)) {
        // membuat perintah sql utk insert data ke tbl mobil
        $sql = "insert into mobil values ('$nopol', '$merk', 
        '$harga_sewa', '$tahun_pembuatan','$cover')";

        // eksekusi perintah sql
        mysqli_query($connect, $sql);

        // direct ke halaman list mobil
        header("location: list-mobil.php");
    } else{
        echo "Upload File Gagal";
    }
    
}

# untuk edit mobil
elseif (isset($_POST["edit_mobil"])) {
    // tampung data edit mobil dari user
    $nopol = $_POST["nopol"];
    $merk = $_POST["merk"];
    $harga_sewa = $_POST["harga_sewa"];
    $tahun_pembuatan = $_POST["tahun_pembuatan"];

    # jika update data dan gambar
    if (!empty($_FILES["cover"]["name"])) {
        # ambil data nama file yg akan dihapus
        $sql ="select * from mobil where nopol='$nopol'";
        # eksekusi perintah sql
        $hasil = mysqli_query($connect, $sql);
        # konversi hasil query ke bentuk array
        $mobil = mysqli_fetch_array($hasil);  
        
        $oldFileName = $mobil["cover"];

        # membuat path file yg lama
        $path = "cover/$oldFileName";

        # cek eksistensi file lama
        if (file_exists($path)){
            # hapus file lama
            unlink($path);
        }

        # membuat file name baru 
        $cover = time()."-".$_FILES["cover"]["name"];
        $folder = "cover/$cover";

        # proses upload file baru
        if (move_uploaded_file($_FILES["cover"]["tmp_name"], $folder)) {
            $sql = "update mobil set tahun_pembuatan ='$tahun_pembuatan', merk='$merk',
            ,cover='$cover' where nopol='$nopol'";
           

            if (mysqli_query($connect, $sql)) {
                header("location:list-mobil.php");
            } else {
                echo "gagal euy";
            }
        }
    }
    # jika update data 
    else {
        $sql = "update mobil set tahun_pembuatan ='$tahun_pembuatan', merk='$merk',
                 where nopol='$nopol'";

            if (mysqli_query($connect, $sql)) {
                header("location:list-mobil.php");
            } else {
                echo "Failed Kawan";
            }
    }
}

elseif (isset($_GET["nopol"])) {
    $nopol = $_GET['nopol'];

     # ambil data nama file yg akan dihapus
     $sql ="select * from mobil where nopol='$nopol'";
     # eksekusi perintah sql
     $hasil = mysqli_query($connect, $sql);
     # konversi hasil query ke bentuk array
     $mobil = mysqli_fetch_array($hasil);  
     
     $oldFileName = $mobil["cover"];

     # membuat path file yg lama
     $path = "cover/$oldFileName";

     # cek eksistensi file lama
     if (file_exists($path)){
         # hapus file lama
         unlink($path);
     }

     $sql ="delete from mobil where nopol = '".$nopol."'" ;
     # eksekusi perintah sql
     $hasil = mysqli_query($connect, $sql);
     header("location:list-mobil.php");
}

?>