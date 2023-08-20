<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading
    <h1 class="h3 mb-2 text-gray-800">Tables Pemasukan & Pengeluaran</h1> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Notulensi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Lihat</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 0; 
                        foreach($laporan as $fer): ?>
                    <tr>
                        <td><?= $no+=1?></td>
                        <td><?= $fer->judul?></td>
                        <td><?= $fer->tanggal?></td>
                        <td>
                            <div style="display: inline-flex;">
                                <a href="<?= base_url('laporan/p/'.$fer->id_laporan) ?>" class="btn btn-success">Detail</a>
                            </div>
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