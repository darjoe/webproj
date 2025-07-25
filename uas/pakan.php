<?php
include 'header.php';
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $jenis_pakan = $_POST['jenis_pakan'];

    // Validasi input
    if (!empty($jenis_pakan)) {
        // Siapkan query untuk memasukkan data ke database
        $query = "INSERT INTO master_pakan (jenis_pakan) VALUES ('$jenis_pakan')";
        
        // Eksekusi query
        if (mysqli_query($conn, $query)) {
            echo "<div class='alert alert-success'>Pakan berhasil ditambahkan.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Jenis pakan tidak boleh kosong.</div>";
    }
}

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h2 class="text-center">Pakan Ternak</h2>
            <p class="text-center">jenis-jenis pakan burung</p>
            <table class="">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM master_pakan";
                    $result = mysqli_query($conn, $query);
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['jenis_pakan']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <h3>Tambah Pakan</h3>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>"   method="post">
                <div class="mb-3">
                    <label for="jenis_pakan" class="form-label">Jenis Pakan</label>
                    <input type="text" class="form-control" id="jenis_pakan" name="jenis_pakan" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form> 
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>