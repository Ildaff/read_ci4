<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MataKuliahModel;

class MataKuliah extends BaseController
{
    protected $mataKuliahModel;

    public function __construct()
    {
        $this->mataKuliahModel = new MataKuliahModel();
    }

    // Menampilkan seluruh data mata kuliah
    public function index()
    {
        helper('form');

        $data['matakuliah'] = $this->mataKuliahModel->findAll();

        return view('matakuliah/index', $data);
    }

    // Menampilkan formulir tambah mata kuliah
    public function create()
    {
        helper('form');

        return view('matakuliah/create');
    }

    // Menyimpan data mata kuliah
    public function store()
    {
        $data = [
            'kode_mk' => trim($this->request->getPost('kode_mk')),
            'nama_mk' => trim($this->request->getPost('nama_mk')),
            'sks' => $this->request->getPost('sks'),
            'semester' => $this->request->getPost('semester'),
            'dosen_pengampu' => trim(
                $this->request->getPost('dosen_pengampu')
            )
        ];

        if (
            empty($data['kode_mk']) ||
            empty($data['nama_mk']) ||
            empty($data['sks']) ||
            empty($data['semester']) ||
            empty($data['dosen_pengampu'])
        ) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Semua kolom wajib diisi.');
        }

        if (
            !filter_var($data['sks'], FILTER_VALIDATE_INT) ||
            !filter_var($data['semester'], FILTER_VALIDATE_INT) ||
            $data['sks'] < 1 ||
            $data['semester'] < 1
        ) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'SKS dan semester harus berupa angka positif.');
        }

        $this->mataKuliahModel->insert($data);

        return redirect()->to(site_url('mata-kuliah'))
            ->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }

    // Menampilkan formulir edit mata kuliah
    public function edit($id)
    {
        helper('form');

        $data['mk'] = $this->mataKuliahModel->find($id);

        if (!$data['mk']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data mata kuliah tidak ditemukan.'
            );
        }

        return view('matakuliah/edit', $data);
    }

    // Memperbarui data mata kuliah
    public function update($id)
    {
        $mk = $this->mataKuliahModel->find($id);

        if (!$mk) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data mata kuliah tidak ditemukan.'
            );
        }

        $data = [
            'kode_mk' => trim($this->request->getPost('kode_mk')),
            'nama_mk' => trim($this->request->getPost('nama_mk')),
            'sks' => $this->request->getPost('sks'),
            'semester' => $this->request->getPost('semester'),
            'dosen_pengampu' => trim(
                $this->request->getPost('dosen_pengampu')
            )
        ];

        if (
            empty($data['kode_mk']) ||
            empty($data['nama_mk']) ||
            empty($data['sks']) ||
            empty($data['semester']) ||
            empty($data['dosen_pengampu'])
        ) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Semua kolom wajib diisi.');
        }

        if (
            !filter_var($data['sks'], FILTER_VALIDATE_INT) ||
            !filter_var($data['semester'], FILTER_VALIDATE_INT) ||
            $data['sks'] < 1 ||
            $data['semester'] < 1
        ) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'SKS dan semester harus berupa angka positif.');
        }

        $this->mataKuliahModel->update($id, $data);

        return redirect()->to(site_url('mata-kuliah'))
            ->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    // Menghapus data mata kuliah
    public function delete($id)
    {
        $mk = $this->mataKuliahModel->find($id);

        if (!$mk) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data mata kuliah tidak ditemukan.'
            );
        }

        $this->mataKuliahModel->delete($id);

        return redirect()->to(site_url('mata-kuliah'))
            ->with('success', 'Data mata kuliah berhasil dihapus.');
    }
}
