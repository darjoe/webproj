<!-- my_if_statements.php -->
<?php
echo "<h2>PHP if Statements Example:</h2>";

$nilai_ujian = 82;
echo "Nilai ujian: " . $nilai_ujian . " -> ";
if ($nilai_ujian >= 85) {
    echo "Sangat Baik (A)";
} elseif ($nilai_ujian >= 75) {
    echo "Baik (B)";
} else {
    echo "Cukup (C)";
}
echo "<br><br>";