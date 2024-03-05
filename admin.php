<!-- panggil file header -->
<?php include "header.php";?>

<?php

// Uji Jika tombol simpan diklik
if(isset($_POST['bsimpan'])){
    $tgl = date('Y-m-d');

    //htmlspecialchars agar inputan lebih aman dari injection
    $id= htmlspecialchars($_POST['id'], ENT_QUOTES);
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES);
    $tujuan = htmlspecialchars($_POST['tujuan'], ENT_QUOTES);
    $nope = htmlspecialchars($_POST['nope'], ENT_QUOTES);

    //persiapan query simpan data
    $simpan = mysqli_query($koneksi,"INSERT INTO tb_tamu VALUES ('id','$tgl','$nama','$alamat','$tujuan','$nope')");

    // Uji Jika simpan data sukses
    if($simpan) {
        echo "<script>alert('Simpan data sukses, Terima kasih..!');
               document.location='?'</script>";
    }else{
        echo "<script>alert('Simpan Data GAGAL!!!');
               document.location='?'</script>";
    }
}

?>

<?php 
$queryid = mysqli_query($koneksi, "SELECT max(id) as maxid FROM tb_tamu");
$simpan = mysqli_fetch_array($queryid);
$maxid = $simpan["maxid"]+ 1;
?>


        <!-- head -->
        <div class="head text-center">
            <img src="assets/img/logo.kecamatan.png" width="100">
            <h2 class="text-white">Sistem Informasi Buku Tamu<br></h2>
        </div>
        <!-- end head -->

        <!-- awal row -->
        <div class="row mt-2">
            <!-- col-lg-7 -->
            <div class="col-lg-7 mb-3">
                <div class="card" style="background: rgb(12,193,187);
background: linear-gradient(0deg, rgba(12,193,187,1) 0%, rgba(244,244,244,1) 71%);">
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Identitas Pengunjung</h1>
                        </div>
                        <form class="user" method = "POST" action="">
                        <div class="form-group">
                                <input type="number" class="form-control form-control-user" name="id" placeholder="id pengunjung" value="<?php echo $maxid ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama pengunjung" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat pengunjung" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="tujuan" placeholder="Tujuan pengunjung" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user" name="nope" placeholder="No.Hp pengunjung" required>
                            </div>

                            <button type = "submit" name = "bsimpan" class="btn btn-primary btn-user btn-block">Simpan Data</button>
                           

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

            <!-- col-lg-5 -->
            <div class="col-lg-5 mb-3" style="margin-top:px;">
                <!-- card -->
                <div class="card shadow">
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Statistik Pengunjung</h1>
                        </div>

                        <?php
                        //deklarasi tanggal

                        //menampilkan tanggal sekarang
                        $tgl_sekarang = date('Y-m-d');

                        //menampilkan tgl kemarin
                        $kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));

                        //mendapatkan 6 hari sebelum tanggal sekarang
                        $seminggu = date('Y-m-d h:i:s', strtotime('-1 week +1 day',strtotime($tgl_sekarang)));

                        $sekarang = date('Y-m-d h:i:s');

                       // persiapan query menampilkan jumlah data pengunjung

                       $tgl_sekarang = mysqli_fetch_array(mysqli_query(
                             $koneksi,
                            "SELECT count(*) FROM tb_tamu where tanggal like '%$tgl_sekarang%' "
                        ));

                        $kemarin = mysqli_fetch_array(mysqli_query(
                            $koneksi,
                           "SELECT count(*) FROM tb_tamu where tanggal like '%$kemarin%' "
                       ));

                       $seminggu= mysqli_fetch_array(mysqli_query(
                        $koneksi,
                       "SELECT count(*) FROM tb_tamu where tanggal BETWEEN '$seminggu' and '$sekarang' "
                       ));

                       $Bulan_ini = date('m');

                       $sebulan= mysqli_fetch_array(mysqli_query(
                        $koneksi,
                        "SELECT count(*) FROM tb_tamu where month(tanggal) = '$Bulan_ini' "
                       ));

                       $keseluruhan= mysqli_fetch_array(mysqli_query(
                        $koneksi,
                        "SELECT count(*) FROM tb_tamu"
                       ));


                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <td>Hari ini</td>
                                <td>: <?=$tgl_sekarang[0]?></td>
                            </tr>
                            <tr>
                                <td>Kemarin</td>
                                <td>: <?=$kemarin[0]?></td>
                            </tr>
                            <tr>
                                <td>minggu ini</td>
                                <td>: <?=$seminggu[0]?></td>
                            </tr>
                            <tr>
                                <td>Bulan ini</td>
                                <td>:<?=$sebulan[0]?></td>
                            </tr>
                            <tr>
                                <td>Keseluruhan</td>
                                <td>:<?=$keseluruhan[0]?></td>
                            </tr>
                        </table>
                    </div>
                    <!-- card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col-lg-5 -->

        </div>
        <!-- end row -->

        <!-- card -->
        
                    <div class="card-body">
                          <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung Hari Ini[<?=date('d=m-Y')?>]</h6>
                        </div>
                        <div class="card-body">
                            <a href ="rekapitulasi.php" class="btn btn-success mb-3"><i class="fa fa-table"></i> Rekapitulasi Pengunjung</a>
                            <a href ="Logout.php" class="btn btn-danger mb-3"><i class="fa fa-sign-out-alt"></i>Logout</a>



                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>id<br> pengunjung</br></th>
                                            <th>Tanggal</th>
                                            <th>Nama<br> Pengunjung</br></th>
                                            <th>Alamat</th>
                                            <th>Tujuan</th>
                                            <th>No.Hp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            $tgl = date ('Y-m-d'); //2024-01-26
                                            $tampil = mysqli_query($koneksi,"SELECT*FROM tb_tamu where tanggal like '%$tgl%' order by id desc");
                                            $no = 1;
                                            while($data =mysqli_fetch_array($tampil)) {
                                        
                                        ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><?=$data['id']?></td>
                                            <td><?=$data['tanggal']?></td>
                                            <td><?=$data['nama']?></td>
                                            <td><?=$data['alamat']?></td>
                                            <td><?=$data['tujuan']?></td>
                                            <td><?=$data['nope']?></td>
                                            <td scope="row">

                                    <a href="edit.php?id=<?php echo $data['id']; ?>"><button type="button"
                                            class="btn btn-warning">Edit</button></a>
                                    <a href="delete.php?id=<?php echo $data['id']; ?>"
                                        onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data Ini')"><button
                                            type="button" class="btn btn-danger">Delete</button></a>

                                            </td>
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




    </div>
    <!-- panggil file footer -->
    <?php include "footer.php";?>