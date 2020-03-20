<?php
class Database {
    public $connect;
    public function __construct(){
        $this->connect = mysqli_connect("localhost","root","","dbphp");
        if($this->connect){
            //echo "Connected";
        }else{
            echo "Not Connected";
        }
    }

    public function input($nama,$alamat, $usia){
        $query = $this->connect->prepare("INSERT into `user` values('','$nama','$alamat','$usia')");
         $query->execute();
             return true;
    }
    public function tampil(){
        $query = $this->connect->prepare
        ("SELECT * FROM `user`");
        $query->execute();
            $hasil = $query->get_result();
            return $hasil;
    }
    public function hapus($id_user){
        $query = $this->connect->prepare("DELETE FROM `user`WHERE `id_user` = '$id_user' ");
        $query->execute();
        $query->close();
        $this->connect->close();
        return true;
    }
    public function edit($id_user){
        $query = $this->connect->prepare
        ("SELECT * FROM `user` WHERE `id_user` = '$id_user'");
        $query->execute();
        $hasil = $query->get_result();
        return $hasil;
    }
    public function update($id_user, $nama, $alamat, $usia){
        $query = $this->connect->prepare
        ("UPDATE `user` SET `nama` = '$nama', `alamat` = '$alamat', `usia` = '$usia' WHERE `id_user` = '$id_user'");
        $query->execute();
        return true;
    }
    public function cari($nama){
        $query = $this->connect->prepare
        ("SELECT * FROM `user` WHERE `nama` LIKE '%$nama%' ");
        $query->execute();
        $hasil = $query->get_result();
        return $hasil;
    }
}