<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Detail Akun</h5>
        </div>
        <div class="col">
            <div class="mb-3 card border-left-primary" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <h3 class="ml-3 card-text"><?= $auth['username']; ?></h3>
                        <img src="/img/<?= $auth['sampul']; ?>" alt="..." class="my-3 ml-3 detail img-fluid" style="max-width: 250px;">
                        <h6 class="card-text"><i class='ml-3 fas fa-user-alt' style='font-size:24px;'></i> Nama : <?= $auth['nama']; ?></h6>
                        <h6 class="card-text"><i class='ml-3 fas fa-id-badge' style='font-size:24px;'></i> Level : <?= $auth['level']; ?></h6>
                        <h6 class="card-text"><i class='ml-3 fas fa-home' style='font-size:24px;'></i> Sempor Lor RT <?= $auth['rt']; ?> RW <?= $auth['rw']; ?></h6>
                    </div>

                    <div class="col-md-4">
                        <div class="card-body">
                            <h6 class="ml-3 card-text"><i class='mt-3 fas fa-coins' style='font-size:24px;color: gold;'></i> Saldo Rp. <?= $auth['saldo']; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-9">
                <form action="/akun/<?= $auth['id']; ?>" method="POST" class="ml-3 d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Delete</button>
                </form>
                <a href="/akun/reset/<?= $auth['nama']; ?>" class="btn btn-secondary">Reset Password</a>
            </div>
            <div class="col-sm-3">
                <a href="/akun/edit/<?= $auth['nama']; ?>" class="btn btn-warning">Edit</a>
                <button onclick="pilihTransaksi()" class="btn btn-primary">Transaksi</button>
            </div>
        </div>
        <!-- <div class="col">
            <button onclick="pilihTransaksi()" class="btn btn-primary">Transaksi</button>
            <a href="/akun/reset/<?= $auth['nama']; ?>" class="btn btn-secondary">Reset Password</a>
            <a href="/akun/edit/<?= $auth['nama']; ?>" class="btn btn-warning">Edit</a>
            <form action="/akun/<?= $auth['id']; ?>" method="POST" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Delete</button>
            </form>
        </div> -->
        <br>
    </div>

</div>
<?= $this->endSection(); ?>
<?= $this->section('custom_script') ?>
<script>
    function pilihTransaksi() {
        Swal.fire({
            icon: 'question',
            title: 'Pilih Jenis Transaksi',
            showCancelButton: true,
            showDenyButton: true,
            confirmButtonText: 'Setor Sampah',
            denyButtonText: 'Tarik Setoran',
            cancelButtonText: 'Batal'
        }).then((res) => {
            //kalo true setor, false tarik
            if (res.value) {
                //true
                location.href = "/transaksi/setor/<?= $auth['id'] ?>";
            } else {
                location.href = "/transaksi/tarik/<?= $auth['id'] ?>";
            }
        })
    }
</script>
<?= $this->endSection(); ?>