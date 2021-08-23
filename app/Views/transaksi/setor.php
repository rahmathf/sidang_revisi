<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content') ?>
<div class="container-fluid">
    <div class="card border-left-primary">
        <div class="card-header font-weight-bold text-primary">Form Setor Sampah</div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="container-fluid">
                        <img src="/img/<?= $nasabah['sampul'] ?>" class="p-3 img-fluid">


                        <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    <h4 class="text-center"></h4>
                    <h5>Nama : <?= $nasabah['nama'] ?></h5>
                    <h5>RT : <?= $nasabah['rt'] ?></h5>
                    <h5>RW : <?= $nasabah['rw'] ?></h5>
                    <h5>Member Sejak : <?= $nasabah['created_at'] ?></h5>
                </div>
                <div class="col-lg-8">
                    <form action="<?= base_url('transaksi/setorSampah') ?>" id="formSetor" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" value="<?= $nasabah['id'] ?>">
                        <div class="p-3 mb-2 row border-bottom-dark border-left-danger" id="banyakSetor">
                            <div class="form-group col">
                                <label for="jenis">Pilih Jenis Sampah</label>
                                <select name="jenis[]" id="jenis" class="form-control form-control-user">
                                    <option value="">Pilih Satu</option>
                                    <?php foreach ($sampah as $s) : ?>
                                        <option data-harga="<?= $s['harga'] ?>" value="<?= $s['id'] ?>"><?= $s['jenis'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="qty">Banyaknya</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                    <input type="text" name="qty[]" id="qty" class="form-control">
                                    <input type="hidden" name="hargaSatuan[]" id="hargaSatuan">
                                </div>
                            </div>
                            <div class="text-right form-group">
                                <button type="button" onclick="hapusField(this)" id="hapus" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="my-auto col">
                                <button type="button" onclick="hitung()" class="btn btn-danger">Hitung Total</button>
                            </div>
                            <div class=" col">
                                <label for="total">Total Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" name="total" id="total" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr class="border border-danger">
                        <div class="form-inline justify-content-between">
                            <button type="button" class="btn btn-primary" id="tambah"><i class="fas fa-plus"></i>Tambah Field</button>
                            <button type="button" onclick="cekTransaksi()" class="btn btn-success">
                                <i class="fas fa-plane"></i> Setor Sampah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endsection() ?>
<?= $this->section('custom_script') ?>
<script>
    $(document).ready(function() {

    })

    function cekTransaksi() {
        const totalSetor = $('#total').val()
        if (totalSetor == "") {
            Swal.fire({
                icon: 'error',
                text: 'Hitung Total Harga terlebih dahulu untuk memastikan setoran!'
            })
        } else {
            Swal.fire({
                icon: 'question',
                text: `Nasabah akan menyetorkan sampah dengan nilai tukar Rp.${totalSetor}, Lanjutkan?`,
                footer: 'Tekan diluar kotak untuk membatalkan aksi'
            }).then((res) => {
                if (res.isConfirmed) {
                    $('form#formSetor').submit()
                }
            })
        }
    }

    function hapusField(e) {
        // cek banyaknya kolom
        const jumlahForm = $('div#banyakSetor').length
        if (jumlahForm <= 1) {
            Swal.fire({
                icon: 'error',
                title: 'Peringatan',
                text: 'Form Tunggal tidak dapat dihapus!'
            })
        } else {
            $(e).parents('div#banyakSetor').remove()
        }
    }
    $('#formSetor').nestedForm({
        forms: '#banyakSetor',
        adder: '#tambah',
    });

    function hitung() {
        var total = 0;
        $('select > option:selected').each(function() {
            let harga = $(this).data('harga') // field data-harga pada option
            let qty = $(this).parents('div#banyakSetor').find('input#qty').val() //cari ke parent untuk mencari input qty
            let hargaSatuan = $(this).parents('div#banyakSetor').find('input#hargaSatuan').val(harga) //cari ke parent untuk mencari input qty
            total += harga * qty
        })
        $('#total').val(total);
    }
</script>
<?= $this->endsection() ?>