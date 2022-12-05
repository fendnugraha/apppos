<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center">BUKTI PENGELUARAN KAS</h4>
                <p class="text-center"><?= $cashflow['invoice']; ?><br><?= $cashflow['waktu']; ?></p>
                <table style="undefined;table-layout: fixed; width: 100%">
                    <colgroup>
                        <col style="width: 20%">
                        <col style="width: 80%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Senilai</th>
                            <th>Rp. <?= number_format($cashflow['keluar']); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td><?= ucwords($this->finance_model->terbilang($cashflow['keluar'])); ?> Rupiah</td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td><?= strtoupper($cashflow['deskripsi']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="<?= base_url('home'); ?> ">Kembali</a>
    </div>
</div>