<!DOCTYPE HTML>
<HTML>
    <title>Form Perubahan Data Anggota</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <?php
    include "koneksi.php";

    function input($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    if(isset($_GET['id_anggota'])){
        $id_anggota=input($_GET["id_anggota"]);
        $sql="select * from anggota where id_anggota ='$id_anggota'";
       // echo $sql;
        $hasil=mysqli_query($kon,$sql);
        $data=mysqli_fetch_assoc($hasil);
        //var_dump($data);
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id_anggota=htmlspecialchars($_POST["id_anggota"]);
        $username=input($_POST["username"]);
        $nama=input($_POST["nama"]);
        $alamat=input($_POST["alamat"]);
        $email=input($_POST["email"]);
        $no_hp=input($_POST["no_hp"]);
        $sql="update anggota set username='$username',
        nama='$nama',alamat='$alamat',email='$email',no_hp='$no_hp'
        where id_anggota='$id_anggota'";
        $hasil=mysqli_query($kon,$sql);
         if($hasil){
            header("Location:index.php");
            }
        else{
                echo "<div class='alert alert-danger'>Data Gagal Diupdate.</div>";
            }

    }
    ?>

<h2>Update Data</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" METHOD="POST">
<div class="form-group">
<input type="hidden" name="id_anggota" class="form-control" value="<?php echo $data['id_anggota']?>">

    <label>Username :</label>
    <input type="text" name="username" class="form-control" value="<?php echo $data['username']?>" placeholder="masukkan username" required>
</div>
<div class="form-group">
    <label>Nama :</label>
    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']?>" placeholder="masukkan nama" required >
</div>
<div class="form-group">
    <label>Alamat :</label>
    <textarea name="alamat" class="form-control" rows="5" placeholder="masukkan alamat" required ><?php echo $data['alamat']?></textarea>
</div>
<div class="form-group">
    <label>Email :</label>
    <input type="email" name="email" class="form-control" value="<?php echo $data['email']?>" placeholder="masukkan email" required>
</div>
<div class="form-group">
    <label>Nomor HP :</label>
    <input type="text" name="no_hp" class="form-control" value="<?php echo $data['no_hp']?>" placeholder="masukkan nomor HP" required >
</div>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>
