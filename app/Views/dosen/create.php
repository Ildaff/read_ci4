
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Tambah Dosen</h2>

<?php if (session()->getFlashdata('error')): ?>
    <p>
        <?= esc(session()->getFlashdata('error')) ?>
    </p>
<?php endif; ?>

<form action="<?= site_url('dosen/store') ?>" method="post">

    <?= csrf_field() ?>

    <p>
        <label>NIP</label><br>
        <input
            type="text"
            name="nip"
            value="<?= esc(old('nip')) ?>"
            required
        >
    </p>

    <p>
        <label>Nama Dosen</label><br>
        <input
            type="text"
            name="nama"
            value="<?= esc(old('nama')) ?>"
            required
        >
    </p>

    <p>
        <label>Email</label><br>
        <input
            type="email"
            name="email"
            value="<?= esc(old('email')) ?>"
            required
        >
    </p>

    <p>
        <label>Program Studi</label><br>
        <input
            type="text"
            name="prodi"
            value="<?= esc(old('prodi')) ?>"
            required
        >
    </p>

    <button type="submit">Simpan</button>

    <a href="<?= site_url('dosen') ?>">Batal</a>

</form>

<?= $this->endSection() ?>
