<?php

namespace App\Http\Controllers;

use App\Exports\ExportMahasiswa;
use App\Imports\ImportMahasiswa;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Http\Requests;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Charts\SampleChart;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //datas sorted from status == Belum Disetujui first then Disetujui  
        $datas = Mahasiswa::orderByRaw('FIELD(status, "Belum Disetujui", "Disetujui")')->get();
        $angkatan="";
        return view('auth.mahasiswa.index', compact('datas','angkatan',));


    }

    public function profile()
    {
        $datamhs = Mahasiswa::where('nama',Auth::user()->name)->first();
        $datauser = User::where('name',Auth::user()->name)->first();
        //make variable to print nipnim from user table based on name
        return view('profile', compact('datamhs','datauser'));


    }
    public function updateprofile(Request $request, $id)
    {       if (Auth::user()->role == 'mahasiswa'){
        $data = Mahasiswa::where('nim', $id);
        $data->update([
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);
        $datas = User::where('nipnim', $id);
        $datas->update([
            'email' => $request->username.'@student.akdung.ac.id',
        ]);
        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->route('profile');

    }else{
        $request->validate([
            'username' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);
        $datas = User::where('nipnim', $id);
        $datas->update([
            'email' => $request->email,
        ]);
    }
    }
    public function password()
    {
        $datamhs = Mahasiswa::where('nama',Auth::user()->name)->first();
        $datauser = User::where('name',Auth::user()->name)->first();
        //make variable to print nipnim from user table based on name
        return view('password', compact('datamhs','datauser'));


    }
    public function updatepassword(Request $request, $id){
        $datas = User::where('nipnim', $id);
        if($request->password == $request->password_confirmation){
            $datas->update([
                'password' => Hash::make($request->password),
            ]);
            Alert::success('Berhasil', 'Password Berhasil Diubah');
            return redirect('/logout');
        }else{
            Alert::error('Gagal', 'Password Tidak Sama');
            return redirect()->route('profile');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.mahasiswa.tambah');
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Mahasiswa();
        $data->create($request->all());
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show only angkatan == selected id
        $datas = Mahasiswa::where('angkatan', $id)->get();
        $angkatan = $id;
        return view('auth.mahasiswa.index', compact('datas', 'angkatan'));
        $datas = Mahasiswa::where('angkatan', $id)->get();
        $angkatan = $id;
        return view('auth.mahasiswa.pkl', compact('datas', 'angkatan'));
        
    }

    public function pkl()
    {
        //show only angkatan == selected id
        //mahasiswa where status pkl Sedang, Sudah, Belum
        if(Auth::user()->role == 'doswal'){
        $datas = Mahasiswa::WHERE('dosen_wali', Auth::user()->name)->paginate(5);
        $angkatan = "";
        return view('auth.mahasiswa.pkl', compact('datas', 'angkatan'));
        }
        $datas = Mahasiswa::ORDERBYRAW('angkatan')->Paginate(5);
        $angkatan = "";
        return view('auth.mahasiswa.pkl', compact('datas', 'angkatan'));
        
    }

    public function showpkl($id)
    {
        //show only angkatan == selected id
        //mahasiswa where status pkl Sedang, Sudah, Belum
        if(Auth::user()->role == 'doswal'){
        $datas = Mahasiswa::WHERE('dosen_wali', Auth::user()->name)->where('angkatan', $id)->paginate(5);
        $angkatan = $id;
        return view('auth.mahasiswa.pkl', compact('datas', 'angkatan'));
        }
        $datas = Mahasiswa::where('angkatan', $id)->paginate(5);
        $angkatan = $id;
        return view('auth.mahasiswa.pkl', compact('datas', 'angkatan'));
        
    }

    public function showpklajax (Request $request){
        if(Auth::user()->role == 'doswal'){
        if($request->keyword != ''){
            $datas = Mahasiswa::where('nama','LIKE','%'.$request->keyword.'%')->where('dosen_wali', Auth::user()->name)->get();
            }
            else{
            $datas = Mahasiswa::WHERE('dosen_wali', Auth::user()->name)->get();
            }
        return response()->json([
            'datas' => $datas
        ]);}
        else{
        $datas = Mahasiswa::all();
            if($request->keyword != ''){
            $datas = Mahasiswa::where('nama','LIKE','%'.$request->keyword.'%')->get();
            }
            else{
            $datas = Mahasiswa::all();
            }
        return response()->json([
            'datas' => $datas
      ]);}
    }

    public function skripsi(){
        if(Auth::user()->role == 'doswal'){
        $datas = Mahasiswa::WHERE('dosen_wali', Auth::user()->name)->paginate(5);
        $angkatan = "";
        return view('auth.mahasiswa.skripsi', compact('datas', 'angkatan'));
        }
        else{
        $datas = Mahasiswa::where('status_skripsi', 'Sedang')->orWhere('status_skripsi', 'Sudah')->orWhere('status_skripsi', 'Belum')->ORDERBYRAW('angkatan')->Paginate(5);
        $angkatan = "";
        return view('auth.mahasiswa.skripsi', compact('datas', 'angkatan'));
        }
    }

    public function showskripsi($id)
    {
        if(Auth::user()->role == 'doswal'){
        $datas = Mahasiswa::WHERE('dosen_wali', Auth::user()->name)->where('angkatan', $id)->paginate(5);
        $angkatan = $id;
        return view('auth.mahasiswa.skripsi', compact('datas', 'angkatan'));
        }
        else{
        $datas = Mahasiswa::where('angkatan', $id)->paginate(5);
        $angkatan = $id;
        return view('auth.mahasiswa.skripsi', compact('datas', 'angkatan'));
        }
        
    }

    public function showskripsiajax(Request $request){
        if(Auth::user()->role == 'doswal'){
        if($request->keyword != ''){
            $datas = Mahasiswa::where('nama','LIKE','%'.$request->keyword.'%')->where('dosen_wali', Auth::user()->name)->get();
            }
            else{
            $datas = Mahasiswa::WHERE('dosen_wali', Auth::user()->name)->get();
            }
        return response()->json([
            'datas' => $datas
        ]);}
        else{
        $datas = Mahasiswa::all();
            if($request->keyword != ''){
            $datas = Mahasiswa::where('nama','LIKE','%'.$request->keyword.'%')->get();
            }
            else{
            $datas = Mahasiswa::all();
            }
        return response()->json([
            'datas' => $datas
      ]);}
    }

    public function status(){
        if(Auth::user()->role == 'doswal'){
        $datas = Mahasiswa::WHERE('dosen_wali', Auth::user()->name)->paginate(5);
        $angkatan = "";
        return view('auth.mahasiswa.status', compact('datas', 'angkatan'));
        }
        else{
        $datas = Mahasiswa::ORDERBYRAW('angkatan')->Paginate(5);
        $angkatan = "";
        return view('auth.mahasiswa.status', compact('datas', 'angkatan'));
        }
    }

    public function showstatus($id)
    {
        if(Auth::user()->role == 'doswal'){
        $datas = Mahasiswa::WHERE('dosen_wali', Auth::user()->name)->where('angkatan', $id)->paginate(5);
        $angkatan = $id;
        return view('auth.mahasiswa.status', compact('datas', 'angkatan'));
        }
        else{
        $datas = Mahasiswa::where('angkatan', $id)->paginate(5);
        $angkatan = $id;
        return view('auth.mahasiswa.status', compact('datas', 'angkatan'));
        }
        
    }

    public function showstatusajax(Request $request){
        if(Auth::user()->role == 'doswal'){
        if($request->keyword != ''){
            $datas = Mahasiswa::where('nama','LIKE','%'.$request->keyword.'%')->where('dosen_wali', Auth::user()->name)->get();
            }
            else{
            $datas = Mahasiswa::WHERE('dosen_wali', Auth::user()->name)->get();
            }
        return response()->json([
            'datas' => $datas
        ]);}
        else{
        $datas = Mahasiswa::all();
            if($request->keyword != ''){
            $datas = Mahasiswa::where('nama','LIKE','%'.$request->keyword.'%')->get();
            }
            else{
            $datas = Mahasiswa::all();
            }
        return response()->json([
            'datas' => $datas
        ]);}
    }
    

    public function chartpkl(){
        if(Auth::user()->role == 'doswal'){
        $datas = Mahasiswa::WHERE('dosen_wali', Auth::user()->name)->get();
        $angkatan19 = Mahasiswa::where('angkatan', '19')->where('dosen_wali', Auth::user()->name)->get();
        $angkatan20 = Mahasiswa::where('angkatan', '20')->where('dosen_wali', Auth::user()->name)->get();
        $angkatan21 = Mahasiswa::where('angkatan', '21')->where('dosen_wali', Auth::user()->name)->get();
        $angkatan22 = Mahasiswa::where('angkatan', '22')->where('dosen_wali', Auth::user()->name)->get();
        $chart = new SampleChart;
        $chart->labels(['Angkatan 19', 'Angkatan 20', 'Angkatan 21', 'Angkatan 22']);
        $chart->dataset('Belum', 'bar', [$angkatan19->where('status_pkl', 'Belum')->count(), $angkatan20->where('status_pkl', 'Belum')->count(), $angkatan21->where('status_pkl', 'Belum')->count(), $angkatan22->where('status_pkl', 'Belum')->count()])->color('red');
        $chart->dataset('Sedang', 'bar', [$angkatan19->where('status_pkl', 'Sedang')->count(), $angkatan20->where('status_pkl', 'Sedang')->count(), $angkatan21->where('status_pkl', 'Sedang')->count(), $angkatan22->where('status_pkl', 'Sedang')->count()])->color('yellow');
        $chart->dataset('Selesai', 'bar', [$angkatan19->where('status_pkl', 'Selesai')->count(), $angkatan20->where('status_pkl', 'Selesai')->count(), $angkatan21->where('status_pkl', 'Selesai')->count(), $angkatan22->where('status_pkl', 'Selesai')->count()])->color('green');       
        return view('auth.mahasiswa.chartpkl', compact('datas', 'chart'));
        }
        else{
        $datas = Mahasiswa::all();
        //make variable angkatan19 that contain mahasiswa where angkatan == 19 and status pkl == Belum or sudah or sedang
        $angkatan19 = Mahasiswa::where('angkatan', '19')->get();
        //make variable angkatan20 that contain mahasiswa where angkatan == 20 and status pkl == Belum or Selesai or sedang
        $angkatan20 = Mahasiswa::where('angkatan', '20')->get();
        //make variable angkatan21 that contain mahasiswa where angkatan == 21 and status pkl == Belum or Selesai or sedang
        $angkatan21 = Mahasiswa::where('angkatan', '21')->get();
        //make variable angkatan22 that contain mahasiswa where angkatan == 22 and status pkl == Belum or Selesai or sedang
        $angkatan22 = Mahasiswa::where('angkatan', '22')->get();
        $chart = new SampleChart;
        //multibar chart with multi dataset each angkatan
        $chart->labels(['Angkatan 19', 'Angkatan 20', 'Angkatan 21', 'Angkatan 22']);
        $chart->dataset('Belum', 'bar', [$angkatan19->where('status_pkl', 'Belum')->count(), $angkatan20->where('status_pkl', 'Belum')->count(), $angkatan21->where('status_pkl', 'Belum')->count(), $angkatan22->where('status_pkl', 'Belum')->count()])->color('red');
        $chart->dataset('Sedang', 'bar', [$angkatan19->where('status_pkl', 'Sedang')->count(), $angkatan20->where('status_pkl', 'Sedang')->count(), $angkatan21->where('status_pkl', 'Sedang')->count(), $angkatan22->where('status_pkl', 'Sedang')->count()])->color('yellow');
        $chart->dataset('Selesai', 'bar', [$angkatan19->where('status_pkl', 'Selesai')->count(), $angkatan20->where('status_pkl', 'Selesai')->count(), $angkatan21->where('status_pkl', 'Selesai')->count(), $angkatan22->where('status_pkl', 'Selesai')->count()])->color('green');       
        return view('auth.mahasiswa.chartpkl', compact('datas', 'chart'));
        }
    }

    public function chartskripsi(){
        if(Auth::user()->role == 'doswal'){
        $datas = Mahasiswa::WHERE('dosen_wali', Auth::user()->name)->get();
        $angkatan19 = Mahasiswa::where('angkatan', '19')->where('dosen_wali', Auth::user()->name)->get();
        $angkatan20 = Mahasiswa::where('angkatan', '20')->where('dosen_wali', Auth::user()->name)->get();
        $angkatan21 = Mahasiswa::where('angkatan', '21')->where('dosen_wali', Auth::user()->name)->get();
        $angkatan22 = Mahasiswa::where('angkatan', '22')->where('dosen_wali', Auth::user()->name)->get();
        $chart = new SampleChart;
        $chart->labels(['Angkatan 19', 'Angkatan 20', 'Angkatan 21', 'Angkatan 22']);
        $chart->dataset('Belum', 'bar', [$angkatan19->where('status_skripsi', 'Belum')->count(), $angkatan20->where('status_skripsi', 'Belum')->count(), $angkatan21->where('status_skripsi', 'Belum')->count(), $angkatan22->where('status_skripsi', 'Belum')->count()])->color('red');
        $chart->dataset('Sedang', 'bar', [$angkatan19->where('status_skripsi', 'Sedang')->count(), $angkatan20->where('status_skripsi', 'Sedang')->count(), $angkatan21->where('status_skripsi', 'Sedang')->count(), $angkatan22->where('status_skripsi', 'Sedang')->count()])->color('yellow');
        $chart->dataset('Selesai', 'bar', [$angkatan19->where('status_skripsi', 'Selesai')->count(), $angkatan20->where('status_skripsi', 'Selesai')->count(), $angkatan21->where('status_skripsi', 'Selesai')->count(), $angkatan22->where('status_skripsi', 'Selesai')->count()])->color('green');
        return view('auth.mahasiswa.chartskripsi', compact('datas', 'chart'));
        }
        else{
        $datas = Mahasiswa::all();
        //make variable angkatan19 that contain mahasiswa where angkatan == 19 and status skripsi == Belum or sudah or sedang
        $angkatan19 = Mahasiswa::where('angkatan', '19')->get();
        //make variable angkatan20 that contain mahasiswa where angkatan == 20 and status skripsi == Belum or Selesai or sedang
        $angkatan20 = Mahasiswa::where('angkatan', '20')->get();
        //make variable angkatan21 that contain mahasiswa where angkatan == 21 and status skripsi == Belum or Selesai or sedang
        $angkatan21 = Mahasiswa::where('angkatan', '21')->get();
        //make variable angkatan22 that contain mahasiswa where angkatan == 22 and status skripsi == Belum or Selesai or sedang
        $angkatan22 = Mahasiswa::where('angkatan', '22')->get();
        $chart = new SampleChart;
        //multibar chart with multi dataset each angkatan
        $chart->labels(['Angkatan 19', 'Angkatan 20', 'Angkatan 21', 'Angkatan 22']);
        $chart->dataset('Belum', 'bar', [$angkatan19->where('status_skripsi', 'Belum')->count(), $angkatan20->where('status_skripsi', 'Belum')->count(), $angkatan21->where('status_skripsi', 'Belum')->count(), $angkatan22->where('status_skripsi', 'Belum')->count()])->color('red');
        $chart->dataset('Sedang', 'bar', [$angkatan19->where('status_skripsi', 'Sedang')->count(), $angkatan20->where('status_skripsi', 'Sedang')->count(), $angkatan21->where('status_skripsi', 'Sedang')->count(), $angkatan22->where('status_skripsi', 'Sedang')->count()])->color('yellow');
        $chart->dataset('Selesai', 'bar', [$angkatan19->where('status_skripsi', 'Selesai')->count(), $angkatan20->where('status_skripsi', 'Selesai')->count(), $angkatan21->where('status_skripsi', 'Selesai')->count(), $angkatan22->where('status_skripsi', 'Selesai')->count()])->color('green');
        return view('auth.mahasiswa.chartskripsi', compact('datas', 'chart'));
        }
    }

    public function chartstatus(){
        if(Auth::user()->role == 'doswal'){
        $datas = Mahasiswa::WHERE('dosen_wali', Auth::user()->name)->get();
        $angkatan19 = Mahasiswa::where('angkatan', '19')->where('dosen_wali', Auth::user()->name)->get();
        $angkatan20 = Mahasiswa::where('angkatan', '20')->where('dosen_wali', Auth::user()->name)->get();
        $angkatan21 = Mahasiswa::where('angkatan', '21')->where('dosen_wali', Auth::user()->name)->get();
        $angkatan22 = Mahasiswa::where('angkatan', '22')->where('dosen_wali', Auth::user()->name)->get();
        $chart = new SampleChart;
        $chart->labels(['Angkatan 19', 'Angkatan 20', 'Angkatan 21', 'Angkatan 22']);
        $chart->dataset('Aktif', 'bar', [$angkatan19->where('status_mhs', 'Aktif')->count(), $angkatan20->where('status_mhs', 'Aktif')->count(), $angkatan21->where('status_mhs', 'Aktif')->count(), $angkatan22->where('status_mhs', 'Aktif')->count()])->color('green');
        $chart->dataset('Mangkir', 'bar', [$angkatan19->where('status_mhs', 'Mangkir')->count(), $angkatan20->where('status_mhs', 'Mangkir')->count(), $angkatan21->where('status_mhs', 'Mangkir')->count(), $angkatan22->where('status_mhs', 'Mangkir')->count()])->color('yellow');
        $chart->dataset('Cuti', 'bar', [$angkatan19->where('status_mhs', 'Cuti')->count(), $angkatan20->where('status_mhs', 'Cuti')->count(), $angkatan21->where('status_mhs', 'Cuti')->count(), $angkatan22->where('status_mhs', 'Cuti')->count()])->color('yellow');
        $chart->dataset('DO', 'bar', [$angkatan19->where('status_mhs', 'DO')->count(), $angkatan20->where('status_mhs', 'DO')->count(), $angkatan21->where('status_mhs', 'DO')->count(), $angkatan22->where('status_mhs', 'DO')->count()])->color('red');
        $chart->dataset('Lulus', 'bar', [$angkatan19->where('status_mhs', 'Lulus')->count(), $angkatan20->where('status_mhs', 'Lulus')->count(), $angkatan21->where('status_mhs', 'Lulus')->count(), $angkatan22->where('status_mhs', 'Lulus')->count()])->color('blue');
        return view('auth.mahasiswa.chartstatus', compact('datas', 'chart'));
        }
        else{
        $datas = Mahasiswa::all();
        //make variable angkatan19 that contain mahasiswa where angkatan == 19 and status mahasiswa == Belum or sudah or sedang
        $angkatan19 = Mahasiswa::where('angkatan', '19')->get();
        //make variable angkatan20 that contain mahasiswa where angkatan == 20 and status mahasiswa == Belum or Selesai or sedang
        $angkatan20 = Mahasiswa::where('angkatan', '20')->get();
        //make variable angkatan21 that contain mahasiswa where angkatan == 21 and status mahasiswa == Belum or Selesai or sedang
        $angkatan21 = Mahasiswa::where('angkatan', '21')->get();
        //make variable angkatan22 that contain mahasiswa where angkatan == 22 and status mahasiswa == Belum or Selesai or sedang
        $angkatan22 = Mahasiswa::where('angkatan', '22')->get();
        $chart = new SampleChart;
        //multibar chart with multi dataset each angkatan
        $chart->labels(['Angkatan 19', 'Angkatan 20', 'Angkatan 21', 'Angkatan 22']);
        $chart->dataset('Aktif', 'bar', [$angkatan19->where('status_mhs', 'Aktif')->count(), $angkatan20->where('status_mhs', 'Aktif')->count(), $angkatan21->where('status_mhs', 'Aktif')->count(), $angkatan22->where('status_mhs', 'Aktif')->count()])->color('red');
        $chart->dataset('Mangkir', 'bar', [$angkatan19->where('status_mhs', 'Mangkir')->count(), $angkatan20->where('status_mhs', 'Mangkir')->count(), $angkatan21->where('status_mhs', 'Mangkir')->count(), $angkatan22->where('status_mhs', 'Mangkir')->count()])->color('yellow');
        $chart->dataset('Lulus', 'bar', [$angkatan19->where('status_mhs', 'Lulus')->count(), $angkatan20->where('status_mhs', 'Lulus')->count(), $angkatan21->where('status_mhs', 'Lulus')->count(), $angkatan22->where('status_mhs', 'Lulus')->count()])->color('green');
        $chart->dataset('Cuti', 'bar', [$angkatan19->where('status_mhs', 'Cuti')->count(), $angkatan20->where('status_mhs', 'Cuti')->count(), $angkatan21->where('status_mhs', 'Cuti')->count(), $angkatan22->where('status_mhs', 'Cuti')->count()])->color('blue');
        $chart->dataset('DO', 'bar', [$angkatan19->where('status_mhs', 'DO')->count(), $angkatan20->where('status_mhs', 'DO')->count(), $angkatan21->where('status_mhs', 'DO')->count(), $angkatan22->where('status_mhs', 'DO')->count()])->color('purple');
        return view('auth.mahasiswa.chartstatus', compact('datas', 'chart'));
    }
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Mahasiswa::findOrfail($id);
        return view('auth.mahasiswa.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateirs(Request $request, $id)
    {
        //check if file is already uploaded so not duplicate
        $path = Storage::putFileAs('public/irs', $request->file('irs'), Str::slug(auth()->user()->nipnim).'-'.'irs'.'.'.'png');
        $nama_file = Str::slug(auth()->user()->nipnim).'-'.'irs'.'.'.'png';
            //if there is the file, delete it first then upload the new
            if(Storage::exists('public/irs/'.auth()->user()->nipnim.'-'.'irs'.'.'.'png')){
                Storage::delete('public/irs/'.auth()->user()->nipnim.'-'.'irs'.'.'.'png');
                Storage::putFileAs('public/irs/', $request->file('irs'), Str::slug(auth()->user()->nipnim).'-'.'irs'.'.'.'png');
                $data = Mahasiswa::where('nim', $id);
                $data->update([
                'irs' => $nama_file,
                'sks' => $request->sks,
                ]);
                Alert::success('Sukses', 'Data Berhasil Diubah');
                return redirect()->route('home');
            }
            $data = Mahasiswa::where('nim', $id);
            $data->update([
                'irs' => $nama_file,
                'sks' => $request->sks,
            ]);
                Alert::success('Selamat, Data Berhasil Dirubah!');
                return redirect()->route('home');
    }
//update khs 
    public function updatekhs(Request $request, $id)
    {
        //check if file is already uploaded so not duplicate
        $path = Storage::putFileAs('public/khs', $request->file('khs'), Str::slug(auth()->user()->nipnim).'-'.'khs'.'.'.'png');
        $nama_file = Str::slug(auth()->user()->nipnim).'-'.'khs'.'.'.'png';
            //if there is the file, delete it first then upload the new
            if(Storage::exists('public/khs/'.auth()->user()->nipnim.'-'.'khs'.'.'.'png')){
                Storage::delete('public/khs/'.auth()->user()->nipnim.'-'.'khs'.'.'.'png');
                Storage::putFileAs('public/khs/', $request->file('khs'), Str::slug(auth()->user()->nipnim).'-'.'khs'.'.'.'png');
                $data = Mahasiswa::findOrfail($id);
                $data->update([
                'khs' => $nama_file,
                'sksk' => $request->sksk,
                ]);
                Alert::success('Sukses', 'Data Berhasil Diubah');
                return redirect()->route('home');
            }
            $data = Mahasiswa::findOrfail($id);
            $data->update([
                'khs' => $nama_file,
                'sksk' => $request->sksk,
            ]);
                Alert::success('Selamat, Data Berhasil Dirubah!');
                return redirect()->route('home');
    }
    public function updatepkl(Request $request, $id)
    {
        //check if file is already uploaded so not duplicate
        $path = Storage::putFileAs('public/pkl', $request->file('pkl'), Str::slug(auth()->user()->nipnim).'-'.'pkl'.'.'.'png');
        $nama_file = Str::slug(auth()->user()->nipnim).'-'.'pkl'.'.'.'png';
            //if there is the file, delete it first then upload the new
            if(Storage::exists('public/pkl/'.auth()->user()->nipnim.'-'.'pkl'.'.'.'png')){
                Storage::delete('public/pkl/'.auth()->user()->nipnim.'-'.'pkl'.'.'.'png');
                Storage::putFileAs('public/pkl/', $request->file('pkl'), Str::slug(auth()->user()->nipnim).'-'.'pkl'.'.'.'png');
                $data = Mahasiswa::findOrfail($id);
                $data->update([
                'link_pkl' => $nama_file,
                'status_pkl' => $request->status_pkl
                ]);
                Alert::success('Sukses', 'Data Berhasil Diubah');
                return redirect()->route('mahasiswa.index');
            }
            $data = Mahasiswa::findOrfail($id);
            $data->update([
                'link_pkl' => $nama_file,
                'status_pkl' => $request->status_pkl
            ]);
                Alert::success('Selamat, Data Berhasil Dirubah!');
                return redirect()->route('mahasiswa.index');
    }
    public function updateskripsi(Request $request, $id)
    {
        //check if file is already uploaded so not duplicate
        $path = Storage::putFileAs('public/skripsi', $request->file('skripsi'), Str::slug(auth()->user()->nipnim).'-'.'skripsi'.'.'.'png');
        $nama_file = Str::slug(auth()->user()->nipnim).'-'.'skripsi'.'.'.'png';
            //if there is the file, delete it first then upload the new
            if(Storage::exists('public/skripsi/'.auth()->user()->nipnim.'-'.'skripsi'.'.'.'png')){
                Storage::delete('public/skripsi/'.auth()->user()->nipnim.'-'.'skripsi'.'.'.'png');
                Storage::putFileAs('public/skripsi/', $request->file('skripsi'), Str::slug(auth()->user()->nipnim).'-'.'skripsi'.'.'.'png');
                $data = Mahasiswa::findOrfail($id);
                $data->update([
                'link_skripsi' => $nama_file,
                'tanggal_sidang'=> $request->tanggal_sidang,
                'status_skripsi' => $request->status_skripsi
                ]);
                Alert::success('Sukses', 'Data Berhasil Diubah');
                return redirect()->route('mahasiswa.index');
            }
            $data = Mahasiswa::findOrfail($id);
            $data->update([
                'link_skripsi' => $nama_file,
                'tanggal_sidang'=> $request->tanggal_sidang,
                'status_skripsi' => $request->status_skripsi
            ]);
                Alert::success('Selamat, Data Berhasil Dirubah!');
                return redirect()->route('mahasiswa.index');
    }
    public function update(Request $request, $id)
    {
        
            $data = Mahasiswa::findOrfail($id);
            $data->update($request->all());
            Alert::success('Selamat, Data Berhasil Dirubah!');
            return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Mahasiswa::findOrfail($id);
        $data->delete();
        return redirect()->route('mahasiswa.index');
    }
    //FUNCTION TO IMPORT EXCEL TTO DATABASE
    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('data_file',$nama_file);
        Excel::import(new ImportMahasiswa, public_path('/data_file/'.$nama_file));
        Alert::success('Selamat, Data Berhasil Diimpor!');
        return redirect()->route('mahasiswa.index');
    }
    //function to export excel
    public function export()
    {
        return Excel::download(new ExportMahasiswa, 'mahasiswa.xlsx');
    }

    //function to open pdf in browser
    public function oopenPdf($id)
    {
        $path = $id;
        return response()->file(public_path("$path"));
    }
    public function openkhs($id)
    {
        $files= public_path().'/storage/khs/'.$id;
        return Response::file($files);
        }
//laravel response file pdf with header
    public function openirs($id)
    {
        $file= public_path().'/storage/irs/'.$id;
        return Response::file($file);
    }
    public function openpkl($id)
    {
        $file= public_path().'/storage/pkl/'.$id;
        return Response::file($file);
    }
    public function openskripsi($id)
    {
        $file= public_path().'/storage/skripsi/'.$id;
        return Response::file($file);
    }

        public function downloadtemplate($id)
    {
        $file= public_path().'/storage'.'/'.$id;
        return Response::download($file);
    }


}
