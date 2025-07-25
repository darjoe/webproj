<!DOCTYPE html>
<html>


<head>
   <title>Latihan Kondisi PHP</title>
</head>


<body>
   <h1>Cek Nilai</h1>
   <?php
   $nilai = 85;
   echo "<p>Nilai Anda: $nilai</p>";


   if ($nilai >= 90) {
       echo "<p>Anda mendapatkan nilai A.</p>";
   } elseif ($nilai >= 80) {
       echo "<p>Anda mendapatkan nilai B.</p>";
   } elseif ($nilai >= 70) {
       echo "<p>Anda mendapatkan nilai C.</p>";
   } elseif ($nilai >= 60) {
       echo "<p>Anda mendapatkan nilai D.</p>";
   } else {
       echo "<p>Anda mendapatkan nilai E.</p>";
   }
   ?>
   <p>Terima kasih telah menggunakan sistem penilaian ini.</p>
</body>


</html>
