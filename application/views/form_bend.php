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
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pemasukan/Pengeluaran Umum</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('Bendahara/tambah_data') ?>" method="post">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="f1">Nominal Masuk</label>
                        <input class="form-control mb-3" type="number" id="f1" name="masuk" placeholder="Masukkan Nominal Masuk" value="">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="f4">Nominal Keluar</label>
                        <input class="form-control" type="number" id="f4" name="keluar" id="" placeholder="Masukkan Nominal Keluar" value="">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="f6">Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="3"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->