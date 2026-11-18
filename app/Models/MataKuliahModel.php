<?php

namespace App\Models;

use CodeIgniter\Model;

class MataKuliahModel extends Model
{
    protected $table = 'mata_kuliah';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester',
        'dosen_pengampu'
    ];

    protected $returnType = 'array';
    protected $useTimestamps = false;

    // Mengambil seluruh data mata kuliah
    public function getAll()
    {
        return $this->findAll();
    }

    // Mengambil data berdasarkan ID
    public function getById($id)
    {
        return $this->find($id);
    }

    // Mengurutkan data berdasarkan nama mata kuliah
    public function getDataUrut()
    {
        return $this->orderBy('nama_mk', 'ASC')->findAll();
    }

    // Mengambil data berdasarkan semester
    public function getBySemester($semester)
    {
        return $this->where('semester', $semester)->findAll();
    }
}
