
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Data Dosen</h2>

<?php if (session()->getFlashdata('success')): ?>
    <p>
        <?= esc(session()->getFlashdata('success')) ?>
    </p>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <p>
        <?= esc(session()->getFlashdata('error')) ?>
    </p>
<?php endif; ?>

<p>
    <a href="<?= site_url('dosen/create') ?>">
        + Tambah Dosen
    </a>
</p>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Program Studi</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php if (empty($dosen)): ?>
            <tr>
                <td colspan="6">Data dosen belum tersedia.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($dosen as $i => $dsn): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($dsn['nip']) ?></td>
                    <td><?= esc($dsn['nama']) ?></td>
                    <td><?= esc($dsn['email']) ?></td>
                    <td><?= esc($dsn['prodi']) ?></td>
                    <td>
                        <a href="<?= site_url('dosen/edit/' . $dsn['id']) ?>">
                            Edit
                        </a>

                        <form
                            action="<?= site_url('dosen/delete/' . $dsn['id']) ?>"
                            method="post"
                            style="display:inline"
                            onsubmit="return confirm('Yakin ingin menghapus data dosen ini?')"
                        >
                            <?= csrf_field() ?>

                            <button type="submit">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
