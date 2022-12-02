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



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="/assets/js/ajax.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!-- Template Main CSS File -->


</head>
<div class="container"style="padding=0px">
    <div class="row">
        <div class="col-md-10" style="padding-top:45px">
        <div class="card"style="padding=5px">
        <div class="card-header">
            Data Mahasiswa
            <a href="{{route('mahasiswa.create')}}" class="btn btn-warning float-lg-right">Tambah anggota</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
            @if($angkatan == null)
            <a href="{{route('mahasiswa.index')}}" class="btn btn-primary active" role="button" aria-pressed="true">Semua Angkatan</a>
            @else
            <a href="{{route('mahasiswa.index')}}" class="btn btn-primary"role="button">Semua Angkatan</a>
            @endif
            @if ($angkatan=="20")
                <a href="{{route('mahasiswa.show', 20)}}" class="btn btn-primary active" role="button" aria-pressed="true">20</a>
            @else
                <a href="{{route('mahasiswa.show', 20)}}" class="btn btn-primary"role="button">20</a>
            @endif
            @if ($angkatan=="21")
                <a href="{{route('mahasiswa.show', 21)}}" class="btn btn-primary active" role="button" aria-pressed="true">21</a>
            @else
                <a href="{{route('mahasiswa.show', 21)}}" class="btn btn-primary"role="button">21</a>
            @endif
            @if ($angkatan=="22")
                <a href="{{route('mahasiswa.show', 22)}}" class="btn btn-primary active" role="button" aria-pressed="true">22</a>
            @else
                <a href="{{route('mahasiswa.show', 22)}}" class="btn btn-primary"role="button">22</a>
            @endif
</div>
<div class="col">
                           <form action="" method="POST">
             <input type="text" class="form-control "   placeholder="Search mahasiswa" id="search">
            </form>
</div>  
            </div>
        <table class="table table-striped" id="Tablekucok"> 
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Angkatan</th>
                <th>Jenis Kelamin</th>
                <th>IRS</th>
                <th>KHS</th>
                <th>Status PKL</th>
                <th>Status Skripsi</th>
                <th>Status</th>
                <th>Edit</th>
            </tr>
            @foreach($datas as $data)
            <tr>
                <td>{{$data->nim}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->angkatan}}</td>
                <td>{{$data->jenis_kelamin}}</td>
                <td>
                    @if($data->irs != null)
                        <a class="btn btn-sm btn-info shadow" href="{{route('mahasiswa.openirs', $data->irs)}}" target="_blank" rel="noopener noreferrer" role="button">Lihat</a>
                    @endif    
                </td>
                <td>
                    @if($data->khs != null)
                        <a class="btn btn-sm btn-info shadow" href="{{route('mahasiswa.openkhs', $data->khs)}}" target="_blank" rel="noopener noreferrer" role="button">Lihat</a>
                    @endif
                </td>
                <td>{{$data->status_pkl}}
                    @if($data->link_pkl != null)
                        <a class="btn btn-sm btn-info shadow" href="{{route('mahasiswa.openpkl', $data->link_pkl)}}" target="_blank" rel="noopener noreferrer" role="button">Lihat</a>
                    @endif
                </td>
                <td>{{$data->status_skripsi}}
                    @if ($data->link_skripsi != null)
                        <a class="btn btn-sm btn-info shadow" href="{{route('mahasiswa.openskripsi', $data->link_skripsi)}}" target="_blank" rel="noopener noreferrer" role="button">Lihat</a>
                    @endif
                </td>
                <td>
                    @if ($data->status == "Belum Disetujui")
                        <span class="badge badge-warning">{{$data->status}}</span>
                    @else
                        <span class="badge badge-success">{{$data->status}}</span>
                    @endif
                    @if($data->status == 'Belum Disetujui')
                    <form action="{{route('mahasiswa.update', $data->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input type="hidden" name="status" value="Disetujui">
                        <button type="submit" class="btn btn-sm btn-success shadow" onclick="return confirm('Apakah anda yakin ingin Menyetujui?')">Setujui</button>
                    </form>
                    @else
                    <form action="{{route('mahasiswa.update', $data->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input type="hidden" name="status" value="Belum Disetujui">
                        <button type="click" class="btn btn-sm btn-danger shadow" onclick="return confirm('Apakah anda yakin ingin Membatalkan persetujuan?')">Batalkan</button>
                    </form>
                    @endif
                </td>
                <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                    action="{{ route('mahasiswa.destroy', $data->id) }}" method="POST">
                    <a href="{{ route('mahasiswa.edit', $data->id) }}"
                    class="btn btn-sm btn-info shadow">Edit</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        </div>
    </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/app.js"></script>
    <script>
$('#search').on('keyup', function(){
    search();
});
search();
function search(){
     var keyword = $('#search').val();
     $.post('{{ route("mahasiswa.showmahasiswasetujuiajax") }}',
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
            <td colspan="10" class="text-center">Data not found</td>
         </tr>
            <tr>
          <td colspan="4">No data.</td>
      </tr>`;
}
else{htmlView+= `
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Angkatan</th>
        <th>Jenis Kelamin</th>
        <th>IRS</th>
        <th>KHS</th>
        <th>Status PKL</th>
        <th>Status Skripsi</th>
        <th>Status</th>
        <th>Edit</th>
    </tr>`;
    res.datas.forEach(function(data){
        //print variable data.id 
        htmlView+= `
        <tr>
            <td>${data.nim}</td>
            <td>${data.nama}</td>
            <td>${data.angkatan}</td>
            <td>${data.jenis_kelamin}</td>
            <td>
            ${data.irs != null ? `<a class="btn btn-sm btn-info shadow" href="/download/`+data.irs+`" target="_blank" rel="noopener noreferrer" role="button">Lihat</a>` : ``}
            </td>
            <td>
            ${data.khs != null ? `<a class="btn btn-sm btn-info shadow" href="/downloads/`+data.khs+`" target="_blank" rel="noopener noreferrer" role="button">Lihat</a>` : ''}
            </td>
            <td>${data.status_pkl}
            ${data.link_pkl != null ? `<a class="btn btn-sm btn-info shadow" href="/downloadsss/`+data.link_pkl+`" target="_blank" rel="noopener noreferrer" role="button">Lihat</a>` : ``}
            </td>
            <td>${data.status_skripsi}
            ${data.link_skripsi != null ? `<a class="btn btn-sm btn-info shadow" href="/downloadss/`+data.link_skripsi+`" target="_blank" rel="noopener noreferrer" role="button">Lihat</a>`: ``}
            </td>
            <td>
            ${data.status == "Belum Disetujui" ? `<span class="badge badge-warning">`+data.status+`</span>` : `<span class="badge badge-success">`+data.status+`</span>`}
            ${data.status == 'Belum Disetujui' ? `<form action="mahasiswa/`+data.id+`" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <input type="hidden" name="status" value="Disetujui">
                    <button type="submit" class="btn btn-sm btn-success shadow" onclick="return confirm('Apakah anda yakin ingin Menyetujui?')">Setujui</button>
                </form>` : `<form action="mahasiswa/`+data.id+`" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <input type="hidden" name="status" value="Belum Disetujui">
                    <button type="click" class="btn btn-sm btn-danger shadow" onclick="return confirm('Apakah anda yakin ingin Membatalkan persetujuan?')">Batalkan</button>
                </form>`}
            </td>
        </tr>`;
    });
                                    
}
     $('tbody').html(htmlView);
}
</script>

@endsection

    
