<?php
require 'vendor/autoload.php';
require 'config/Database.php';

use Dompdf\Dompdf;

// koneksi database
$db = new Database();
$conn = $db->connect();

$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);

$html = "<h2>Data Mahasiswa</h2>";
$html .= "<table border='1' width='100%' cellpadding='5'>
<tr>
    <th>NIM</th>
    <th>Nama</th>
    <th>Jurusan</th>
</tr>";

while($d = $result->fetch_assoc()){
    $html .= "<tr>
        <td>{$d['nim']}</td>
        <td>{$d['nama']}</td>
        <td>{$d['jurusan']}</td>
    </tr>";
}

$html .= "</table>";

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("data_mahasiswa.pdf");
?>