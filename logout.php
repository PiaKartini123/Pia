<?php


session_start();

//hilangkan session yang sudah di det
unset($_SESSION['id_user']);
unset($_SESSION['passwoard_hash']);
unset($_SESSION['nama_pengguna']);
unset($_SESSION['username']);

session_destroy();
echo "<script>alert('Anda telah keluar dari halaman administator...!');
    document.location='index.php';
    </script>";

?>