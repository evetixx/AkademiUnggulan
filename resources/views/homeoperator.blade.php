@extends('adminlte::page')

@section('content')
<!DOCTYPE html>
<html lang="en">
<!-- test -->

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
  <link rel="icon" href="favicon.ico" type="image/x-icon"/>

</head>

<body> 
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dasbor</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard_operator.php"><b>Home</b></a></li>
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
                      <img src="./assets/img/img_avatar.png" style="max-width:100%;height:auto" class="profil_mhs" alt="Avatar">
                    </div>
                    <div class="col-sm-2">
                      <h6 class="card-title nama_mhs align-self-center h-25" style="margin-left:5px;margin-top: 30px;">{{Auth::user()->name}}</h6>
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
                      <h5 class="card-title" style="margin-left: 25px;"><b>Operator</b>  |  <b>NIP</b>: {{Auth::user()->nipnim}}</h5>
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
        
        <div class="row">
            
            <!-- Data Dosen -->
            <div class="col-lg-5">
              <div class="card info-card sales-card">
                <button type="button" data-bs-toggle="modal" data-bs-target="#entryPKL" style="border: none; background-color: white;">
                  <div class="card-body">
                      <div class="d-flex flex-row w-auto mx-auto" style="padding: 20px">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-square"></i>
                        </div>
                        <div class="text-center justify-content-center" style="font-size: 10px; margin-top:12px">
                            <h6>Manajemen Akun Dosen</h6>
                        </div>
                      </div>
                  </div>
                </button>
              </div>
            </div>

            <!-- Data Mahasiswa -->
            <div class="col-lg-6">
                <div class="card info-card sales-card">
                <a href="{{route('mahasiswa.create')}}"><button type="button" style="border: none; background-color: white;">
                <div class="card-body">
                    <div class="d-flex w-auto mx-auto" style="padding:20px" >
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-pencil-square"></i>
                      </div>
                      <div class=" text-center justify-content-center">
                          <h6>Upload Data Mahasiswa & Generate Akun</h6>
                      </div>
                    </div>
                </div>
                </button></a>
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