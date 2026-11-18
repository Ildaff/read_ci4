
<?php helper('form'); ?>

<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Edit Mata Kuliah</h2>

<?php if (session()->getFlashdata('error')): ?>
    <p>
        <?= esc(session()->getFlashdata('error')) ?>
    </p>
<?php endif; ?>

<form
    action="<?= site_url('mata-kuliah/update/' . $mk['id']) ?>"
    method="post"
>

    <?= csrf_field() ?>

    <p>
        <label>Kode Mata Kuliah</label><br>
        <input
            type="text"
            name="kode_mk"
            value="<?= esc(old('kode_mk', $mk['kode_mk'])) ?>"
            required
        >
    </p>

    <p>
        <label>Nama Mata Kuliah</label><br>
        <input
            type="text"
            name="nama_mk"
            value="<?= esc(old('nama_mk', $mk['nama_mk'])) ?>"
            required
        >
    </p>

    <p>
        <label>Jumlah SKS</label><br>
        <input
            type="number"
            name="sks"
            min="1"
            value="<?= esc(old('sks', $mk['sks'])) ?>"
            required
        >
    </p>

    <p>
        <label>Semester</label><br>
        <input
            type="number"
            name="semester"
            min="1"
            value="<?= esc(old('semester', $mk['semester'])) ?>"
            required
        >
    </p>

    <p>
        <label>Dosen Pengampu</label><br>
        <input
            type="text"
            name="dosen_pengampu"
            value="<?= esc(old('dosen_pengampu', $mk['dosen_pengampu'])) ?>"
            required
        >
    </p>

    <button type="submit">Simpan Perubahan</button>

    <a href="<?= site_url('mata-kuliah') ?>">Batal</a>

</form>

<?= $this->endSection() ?>
