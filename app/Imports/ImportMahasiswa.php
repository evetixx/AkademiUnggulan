<?php

namespace App\Imports;
use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
//import excel to database with if status == null status = Belum Disetujui and if status_pkl == null status_pkl = Belum and if status_skripsi == null status_skripsi = Belum
class ImportMahasiswa implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasiswa([
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
        ]);
    }
}
