<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nim',
        'nama',
        'prodi'
    ];

    protected $returnType = 'array';
    protected $useTimestamps = false;

    // Mengambil seluruh data menggunakan Model
    public function getAll()
    {
        return $this->findAll();
    }

    // Mengambil satu data berdasarkan ID
    public function getById($id)
    {
        return $this->find($id);
    }

    // Mengambil seluruh data menggunakan Query Builder
    public function getDataMahasiswa()
    {
        return $this->db
            ->table('mahasiswa')
            ->get()
            ->getResultArray();
    }

    // Mengambil data berdasarkan program studi
    public function getByProdi($prodi)
    {
        return $this->db
            ->table('mahasiswa')
            ->where('prodi', $prodi)
            ->get()
            ->getResultArray();
    }

    // Mengambil data berdasarkan urutan nama
    public function getDataUrut()
    {
        return $this->db
            ->table('mahasiswa')
            ->orderBy('nama', 'ASC')
            ->get()
            ->getResultArray();
    }
}
