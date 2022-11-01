<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App POS - Register</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.css">
    <style>
        html,
        body,
        .container {
            height: 100vh;
            width: 100vw;
        }

        .reg-form {
            width: 40vw;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center">
        <div class="reg-form">
            <h1>Registrasi User</h1>
            <form action="#" method="post">
                <div class="mb-1 row">
                    <label for="username" class="col-sm col-form-label">Username</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="username">
                    </div>
                </div>
                <div class="mb-1 row">
                    <label for="fullname" class="col-sm col-form-label">Full Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="fullname">
                    </div>
                </div>
                <div class="mb-1 row">
                    <label for="password" class="col-sm col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="password">
                    </div>
                </div>
                <div class="mb-1 row">
                    <label for="cpassword" class="col-sm col-form-label">Confirm Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="cpassword">
                    </div>
                </div>
                <div class="mb-1 row">
                    <label for="role" class="col-sm col-form-label">Role</label>
                    <div class="col-sm-8">
                        <select name="role" class="form-control" id="role">
                            <option value="Administrator">Administrator</option>
                            <option value="Kasir">Kasir</option>
                            <option value="Staff">Staff</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <span>Sudah punya akun? <a href="<?= base_url('auth'); ?>">Klik untuk login!</a></span>

                </div>
            </form>
        </div>
    </div>



    <script src="<?= base_url(); ?>/assets/js/bootstrap.js"></script>
</body>

</html>