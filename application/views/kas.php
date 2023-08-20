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
                <h6 class="m-0 font-weight-bold text-primary">Tabel Pemasukan & Pengeluaran</h6>
                <a href="<?= base_url('Bendahara/tambah') ?>" class="btn btn-primary">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm" id="dataTable_export_salary" width="100%" cellspacing="0">
                    <thead class="table-primary">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Saldo</th>
                    </thead>
                    <tbody>
                    <?php
                        $no = 0; 
                        foreach($kas as $fer):
                    ?>
                        <tr>
                            <td><?= $no+=1?></td>
                            <td><?= substr($fer['tanggal'],0,10) ?></td>
                            <td><?= $fer['sebab']?></td>
                            <td>Rp <?= isset($fer['masuk'])?number_format($fer['masuk']):'-' ?></td>
                            <td>Rp <?= isset($fer['keluar'])?number_format($fer['keluar']):'-' ?></td>
                            <td class="text-end">Rp <?= number_format($fer['saldo']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->