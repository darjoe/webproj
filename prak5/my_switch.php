<!-- my_switch.php -->
<?php
echo "<h2>PHP switch Statement - Latihan Praktikum:</h2>";

$level_user = "admin";
echo "Level User: " . $level_user . " -> ";
switch ($level_user) {
    case "admin":
        echo "Selamat datang, Administrator!";
        break;
    case "editor":
        echo "Selamat datang, Editor!";
        break;
    default:
        echo "Selamat datang, Pengguna!";
}
echo "<br><br>";

$ukuran_baju = "L";

echo "Ukuran Baju: " . $ukuran_baju . " -> ";
switch ($ukuran_baju) {
    case "S":
        echo "Anda memilih baju ukuran **Kecil (S)**.";
        break;
    case "M":
        echo "Anda memilih baju ukuran **Sedang (M)**.";
        break;
    case "L":
        echo "Anda memilih baju ukuran **Besar (L)**.";
        break;
    case "XL":
        echo "Anda memilih baju ukuran **Ekstra Besar (XL)**.";
        break;
    default:
        echo "Ukuran baju tidak tersedia.";
}
echo "<br>";
?>
