<?php
include 'koneksi.php';
// Ambil ID pengguna dari parameter URL
$id = isset($_GET['id']) ? $_GET['id'] : die('');


// Query untuk mengambil data pengguna berdasarkan ID
$query = "SELECT * FROM tb_tamu WHERE data id = $id";
$result = $koneksi->query($query);


if ($result->num_rows == 0) {
    die('ID Pengguna tidak ditemukan.');
}


// Ambil data pengguna
$user_data = $result->fetch_assoc();


// Tutup koneksi
$koneksi->close();
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>


<body>


    <h2>Update User</h2>


    <form action="update_user.php" method="Post">
        <input type="hidden" name="user_id" value="<?php echo $user_data['id']; ?>">

    
        <label for="tanggal">tanggal:</label>
        <input type="text" id="tanggal" name="tanggal" value="<?php echo $user_data['tanggal']; ?>" required><br>


        <label for="nama">nama:</label>
        <input type="nama" id="nama" name="nama" value="<?php echo $user_data['nama']; ?>" required><br>


        <label for="alamat">alamat:</label>
        <input type="alamat" id="alamat" name="alamat" required><br>


        <label for="tujuan">tujuan:</label>
        <input type="text" id="tujuan" name="tujuan" value="<?php echo $user_data['tujuan']; ?>"><br>


        <label for="nope">nope:</label>
        <input type="nope" id="nope" name="nope" value="<?php echo $user_data['nope']; ?>"><br>


        <input type="submit" value="Update User">
    </form>


</body>


</html>
