<!-- calculate_area.php -->
<!DOCTYPE html>
<html>
<body>
    <h1>Kalkulator Luas Persegi Panjang</h1>
    <?php
        $panjang = 10;
        $lebar = 5;

        $luas = $panjang * $lebar;

        echo "Panjang: " . $panjang . " unit<br>";
        echo "Lebar: " . $lebar . " unit<br>";
        echo "Luas persegi panjang adalah: **" . $luas . " unit persegi**";
    ?>
</body>
</html>
