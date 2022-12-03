@extends('adminlte::page')

@section('content')
@include('sweetalert::alert')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Akademi Unggulan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profil</h1>

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard_mahasiswa.php">Home</a></li>
          <li class="breadcrumb-item active">Profil</li>
        </ol>
      </nav>
  @if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
  @endif
    @if (session('statussukses'))
    <div class="alert alert-success">
        {{ session('statussukses') }}
    </div>
  @endif
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body pt-4 d-flex flex-column align-items-center">
              <img src="assets/img/img_avatar.png" class="foto-profil" alt="Profile">
              <div class="profile-card d-flex flex-column align-items-center">
                <h2>{{Auth::user()->name}}</h2>
              </div>

              
              
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ganti Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">
            
            <div class="tab-pane fade show active profile-overview" id="profile-overview"> 
            <form action="{{route('profile.update',$datauser->nipnim)}}" method="POST">
            {{csrf_field() }}
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="nipnim">NIP/NIM</label>
                <input type="text" name="nipnim" class="form-control" id="nipnim"placeholder="nipnim" value="{{$datauser->nipnim}}" readonly>
            </div>
            <div class="form-group">
                <label for="Name">Nama</label>
                <input type="text" name="name" class="form-control" id="Name"placeholder="Nama" value="{{$datauser->name}}" readonly>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username"placeholder="Username" value="{{strstr($datauser->email,'@',true)}}">
            </div>

            <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')">Ubah</button>
            </form>
            </div>
            <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="{{route('password.update',$datauser->nipnim)}}" method="POST">
                              {{csrf_field() }}
            {{method_field('PUT')}}  
                  <div class="row mb-3">
                      <label for="password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



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

@endsection