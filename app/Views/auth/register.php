<?= $this->extend('auth/templates/index'); ?>
<?= $this->section('content'); ?>
<?= ($validation->getError()) ?>
<div class="container mt-5">
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h3 class="m-0 font-weight-bold text-primary">Registrasi Akun</h3>
        </div>
        <div class="card-body">
            <form action="/auth/save_register" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Lengkap" value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" placeholder="Username" value="<?= old('username'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password" value="<?= old('password'); ?>">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="rt" class="col-sm-2 col-form-label">RT</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-user" name="rt" placeholder="RT" value="<?= old('rt'); ?>">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="rw" class="col-sm-2 col-form-label">RW</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-user" name="rw" placeholder="RW" value="<?= old('rw'); ?>">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="sampul" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-4">
                        <img src="/img/profil.svg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-6">
                        <div class="custom-file">
                            <input type="file" class="form-control form-control-user <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">

                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-9">

                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary btn-user btn-block center-block">
                            Registrasi
                        </button>
                    </div>
                </div>
                <hr>
            </form>

            <!-- Styling for the area chart can be found in the
            <code>/js/demo/chart-area-demo.js</code> file. -->
        </div>
    </div>

</div>

<?= $this->endSection(); ?>