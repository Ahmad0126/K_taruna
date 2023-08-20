<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</html>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading
    <h1 class="h3 mb-2 text-gray-800">Tables Pemasukan & Pengeluaran</h1> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Notulensi</h6>
        </div>
        <div class="card-body">
            <form action="<?= isset($note)?base_url('Sekertaris/update_lap'):base_url('Sekertaris/tambah_lap') ?>" method="post">
                <?= isset($note)?'<input type="hidden" name="id" value="'.$note->id_laporan.'">':'' ?>
                <input type="text" class="form-control mb-3" name="judul" placeholder="Masukkan Judul" value="<?= isset($note->judul)? $note->judul :'' ?>">
                <textarea class="form-control mb-3" name="catatan" rows="10"><?= isset($note->laporan)? $note->laporan :'' ?></textarea>
                <button type="submit" class="btn btn-primary"><?= isset($note) ? 'Simpan':'Buat'?></button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->