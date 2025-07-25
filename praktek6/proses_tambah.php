<?php include 'koneksi.php';

 // Mengambil data dari form
 $nama = $_POST['namalengkap'];
 $jabatan = $_POST['jabatan'];
 $email = $_POST['email'];

 // Query untuk menyisipkan data
 $sql = "INSERT INTO karyawan (namalengkap, jabatan, email) VALUES ('$nama',
'$jabatan', '$email')";

 if ($conn->query($sql) === TRUE) {
 header("Location: index.php"); 
 // Arahkan kembali ke halaman utamajika berhasil
 exit();
 } else {
 echo "Error: " . $sql . "<br>" . $conn->error;
 }
 $conn->close();