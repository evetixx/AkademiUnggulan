<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportMahasiswa implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mahasiswa::select ('nim', 'nama', 'angkatan', 'jenis_kelamin', 'irs', 'khs', 'status_pkl', 'status_skripsi', 'status', 'link_skripsi', 'link_khs', 'link_pkl')->get();
    }
    public function headings(): array
    {
        return [
            'NIM',
            'Nama',
            'Angkatan',
            'Jenis Kelamin',
            'IRS',
            'KHS',
            'Status PKL',
            'Status Skripsi',
            'Status',
            'Link Skripsi',
            'Link KHS',
            'Link PKL',
        ];
    }
}


