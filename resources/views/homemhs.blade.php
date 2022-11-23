@extends('adminlte::page')

@section('content')
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
          <li class="breadcrumb-item"><a href="dashboard_mahasiswa.php"><b>Home</b></a></li>
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
              <div class="col-md-10">
                <div class="row">
                  <div class="col-md-1" style="background: none; margin-left: 10px;">       
                    <img src="./assets/img/img_avatar.png" class="profil_mhs" alt="Avatar">
                  </div>
                  <div class="col-md-6 d-flex ">
                    <h6 class="card-title nama_mhs align-self-center h-25" style="margin-left: 15px; margin-top: 15px;">{{$datamhs->nama}}</h6>
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
                    <h5 class="card-title" style="margin-left: 25px;"><b>NIM :</b> {{$datamhs->nim}} | INFORMATIKA S1</h5>
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

            <!-- Status Akademik -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header" style="margin-left: 10px;">
                  <h5 class="card-title">
                    <i class="bi bi-mortarboard-fill"></i>
                    Status Akademik
                  </h5>

                </div>
                <div class="card-body pt-0">
                  <div class="mb-2">
                    <div class="text-center"><br>
                      <i class="bi bi-person-fill"></i>
                      <b>Dosen Wali : </b>
                        {{$dosen_wali[0]}}                  
                      <br>
                      (<b>NIM:</b>
                        {{$datamhs->nim}}) 
                    </div>
                  </div><br>
                  <ul class="list-inline text-center justify-content-center" >
                    <li class="list-inline-item px-5" style="border-right: 1px solid rgb(185, 185, 185);">
                      <span class="text-muted">Angkatan</span>
                      <span class="border-right-1"></span>
                      <h3 class="block">20{{$datamhs->angkatan}}</h3>
                    </li>

                    <li class="list-inline-item px-5" style="border-right: 1px solid rgb(185, 185, 185);">
                      <span class="text-muted">Semester Studi</span>
                      <h3 class="block">{{$datamhs->semester}}</h3>
                    </li>

                    <li class="list-inline-item pl-2">
                      <span class="text-muted">Status Akademik</span>
                      <h3 class="block">
                        <span class="badge bg-secondary">{{$datamhs->status_mhs}}</span>
                      </h3>
                    </li>

                  </ul>
                </div>
              </div>
            </div><!-- End Status Akademik -->
            
            <!-- Status Akademik -->
            <!-- <div class="col-md-6">
              <div class="card">
                <div class="card-header" style="margin-left: 10px;">
                  <h5 class="card-title">
                    <i class="bi bi-mortarboard-fill"></i>
                    Status Entry Data
                  </h5>
                </div>
                <div class="card-body pt-0">
                  <div class="form-check">
                    <label class="form-check-label" for="flexCheckChecked">Skripsi</label>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="pointer-events: none;" checked>
                    
                  </div>
                </div>
              </div>
            </div>End Status Akademik -->


            <div class="col-md-6">
              <div class="row">
                <!-- Entry IRS Card -->
                <div class="col-md-6">
                  <div class="card info-card sales-card">
                  <button type="button" data-bs-toggle="modal" data-bs-target="#entryIRS" style="border: none; background-color: white;">
                    <div class="card-body">
                      <h5 class="card-title"><span></span></h5>

                      <div class="d-flex" style="margin-bottom: 10px">
                        <div style="margin-top: 20px" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-pencil-square"></i>
                        </div>
                        <div style="margin-top: 20px" class="ps-2 text-center justify-content-center">
                          <h6>ENTRY IRS
                            @if($datamhs->irs == null)
                            <span style="font-size: 15px; padding-bottom: -5px" class="small badge badge-pill bg-danger ">Belum</span>
                            @else
                            <span style="font-size: 15px; padding-bottom: -5px" class="small badge badge-pill bg-success font-size: 1">Sudah</span>
                            @endif
                        </h6>
                            @if($datamhs->irs == null)
                            <span class="text-danger small pt-1 fw-bold"><i class="bi bi-exclamation-circle"></i></span> <span class="text-danger small pt-2 ps-1">Harap Entry KHS</span>
                            @endif

                        </div>
                      </div>
                    </div>
                  </button>
                  </div>
                </div><!-- Entry IRS Card -->

                <!-- Modal Entry Pengambilan IRS -->
                <div class="modal fade" id="entryIRS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{route('mahasiswa.updateirs', $datamhs->nim)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field() }}
                            {{method_field('PUT')}}
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Entry Pengambilan IRS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3">
                          <label for="irs" class="form-label">Upload IRS yang diambil semester ini</label>
                          <input class="form-control" type="file" id="irs" name="irs">
                        </div>
                        <div class="" style="font-size: 15px;">
                          <div>Format: .pdf</div>
                          <div>Max file size: 512kb</div>
                        </div><br>
                        <div class="form-group">
                          Jumlah SKS yang diambil
                          <div class="col-md-2">
                            <style>input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {-webkit-appearance: none; margin: 0;}</style>
                            <input type="number" onkeydown="return event.keyCode !== 69" id="sks" name="sks" class="form-control someInput" placeholder="" min="0" max="24" aria-label="Email" aria-describedby="basic-addon1">
                         </div>      
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              
            <!-- Modal Entry Hasil KHS -->
            <div class="modal fade" id="entryKHS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="{{route('mahasiswa.updatekhs', $datamhs->id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field() }}
                            {{method_field('PUT')}}
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Entry Hasil KHS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="khs" class="form-label">Upload KHS semester ini</label>
                      <input class="form-control" type="file" id="khs" name="khs">
                    </div>
                    <div class="" style="font-size: 15px;">
                      <div>Format: .pdf</div>
                      <div>Max file size: 512kb</div>
                    </div><br>
                    <div class="form-group">
                      Jumlah SKS keseluruhan
                      <div class="col-md-2">
                        <style>input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {-webkit-appearance: none; margin: 0;}</style>
                        <input type="number" onkeydown="return event.keyCode !== 69" id="sksk" class="form-control someInput" placeholder="" min="0" max="200" aria-label="Email" aria-describedby="basic-addon1">
                     </div>      
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Entry PKL Card -->
            <div class="col-md-6">
              <div class="card info-card sales-card">
                @if($datamhs->semester>4)
                <button type="button" data-bs-toggle="modal" data-bs-target="#entryPKL" style="border: none; background-color: white;">
                @endif
                <div class="card-body">
                  <h5 class="card-title"><span></span></h5>

                  <div class="d-flex" style="margin-bottom: 10px">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-square"></i>
                    </div>
                    <div class="ps-2">
                      <h6>ENTRY PKL
                        @if($datamhs->semester<5)
                        </h6>
                        <span class="text-muted small pt-1 fw-bold"><i class="bi bi-dash-circle"></i> </span> <span class="text-muted small pt-2 ps-1">Belum diperbolehkan</span>
                        @else
                        @if($datamhs->link_pkl==null)
                        <span style="font-size: 15px; padding-bottom: -5px" class="small badge badge-pill bg-danger ">Belum</span>
                        @else
                        <span style="font-size: 15px; padding-bottom: -5px" class="small badge badge-pill bg-success font-size: -5 ">Sudah</span>
                        @endif
                        @endif
                      </>

                      <!-- <span class="text-success small pt-1 fw-bold"><i class="bi bi-exclamation-circle"></i></span> <span class="text-muted small pt-2 ps-1">Harap Entry KHS</span> -->

                    </div>
    
                  </div>
                </div>
              </button>
              </div>
            </div><!-- Entry KHS Card -->
            </div>

            <!-- Modal Entry Progress PKL -->
            <div class="modal fade" id="entryPKL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="{{route('mahasiswa.updatepkl', $datamhs->id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field() }}
                            {{method_field('PUT')}}
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Entry Progress PKL</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="pkl" class="form-label">Upload File Progress PKL Anda</label>
                      <input class="form-control" type="file" id="pkl" name="pkl">
                    </div>
                    <div class="" style="font-size: 15px;">
                      <div>Format: .pdf</div>
                      <div>Max file size: 512kb</div>
                    </div><br>
                    <div class="form-group">
                        <label for="pkl">Status PKL</label>
                        <select name="status_pkl" id="status_pkl">
                        <option value = "Belum" @if($datamhs->status_pkl == 'Belum') selected @endif>Belum</option>
                        <option value = "Selesai" @if($datamhs->status_pkl == 'Selesai') selected @endif>Selesai</option>
                        <option value = "Sedang" @if($datamhs->status_pkl == 'Sedang') selected @endif>Sedang</option>
                        </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            
          <div class="col-md-12">
            <div class="row">

            
            <!-- Entry KHS Card -->
              <div class="col-md-6">
                <div class="card info-card sales-card">
                <button type="button" data-bs-toggle="modal" data-bs-target="#entryKHS" style="border: none; background-color: white;">
                  <div class="card-body">
                    <h5 class="card-title"><span></span></h5>

                    <div class="d-flex" style="margin-bottom: 10px">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-card-list"></i>
                      </div>
                      <div class="ps-2">
                        <h6>ENTRY KHS
                        @if($datamhs->khs == null)
                            <span style="font-size: 15px; padding-bottom: -5px" class="small badge badge-pill bg-danger ">Belum</span>
                            @else
                            <span style="font-size: 15px; padding-bottom: -5px" class="small badge badge-pill bg-success font-size: -5;">Sudah</span>
                            @endif
                        </h6>
                            @if($datamhs->khs == null)
                            <span class="text-danger small pt-1 fw-bold"><i class="bi bi-exclamation-circle"></i></span> <span class="text-danger small pt-2 ps-1">Harap Entry KHS</span>
                            @endif
                      </div>
                    </div>

                  </div>
                </button>
                </div>
              </div><!-- Entry PKL Card -->
            
          
           <!-- Entry Skripsi Card -->
           <div class="col-md-6">
            <div class="card info-card sales-card">
              @if($datamhs->semester>6)
              <button type="button" data-bs-toggle="modal" data-bs-target="#entrySkripsi" style="border: none; background-color: white;">
              @endif
              <div class="card-body">
                <h5 class="card-title"><span></span></h5>

                <div class="d-flex" style="margin-bottom: 10px">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-book"></i>
                  </div>
                  <div class="ps-2">
                    <h6>ENTRY SKRIPSI</h6>
                    @if($datamhs->semester<7)
                    <span class="text-muted small pt-1 fw-bold"><i class="bi bi-dash-circle"></i> </span> <span class="text-muted small pt-2 ps-1">Belum diperbolehkan</span>
                    @else
                    @if($datamhs->link_skripsi==null)
                    <span style="font-size: 15px; padding-bottom: -5px" class="small badge badge-pill bg-danger ">Belum</span>
                    @else
                    <span style="font-size: 15px; padding-bottom: -5px" class="small badge badge-pill bg-success font-size: -5 ">Sudah</span>
                    @endif
                    @endif

                  </div>
                </div>

              </div>
              </button>
            </div>
            </div><!-- Entry Skripsi Card -->


            <!-- Modal Entry Skripsi -->
            <div class="modal fade" id="entrySkripsi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="{{route('mahasiswa.updateskripsi', $datamhs->id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field() }}
                            {{method_field('PUT')}}
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Entry Skripsi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="skripsi"  class="form-label">Upload File Skripsi Anda</label>
                      <input class="form-control" type="file" id="skripsi" name="skripsi">
                    </div>
                    <div class="" style="font-size: 15px;">
                      <div>Format: .pdf</div>
                      <div>Max file size: 512kb</div>
                    </div><br>
                    <div class="form-group">
                      Tanggal Lulus
                      <div class="col-md-2">
                        <input type="date" id="datePicker" value="" />
                     </div>      
                    </div>
                    <div class="form-group py-2">
                      Lama Studi (Jumlah Semester)
                      <div class="col-md-2">
                        
                        <style>input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {-webkit-appearance: none; margin: 0;}</style>
                        <input type="number" onkeydown="return event.keyCode !== 69" id="LamaStudi" class="form-control someInput" placeholder="" min="0" max="15" aria-label="Semester" aria-describedby="basic-addon1">
                     </div>
                  <label for="skripsi">Status skripsi</label>
                    <div class="form-group">
                      <label for="jenis">Status Skripsi</label>
                      <select name="status_skripsi" id="status_skripsi">
                      <option value = "Belum" @if($datamhs->status_skripsi == 'Belum') selected @endif>Belum</option>
                      <option value = "Selesai" @if($datamhs->status_skripsi =='Selesai') selected @endif>Selesai</option>
                      <option value = "Sedang" @if($datamhs->status_skripsi == 'Sedang') selected @endif>Sedang</option>
                    </select>
                    </div>      
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

          
            </div>
          </div>
        </div>  

        <!-- Status Akademik -->
        <!-- <div class="col-md-6">
          <div class="card">
            <div class="card-header" style="margin-left: 10px;">
              <h5 class="card-title">
                <i class="bi bi-mortarboard-fill"></i>
                Status Akademik
              </h5>
            </div>
            <div class="card-body pt-0">
              <div class="mb-2">
                <div class="text-center"><br>
                  <i class="bi bi-person-fill"></i>
                  <b>Dosen Wali : </b>
                   Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.
                  <br>
                  (<b>NIP:</b>
                    197601102009122002) 
                </div>
              </div><br>
              <ul class="list-inline text-center justify-content-center">
                <li class="list-inline-item ">
                  <span class="text-muted">Angkatan</span>
                  <span class="border-right-1"></span>
                  <h3 class="block">20XX</h3>
                </li>
                &nbsp;
                &nbsp;
                <li class="list-inline-item">
                  <span class="text-muted">Semester Studi</span>
                  <h3 class="block">X</h3>
                </li>
                &nbsp;
                &nbsp;
                <li class="list-inline-item pl-2">
                  <span class="text-muted">Status Akademik</span>
                  <h3 class="block">
                    <span class="badge bg-secondary">AKTIF</span>
                  </h3>
                </li>
                &nbsp;
                &nbsp;
              </ul>
            </div>
          </div>
        </div>End Status Akademik -->
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
@stop