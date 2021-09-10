<?php
session_start();
if(!isset($_SESSION['loginspk'])){
    header('location:login.php');
    exit;
}

require 'library.php';

$utama = 1;

//input
if(isset($_POST['daftar'])){
    if(input($_POST)>0){
        echo "<script>alert('Berhasil');</script>";
    }else{
     echo "<script>alert('Gagal');</script>";
    }
}

//back

if(isset($_POST['back'])){
    header('location: index.php');
    exit;
}

//button daftar
if(isset($_POST['submit'])){
    $input = 1;
    $utama = 0;
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="icon" href="img/hmf.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spk Pimsid</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="bg2"></div>
    <div class="bg"></div>
    <div class="logo">
        <img src="img/hmf.png" width="80px" height="80px">
        <h3>Milenial <br> Informatic</h3>
    </div>
    <div class="navbar">
            <ul>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                    <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg>
                    <a href="#">Home</a>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                    </svg>
                    <a href="view.php">View</a>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                    <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    <a href="kriteria.php">Kriteria</a>
                </li>
                <li id="logout">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
    </div>

    <?php if($utama == 1) :?>
    <div class="judul1">
        <h1>Aplikasi Sistem Pendukung Keputusan <br> Pemilihan Pimpinan Sidang</h1>
    </div>
    <?php endif; ?>

    <?php if($input == 1): ?>
    <div class="input1">
        <h2>Daftar</h2>
        <form method="post">
            <ul>
                <li>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="sertakan dengan Gelar" required autofocus>
                </li>
                <li>
                    <label for="nrp">Nrp</label>
                    <input type="text" id="nrp" name="nrp" required>
                </li>
                <li>
                    <label for="jabatan">Jabatan</label>
                    <select name="jabatan" id="nama">
                        <option >--pilih--</option>
                        <option value="ketua">Ketua</option>
                        <option value="waket">Waket</option>
                        <option value="staf">Staff</option>
                        <option value="dosen">Dosen</option>
                        <option id="anggota" value="">Anggota</option>
                    </select>
                    <select name="anggota" id="anggota1">
                        <option value="" >pilih</option>
                        <option value="anggota1">Anggota I</option>
                        <option value="anggota2">Anggota II</option>
                        <option value="anggota3">Anggota III</option>
                    </select>
                </li>
                <li>
                    <button  class="btn btn-primary" type="submit" name="daftar" id="daftar">Daftar</button>
                </li>
            </ul>
        </form>
        <form method="post">
             <button  class="btn btn-primary" type="submit" name="back" id="back">Back</button>
        </form>
    </div>
    <?php endif;?>
    
    <?php if($utama == 1) :?>
    <div class="button">
        <form method="post">
            <button class="btn btn-success"type="submit" name="submit">Daftar</button>
        </form>
    </div>
    <?php endif;?>

    <script type="text/javascript">
         var anggota = document.getElementById('anggota');
         var anggota1 = document.getElementById('anggota1');

         anggota1.style.display = 'none';

        anggota.addEventListener('click',function(){
            console.log('event click Success');
             anggota1.style.display = 'block';
         });
    </script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</body>
</html>