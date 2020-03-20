<html>
<title></title>
<body>
    <a href="index.php"> Tambah Data</a> <br> <br>

    <form action="" method="POST">
        <input type="text" name="cari" placeholder="Cari berdasarkan nama">
        <input type="submit" name="searching" value="cari"> 
    </form>
    <?php
    error_reporting(0);
    $cari = $_POST['cari'];
    ?>
    
    <table border = "1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Usia</th>
            <th>Aksi</th>
        </tr>
        <?php
        error_reporting(0);
        include 'db.php';
        $db = new Database();
        $no = 1;
        

        if($cari != ''){
            $select = $db->cari($_POST['cari']);
        }else{
            $select = $db->tampil();
        }
            foreach($select as $data){
        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['nama']?></td>
            <td><?php echo $data['alamat']?></td>
            <td><?php echo $data['usia']?></td>
            <td>
            <a href = "edit.php?id_user=<?php echo $data['id_user'] ?>"> Edit </a>|
            <a href = "proses.php?id_user=<?php echo $data['id_user']?>&aksi=hapus"> Hapus </a>
            </td>
        </tr>
        <?php } ?>
        
    </table>
</body>
</html>