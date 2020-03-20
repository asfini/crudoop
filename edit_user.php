<html>
    <title></title>
    <body>
    <?php
    include 'db.php'; 
    $db = new Database();
    foreach($db->edit($_GET['id_user']) as $data){
?>
    <form action="proses.php?aksi=update" method = "post">

    
        <table>
            
            <tr>
                <td>Nama</td>
                <td> 
                <input type="hidden" name = "id_user" value = "<?php echo $data['id_user']?>">    
                <input type = "text" name = "nama" value = "<?php echo $data['nama']?>"> </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td> <input type = "text" name = "alamat" value = "<?php echo $data['alamat']?>"> </td>
            </tr>
            <tr>
                <td>Usia</td>
                <td> <input type = "text" name = "usia" value = "<?php echo $data['usia']?>"> </td>
            </tr>
            <tr>
                <td><input type = "submit" value = "Update"></td>
            </tr>
    <?php } ?>

        </table>
    </form>
    </body>
</html>