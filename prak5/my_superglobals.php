<!-- my_superglobals.php -->
<!DOCTYPE html>
<html>
<body>
    <h2>Latihan Praktikum: PHP Superglobals ($_GET)</h2>
    <form method="get" action="my_superglobals.php">
        Nama Anda: <input type="text" name="nama_pengguna">
        <input type="submit" value="Kirim">
    </form>
    <br>
    <?php
    if (isset($_GET['nama_pengguna'])) {
        $nama_dari_url = htmlspecialchars($_GET['nama_pengguna']);
        echo "Halo, " . $nama_dari_url . "! (Data diambil dari URL)";
    } else {
        echo "Silakan masukkan nama Anda di atas dan klik Kirim.";
    }
    ?>
</body>
</html>
