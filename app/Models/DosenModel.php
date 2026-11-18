<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nip',
        'nama',
        'email',
        'prodi'
    ];

    protected $returnType = 'array';
    protected $useTimestamps = false;

    // Mengambil seluruh data dosen
    public function getAll()
    {
        return $this->findAll();
    }

    // Mengambil data dosen berdasarkan ID
    public function getById($id)
    {
        return $this->find($id);
    }

    // Mengambil data dosen berdasarkan program studi
    public function getByProdi($prodi)
    {
        return $this->where('prodi', $prodi)->findAll();
    }

    // Mengurutkan data dosen berdasarkan nama
    public function getDataUrut()
    {
        return $this->orderBy('nama', 'ASC')->findAll();
    }
}
