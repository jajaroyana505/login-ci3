<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4>Edit pegawai</h4>
        </div>
        <div class="card-body">
            <form action="<?= base_url('edit-pegawai/' . $pegawai['id']) ?>" method="post">
                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label for="nip" class="label-control">NIP</label>
                            <input value="<?php echo $pegawai['nip']; ?>" name="nip" id="nip" type="text" class="form-control <?= form_error('nip') ? 'is-invalid' : ''; ?>">
                            <?php
                            if (form_error('nip')) {
                            ?>
                                <div class="invalid-feedback">
                                    <?= form_error('nip') ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="nama_lengkap" class="label-control">Nama Lengkap</label>
                            <input value="<?php echo $pegawai['nama']; ?>" name="nama_lengkap" id="nama_lengkap" type="text" class="form-control  <?= form_error('nama_lengkap') ? 'is-invalid' : ''; ?>">
                            <?php
                            if (form_error('nama_lengkap')) {
                            ?>
                                <div class="invalid-feedback">
                                    <?= form_error('nama_lengkap') ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="jk" class="label-control">Jenias Kelamin</label>
                            <select name="jk" id="jk" class="form-control  <?= form_error('jk') ? 'is-invalid' : ''; ?>">
                                <option value="" default>Pilih ...</option>
                                <option <?= $pegawai['jk'] == 'Perempuan' ? 'selected' : ''; ?> value="Perempuan">Perempuan</option>
                                <option <?= $pegawai['jk'] == 'Laki-laki' ? 'selected' : ''; ?> value="Laki-laki">Laki-laki</option>
                            </select>
                            <?php
                            if (form_error('jk')) {
                            ?>
                                <div class="invalid-feedback">
                                    <?= form_error('jk') ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="tmp_lahir" class="label-control">Tempat Lahir</label>
                            <input value="<?php echo $pegawai['tmp_lahir']; ?>" name="tmp_lahir" id="tmp_lahir" type="text" class="form-control  <?= form_error('tmp_lahir') ? 'is-invalid' : ''; ?>">
                            <?php
                            if (form_error('tmp_lahir')) {
                            ?>
                                <div class="invalid-feedback">
                                    <?= form_error('tmp_lahir') ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_lahir" class="label-control">Tanggal Lahir</label>
                            <input value="<?php echo $pegawai['tgl_lahir']; ?>" name="tgl_lahir" id="tgl_lahir" type="date" class="form-control  <?= form_error('tgl_lahir') ? 'is-invalid' : ''; ?>">
                            <?php
                            if (form_error('tgl_lahir')) {
                            ?>
                                <div class="invalid-feedback">
                                    <?= form_error('tgl_lahir') ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="label-control">Gambar</label>
                            <input value="<?php echo set_value('img'); ?>" name="img" id="img" type="file" class="form-control  <?= form_error('img') ? 'is-invalid' : ''; ?>">
                            <?php
                            if (form_error('img')) {
                            ?>
                                <div class="invalid-feedback">
                                    <?= form_error('img') ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label for="jabatan" class="label-control">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control  <?= form_error('jabatan') ? 'is-invalid' : ''; ?>">
                                <option value="" default>Pilih ...</option>
                                <?php
                                foreach ($jabatan as $jb) {
                                ?>
                                    <option <?= $pegawai['kode_jabatan'] == $jb['kode'] ? 'selected' : ''; ?> value="<?= $jb['kode'] ?>"><?= $jb['nama_jabatan'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <?php
                            if (form_error('jabatan')) {
                            ?>
                                <div class="invalid-feedback">
                                    <?= form_error('jabatan') ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="label-control">Email</label>
                            <input value="<?php echo $pegawai['email']; ?>" name="email" id="email" type="email" class="form-control  <?= form_error('email') ? 'is-invalid' : ''; ?>">
                            <?php
                            if (form_error('email')) {
                            ?>
                                <div class="invalid-feedback">
                                    <?= form_error('email') ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="no_tlp" class="label-control">No Telepon</label>
                            <input value="<?php echo $pegawai['no_tlp']; ?>" name="no_tlp" id="no_tlp" type="text" class="form-control  <?= form_error('no_tlp') ? 'is-invalid' : ''; ?>">
                            <?php
                            if (form_error('no_tlp')) {
                            ?>
                                <div class="invalid-feedback">
                                    <?= form_error('no_tlp') ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="label-control">Alamat</label>
                            <textarea name="alamat" class="form-control  <?= form_error('alamat') ? 'is-invalid' : ''; ?>" id="alamat"><?php echo $pegawai['alamat']; ?></textarea>
                            <?php
                            if (form_error('alamat')) {
                            ?>
                                <div class="invalid-feedback">
                                    <?= form_error('alamat') ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary ">Simpan</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>