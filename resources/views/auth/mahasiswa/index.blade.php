@extends('adminlte::page')
@section('content')
@include('sweetalert::alert')
@include('script')
<div class="container"style="padding=0px">
    <div class="row">
        <div class="col-md-10" style="padding-top:45px">
        <div class="card"style="padding=5px">
        <div class="card-header">
            Data Mahasiswa
            <a href="{{route('mahasiswa.create')}}" class="btn btn-warning float-lg-right">Tambah anggota</a>
        </div>
        <div class="card-body">
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
                <td>{{$data->irs}}</td>
                <td>@php
                    if ($data->link_skripsi != null){
                        echo('<a class="btn btn-sm btn-info shadow" href='.$data->link_skripsi.' role="button">Lihat</a>');
                    };
                    @endphp</td>
                <td>{{$data->status_pkl}}
                    @php
                    if ($data->link_skripsi != null){
                        echo('<a class="btn btn-sm btn-info shadow" href='.$data->link_skripsi.' role="button">Lihat</a>');
                    };
                    @endphp
                </td>
                <td>{{$data->status_skripsi}}
                    @php
                    if ($data->link_skripsi != null){
                        echo('<a class="btn btn-sm btn-info shadow" href='.$data->link_skripsi.' role="button">Lihat</a>');
                    };
                    @endphp
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

@endsection
    
