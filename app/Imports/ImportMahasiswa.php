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
class ImportMahasiswa implements ToModel, WithHeadingRow, SkipsOnFailure, WithValidation
{
    use Importable, SkipsFailures;

    public function model(array $row)
    {
        
        $nim = Mahasiswa::all()->pluck('nim');
        $nipnim = User::all()->pluck('nipnim');
        if ($nim->contains($row['nim'])== false){
            Mahasiswa::create([
                'nim' => $row['nim'],
                'nama' => $row['nama'],
                'angkatan' => $row['angkatan'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'semester' => $row['semester'],
                'dosen_wali' => $row['dosen_wali'],
                'status' => 'Belum Disetujui',
                'status_pkl' => 'Belum',
                'status_skripsi' => 'Belum',
                
            ]);
        }
        else null;

        if ($nipnim->contains($row['nim'])== false){
            User::create([
                'nipnim' => $row['nim'],
                'name' => $row['nama'],
                'email' => $row['nim'].'@student.akdung.ac.id',
                'password' => Hash::make($row['nim']),
                'role' => 'mahasiswa',
            ]);
        }
        else null;
    }
    public function rules(): array
    {
        return [
            
        ];
    }
}
