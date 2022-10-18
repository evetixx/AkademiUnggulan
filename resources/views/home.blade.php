@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (date('H') < 11)
                        <h1>Good Morning, {{ Auth::user()->name }}!</h1>
                    @elseif (date('H') < 15)
                        <h1>Good Afternoon, {{ Auth::user()->name }}!</h1>
                    @elseif (date('H') < 18)
                        <h1>Good Evening, {{ Auth::user()->name }}!</h1>
                    @else
                        <h1>Good Night, {{ Auth::user()->name }}!</h1>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title
                    ">Status PKL</h3>
                </div>
                <div class="card-body">
                <div id="app">
                    {!! $chart->container() !!}
                </div>
            <script src="https://unpkg.com/vue"></script>
        <script>
            var app = new Vue({
                el: '#app',
            });
        </script>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
        {!! $chart->script() !!}
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                                <div class="card-header">
                    <h3 class="card-title
                    ">Status Skripsi</h3>
                </div>
                <div class="card-body">
                <div id="app">
                    {!! $chart_skripsi->container() !!}
                </div>
            <script src="https://unpkg.com/vue"></script>
        <script>
            var app = new Vue({
                el: '#app',
            });
        </script>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
        {!! $chart_skripsi->script() !!}
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                                <div class="card-header">
                    <h3 class="card-title
                    ">Mahasiswa Aktif</h3>
                </div>
                <div class="card-body">
                <div id="app">
                    {!! $chart_mahasiswa->container() !!}
                </div>
            <script src="https://unpkg.com/vue"></script>
        <script>
            var app = new Vue({
                el: '#app',
            });
        </script>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
        {!! $chart_mahasiswa->script() !!}
                </div>
            </div>
        </div>
    </div>
    
@stop
