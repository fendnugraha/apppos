<div class="container">
    <h1>Registerasi User</h1>
    <form action="#" method="post">
        <div class="row">
            <div class="col-sm">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="col-sm">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="col-sm">
                <label for="phone">Nomor Telepon</label>
                <input type="number" name="phone" id="phone">
            </div>
            <div class="col-sm">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="col-sm">
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword">
            </div>
            <div class="col-sm">
                <label for="role">Level</label>
                <select name="role" id="role">
                    <option value="Administrator">Administrator</option>
                    <option value="Kasir">Kasir</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>
            <div class="col-sm">
                <button type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>