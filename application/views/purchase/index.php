<div class="control-nav mb-3">
    <a href="<?= base_url('purchase/addPurchase'); ?>" class=" btn btn-primary">+ Tambah Pembelian</a>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addContact">
        + Tambah Kontak
    </button>
</div>
<table class="table display">
    <thead>
        <tr>
            <th>ID</th>
            <th>WAKTU</th>
            <th>SUPPLIER</th>
            <th>PRODUK</th>
            <th>HARGA</th>
            <th>QTY</th>
            <th>TOTAL</th>
            <th>DIBUAT</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($purchase as $p) {
        ?>
            <tr>
                <td><?= $p['id']; ?></td>
                <td><?= date('Y-m-d H:s', $p['waktu']); ?></td>
                <td><?= $p['supplier']; ?></td>
                <td><?= $p['product']; ?></td>
                <td><?= $p['harga']; ?></td>
                <td><?= $p['jumlah']; ?></td>
                <td><?= $p['jumlah'] * $p['harga']; ?></td>
                <td><?= date('Y-m-d H:s', $p['date_created']) . " by " . $p['username']; ?></td>
                <td><?= $p['status']; ?></td>
                <td>
                    <a href="<?= base_url('purchase/edit_purchase/') . $p['id'];; ?> ">Edit</a>
                    <a href="<?= base_url('purchase/po_detail/') . $p['id'];; ?> ">Detail</a>
                </td>
            </tr>
        <?php }; ?>
    </tbody>

</table>



<!-- Modal -->
<div class="modal fade" id="addContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('purchase'); ?>" method="post">
                    <div class="mb-1 row">
                        <label for="ct_name" class="col-sm col-form-label">Nama Kontak</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ct_name" id="ct_name" value="<?= set_value('ct_name'); ?>">
                            <div class="form-text">Maksimal 60 Karakter</div>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="catprefix" class="col-sm col-form-label">Type</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="ct_type" id="ct_type">
                                <option value="Konsumen">Konsumen</option>
                                <option value="Supplier">Supplier</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="ct_desc" class="col-sm col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <textarea type="text" class="form-control" name="ct_desc" id="ct_desc" value="<?= set_value('ct_desc'); ?>">
                            </textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>
    </div>
</div>