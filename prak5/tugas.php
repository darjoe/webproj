<?php
$nama_lengkap = $email = $pesan = "";
$nama_err = $email_err = $pesan_err = "";
$form_valid = true;
$display_output = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["nama_lengkap"]))) {
        $nama_err = "Nama Lengkap tidak boleh kosong.";
        $form_valid = false;
    } else {
        $nama_lengkap = htmlspecialchars(trim($_POST["nama_lengkap"]));
    }

    if (empty(trim($_POST["email"]))) {
        $email_err = "Alamat Email tidak boleh kosong.";
        $form_valid = false;
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
    }

    if (empty(trim($_POST["pesan"]))) {
        $pesan_err = "Pesan/Komentar tidak boleh kosong.";
        $form_valid = false;
    } else {
        $pesan = htmlspecialchars(trim($_POST["pesan"]));
    }

    if ($form_valid) {
        $display_output = true;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #add8e6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #0056b3;
            text-align: center;
            margin-bottom: 25px;
            font-size: 2.5em;
        }
        h2 {
            color: #0056b3;
            text-align: center;
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        form input[type="text"],
        form input[type="email"],
        form textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        form textarea {
            resize: vertical;
            min-height: 80px;
        }
        form input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 100%;
            margin-top: 20px;
        }
        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: -5px;
            margin-bottom: 10px;
            display: block;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }
        .output-data {
            border: 1px solid #007bff;
            background-color: #e7f0ff;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
        }
        .output-data p {
            margin: 5px 0;
        }
        .output-data strong {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Buku Tamu Digital STITEK Bontang</h1>

        <h2>Form Input Buku Tamu</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" 
                   value="<?php echo isset($_POST['nama_lengkap']) ? htmlspecialchars($_POST['nama_lengkap']) : ''; ?>">
            <span class="error"><?php echo $nama_err; ?></span>

            <label for="email">Alamat Email:</label>
            <input type="email" id="email" name="email" 
                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            <span class="error"><?php echo $email_err; ?></span>

            <label for="pesan">Pesan/Komentar:</label>
            <textarea id="pesan" name="pesan"><?php echo isset($_POST['pesan']) ? htmlspecialchars($_POST['pesan']) : ''; ?></textarea>
            <span class="error"><?php echo $pesan_err; ?></span>

            <input type="submit" name="submit_guestbook" value="Kirim Pesan">
        </form>

        <?php
        if ($display_output) {
            echo '<div class="success-message">Pesan Anda berhasil dikirim!</div>';
            echo '<div class="output-data">';
            echo '<h2>Ringkasan Pesan Anda:</h2>';
            echo '<p><strong>Nama Lengkap:</strong> ' . $nama_lengkap . '</p>';
            echo '<p><strong>Alamat Email:</strong> ' . $email . '</p>';
            echo '<p><strong>Pesan/Komentar:</strong><br>' . nl2br($pesan) . '</p>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
