<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Tambah Mahasiswa</h2>

<div class="form-container">
    <form method="POST" action="">
        <label>NPM:</label>
        <input type="text" name="npm" placeholder="NPM" required>

        <label>Nama:</label>
        <input type="text" name="nama" placeholder="Nama" required>

        <label>Jurusan:</label>
        <select name="jurusan" required>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Sistem Operasi">Sistem Operasi</option>
        </select>

        <label>Alamat:</label>
        <textarea name="alamat" placeholder="Alamat" required></textarea>

        <button type="submit" name="simpan">Simpan</button>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $result = $conn->query("SELECT * FROM mahasiswa WHERE npm = '$npm'");
    if ($result->num_rows > 0) {
        $message = urlencode("NPM sudah terdaftar");
        header("Location: index.php?message={$message}");
    } else {
        $conn->query("INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES ('$npm', '$nama', '$jurusan', '$alamat')");
        header("Location: index.php?message=Data berhasil ditambahkan");
    }
}
?>

</body>
</html>
