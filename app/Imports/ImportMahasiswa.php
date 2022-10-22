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
            'angkatan' => $row['angkatan'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'irs' => $row['irs'],
            'khs' => $row['khs'],
            'status_pkl' => $row['status_pkl'] ?? 'Belum',
            'status_skripsi' => $row['status_skripsi'] ?? 'Belum',
            'status' => $row['status'] ?? 'Belum Disetujui',
            'link_skripsi' => $row['link_skripsi'],
            'link_khs' => $row['link_khs'],
            'link_pkl' => $row['link_pkl'],
        ]),
        new User([
            'name' => $row['nama'],
            'email' => $row['nim'].'@student.akdung.ac.id',
            'password' => Hash::make($row['nim']),
            'role' => 'mahasiswa',
        ])];
    }
    public function rules(): array
    {
        return [
            'nim' => 'required|unique:mahasiswa',
            'nama' => 'required',
            'angkatan' => 'required',
        ];
    }
}
