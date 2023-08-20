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
            <h6 class="m-0 font-weight-bold text-primary">Notulensi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th><?= $laporan->judul ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><textarea class="form-control" disabled rows="10"><?= $laporan->laporan ?></textarea></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->