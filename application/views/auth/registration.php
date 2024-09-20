<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 card">

            <div class="card-header text-center">
                <h3>Registrasi</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('registration') ?>" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" id="name" value="<?php echo set_value('name'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('name')  ?>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="no_tlp" class="form-label">No Handpone</label>
                        <input type="text" name="no_tlp" class="form-control  <?= form_error('no_tlp') ? 'is-invalid' : ''; ?>" id="no_tlp" value="<?php echo set_value('no_tlp'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('no_tlp')  ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" name="nip" class="form-control  <?= form_error('nip') ? 'is-invalid' : ''; ?>" id="nip" value="<?php echo set_value('nip'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('nip')  ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control  <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" value="<?php echo set_value('email'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('email')  ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control  <?= form_error('password') ? 'is-invalid' : ''; ?>" id="password">
                        <div class="invalid-feedback">
                            <?= form_error('password')  ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>

</div>