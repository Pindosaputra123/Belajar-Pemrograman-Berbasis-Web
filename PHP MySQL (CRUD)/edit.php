<?php
include 'koneksi.php';

$npm = $_GET['npm'];
$data = $conn->query("SELECT * FROM mahasiswa WHERE npm='$npm'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Mahasiswa</h2>

<div class="form-container">
    <form method="POST" action="">
        <label>NPM:</label>
        <input type="text" name="npm" value="<?= htmlspecialchars($data['npm']) ?>" readonly>

        <label>Nama:</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>

        <label>Jurusan:</label>
        <select name="jurusan" required>
            <option value="Teknik Informatika" <?= $data['jurusan'] == 'Teknik Informatika' ? 'selected' : '' ?>>Teknik Informatika</option>
            <option value="Sistem Operasi" <?= $data['jurusan'] == 'Sistem Operasi' ? 'selected' : '' ?>>Sistem Operasi</option>
        </select>

        <label>Alamat:</label>
        <textarea name="alamat" required><?= htmlspecialchars($data['alamat']) ?></textarea>

        <button type="submit" name="update">Update</button>
        <a href="index.php" class="btn-kembali">Kembali</a>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $conn->query("UPDATE mahasiswa SET nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE npm='$npm'");
    header("Location: index.php?message=Data berhasil diupdate");
}
?>

</body>
</html>