<?= $this->extend('templates/index') ?>
<?= $this->section('page-content') ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">Form Penarikan Saldo</div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <!-- foto profil -->
                    <div class="container border-default border">
                        <img src="/img/<?= $user['sampul'] ?>" alt="foto-profil" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8">
                    <form action="/transaksi/tarikSaldo" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <div class="form-group">
                            <label for="nama">Nama Nasabah</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="<?= $user['nama'] ?>">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">RT</span>
                            </div>
                            <input class="form-control" type="text" name="rt" id="rt" value="<?= $user['rt'] ?>">
                            <div class="input-group-prepend">
                                <span class="input-group-text">RW</span>
                            </div>
                            <input class="form-control" type="text" name="rw" id="rw" value="<?= $user['rw'] ?>">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <label for="saldo">Saldo Nasabah</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input class="form-control" type="text" name="saldo" id="saldo" value="<?= $user['saldo'] ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="tarik">Nominal Penarikan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" id="tarik" name="tarik" onkeyup="hitungSisa()" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sisa">Sisa Saldo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" id="sisa" name="sisa" value="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success" type="submit">Tarik Dana</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function hitungSisa() {
        const Saldo = $('#saldo').val()
        const nominal = $('#tarik').val()
        const sisa = Saldo - nominal
        //lakukan perhitungan
        if (sisa <= 0) {
            //out of range!
            Swal.fire({
                icon: 'warning',
                title: 'Terjadi Kesalahan!',
                text: 'Nominal tarik melebihi saldo!'
            })
            $('#tarik').val("")
            $('#sisa').val("")

        } else {
            $('#sisa').val(sisa)
        }
    }
</script>
<?= $this->endsection() ?>