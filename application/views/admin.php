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
                <h6 class="m-0 font-weight-bold text-primary">Daftar Anggota</h6>
                <a href="<?= $usr == 'Sekertaris'?base_url('Sekertaris/tambah_anggota'):base_url('Ketua/tambah') ?>" class="btn btn-primary">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm" id="dataTable_export_members" width="100%" cellspacing="0">
                    <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nomor HP</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 0; 
                        foreach($user as $fer): 
                    ?>
                    <tr>
                        <td><?= $no+=1 ?></td>
                        <td><?= $fer->nama ?></td>
                        <td><?= $fer->email ?></td>
                        <td><?= $fer->no_hp ?></td>
                        <td><?= $fer->id_anggota == 1 ? 'admin' : $fer->jabatan ?></td>
                        <td class="ctable">
                            <?php if($this->session->userdata('id') != $fer->id_anggota){ ?>
                            <div style="display: inline-flex;">
                                <a href="<?= $usr == 'Sekertaris'?base_url('sekertaris/edit_anggota/'.$fer->id_anggota):base_url('user/'.$fer->id_anggota) ?>" class="btn btn-primary btn-icon-split mr-2"><span class="text">Ubah</span></a>
                                <a onclick="return confirm('Yakin ingin menghapus anggota ini?')" href="<?= $usr == 'Sekertaris'?base_url('Sekertaris/delete_user/'.$fer->id_anggota):base_url('ketua/delete/'.$fer->id_anggota) ?>" class="btn btn-danger btn-icon-split"><span class="text">Hapus</span></a>
                            </div>
                            <?php }else{ echo "Tidak ada"; } ?>
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