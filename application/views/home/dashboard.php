<div class="control-nav mb-3">
    <a href="<?= base_url('home/addProduct'); ?>" class=" btn btn-primary">+ Tambah Produk</a>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCatProduct">
        + Tambah Kategori
    </button>
</div>
<div class="row">
    <div class="col-sm-9">
        <table class="table display">
            <thead>
                <tr>
                    <th>KODE</th>
                    <th>NAMA</th>
                    <th>KATEGORI</th>
                    <th>MODAL</th>
                    <th>JUAL</th>
                    <th>SISA</th>
                    <th>UPDATE TERAKHIR</th>
                    <th>DETAIL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($product as $p) {
                ?>
                    <tr>
                        <td><?= $p['kode']; ?></td>
                        <td><?= $p['nama']; ?></td>
                        <td><?= $p['category']; ?></td>
                        <td><?= $p['beli']; ?></td>
                        <td><?= $p['jual']; ?></td>
                        <td><?= $p['stok']; ?></td>
                        <td><?= date('Y-m-d H:s', $p['date_modified']); ?></td>
                        <td>
                            <a href="<?= base_url('home/edit_product/') . $p['inv_id'];; ?> ">Edit Produk</a>
                            <a href="<?= base_url('home/pr_detail/') . $p['inv_id'];; ?> ">Detail</a>
                        </td>
                    </tr>
                <?php }; ?>
            </tbody>

        </table>
    </div>
    <div class="col-sm">
        <div class="card">
            <div class="card-body">
                <p>Total Inventory</p>
                <h1>Rp <?= number_format($total_inv['total_inv']); ?> ,-</h1>

            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="addCatProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('home/addCatProduct'); ?>" method="post">
                    <div class="mb-1 row">
                        <label for="catname" class="col-sm col-form-label">Nama Kategori</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="catname" id="catname" value="<?= set_value('catname'); ?>">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="catprefix" class="col-sm col-form-label">Kode Prefix</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="catprefix" id="catprefix" value="<?= set_value('catprefix'); ?>">
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