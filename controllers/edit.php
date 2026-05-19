<?php
require_once "../config/Database.php";
require_once "../models/Mahasiswa.php";
require_once "../controllers/MahasiswaController.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../views/mahasiswa/index.php");
    exit;
}

$old_nim  = trim($_POST["old_nim"] ?? "");
$nim      = trim($_POST["nim"] ?? "");
$nama     = trim($_POST["nama"] ?? "");
$jurusan  = trim($_POST["jurusan"] ?? "");

if ($old_nim === "" || $nim === "" || $nama === "") {
    header("Location: ../views/mahasiswa/edit.php?nim=" . urlencode($old_nim) . "&error=NIM+dan+Nama+wajib+diisi");
    exit;
}

$controller = new MahasiswaController();
$berhasil   = $controller->update($old_nim, $nim, $nama, $jurusan);

if ($berhasil) {
    header("Location: ../views/mahasiswa/index.php?pesan=Data+berhasil+diperbarui");
} else {
    header("Location: ../views/mahasiswa/edit.php?nim=" . urlencode($old_nim) . "&error=Gagal+memperbarui+data");
}
exit;
?>
