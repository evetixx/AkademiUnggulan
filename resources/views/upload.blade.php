@extends('adminlte::page')
@section('content')
<div class="container"style="padding=5px">
    <div class="row">
        <div class="col-md-10" style="padding:45px">
        <div class="card"style="padding=5px">
        <div class="card-header">
            Data Mahasiswa
            <a href="{{route('mahasiswa.create')}}" class="btn btn-warning float-lg-right">Tambah anggota</a>
        </div>
        <div class="card-body">
            Upload
        </div>
    </div>
        </div>
    </div>
</div>


@endsection
    
