<?php

namespace App\Http\Controllers;

use App\Exports\ExportMahasiswa;
use App\Imports\ImportMahasiswa;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Http\Requests;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Excel;
use Illuminate\Support\Facades\Response;
use PDF;
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
    public function update(Request $request, $id)
    {
        $path = Storage::putFileAs('public/irs', $request->file('irs'), Str::slug(auth()->user()->nipnim).'-'.'irs'.'.'.$request->file('irs')->extension());
        //if role == mahasiswa
        if(auth()->user()->role == 'mahasiswa'){
            $data = Mahasiswa::findOrfail($id);
            $data->update([
                'irs' => $path,
                'sks' => $request->sks,
            ]);
                Alert::success('Selamat, Data Berhasil Dirubah!');
                return redirect()->route('mahasiswa.index');
        }
        else{
            $data = Mahasiswa::findOrfail($id);
            $data->update($request->all());
            Alert::success('Selamat, Data Berhasil Dirubah!');
            return redirect()->route('mahasiswa.index');
        }

        
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
        return response()->file(public_path("storage/irs/$path"));
    }
//laravel response file pdf with header
    public function openPdf($id)
    {
        $path = $id;
        $file = ("storage/irs/$path");
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::download($file, 'irs.pdf', $headers);
    }

}
