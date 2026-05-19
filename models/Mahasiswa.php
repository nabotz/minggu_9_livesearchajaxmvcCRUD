<?php
class Mahasiswa {
    private $conn;
    private $table = "mahasiswa";
    public function __construct($db) {
        $this->conn = $db;
    }
    public function getMahasiswa($keyword = "") {
        if ($keyword != "") {
            $sql = "SELECT * FROM $this->table
                    WHERE nim LIKE ?
                    OR nama LIKE ?
                    ORDER BY nama ASC";
            $stmt = $this->conn->prepare($sql);
            $search = "%{$keyword}%";
            $stmt->bind_param("ss", $search, $search);
        } else {
            $sql = "SELECT * FROM $this->table ORDER BY nama ASC";
            $stmt = $this->conn->prepare($sql);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function tambah($nim, $nama, $jurusan) {
        $sql = "INSERT INTO $this->table (nim, nama, jurusan) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $nim, $nama, $jurusan);
        return $stmt->execute();
    }

    public function hapus($nim) {
        $sql  = "DELETE FROM $this->table WHERE nim = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $nim);
        return $stmt->execute();
    }

    public function getByNim($nim) {
        $sql  = "SELECT * FROM $this->table WHERE nim = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function update($old_nim, $nim, $nama, $jurusan) {
        $sql  = "UPDATE $this->table SET nim=?, nama=?, jurusan=? WHERE nim=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $nim, $nama, $jurusan, $old_nim);
        return $stmt->execute();
    }
}
?>