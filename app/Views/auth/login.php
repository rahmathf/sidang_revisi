<?= $this->extend('auth/templates/index'); ?>
<?= $this->section('content'); ?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="my-5 border-0 shadow-lg card o-hidden">
                <div class="p-0 card-body">
                    <!-- Nested Row within Card Body -->
                    <div class="justify-content-center row">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="mb-4 text-gray-900 h4">Welcome Back!</h1>
                                </div>

                                <form class="user" action="/auth/login" method="POST">
                                    <?= csrf_field(); ?>
                                    <?php if (session()->getFlashdata('pesan')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= session()->getFlashdata('pesan'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username" aria-describedby="emailHelp" placeholder="Username">
                                    </div>
                                    <div class=" form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                    </div>

                                    <button class=" btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>

                                <!-- <div class="text-center">
                                    <a class="small" href="<?= base_url('/account'); ?>">Buat Akun!</a>
                                </div> -->

                                <div class="text-center">
                                    <a class="small" href="<?= base_url('/'); ?>">Kembali ke Halaman Depan.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>