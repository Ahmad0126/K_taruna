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
            <h6 class="m-0 font-weight-bold text-primary">Catatan Aktivitas Anggota</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm" id="dataTable_export_on" width="100%" cellspacing="0">
                    <thead class="table-primary">
                    <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Aktivitas</th>
                    </thead>
                    <tbody>
                    <?php
                        $no = 0; 
                        foreach($logs as $fer): 
                            $ff = explode(" ", $fer->tanggal_jam);
                    ?>
                    <tr>
                        <td><?= $no+=1?></td>
                        <td><?= $fer->nama?></td>
                        <td><?= $ff[0]?></td>
                        <td><?= $ff[1]?></td>
                        <td><?= $fer->aktivitas?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->