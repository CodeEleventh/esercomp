<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'conn.php';

	// membuat variabel untuk menampung data dari form

    $jenis = $_POST['beasiswa_jenis'];
    $nama   = $_POST['nama'];
    $email     = $_POST['email'];
    $hp    = $_POST['hp'];
    $semester    = $_POST['semester'];
    $ipk    = $_POST['ipk'];
    $berkas = $_FILES['berkas']['name'];
    $status = "belum di verifikasi";


//cek dulu jika ada gambar produk jalankan coding ini
if($berkas != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $berkas); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['berkas']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_berkas_baru = $angka_acak.'-'.$berkas; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
            move_uploaded_file($file_tmp, 'public/uploads/'.$nama_berkas_baru); //memindah file gambar ke folder gambar
                // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                $query = "INSERT INTO user (nama, email, hp, semester, ipk, jenis, berkas, status_ajuan) VALUES ('$nama', '$email', '$hp', '$semester', '$ipk', '$jenis', '$nama_berkas_baru', '$status')";
                $result = mysqli_query($conn, $query);
                // periska query apakah ada error
                if(!$result){
                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                        " - ".mysqli_error($conn));
                } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                }

                // // Attempt select query execution
                // $sql = "SELECT * FROM user ORDER BY id DESC LIMIT 1";
                // if($result = mysqli_query($conn, $sql)){
                //     if(mysqli_num_rows($result) > 0){
                //             while($row = mysqli_fetch_array($result)){
                //                 // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                //                 $sid = $row['id'];
                //                 $query = "INSERT INTO beasiswa (user_id, jenis, berkas, status_ajuan) VALUES ('$sid','$jenis', '$nama_berkas_baru', '0')";
                //                 $result = mysqli_query($conn, $query);
                //                 // periska query apakah ada error
                //                 if(!$result){
                //                     die ("Query gagal dijalankan: ".mysqli_errno($conn).
                //                         " - ".mysqli_error($conn));
                //                 } else {
                //                     //tampil alert dan akan redirect ke halaman index.php
                //                     //silahkan ganti index.php sesuai halaman yang akan dituju
                //                     echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                //                 }
                //             }
                //         echo "</table>";
                //         // Free result set
                //         mysqli_free_result($result);
                //     }
                //     // else{
                //     //     echo "<p class='lead'><em>No records were found.</em></p>";
                //     // }
                // } else{
                //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                // }

            } else {     
                //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
            }
} else {
    $query = "INSERT INTO user (nama, email, hp, semester, ipk) VALUES ('$nama', '$email', '$hp', '$semester', '$ipk')";
        $result = mysqli_query($conn, $query);
        // periska query apakah ada error
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                " - ".mysqli_error($conn));
        } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
        }
}
