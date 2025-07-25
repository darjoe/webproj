<?php
 include 'koneksi.php';

 // Mengambil data dari form
 $nama = isset($_POST['namalengkap']) ? trim($_POST['namalengkap']) : '';
 $jabatan = isset($_POST['jabatan']) ? trim($_POST['jabatan']) : '';
 $email = isset($_POST['email']) ? trim($_POST['email']) : '';

 // Validasi input
 if (empty($nama) || empty($jabatan) || empty($email)) {
	 echo "Error: Semua field harus diisi.";
	 exit();
 }

 // Periksa apakah email sudah ada di database
 $checkEmail = "SELECT email FROM karyawan WHERE email = '$email'";
 $result = $conn->query($checkEmail);

 if ($result->num_rows > 0) {
	 echo "Error: Email sudah terdaftar.";
	 exit();
 }

 // Query untuk menyisipkan data
 $sql = "INSERT INTO karyawan (namalengkap, jabatan, email) VALUES ('$nama', '$jabatan', '$email')";

 if ($conn->query($sql) === TRUE) {
 header("Location: index.php"); // Arahkan kembali ke halaman utamajika berhasil
 exit();
 } else {
 echo "Error: " . $sql . "<br>" . $conn->error;
 }
$conn->close();