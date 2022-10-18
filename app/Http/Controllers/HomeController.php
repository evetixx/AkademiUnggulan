<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Charts\SampleChart;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datas = Mahasiswa::orderByRaw('FIELD(status, "Belum Disetujui", "Disetujui")')->get();
        $chart = new SampleChart;
        $chart->Labels(['Sedang', 'Belum,', 'Selesai']);
        $chart->dataset('Status', 'pie', [count($datas->where('status_pkl', 'Sedang')), count($datas->where('status_pkl', 'Belum')),count($datas->where('status_pkl','Selesai')) ])->options([
            'backgroundColor' => [
                '#00FF00',
                '#FF0000',
                '#0000FF',
            ],
        ]);
        $chart_skripsi = new SampleChart;
        $chart_skripsi->Labels(['Sedang', 'Belum,', 'Selesai']);
        $chart_skripsi->dataset('Status', 'pie', [count($datas->where('status_skripsi', 'Sedang')), count($datas->where('status_skripsi', 'Belum')),count($datas->where('status_skripsi','Selesai')) ])->options([
            'backgroundColor' => [
                '#00FF00',
                '#FF0000',
                '#0000FF',
            ],
        ]);
        //make chart for angkatan mahasiswa
        $chart_mahasiswa = new SampleChart;
        $chart_mahasiswa->Labels(['20','21','22']);
        $chart_mahasiswa->dataset('Angkatan', 'pie', [count($datas->where('angkatan', '20')), count($datas->where('angkatan', '21')),count($datas->where('angkatan','22')) ])->options([
            'backgroundColor' => [
                '#00FF00',
                '#FF0000',
                '#0000FF',
            ],
        ]);
        return view('home', compact('chart','chart_skripsi','chart_mahasiswa'));
    }
}
