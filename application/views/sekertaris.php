<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading
    <h1 class="h3 mb-2 text-gray-800">Tables Pemasukan & Pengeluaran</h1> -->
    <!-- DataTales Example -->
    <?php if($this->session->flashdata('alert')){ ?>
    <div class="shadow mb-4 notif"><?= $this->session->flashdata('alert') ?></div>
    <?php } ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Notulensi</h6>
                <a href="<?= base_url('Sekertaris/tambah') ?>" class="btn btn-primary">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 0; 
                        foreach($note as $fer): 
                    ?>
                    <tr>
                        <td><?= $no+=1?></td>
                        <td><?= $fer->judul?></td>
                        <td><?= $fer->tanggal?></td>
                        <td>
                            <a class="btn btn-info" href="<?= base_url('Sekertaris/note/'.$fer->id_laporan) ?>">Lihat/Edit</a>
                            <a class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus notulensi ini?')" href="<?= base_url('note/delete/'.$fer->id_laporan) ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->