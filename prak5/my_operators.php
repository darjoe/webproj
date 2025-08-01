<!-- my_operators.php -->
<?php
echo "<h2>PHP Operators - Latihan Praktikum:</h2>";

$umur = 20;
$sudah_punya_sim = true;

echo "Umur: " . $umur . "<br>";
echo "Sudah punya SIM: " . ($sudah_punya_sim ? "Ya" : "Tidak") . "<br><br>";

if ($umur >= 17 && $sudah_punya_sim == true) {
    echo "<b>Anda boleh mengemudi.</b>";
} else {
    echo "Anda tidak boleh mengemudi.";
}
?>
