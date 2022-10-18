@extends('adminlte::page')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-10">
    <div class="card">
    <div class="card-header">
        Edit Data Mahasiswa
    </div>
    <div class="card-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $errors }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('mahasiswa.update', $data->id)}}" method="POST">
            {{csrf_field() }}
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" name="nim" class="form-control" id="nim"placeholder="Id anggota" value="{{$data->nim}}" readonly>
            </div>
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="Nama"placeholder="Nama" value="{{$data->nama}}" readonly>
            </div>
            <div class="form-group">
                <label for="pkl">Status PKL</label>
                <select name="status_pkl" id="">
                    <option value = "Belum" @if($data->status_pkl == 'Belum') selected @endif>Belum</option>
                    <option value = "Selesai" @if($data->status_pkl == 'Selesai') selected @endif>Selesai</option>
                    <option value = "Sedang" @if($data->status_pkl == 'Sedang') selected @endif>Sedang</option>
                </select>
            </div>
                <div class="form-group">
                <label for="jenis">Status Skripsi</label>
                <select name="status_skripsi" id="">
                    <option value = "Belum" @if($data->status_skripsi == 'Belum') selected @endif>Belum</option>
                    <option value = "Selesai" @if($data->status_skripsi =='Selesai') selected @endif>Selesai</option>
                    <option value = "Sedang" @if($data->status_skripsi == 'Sedang') selected @endif>Sedang</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')">Ubah</button>
            </form>
            </div>
    </div>
    </div>
</div>
</div>

@endsection