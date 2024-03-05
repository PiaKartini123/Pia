<!-- panggil file header -->
<?php include "header.php"; ?>

<?php
$tampil = mysqli_query($koneksi,"SELECT*FROM tb_tamu where id=$_GET[id]");
$data =mysqli_fetch_array($tampil);

// Uji Jika tombol simpan diklik
if (isset($_GET['update'])) {
    $tgl = date('Y-m-d');

    //htmlspecialchars agar inputan lebih aman dari injection
    $id = htmlspecialchars($_GET['id'], ENT_QUOTES);
    $nama = htmlspecialchars($_GET['nama'], ENT_QUOTES);
    $alamat = htmlspecialchars($_GET['alamat'], ENT_QUOTES);
    $tujuan = htmlspecialchars($_GET['tujuan'], ENT_QUOTES);
    $nope = htmlspecialchars($_GET['nope'], ENT_QUOTES);

    //persiapan query simpan data
    $simpan = mysqli_query($koneksi, "UPDATE  tb_tamu VALUES ('','$id','$nama','$alamat','$tujuan','$nope')");

    // Uji Jika simpan data sukses
    if ($simpan) {
        echo "<script>alert('Simpan data sukses, Terima kasih..!');
               document.location='?'</script>";
    } else {
        echo "<script>alert('Simpan Data GAGAL!!!');
               document.location='?'</script>";
    }
}

?>


<!-- head -->
<div class="head text-center">
    <img src="assets/img/logo.kecamatan.png" width="100">
    <h2 class="text-white">Sistem Informasi Buku Tamu<br></h2>
</div>
<!-- end head -->

<!-- awal row -->
<div class="row mt-2 d-flex justify-content-center">
    <!-- col-lg-7 -->
    <div class="col-lg-7 mb-3">
        <div class="card" style="background: rgb(12,193,187);
background: linear-gradient(0deg, rgba(12,193,187,1) 0%, rgba(244,244,244,1) 71%);">
            <!-- card-body -->
            <div class="card-body">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Identitas Pengunjung</h1>
                </div>
                <form class="user" method="POST" action="update_user.php">
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" name="id" placeholder="id pengunjung"
                            value="<?php echo $data['id']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="nama"
                            placeholder="Nama pengunjung" value="<?php echo $data['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="alamat"
                            placeholder="Alamat pengunjung" value="<?php echo $data['alamat']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="tujuan"
                            placeholder="Tujuan pengunjung" value="<?php echo $data['tujuan']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="nope"
                            placeholder="No.Hp pengunjung" value="<?php echo $data['nope']; ?>" required>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <button type="submit" name="update"class="btn btn-primary">Simpan Edit</button>
                        </div>
                        <div class="col-md-4">
                            <a href="admin.php" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>

                </form>
                <hr>
                <div class="text-center">
                <a class="small" href="#"> By Pia Kartini 2024- <?= date('Y') ?></a>
                </div>
            </div>
            <!-- end card-body -->

        </div>

    </div>
    <!-- end col-lg-7 -->