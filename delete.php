​<?php
include 'koneksi.php';
if($_SERVER["REQUEST_METHOD"]== "GET"){
    // Ambil nilai ID pengguna 
    $id =$_GET['id'];

    //echo $id;

    //query untuk menghapus data pengguna 
    $query="DELETE FROM tb_tamu WHERE id = $id";

    $ql =mysqli_query($koneksi,$query);

    //Tutup koneksi
    $koneksi->close();
    header("location:admin.php");
}