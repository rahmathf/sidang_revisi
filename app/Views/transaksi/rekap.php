<style>
    .table-tr {
        border-collapse: collapse;
    }

    td,
    th {
        border: 1px solid #000000;
        text-align: start;
        height: 20px;
        margin: 10px;
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
    <div style="font-size:30px; color:#d00">Rekap Transaksi</div>
    <h4>CV. Bank Sampah</h4>
    <h4>Purbalingga, Indonesia
    </h4>
    <h6>Dari : <span><?= date('d F y', strtotime($dari)) ?></span></h6>
    <h6>Sampai : <span><?= date('d F y', strtotime($sampai)) ?></span></h6>
    <h6></h6>
    <h6 style="text-align:center">===== List Transaksi =====</h6>
    <table class="table-tr">
        <tr>
            <th style="width: 5%; text-align:center">No</th>
            <th style="width: 25%;">Nama Nasabah</th>
            <th style="width: 17%;">Jenis Transaksi</th>
            <th style="width: 23%;">Total Transaksi</th>
            <th style="width: 30%;">Tanggal Transaksi</th>
        </tr>
        <?php $no = 1;
        foreach ($transaksi as $tr) : ?>
            <tr>
                <td style="width: 5%; text-align:center"><?= $no ?></td>
                <td style="width: 25%;"><?= $tr->nama ?></td>
                <td style="width: 17%;"><?= $tr->jenis_transaksi ?></td>
                <td style="width: 23%;"><?= $tr->total_harga ?></td>
                <td style="width: 30%;"><?= $tr->created_at ?></td>
            </tr>
        <?php $no++;
        endforeach ?>
    </table>
</body>