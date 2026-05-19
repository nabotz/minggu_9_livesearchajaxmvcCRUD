<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<div class="container" style="max-width: 500px;">

    <h2 class="mb-4">Tambah Mahasiswa</h2>

    <?php if (!empty($_GET["error"])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($_GET["error"]) ?></div>
    <?php endif; ?>

    <form action="../../controllers/tambah.php" method="POST">

        <div class="mb-3">
            <label for="nim" class="form-label">NIM <span class="text-danger">*</span></label>
            <input type="text" id="nim" name="nim" class="form-control"
                   maxlength="15" required
                   value="<?= htmlspecialchars($_GET["nim"] ?? "") ?>">
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
            <input type="text" id="nama" name="nama" class="form-control"
                   maxlength="100" required
                   value="<?= htmlspecialchars($_GET["nama"] ?? "") ?>">
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" id="jurusan" name="jurusan" class="form-control"
                   maxlength="100"
                   value="<?= htmlspecialchars($_GET["jurusan"] ?? "") ?>">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary ms-2">Batal</a>

    </form>

</div>

</body>
</html>
