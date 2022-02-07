<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

    <title>Login</title>
</head>


<body>
    <div class="container pt-5">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header p-3">Login</h5>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-11">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="Username"><i class="bi bi-person-square"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="username" placeholder="Username" aria-describedby="Username">
                                </div>

                                <label for="password" class="form-label">Password</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="Password"><i class="bi bi-key-fill"></i></span>
                                    </div>
                                    <input type="password" class="form-control" id="password" placeholder="Password" aria-describedby="Password">
                                </div>
                                <button type="submit" class="btn btn-success btn-login">Login</button>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center" style="margin-top: 15px">
                Belum punya akun? <a href="<?php echo base_url() ?>register">Silahkan Register</a>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

        <script>
            $(document).ready(function() {

                $(".btn-login").click(function() {

                    var username = $("#username").val();
                    var password = $("#password").val();

                    if (username.length == "") {

                        Swal.fire({
                            type: 'warning',
                            title: 'Oops...',
                            text: 'Username Wajib Diisi !'
                        });

                    } else if (password.length == "") {

                        Swal.fire({
                            type: 'warning',
                            title: 'Oops...',
                            text: 'Password Wajib Diisi !'
                        });

                    } else {

                        $.ajax({

                            url: "<?php echo base_url() ?>index.php/login/cek_login",
                            type: "POST",
                            data: {
                                "username": username,
                                "password": password
                            },

                            success: function(response) {

                                if (response == "success") {

                                    Swal.fire({
                                            type: 'success',
                                            title: 'Login Berhasil!',
                                            text: 'Anda akan di arahkan dalam 3 Detik',
                                            timer: 3000,
                                            showCancelButton: false,
                                            showConfirmButton: false
                                        })
                                        .then(function() {
                                            window.location.href = "<?php echo base_url() ?>index.php/dashboard";
                                        });

                                } else {

                                    Swal.fire({
                                        type: 'error',
                                        title: 'Login Gagal!',
                                        text: 'silahkan coba lagi!'
                                    });


                                }

                                console.log(response);

                            },

                            error: function(response) {

                                Swal.fire({
                                    type: 'error',
                                    title: 'Opps!',
                                    text: 'server error!'
                                });

                                console.log(response);

                            }

                        });

                    }

                });

            });
        </script>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>