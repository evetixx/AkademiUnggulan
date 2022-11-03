<?php

namespace App\Imports;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;

//import excel to database with if status == null status = Belum Disetujui and if status_pkl == null status_pkl = Belum and if status_skripsi == null status_skripsi = Belum
class ImportMahasiswa implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable, SkipsFailures;
    public function model(array $row)
    {
        return [new Mahasiswa([
            'nim' => $row['nim'],
            'nama' => $row['nama'],
            'semester' => $row['semester'],
            'dosen_wali' => $row['dosen_wali'],
            'angkatan' => $row['angkatan'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'status_pkl' => 'Belum',
            'status_skripsi' =>  'Belum',
            'status' => 'Belum Disetujui',
        ]),
        new User([
            'name' => $row['nama'],
            'nipnim' => $row['nim'],
            'email' => $row['nim'].'@student.akdung.ac.id',
            'password' => Hash::make($row['nim']),
            'role' => 'mahasiswa',
        ])];
    }
    public function rules(): array
    {
        return [
            'nim' => 'required|unique:mahasiswa',
            'nipnim' => 'required|unique:users',
            'nama' => 'required',
            'angkatan' => 'required',
        ];
    }
}
