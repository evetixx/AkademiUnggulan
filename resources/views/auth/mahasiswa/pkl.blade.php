@extends('adminlte::page')
@section('content')
@include('sweetalert::alert')
@include('script')
<!DOCTYPE html>
<html lang="en">

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
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="/assets/js/ajax.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <script>
    // entah kenapa script di external gabisa
    function showGenre(item) {
        document.getElementById("dropdownMenuButton1").innerHTML = "Angkatan " + item.innerHTML;
        document.getElementById("totalMHSAngkatan").innerHTML = "Total Status Mahasiswa PKL Angkatan "  + item.innerHTML + ":";
        document.getElementById("totalStatusMHS").style.display = "block";
    }

    function showGenre2(item) {
        document.getElementById("dropdownMenuButton1").innerHTML = item.innerHTML;
        document.getElementById("totalMHSAngkatan").innerHTML = "Total Status Mahasiswa PKL "  + item.innerHTML + ":";
        document.getElementById("totalStatusMHS").style.display = "block";
    }

  </script>

</head>

<body>
  <!-- Header -->
  
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Mahasiswa PKL</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard_operator.php"><b>Home</b></a></li>
          <li class="breadcrumb-item">Dasbor</li>
          <li class="breadcrumb-item">Mahasiswa PKL</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    
    <section class="section master-data">
        <section class="row justify-content-center">
            <div class="col-8">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-9 px-4">
                                        <h5 id="titleAngkatan">Daftar Mahasiswa PKL</h5>
                                    </div>
                                    <div class="col-3">
                                        <div class="dropdown" style="float: right;">
                                        @if ($angkatan != null)
                                        <button class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                Angkatan 20{{$angkatan}}
                                            </button>
                                        @else
                                            <button class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                Angkatan
                                            </button>
                                        @endif
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" id="2016" onclick="showGenre(this)" href="{{route('mahasiswa.showpkl', 19)}}">2019</a></li>
                                                <li><a class="dropdown-item" id="2017" onclick="showGenre(this)" href="{{route('mahasiswa.showpkl', 20)}}">2020</a></li>
                                                <li><a class="dropdown-item" id="2018" onclick="showGenre(this)" href="{{route('mahasiswa.showpkl', 21)}}">2021</a></li>
                                                <li><a class="dropdown-item" id="2019" onclick="showGenre(this)" href="{{route('mahasiswa.showpkl', 22)}}">2022</a></li>
                                                <li><a class="dropdown-item" id="allAng" onclick="showGenre2(this)" href="{{route('mahasiswa.pkl')}}">Semua Angkatan</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="row mt-5">
         <div class="col-md-12">
           <div class="card">
                <div class="card-body">
                   <form action="" method="POST">
                       <div class="row">
                         <div class="col-md-6">
                            <div class="input-group mb-3">
             <input type="text" class="form-control"   placeholder="Search mahasiswa" id="search">
                <div class="input-group-prepend">
                 <span class="input-group-text" id="basic-addon1">
</span>
</div>
</div>
</div>
</div>
</form>
                            <table id="tabledatamaster" class="table table-striped" style="border: 1px solid #B2D8CA; table-layout: fixed; width: 100%; font-size: 15px;">
                                <colgroup>
                                    <col span="1" style="width: 20%;">
                                    <col span="1" style="width: 30%;">
                                    <col span="1" style="width: 15%;">
                                    <col span="1" style="width: 15%;">
                                    <col span="1" style="width: 10%;">

                                </colgroup>

                                <tbody id="tabledata">
                                    <tr>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Angkatan</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Berkas PKL</th>
                                        <th scope="col">Status PKL</th>
                                    </tr>
                                    @foreach($datas as $data)
                                    <tr>
                                        <td>{{$data->nim}}</td>
                                        <td>{{$data->nama}}</td>
                                        <td>{{$data->angkatan}}</td>
                                        <td>{{$data->jenis_kelamin}}</td>
                                        <td>
                                            @if($data->link_pkl != null)
                                            <a class="btn btn-sm btn-info shadow" href="{{route('mahasiswa.openpkl', $data->link_pkl)}}" target="_blank" rel="noopener noreferrer" role="button">Lihat</a>
                                            @endif
                                        </td>
                                        <td>{{$data->status_pkl}}</td>
                                    </tr>
                                    @endforeach
                                    {{ $datas->links() }}
                                </tbody>
                            </table>
                            <div class="recap_footer">
                                <b id="totalMHSAngkatan"></b>
                                <div id="totalStatusMHS" style="display: none;">
                                <ul>
                                    <li>Belum: <?php echo 2 ?></li>
                                    <li>Proses: <?php echo 13 ?></li>
                                    <li>Selesai: 0</li>
                                </ul>
                                </div>
                            </div>
                            <div style="float: right;"><a href="{{route('mahasiswa.chartpkl')}}" style="text-decoration: underline;">Lihat Rekap Semua Angkatan</a></div>
                        </div>
                    </div>
                </div>
            </div>       
        </section>
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
  <script src="assets/js/main.js"></script>
    <script>
$('#search').on('keyup', function(){
    search();
});
search();
function search(){
     var keyword = $('#search').val();
     $.post('{{ route("mahasiswa.showpklajax") }}',
      {
         _token: $('meta[name="csrf-token"]').attr('content'),
         keyword:keyword
       },
       function(data){
        table_post_row(data);
          console.log(data);
       });
}
// table row with ajax
function table_post_row(res){
let htmlView = '';
if(res.datas.length <= 0){
    htmlView+= `
       <tr>
                                               <th scope="col">NIM</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Angkatan</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Berkas PKL</th>
                                        <th scope="col">Status PKL</th>
         </tr>
            <tr>
          <td colspan="4">No data.</td>
      </tr>`;
}
else{htmlView+= `
                                    <tr>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Angkatan</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Berkas PKL</th>
                                        <th scope="col">Status PKL</th>
                                    </tr>`;
                                    
for(let i = 0; i < res.datas.length; i++){
    htmlView += `
        <tr>
            <td>${res.datas[i].nim}</td>
            <td>${res.datas[i].nama}</td>
            <td>${res.datas[i].angkatan}</td>
            <td>${res.datas[i].jenis_kelamin}</td>
            <td>
            ${res.datas[i].link_pkl? '<a class="btn btn-sm btn-info shadow" href="/downloadsss/'+res.datas[i].link_pkl+'" target="_blank" rel="noopener noreferrer" role="button">Lihat</a>' : ''}
            </td>
            <td>${res.datas[i].status_pkl}</td>
        </tr>
    `;
}
}
     $('tbody').html(htmlView);
}
</script>
  

</body>

</html>
@endsection
    
