<?php

//database
require 'library.php';

//query
$tabel1 = query("SELECT * FROM absen");
$nrp = query("SELECT MIN(nrp) FROM absen")[0];
$nrp2 = $nrp['MIN(nrp)'];
$datanrp = query("SELECT * FROM absen WHERE nrp = '$nrp2'")[0];

//query pilihan pimsid
$dataPimsid = query("SELECT MAX(poin) FROM absen")[0];
$pimsid1 = $dataPimsid['MAX(poin)'];
$dataPimsid1 = query("SELECT * FROM absen WHERE poin = '$pimsid1'")[0];


//button :
//button daftar
if(isset($_POST['daftar'])){
   if(input($_POST)>0){
       echo "<script>alert('Berhasil');</script>";
   }else{
    echo "<script>alert('Gagal');</script>";
   }
}

//button pilih
if(isset($_POST['pilih'])){
    $poin = $datanrp['poin'];
    $id = $datanrp['id'];

    if($datanrp['nrp'] == $nrp2){
        $totalPoin = $poin + 10;
        echo $totalPoin;
    }

    //update to db
    $query = "UPDATE absen SET poin = $totalPoin WHERE id = $id";
    mysqli_query($con,$query);
    $notif = mysqli_affected_rows($con); 

    //notif
    // if($notif>0){
    //     echo "<script>alert('berhasil');</script>";
    // }else{
    //     echo "<script>alert('Tidak berhasil');</script>";
    // }

}



if(isset($_POST['hapus'])){
    $query = "TRUNCATE TABLE absen";
    mysqli_query($con,$query);

    $notif = mysqli_affected_rows($con); 

    //notif
    if($notif>0){
        echo "<script>alert('Gagal Dikosongkan');</script>";
    }else{
        echo "<script>alert('Data Dikosongkan');</script>";
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK-Pimsid</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="judul">
        <h1>Aplikasi SPK <br> Pemilihan Pimpinan Sidang</h1>
    </div>

    <div class="input">
        <form method="post">
            <ul>
                <li>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="sertakan dengan Gelar">
                </li>
                <li>
                    <label for="nrp">Nrp</label>
                    <input type="text" id="nama" name="nrp">
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
                    <button type="submit" name=daftar>Daftar</button>
                </li>
            </ul>
        </form>
    </div>
    
    <div class="table1">
        <table border='1' cellpadding='10' cellspacing='0'>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nrp</th>
                <th>Jabatan</th>
            </tr> 
            <?php $i =1; ?>
            <?php foreach($tabel1 as $data) :?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['nrp']; ?></td>
                <td><?= $data['jabatan']; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach;?>
        </table>
    </div>

    
    <div class="table2">
        <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                     <th>No</th>
                    <th>Nama</th>
                    <th>Nrp</th>
                    <th>Jabatan</th>
                    <th>Tugas</th>
                </tr>
                <?php $i = 1; ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $dataPimsid1['nama'];?></td>
                    <td><?= $dataPimsid1['nrp']; ?></td>
                    <td><?= $dataPimsid1['jabatan']; ?></td>
                    <td>Pemimpin sidang</td>
                </tr>
                <?php $i++;?>
        </table>
    </div>

    <div class="button">
            <form method="post">
                <button type="submit" name="pilih" id="pilih">Pilih Pimsid</button>
            </form>
    </div>

    <div class="button2">
        <form method="post">
                <button type="submit" name="hapus" >Hapus Data</button>
        </form>
    </div>

    <script type="text/javascript">
         var anggota = document.getElementById('anggota');
         var anggota1 = document.getElementById('anggota1');

         anggota1.style.display = 'none';

        anggota.addEventListener('click',function(){
            console.log('event click Success');
             anggota1.style.display = 'block';
         });
    </script>
    
</body>
</html>