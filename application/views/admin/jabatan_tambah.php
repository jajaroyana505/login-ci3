<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="text-dark">Formulir Tambah Nama jabatan </div>
        </div>
        <div class="card-body">
            <form action="tambah-jabatan" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kode_jabatan" class="label-control">Kode Jabatan</label>
                            <input value="<?php echo set_value('kode_jabatan'); ?>" name="kode_jabatan" id="kode_jabatan" type="text" class="form-control <?= form_error('kode_jabatan') ? 'is-invalid' : '' ?> ">
                            <?php
                            if (form_error('kode_jabatan')) {
                            ?>
                                <div class="invalid-feedback">
                                    <?= (form_error('kode_jabatan')) ?>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                        <div class="mb-3">
                            <label for="nama_jabatan" class="label-control">Nama jabatan</label>
                            <input value="<?php echo set_value('nama_jabatan'); ?>" name="nama_jabatan" id="nama_jabatan" type="text" class="form-control  <?= form_error('nama_jabatan') ? 'is-invalid' : '' ?> ">
                            <?php
                            if (form_error('nama_jabatan')) {
                            ?>
                                <div class="invalid-feedback">
                                    <?= (form_error('nama_jabatan')) ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>