<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'tugas1';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['foto']['tmp_name'];
        $fileName = $_FILES['foto']['name'];
        $fileSize = $_FILES['foto']['size'];
        $fileType = $_FILES['foto']['type'];

        // Validasi ukuran file (maksimal 2MB)
        if ($fileSize > 2 * 1024 * 1024) {
            echo "Ukuran file terlalu besar. Maksimal 2MB.";
            exit;
        }

        // Validasi tipe file (hanya gambar)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($fileType, $allowedTypes)) {
            echo "Tipe file tidak valid. Hanya JPG, PNG, dan GIF yang diperbolehkan.";
            exit;
        }

        // Tentukan direktori penyimpanan
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Pindahkan file ke direktori penyimpanan
        $destPath = $uploadDir . basename($fileName);
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            echo "File berhasil diupload: " . htmlspecialchars($destPath);
        } else {
            echo "Terjadi kesalahan saat mengupload file.";
        }
    } else {
        echo "Tidak ada file yang diupload atau terjadi kesalahan pada upload.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Form Upload Foto</h2>
                        <form action="" method="post" enctype="multipart/form-data">
                            <label for="foto" class="form-label">Pilih foto untuk diupload:</label>
                            <input type="file" name="foto" id="foto" accept="image/*" class="form-control mb-3" required>
                            <input type="submit" value="Upload Foto" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>