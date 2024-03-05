<?php

//aktif session
session_start();

// panggil koneksi database
include "koneksi.php";

@$pass = md5($_POST['password']);
@$username = mysqli_escape_string($koneksi, $_POST['username']);
@$password = mysqli_escape_string($koneksi, $pass);

$login = mysqli_query($koneksi, "SELECT * FROM tb_user where username = '$username'and password_hash = '$password'and status= 'aktif'");

$data = mysqli_fetch_array($login);

//uji jika username dan password ditemukan/sesuai

if($data){
    session_start();
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password_hash'] = $data['password_hash'];
    $_SESSION['nama_pengguna'] = $data['nama_pengguna'];

    //arahkan ke halaman admin
    header('location:admin.php');
}else{
    echo"<script>
        alert('Maaf, Login Gagal, Pastikan Username dan password anda Benar...!');
        document.location='index.php';
    </script>";
}

?>