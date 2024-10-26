<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    Detail Pegawai
                </div>
                <div class="card-body">

                    <table class="table">
                        <tr>
                            <td>NIP </td>
                            <td>:</td>
                            <th><?= $pegawai['nip'] ?></th>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>:</td>
                            <th><?= $pegawai['nama'] ?></th>
                        </tr>
                        <tr>
                            <td>Jenisa Kelamin </td>
                            <td>:</td>
                            <th><?= $pegawai['jk'] ?></th>
                        </tr>
                        <tr>
                            <td>Tempat, Tgl Lahir</td>
                            <td>:</td>
                            <th><?= $pegawai['tmp_lahir'] ?>, <?= $pegawai['tgl_lahir'] ?></th>
                        </tr>
                        <tr>
                            <td>Jabatan :</td>
                            <td>:</td>
                            <th><?= $pegawai['nama_jabatan'] ?></th>
                        </tr>
                        <tr>
                            <td>Email </td>
                            <td>:</td>
                            <th><?= $pegawai['email'] ?></th>
                        </tr>
                        <tr>
                            <td>No. Telepon </td>
                            <td>:</td>
                            <th><?= $pegawai['no_tlp'] ?></th>
                        </tr>
                        <tr>
                            <td>Alamat </td>
                            <td>:</td>
                            <th><?= $pegawai['alamat'] ?></th>
                        </tr>
                        <tr>
                            <td>Foto </td>
                            <td>:</td>
                            <th>
                                <img width="200" src="<?= base_url('assets/uploads/' . $pegawai['img']) ?>" alt="ini foto profile" class="img-thumbnail">
                            </th>
                        </tr>

                    </table>

                </div>
            </div>
        </div>

        <div class="col-md-12 mt-5">
            <h1>Penilaian</h1>
            <pre>
                <?php
                // var_dump($kriteria);
                // var_dump($result);

                ?>
            </pre>
            <form class="mb-4" action="<?= base_url("penilaian-simpan") ?>" method="post">

                <?php
                // for ($j = 0; $j < 5; $j++) {
                foreach ($kriteria as $krt) {
                ?>
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <h3 class="font-weight-bold"><?= $krt['nama_kriteria'] ?></h3>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente nulla cumque recusandae excepturi qui perferendis.</p>
                        </div>
                        <div class="card-body">
                            Keterangan Nilai :
                            <div class="row  mt-2">
                                <div class="col-10">
                                    <?php
                                    // for ($i = 0; $i < 5; $i++) {
                                    foreach ($krt['keterangan'] as $ket) {
                                    ?>
                                        <div class="row mb-2">
                                            <div class="col-1">
                                                <b><?= $ket['max'] ?>-<?= $ket['min'] ?></b>
                                            </div>
                                            <div class="col-10">
                                                <?= $ket['keterangan'] ?>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-2">
                                    <label for="nilai" class="label-control">Masukan Nilai</label>
                                    <input type="number" name="nilai[]" class="form-control">
                                    <input type="text" name="kode_kriteria[]" hidden value="<?= $krt['kode'] ?>">
                                    <input type="text" name="nip_pegawai[]" hidden value="<?= $pegawai['nip'] ?>">
                                </div>


                            </div>


                        </div>
                    </div>
                <?php
                }
                ?>

                <button class="btn btn-primary " type="submit">Simpan</button>
            </form>

        </div>
    </div>
</div>