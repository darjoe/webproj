<?php
include 'header.php';
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    // Validasi input
    if (!empty($nama) && !empty($alamat) && !empty($no_telepon)) {
        // Siapkan query untuk memasukkan data ke database
        $query = "INSERT INTO penggemar (nama, alamat, no_telepon) VALUES ('$nama', '$alamat', '$no_telepon')";

        // Eksekusi query
        if (mysqli_query($conn, $query)) {
            echo "<div class='alert alert-success'>Penggemar berhasil ditambahkan.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Semua field harus diisi.</div>";
    }
}

?>

<div class="container mt-5">
   <div class="row">
      <div class="col-md-8">
         <h2 class="text-center">Individu Penggemar Burung</h2>
            <p class="text-center">Data individu penggemar burung yang terdaftar</p>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Penggemar</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM penggemar";
                    $result = mysqli_query($conn, $query);
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['no_telepon']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <h3>Tambah Penggemar</h3>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Penggemar</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Penggemar</button>
            </form> 
        </div>
    </div>
</div>