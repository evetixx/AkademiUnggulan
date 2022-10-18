@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Import Data Mahasiswa
                </div>
                <div class="card-body">
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
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Export Data Mahasiswa
                </div>
                <div class="card-body">
                    <a href="{{route('mahasiswa.export')}}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
