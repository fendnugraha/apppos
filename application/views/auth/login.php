<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App POS</title>
</head>

<body>
    <div class="container">
        <form action="#" method="post">
            <div class="row">
                <div class="col-sm">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="col-sm">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password">
                </div>
                <div class="col-sm">
                    <button type="submit">Submit</button>
                </div>
                <a href="<?= base_url("auth/register"); ?> ">Daftar pengguna baru disini !</a>
            </div>
        </form>
    </div>
</body>

</html>