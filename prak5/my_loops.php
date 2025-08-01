<!-- my_loops.php -->
<?php
echo "<h2>PHP Loops - Latihan Praktikum:</h2>";

echo "<h3>Menggunakan for loop:</h3>";
for ($i = 0; $i < 3; $i++) {
    echo "Iterasi For ke-" . ($i + 1) . "<br>";
}
echo "<br>";

echo "<h3>Menggunakan while loop:</h3>";
$count = 3;
while ($count > 0) {
    echo "Hitung mundur While: $count <br>";
    $count--;
}
echo "<br>";

echo "<h3>Menggunakan foreach loop:</h3>";
$buah = ["Apel", "Mangga", "Jeruk", "Pisang", "Anggur"];

echo "Daftar Buah:<br>";
foreach ($buah as $item) {
    echo "- " . $item . "<br>";
}
?>
