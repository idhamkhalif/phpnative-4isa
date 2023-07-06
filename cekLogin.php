<?php
session_start();

include('dbConnection.php');  

$nim = $_POST['nim'];
$password = $_POST['password'];

echo $nim;
echo $password;

  // menyeleksi data admin dengan username dan password yang sesuai
  $query = "select * from tbl_mahasiswa where nim=$nim and password='$password';";
  //$query = "select * from tbl_mahasiswa where nim='222' and password=123;";
  $data = mysqli_query($mysqli, $query);

     // menghitung jumlah data yang ditemukan
     $cek = mysqli_num_rows($data);

         // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($data);


if ($cek > 0) {
    $_SESSION['nim'] = $nim;
    $_SESSION['status'] = "login";
    header("location:informasi.php");
} else {
    header("location:login.php?pesan=gagal");
   // echo $query;
}
?>