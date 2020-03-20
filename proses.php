<?php
include 'db.php';
$db = new Database();

$aksi = $_GET['aksi'];
if($aksi == "simpan"){
    $db->input($_POST['nama'],$_POST['alamat'],$_POST['usia']);
    header("location:tampil.php");
}

else if($aksi == "hapus"){
    $db->hapus($_GET['id_user']);
    header("location:tampil.php");
}

else if($aksi == "update"){
    $db->update($_POST['id_user'],
    $_POST['nama'],$_POST['alamat'],$_POST['usia']);
    header("location:tampil.php");
}
?>