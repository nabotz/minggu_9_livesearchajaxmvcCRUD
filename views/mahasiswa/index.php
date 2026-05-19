<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Live Search Mahasiswa MVC</title>

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        #loading {
            display: none;
            font-weight: bold;
        }
    </style>
</head>

<body class="p-4">

<div class="container">

    <h2 class="mb-4">
        Live Search Mahasiswa (MVC + AJAX)
    </h2>

    <!-- Tombol tambah data -->
    <a href="../../views/mahasiswa/tambah.php"
       class="btn btn-primary mb-3">
       + Tambah Mahasiswa
    </a>

    <input type="text"
           id="search"
           class="form-control mb-3"
           placeholder="Ketik nama atau NIM...">

    <div id="loading">Mencari...</div>

    <a href="../../export_excel.php" target="_blank">
        <button class="btn btn-success">
            Download Excel
        </button>
    </a>

    <a href="../../export_pdf.php" target="_blank">
        <button class="btn btn-danger">
            Download PDF
        </button>
    </a>

    <br><br>

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>

        <tbody id="result"></tbody>

    </table>

</div>

<script>

const searchBox = document.getElementById("search");
const result = document.getElementById("result");
const loading = document.getElementById("loading");

function loadData(keyword = "") {
    loading.style.display = "block";
    fetch("../../ajax/search.php?keyword=" + encodeURIComponent(keyword))
    .then(res => res.json())
    .then(data => {
        loading.style.display = "none";
        result.innerHTML = "";
        if (data.length === 0) {
            result.innerHTML =
            "<tr><td colspan='4' class='text-center'>Data tidak ditemukan</td></tr>";
        } else {
            data.forEach(row => {
                result.innerHTML += `
                <tr>
                    <td>${row.nim}</td>
                    <td>${row.nama}</td>
                    <td>${row.jurusan}</td>
                    <td>

                        <!-- tombol edit -->
                        <a href="../../views/mahasiswa/edit.php?nim=${row.nim}"
                           class="btn btn-warning btn-sm">
                           Koreksi
                        </a>

                        <!-- tombol hapus -->
                        <a href="../../controllers/hapus.php?nim=${row.nim}"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus data?')">
                           Hapus
                        </a>

                    </td>
                </tr>
                `;
            });
        }
    });
}

loadData();

searchBox.addEventListener("keyup", function () {

    const keyword = searchBox.value.trim();

    loadData(keyword);

});

</script>

</body>
</html>