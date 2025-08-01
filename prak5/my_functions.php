<!-- my_functions.php -->
 <?php
echo "<h2>PHP Functions - Latihan Praktikum:</h2>";

echo "<h3>Original Example: Discount Calculation</h3>";
function hitung_diskon($harga, $persen_diskon) {
    $potongan = $harga * ($persen_diskon / 100);
    return $harga - $potongan;
}
$harga_baju = 150000;
$harga_setelah_diskon = hitung_diskon($harga_baju, 10);
echo "Harga baju awal: Rp " . $harga_baju . "<br>";
echo "Diskon: 10%<br>";
echo "Harga akhir: Rp " . $harga_setelah_diskon;
echo "<br><br>";

echo "<h3>Latihan Praktikum: Greeting Function</h3>";
function sapa($nama, $waktu) {
    echo "Selamat " . $waktu . ", " . $nama . "!";
}

sapa("Budi", "Pagi");
echo "<br>";
sapa("Ani", "Sore");
echo "<br>";
sapa("Dedi", "Malam");
?>
