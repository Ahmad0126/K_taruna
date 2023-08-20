<?php

defined('BASEPATH') OR exit('No direct script access allowed');


if($this->session->userdata('role') == 'sekertaris'){

    if(isset($user)){ $link = 'Sekertaris/update_user'; }else{ $link = 'Sekertaris/tambah_user'; }

}else{

    if(isset($user)){ $link = 'Ketua/update_user'; }else{ $link = 'Ketua/tambah_user'; }

}

?>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading

    <h1 class="h3 mb-2 text-gray-800">Tables Pemasukan & Pengeluaran</h1> -->

    <!-- DataTales Example -->

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">Tambah Anggota</h6>

        </div>

        <div class="card-body">

            <form action="<?= site_url($link) ?>" method="post">

                <?= isset($user->id_anggota)? '<input type="hidden" name="id" value="'.$user->id_anggota.'">' : ''?>

                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label for="f1">Nama</label>

                        <input class="form-control mb-3" type="text" id="f1" name="nama" placeholder="Masukkan Nama" value="<?= isset($user->nama)? $user->nama:''?>" required>

                        <label for="f3">Jabatan</label>

                        <select name="jabatan" class="form-control" id="f3" onchange="toggle_vis()">

                            <option value="ketua" <?= isset($user->jabatan) && $user->jabatan == 'ketua'? 'selected':''?>>Ketua</option>

                            <option value="sekertaris" <?= isset($user->jabatan) && $user->jabatan == 'sekertaris'? 'selected':''?>>Sekertaris</option>

                            <option value="bendahara" <?= isset($user->jabatan) && $user->jabatan == 'bendahara'? 'selected':''?>>Bendahara</option>

                            <option value="anggota biasa" <?= isset($user->jabatan) ? $user->jabatan == 'anggota biasa'? 'selected':'':'selected' ?>>Anggota biasa</option>

                        </select>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label for="f4">No HP</label>

                        <input class="form-control mb-3" type="text" id="f4" name="no_hp" id="" placeholder="Masukkan Nomor HP" value="<?= isset($user->no_hp)? $user->no_hp:'' ?>">

                        <label for="f2">Email</label>

                        <input class="form-control" type="text" id="f2" name="email" placeholder="Masukkan Email" value="<?= isset($user->email)? $user->email:''?>">

                    </div>
                    <?php if(!isset($user) || $user->password == null){ ?>
                    <div class="col-md-4 mb-3">

                        <label class="not_req" for="f5">Buat Password</label>

                        <input class="not_req form-control mb-3" id="f5" type='password' name="password" placeholder="Masukkan Password">

                        <label class="not_req" for="f6">Konfirmasi Password</label>

                        <input class="not_req form-control" id="f6" type='password' name="passwordb" placeholder="Konfirmasi Password">

                    </div>
                    <?php } ?>
                </div>

                <button type="submit" class="btn btn-primary"><?= isset($user) ? 'Simpan':'Tambah'?></button>

            </form>

        </div>

    </div>

</div>

<script>

    var selector = document.getElementById('f3');

    var email_field = document.getElementById('f2');

    var inputs = document.querySelectorAll('input.not_req');

    var labels = document.querySelectorAll('label.not_req');

    var label_v = ["Buat Password", "Konfirmasi Password"];

    for (var i = 0; i < inputs.length; i++) {

        inputs[i].type = 'hidden';

        inputs[i].required = false;

        labels[i].innerHTML = '';

    }

    email_field.required = false;

    function toggle_vis(){

        if(selector.value == 'anggota biasa'){

            for (var i = 0; i < inputs.length; i++) {

                inputs[i].type = 'hidden';

                inputs[i].required = false;

                labels[i].innerHTML = '';

            }

            email_field.required = false;

        }else{

            for (var i = 0; i < inputs.length; i++) {

                inputs[i].type = 'text';

                inputs[i].required = true;

                labels[i].innerHTML = label_v[i];

            }

            email_field.required = true;

        }

    }

</script>

<!-- /.container-fluid -->