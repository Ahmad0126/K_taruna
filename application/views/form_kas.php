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
            <h6 class="m-0 font-weight-bold text-primary">Tambah Kas</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('Bendahara/tambah_data_kas') ?>" method="post">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm" width="100%" cellspacing="0">
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
                                    if($tor['bulan'] == date('m')){
                                ?>
                                <td class="d-flex input">
                                    Rp 
                                    <input type="number" class="form-control form-control-sm" name="user.<?= $fer->id_anggota ?>" placeholder="-" value="<?= $tor['value'] ?>" <?= $tor['value'] == '-'?'':'disabled' ?>>
                                    <input type="hidden" name="keterangan" value="kas">
                                </td>
                                <?php }else{ ?>
                                <td><?= $tor['value'] == '-'?'-':'Rp '.number_format($tor['value']) ?></td>
                                <?php }}} ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <input type="submit" value="Tambah" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->