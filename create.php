<!DOCTYPE HTML>
<HTML>
    <title>Form Pendaftaran Anggota</title>
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
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username=input($_POST["username"]);
        $nama=input($_POST["nama"]);
        $alamat=input($_POST["alamat"]);
        $email=input($_POST["email"]);
        $no_hp=input($_POST["no_hp"]);

        $sql="insert into anggota(username, nama, alamat, email, no_hp)
         values('$username','$nama','$alamat','$email','$no_hp')";

         $hasil=mysqli_query($kon,$sql);
         if($hasil){
            header("Location:index.php");
            }
        else{
                echo "<div class='alert alert-danger'>Data Gagal disimpan.</div>";
            }

    }
    ?>

<h2>Input Data</h2>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" METHOD="POST">
<div class="form-group">
    <label>Username :</label>
    <input type="text" name="username" class="form-control" placeholder="masukkan username" required>
</div>
<div class="form-group">
    <label>Nama :</label>
    <input type="text" name="nama" class="form-control" placeholder="masukkan nama" required >
</div>
<div class="form-group">
    <label>Alamat :</label>
    <textarea name="alamat" class="form-control" rows="5" placeholder="masukkan alamat" required ></textarea>
</div>
<div class="form-group">
    <label>Email :</label>
    <input type="email" name="email" class="form-control" placeholder="masukkan email" required>
</div>
<div class="form-group">
    <label>Nomor HP :</label>
    <input type="text" name="no_hp" class="form-control" placeholder="masukkan nomor HP" required >
</div>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>
