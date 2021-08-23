<style>
    .table-tr {
        border-collapse: collapse;
    }

    .td,
    .th {
        border: none;
        text-align: start;
        width: 50%;
    }

    td,
    th {
        border: 1px solid #000000;
        text-align: center;
        height: 20px;
        margin: 8px;
    }

    .tr {
        width: 20%;
    }

    body {
        border: 1px solid #000;
        width: fit-content;
        padding: 10px;
    }

    h5 {
        text-align: center;
    }
</style>

<body>
    <div style=" font-size:30px; color:#d00"><i>Bukti Transaksi</i></div>
    <h4>
        CV. Bank Sampah<br>
        Purbalingga, Indonesia
    </h4>

    <table>
        <tr>
            <th class="th">Nomor Transaksi</th>
            <td class="td">:
                <span class="td">TR-<?= $transaksi['id'] ?></span>
            </td>
        </tr>
        <tr>
            <th class="th">Nama Nasabah</th>
            <td class="td">:
                <span class="td"><?= $transaksi['nama'] ?></span>
            </td>
        </tr>
        <tr>
            <th class="th">Alamat Nasabah</th>
            <td class="td">:
                <span class="td">RT <?= $transaksi['rt'] ?> | RW <?= $transaksi['rw'] ?></span>
            </td>
        </tr>
        <tr>
            <th class="th">Tanggal Transaksi</th>
            <td class="td">:
                <span class="td"><?= $transaksi['created_at'] ?></span>
            </td>
        </tr>
    </table>
    <?php if ($transaksi['jenis_transaksi'] == 'masuk') : ?>
        <h5>### Transaksi Setor Sampah ###</h5>
        <table cellpadding="6" class="table-tr">
            <tr>
                <th><strong>Barang</strong></th>
                <th><strong>Harga Satuan</strong></th>
                <th><strong>Jumlah</strong></th>
                <th><strong>Total Harga</strong></th>
            </tr>
            <?php foreach ($detail as $d) : ?>
                <tr>
                    <td><?= $d->jenis ?></td>
                    <td>Rp.<?= number_format($d->harga, 0, ',', '.') ?></td>
                    <td><?= $d->berat ?></td>
                    <td>Rp.<?= number_format($d->harga_total, 0, ',', '.') ?></td>
                </tr>
            <?php endforeach ?>
        </table>

    <?php else : ?>
        <h5>### Penarikan Saldo ###</h5>
        <table class="table-tr" style="border:1px solid #000;padding:2px">
            <tr>
                <th class="th">Jumlah Penarikan</th>
                <td class="td">:
                    <span class="td">Rp.<?= number_format($transaksi['total_harga'], 0, ',', '.') ?>'</span>
                </td>
            </tr>
            <tr>
                <th class="th">Sisa Saldo</th>
                <td class="td">:
                    <span class="td">Rp.<?= number_format($transaksi['saldo'], 0, ',', '.') ?></span>
                </td>
            </tr>
        </table>
    <?php endif ?>
    <h5>### Terimakasih Telah Menggunakan Bank Sampah ###</h5>