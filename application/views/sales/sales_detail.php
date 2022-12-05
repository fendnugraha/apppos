<?= $cashflow['invoice']; ?>
<table class="table">
    <!-- <colgroup>
        <col style="width: 70px">
        <col style="width: 155px">
        <col style="width: 148px">
        <col style="width: 155px">
    </colgroup> -->
    <thead>
        <tr>
            <th>Qty</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $cashflow['invoice']; ?></td>
            <td>KOPI SOBEK</td>
            <td>2000</td>
            <td>400000</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">Total</td>
            <td>Rp.200000</td>
        </tr>
    </tfoot>
</table>