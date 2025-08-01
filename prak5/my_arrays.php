<!-- my_arrays.php -->
<?php
echo "<h2>PHP Arrays - Latihan Praktikum:</h2>";

echo "<h3>Original Example: Associative Array</h3>";
$data_dosen = [
    "nama" => "Ir. ABADI NUGROHO, S.Kom., M.Kom.",
    "nidn" => "1104129002",
    "matkul" => "Pemrograman Web"
];
echo "Dosen Pengampu: " . $data_dosen["nama"];
echo "<br>";
echo "NIDN: " . $data_dosen["nidn"];
echo "<br>";
echo "Mata Kuliah: " . $data_dosen["matkul"];
echo "<br><br>";

echo "<h3>Latihan Praktikum: Indexed Array of Classmates</h3>";
$nama_teman_sekelas = [
    "Ali",
    "Budi",
    "Cici",
    "Doni",
    "Eka",
    "Fahmi"
];

echo "Daftar Nama Teman Sekelas:<br>";
foreach ($nama_teman_sekelas as $index => $nama) {
    echo ($index + 1) . ". " . $nama . "<br>";
}
?>
