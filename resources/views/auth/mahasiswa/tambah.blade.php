@extends('adminlte::page')
@section('content')
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Akademi Unggulan</title>

  <!-- Favicons -->
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="./assets/js/ajax.js"></script>


  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <script>
    // entah kenapa script di external gabisa
    function add_row() {
        let itemNIM = document.getElementById("formNIM").value;
        let itemNama = document.getElementById("formNama").value;
        let itemAngkatan = document.getElementById("formAngkatan").value;
        let itemJenisKelamin = document.querySelector('input[name="jenis_kelamin"]:checked').value;

        $('#tabledata tr:last').after(`<tr><td>${itemNIM}</td><td>${itemNama}</td><td>${itemAngkatan}</td><td>${itemJenisKelamin}</td><td></td><td></td><td>Belum</td><td>Belum</td><td><button type="button" class="btn btn-warning btn-sm disabled" style="font-size: 10px;"><b>Belum Disetujui</b></button><button type="button" class="btn btn-success" style="font-size: 15px;">Setujui</button></td><td><button type="button" class="btn btn-info">Edit</button></td></tr>`);
    }
  </script>

</head>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/chart.js/chart.min.js"></script>
  <script src="/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/vendor/quill/quill.min.js"></script>
  <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

  

</body>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Import Data Mahasiswa
                </div>
                <div class="card-body">
                    <form action="{{route('mahasiswa.import')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field() }}
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" name="file" class="form-control" id="file" placeholder="File" required="required">
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengimport data ini?')">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Download Template Import
                </div>
                <div class="card-body">
                    <a href="{{Route('mahasiswa.downloadtemplate','Template.xlsx')}}" class="btn btn-success my-3" target="_blank">Download Template</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Export Data Mahasiswa
                </div>
                <div class="card-body">
                    <a href="{{route('mahasiswa.export')}}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
