<?php
require_once "../config/Database.php";
require_once "../models/Mahasiswa.php";
require_once "../controllers/MahasiswaController.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../views/mahasiswa/index.php");
    exit;
}

$nim    = trim($_POST["nim"] ?? "");
$nama   = trim($_POST["nama"] ?? "");
$jurusan = trim($_POST["jurusan"] ?? "");

if ($nim === "" || $nama === "") {
    header("Location: ../views/mahasiswa/tambah.php?error=NIM+dan+Nama+wajib+diisi");
    exit;
}

$controller = new MahasiswaController();
$berhasil   = $controller->tambah($nim, $nama, $jurusan);

if ($berhasil) {
    header("Location: ../views/mahasiswa/index.php?pesan=Data+berhasil+ditambahkan");
} else {
    header("Location: ../views/mahasiswa/tambah.php?error=Gagal+menyimpan+data");
}
exit;
?>
