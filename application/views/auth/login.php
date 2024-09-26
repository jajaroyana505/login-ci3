<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">

                <!-- Start Notif -->
                <?php
                if ($this->session->flashdata('success')) {

                ?>
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        <?php
                        echo $this->session->flashdata('success');
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php
                }
                ?>
                <?php
                if ($this->session->flashdata('failed')) {

                ?>
                    <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                        <?php
                        echo $this->session->flashdata('failed');
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php
                }
                ?>
                <!-- end Notif -->

                <div class="card-body p-0">

                    <!-- Nested Row within Card Body -->
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                        </div>
                        <form class="user" action="login" method="post">
                            <div class="form-group">
                                <input name="email" type="email" class="form-control form-control-user <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" placeholder="Enter Email Address...">
                                <div class="invalid-feedback">
                                    <?= form_error('email')  ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="password" type="password" class="form-control form-control-user <?= form_error('password') ? 'is-invalid' : ''; ?>" id="password" placeholder="Password">
                                <div class="invalid-feedback">
                                    <?= form_error('password')  ?>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Login</button>
                        </form>

                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('registration') ?>">Create an Account!</a>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>