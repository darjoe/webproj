<!-- my_strings.php  -->
<?php
$kalimat = "STITEK Bontang adalah kampus IT terbaik";

echo "<h2>String Manipulation Results:</h2>";

echo "Panjang kalimat: " . strlen($kalimat) . "<br>";
echo "Jumlah kata: " . str_word_count($kalimat) . "<br>";
echo "Mengganti kata: " . str_replace("terbaik", "favorit", $kalimat) . "<br>";
echo "Semua huruf kapital: <b>" . strtoupper($kalimat) . "</b><br>";
?>
