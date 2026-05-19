<?php
    require_once __DIR__ . "/../config/Database.php";
    require_once __DIR__ . "/../models/Mahasiswa.php";

    class MahasiswaController {
        private $model;
        public function __construct() {
            $database = new Database();
            $db = $database->connect();
            $this->model = new Mahasiswa($db);
        }
        public function index($keyword = "") {
            return $this->model->getMahasiswa($keyword);
        }

        public function tambah($nim, $nama, $jurusan) {
            return $this->model->tambah($nim, $nama, $jurusan);
        }

        public function hapus($nim) {
            return $this->model->hapus($nim);
        }

        public function getByNim($nim) {
            return $this->model->getByNim($nim);
        }

        public function update($old_nim, $nim, $nama, $jurusan) {
            return $this->model->update($old_nim, $nim, $nama, $jurusan);
        }
    }
?>