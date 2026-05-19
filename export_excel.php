<?php
ob_start();

require 'vendor/autoload.php';
require_once "config/Database.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// koneksi database
$db = new Database();
$conn = $db->connect();

// query data
$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);

// buat spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// header tabel
$sheet->setCellValue('A1', 'NIM');
$sheet->setCellValue('B1', 'Nama');
$sheet->setCellValue('C1', 'Jurusan');

// isi data
$row = 2;

while($data = $result->fetch_assoc()){
    $sheet->setCellValue('A'.$row, $data['nim']);
    $sheet->setCellValue('B'.$row, $data['nama']);
    $sheet->setCellValue('C'.$row, $data['jurusan']);
    $row++;
}

// nama file
$filename = "data_mahasiswa.xlsx";

// bersihkan output sebelumnya
ob_end_clean();

// header download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');

// export
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

exit;
?>