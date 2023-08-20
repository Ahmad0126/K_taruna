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
                <div class="d-flex">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Kas Tahun</h6> 
                    <form action="<?= base_url('Bendahara/select_tahun') ?>" method="post">
                        <select class="custom-select custom-select-sm form-control form-control-sm" name="tahun" onchange="this.form.submit()">
                            <?php
                            $tahunawal = substr($t_awal['tanggal'], 0, 4);
                            $tahunakhir = date('Y');
                            for($i=$tahunawal; $i<=$tahunakhir; $i++){
                            ?>
                            <option value="<?= $i ?>" <?= $i == substr($title,10)?'selected':'' ?>><?= $i ?></option>
                            <?php } ?>
                        </select>
                    </form>
                </div>
                
                <a href="<?= base_url('Bendahara/tambah_kas') ?>" class="btn btn-primary">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm" id="dataTable_export_on" width="100%" cellspacing="0">
                <thead class="table-primary">
                <th>Anggota</th>
                <?php for($i=0; $i<=11; $i++){ ?>
                <th><?= $bulan[$i] ?></th>
                <?php } ?>
                </thead>
                <tbody>
                <?php
                $no = 0; 
                foreach($user as $fer):
                ?>
                <tr>
                    <td><?= $fer->nama ?></td>
                    <?php foreach($kas as $tor){ 
                    if($tor['nama'] == $fer->nama){
                    ?>
                    <td><?= $tor['value'] == '-'?'-':'Rp '.number_format($tor['value']) ?></td>
                    <?php }} ?>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->