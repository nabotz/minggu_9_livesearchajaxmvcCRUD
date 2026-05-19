<?php
    require_once "../controllers/MahasiswaController.php";
    $keyword = $_GET['keyword'] ?? "";
    $controller = new MahasiswaController();
    $data = $controller->index($keyword);
    header('Content-Type: application/json');
    echo json_encode($data);
?>