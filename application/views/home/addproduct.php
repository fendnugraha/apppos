<form action="<?= base_url('home/addProduct'); ?>" method="post">
    <div class="mb-1 row">
        <label for="username" class="col-sm col-form-label">Username</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username'); ?>">
        </div>
    </div>
</form>