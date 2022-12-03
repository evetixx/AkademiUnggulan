@extends('adminlte::page')

@section('content')
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Akademi Unggulan</title>

  <!-- Favicons -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
  <!-- Header -->
  
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dasbor</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/"><b>Home</b></a></li>
          <li class="breadcrumb-item">Dasbor</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    
    <section class="section dashboard">
      
        

        <!-- Nama NIM Prodi -->

        <div class="row">
          <div class="col-12">
          <div class="card head-img-profile img-responsive">
            <div class="card-body" style="background-color: white">
              <div class="col-md-6">
                <div class="d-flex flex-row">
                  <div class="col-sm-2" style="background: none; margin-left: 10px;">       
                    <img src="./assets/img/img_avatar.png" class="profil_mhs" style="max-width: 100%;height:auto" alt="Avatar">
                  </div>
                  <div class="col-sm-6">
                    <h6 class="card-title nama_mhs align-self-center h-25" style="margin-left: 5px; margin-top: 30px;">Departemen Informatika</h6>
                  </div>
                </div> 
              </div>
            </div>

            <div class="card-body" style="border-top: 1px solid #cddfff;">
              <div class="col-md-10">
                <div class="row">
                  <div class="col-md-1">
                    &nbsp;
                  </div>
                  <div class="col-md-6">
                    <h5 class="card-title" style="margin-left: 25px;"><b>Departemen Informatika</b></h5>
                  </div>
                </div>

              </div>
                
              </div>
              
            </div>
            <div class="card head-img-profile img-responsive">
              <div class="row">
                
                </div>
                

              </div>

              
  
            </div>
        </div><!-- End Nama NIM Prodi -->

        <div class="container-fluid">
          <div class="row">
            <!-- Data Dosen -->
            <div class="col-md-3">
              <div class="card info-card sales-card" style="width: 100%">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#entryPKL" style="border: none; background-color: white;">
                    <div class="card-body">
                      <div class="d-flex flex-row align-items-center" style="width:100%;height:100px;">                    
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-person-square"></i>
                          </div>
                          <div class="text-center justify-content-center" style="font-size: 10px;">
                              <h6>Data Dosen</h6>
                          </div>
                        </div>
                    </div>
                    </button>
                </div>
            </div>

            <!-- Data Mahasiswa -->
            <div class="col-md-3">
              <div class="card info-card sales-card" style="width: 100%">
                <a href="/status"><button type="button" style="border: none; background-color: white;">
                <div class="card-body">
                    <div class="d-flex flex-row align-items-center" style="width:100%;height:100px">                    
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class=" text-center justify-content-center" style="font-size: 10px">
                        <h6>Data Mahasiswa</h6>
                    </div>
                    </div>
                </div>
                </button></a>
              </div>
            </div>

            <!-- Manajemen Akun -->
            <!-- <div class="col-md-3">
              <div class="card info-card sales-card" style="width:100%">
                <button type="button" data-bs-toggle="modal" data-bs-target="#entryPKL" style="border: none; background-color: white;">
                <div class="card-body">
                  <div class="d-flex flex-row align-items-center" style="width:100%;height:100px">                    
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-square"></i>
                    </div>
                    <div class="text-center justify-content-center" style="font-size: 10px;">
                      <h6>Manajemen Akun</h6>
                    </div>
                  </div>
                </div>
              </button>
              </div>
            </div> -->

            
            <!-- Mahasiswa PKL -->
            <div class="col-md-3">
              <div class="card info-card sales-card" style="width: 100%">
                <a href="/pkl"><button type="button" style="border: none; background-color: white;">
                <div class="card-body">
                  <div class="d-flex flex-row align-items-center" style="width: 100%;height:100px">                    
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-square"></i>
                    </div>
                    <div class="text-center justify-content-center" style="font-size: 10px;">
                      <h6>Mahasiswa PKL</h6>
                    </div>
                  </div>
                </div>
                </button>
                </a>
              </div>
            </div>
            
              <!-- Row Kebawah Paling Kanan-->
              <div class="col-md-3">
                <!-- Mahasiswa Skripsi -->
                <div class="col-md-12">
                  <div class="card info-card sales-card" style="width: 100%">
                    <a href="/skripsi"><button type="button" style="border: none; background-color: white;"><button type="button" style="border: none; background-color: white;">
                        <div class="card-body">        
                          <div class="d-flex flex-row align-items-center" style="width: 100%;height:100px"> 
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-square"></i>
                            </div>
                            <div class="" style="font-size: 10px;">
                            <h6>Mahasiswa Skripsi</h6>
                            <!-- <span class="text-success small pt-1 fw-bold"><i class="bi bi-exclamation-circle"></i></span> <span class="text-muted small pt-2 ps-1">Harap Entry KHS</span> -->
                            <!-- <span class="text-muted small pt-1 fw-bold"><i class="bi bi-dash-circle"></i> </span> <span class="text-muted small pt-2 ps-1">Belum diperbolehkan</span> -->
                            </div>
            
                        </div>
                        </div>
                        </button>
                        </a>
                    </div>
                </div>
            </div>
          </div>
            
        </div>
    </section>

  </main><!-- End #main -->


  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  

</body>

</html>
@endsection