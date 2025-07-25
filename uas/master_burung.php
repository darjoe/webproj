<?php
include 'header.php';
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $spesies = $_POST['spesies'];
    $nama = $_POST['nama'];
    $status_perlindungan = $_POST['status_perlindungan'];

    // Validasi input
    if (!empty($spesies) && !empty($nama) && isset($status_perlindungan)) {
        // Siapkan query untuk memasukkan data ke database
        $query = "INSERT INTO master_burung (spesies, nama, status_perlindungan) VALUES ('$spesies', '$nama', '$status_perlindungan')";

        // Eksekusi query
        if (mysqli_query($conn, $query)) {
            echo "<div class='alert alert-success'>Burung berhasil ditambahkan.</div>";
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
         <h2 class="text-center">Master Burung</h2>
         <p class="text-center">Jenis-jenis burung yang ada di peternakan</p>
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Spesies</th>
                  <th>Nama Burung</th>
                  <th>Status Perlindungan</th>
                  <th>Pakan</th>
                  <th>Aksi

               </tr>
            </thead>
            <tbody>
               <?php
               $query = "SELECT * FROM master_burung";
               $result = mysqli_query($conn, $query);
               $no = 1;
               while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['spesies']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>"; 
                    echo "<td>" . ($row['status_perlindungan'] ? 'Terancam Punah' : 'Tidak Terancam') . "</td>";
                    echo "<td><a href='pakan.php?id=" . $row['id'] . "' class='btn btn-info btn-sm'>Lihat Pakan</a></td>";
                    echo "<td>";
                    echo "<a href='edit_burung.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a> ";
                    echo "<a href='delete_burung.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
               }
               ?>
            </tbody>
         </table>
      </div>
      <div class="col-md-4">
         <h3>Tambah Burung</h3>
         <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="mb-3">
               <label for="spesies" class="form-label">Spesies</label>
               <input type="text" class="form-control" id="spesies" name="spesies" required>
            </div>
            <div class="mb-3">
               <label for="nama" class="form-label">Nama Lokal</label>
               <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
               <label class="form-label">Terancam Punah?</label>
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="status_perlindungan" id="jenis_true" value="1" required>
                  <label class="form-check-label" for="jenis_true">
                     Terancam punah
                  </label>
               </div>
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="status_perlindungan" id="jenis_false" value="0" required>
                  <label class="form-check-label" for="jenis_false">
                    Tidak terancam
                  </label>
               </div>
            <div class="mb-3">
                <label for="jenis_pakan" class="form-label">Jenis Pakan</label>
                <select class="form-select" id="jenis_pakan" name="jenis_pakan" required>
                    <option value="" disabled selected>Pilih jenis pakan</option>
                    <?php
                    $query_pakan = "SELECT * FROM master_pakan";
                    $result_pakan = mysqli_query($conn, $query_pakan);
                    while ($row_pakan = mysqli_fetch_assoc($result_pakan)) {
                        echo "<option value='" . htmlspecialchars($row_pakan['jenis_pakan']) . "'>" . htmlspecialchars($row_pakan['jenis_pakan']) . "</option>";
                    }
                    ?>
                </select>
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Burung</button>
         </form>
      </div>
   </div>
</div>
<?php
include 'footer.php';
?>