<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DosenModel;

class Dosen extends BaseController
{
    protected $dosenModel;

    public function __construct()
    {
        $this->dosenModel = new DosenModel();
    }

    // Menampilkan seluruh data dosen
    public function index()
    {
        $data['dosen'] = $this->dosenModel->findAll();

        return view('dosen/index', $data);
    }

    // Menampilkan formulir tambah dosen
    public function create()
    {
        helper('form');

        return view('dosen/create');
    }

    // Menyimpan data dosen baru
    public function store()
    {
        $data = [
            'nip'   => trim($this->request->getPost('nip')),
            'nama'  => trim($this->request->getPost('nama')),
            'email' => trim($this->request->getPost('email')),
            'prodi' => trim($this->request->getPost('prodi'))
        ];

        if (
            empty($data['nip']) ||
            empty($data['nama']) ||
            empty($data['email']) ||
            empty($data['prodi'])
        ) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Semua kolom wajib diisi.');
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Format email tidak valid.');
        }

        $this->dosenModel->insert($data);

        return redirect()->to(site_url('dosen'))
            ->with('success', 'Data dosen berhasil ditambahkan.');
    }

    // Menampilkan formulir edit dosen
    public function edit($id)
    {
        helper('form');

        $data['mhs'] = $this->dosenModel->find($id);

        if (!$data['mhs']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data dosen tidak ditemukan.'
            );
        }

        return view('dosen/edit', $data);
    }

    // Memperbarui data dosen
    public function update($id)
    {
        $dosen = $this->dosenModel->find($id);

        if (!$dosen) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data dosen tidak ditemukan.'
            );
        }

        $data = [
            'nip'   => trim($this->request->getPost('nip')),
            'nama'  => trim($this->request->getPost('nama')),
            'email' => trim($this->request->getPost('email')),
            'prodi' => trim($this->request->getPost('prodi'))
        ];

        if (
            empty($data['nip']) ||
            empty($data['nama']) ||
            empty($data['email']) ||
            empty($data['prodi'])
        ) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Semua kolom wajib diisi.');
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Format email tidak valid.');
        }

        $this->dosenModel->update($id, $data);

        return redirect()->to(site_url('dosen'))
            ->with('success', 'Data dosen berhasil diperbarui.');
    }

    // Menghapus data dosen
    public function delete($id)
    {
        $dosen = $this->dosenModel->find($id);

        if (!$dosen) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data dosen tidak ditemukan.'
            );
        }

        $this->dosenModel->delete($id);

        return redirect()->to(site_url('dosen'))
            ->with('success', 'Data dosen berhasil dihapus.');
    }
}
