
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Edit Dosen</h2>

<?php if (session()->getFlashdata('error')): ?>
    <p>
        <?= esc(session()->getFlashdata('error')) ?>
    </p>
<?php endif; ?>

<form
    action="<?= site_url('dosen/update/' . $mhs['id']) ?>"
    method="post"
>

    <?= csrf_field() ?>

    <p>
        <label>NIP</label><br>
        <input
            type="text"
            name="nip"
            value="<?= esc(old('nip', $mhs['nip'])) ?>"
            required
        >
    </p>

    <p>
        <label>Nama Dosen</label><br>
        <input
            type="text"
            name="nama"
            value="<?= esc(old('nama', $mhs['nama'])) ?>"
            required
        >
    </p>

    <p>
        <label>Email</label><br>
        <input
            type="email"
            name="email"
            value="<?= esc(old('email', $mhs['email'])) ?>"
            required
        >
    </p>

    <p>
        <label>Program Studi</label><br>
        <input
            type="text"
            name="prodi"
            value="<?= esc(old('prodi', $mhs['prodi'])) ?>"
            required
        >
    </p>

    <button type="submit">Simpan Perubahan</button>

    <a href="<?= site_url('dosen') ?>">Batal</a>

</form>

<?= $this->endSection() ?>
