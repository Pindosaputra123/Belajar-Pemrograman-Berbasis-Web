<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php if (isset($_GET['message'])): ?>
    <div>
        <strong><?= htmlspecialchars($_GET['message']) ?></strong>
    </div>
<?php endif; ?>

<h1>Daftar Mahasiswa</h1>

<!-- Tombol Tambah -->
<a href="tambah.php" class="btn-tambah">Tambah Mahasiswa</a>

<table>
    <thead>
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $conn->query("SELECT * FROM mahasiswa");
        while ($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= htmlspecialchars($row['npm']) ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['jurusan']) ?></td>
                <td><?= htmlspecialchars($row['alamat']) ?></td>
                <td>
                    <a href="edit.php?npm=<?= $row['npm'] ?>">Edit</a> |
                    <a href="hapus.php?npm=<?= $row['npm'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>