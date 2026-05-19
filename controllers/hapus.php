<?php
require_once "../config/Database.php";
require_once "../models/Mahasiswa.php";
require_once "../controllers/MahasiswaController.php";

$nim = trim($_GET["nim"] ?? "");

if ($nim === "") {
    header("Location: ../views/mahasiswa/index.php");
    exit;
}

$controller = new MahasiswaController();
$berhasil   = $controller->hapus($nim);

if ($berhasil) {
    header("Location: ../views/mahasiswa/index.php?pesan=Data+berhasil+dihapus");
} else {
    header("Location: ../views/mahasiswa/index.php?error=Gagal+menghapus+data");
}
exit;
?>
