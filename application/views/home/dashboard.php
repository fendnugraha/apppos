<div class="control-nav mb-3">
    <a href="<?= base_url('home/addProduct'); ?>" class=" btn btn-primary">+ Tambah Produk</a>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCatProduct">
        + Tambah Kategori
    </button>
</div>
<table class="table display">
    <thead>
        <tr>
            <th><a href="http://">NO</a></th>
            <th><a href="http://">NAMA</a></th>
            <th><a href="http://">MODAL</a></th>
            <th><a href="http://">JUAL</a></th>
            <th><a href="http://">SISA</a></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>KIPAS ANGIN MIYAKO</td>
            <td>245.000</td>
            <td>350.000</td>
            <td>10</td>
        </tr>
        <tr>
            <td>1</td>
            <td>KIPAS ANGIN MIYAKO</td>
            <td>245.000</td>
            <td>350.000</td>
            <td>10</td>
        </tr>
        <tr>
            <td>1</td>
            <td>KIPAS ANGIN MIYAKO</td>
            <td>245.000</td>
            <td>350.000</td>
            <td>10</td>
        </tr>
        <tr>
            <td>1</td>
            <td>KIPAS ANGIN MIYAKO</td>
            <td>245.000</td>
            <td>350.000</td>
            <td>10</td>
        </tr>
        <tr>
            <td>1</td>
            <td>KIPAS ANGIN MIYAKO</td>
            <td>245.000</td>
            <td>350.000</td>
            <td>10</td>
        </tr>
        <tr>
            <td>1</td>
            <td>KIPAS ANGIN MIYAKO</td>
            <td>245.000</td>
            <td>350.000</td>
            <td>10</td>
        </tr>
    </tbody>

</table>



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