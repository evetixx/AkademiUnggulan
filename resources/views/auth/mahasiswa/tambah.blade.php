@extends('adminlte::page')
@section('content')
@include('sweetalert::alert')
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
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Input Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard_mahasiswa.php">Home</a></li>
          <li class="breadcrumb-item active">Input Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row justify-content-center">
        <div class="col-xl-6">

          <div class="card">
            <div class="card-header">
                <div class="card-title px-2">Form Input Data Manual</div>
                <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#collapseInputDosenWali" aria-expanded="false" aria-controls="collapseInputDosenWali" onclick="collapseToggle1()">Input Dosen Wali</button>
                <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#collapseInputMahasiswa" aria-expanded="false" aria-controls="collapseInputMahasiswa" onclick="collapseToggle2()">Input Mahasiswa</button>
            </div>
            <div class="collapse" id="collapseInputMahasiswa">
                <form action="{{ route('mahasiswa.storemhs') }}" method="POST"> 
                    @csrf <!-- {{ csrf_field() }} --> 
                <div class="card-body pt-4 d-flex flex-column">
                    <div class="row mb-3">
                      <label for="formNIM" class="col-md-3 col-lg-2 col-form-label px-3">NIM</label>
                      <div class="col-md-8 col-lg-10">
                        <input name="nipnim" type="text" class="form-control" id="nipnim">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="formNama" class="col-md-3 col-lg-2 col-form-label px-3">Nama</label>
                      <div class="col-md-8 col-lg-10">
                        <input name="nama" type="text" class="form-control" id="nama">
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label for="formSemester" class="col-md-3 col-lg-2 col-form-label px-3">Semester</label>
                        <div class="col-md-8 col-lg-10">
                          <input name="semester" type="text" class="form-control" id="semester">
                        </div>
                      </div>

                    <div class="row mb-3">
                      <label for="formAngkatan" class="col-md-3 col-lg-2 col-form-label px-3">Angkatan</label>
                      <div class="col-md-8 col-lg-10">
                        <input name="angkatan" type="text" class="form-control" id="angkatan">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="formDosenWali" class="col-md-3 col-lg-2 col-form-label px-3">Dosen Wali</label>
                      <div class="col-md-8 col-lg-10">
                        <input name="dosen_wali" type="text" class="form-control" id="dosen_wali">
                      </div>
                    </div>

                    <div class="row mb-3">

                    <label for="renewPassword" class="col-md-2 col-form-label px-3">Jenis Kelamin</label>
                    <div class="col-md-8">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="Pria" value="Pria">
                            <label class="form-check-label" for="Pria">
                                Pria
                            </label>
                        </div>
                        <div class="col-md-8 form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="Wanita" value = "Wanita">
                            <label class="form-check-label" for="Wanita">
                                Wanita
                            </label>
                        </div>
                    </div>
                        
                    </div>
                    
                </div>
                <div class="p-3" style="float: right;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            </div>

            <div class="collapse" id="collapseInputDosenWali">
                <form action="{{ route('mahasiswa.storedoswal') }}" method="POST"> 
                    @csrf <!-- {{ csrf_field() }} -->            
                <div class="card-body pt-4 d-flex flex-column">
                
                    <div class="row mb-3">
                      <label for="NIM" class="col-md-3 col-lg-2 col-form-label px-3">NIP</label>
                      <div class="col-md-8 col-lg-10">
                        <input name="nipnim" type="number" class="form-control" id="NIM">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-3 col-lg-2 col-form-label px-3">Nama</label>
                      <div class="col-md-8 col-lg-10">
                        <input name="nama" type="text" class="form-control" id="nama">
                      </div>
                    </div>
                  
                </div>
                <div class="p-3" style="float: right;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                
            </form>
            </div>
          </div>

        </div>
        
    
        <div class="col-xl-4">

          <div class="card">
            <div class="card-header">
                <div class="card-title px-2">Import Data Mahasiswa</div>
            </div>
            <div class="card-body pt-3">
                <div class="mb-3">
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

          <div class="card">
            <div class="card-header">
                <div class="card-title px-2">Download Template Import</div>
            </div>
            <div class="card-body pt-3">
                    <a href="{{Route('mahasiswa.downloadtemplate','Template.xlsx')}}" class="btn btn-success my-3" target="_blank">Download Template</a>

            
            </div>
          </div>

          <div class="card">
            <div class="card-header">
                <div class="card-title px-2">Export Data Mahasiswa</div>
            </div>
            <div class="card-body pt-3">
                <div class="my-3">
                    <a href="{{route('mahasiswa.export')}}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
                </div>

            
            </div>
          </div>

        </div>
        
    </section>

  </main>
<script>
    
    function collapseToggle1() {
        let x = new bootstrap.Collapse(collapseInputMahasiswa, {
            toggle : false
        })

        x.hide()

    }

    function collapseToggle2() {
        let x = new bootstrap.Collapse(collapseInputDosenWali, {
            toggle : false
        })

        x.hide()

    }

  </script>
@endsection
