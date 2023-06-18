<?php
session_start();
include 'koneksi/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/score.png">

    <title>Koperasi - Login</title>
    <link rel="stylesheet" href="admin/style.css">
    <style>
    .bg {
        width: 100%;
        height: 100vh;
        background: #A2B5BB;
    }

    .wrapper {
        width: 100%;
        height: 100%;
        position: relative;
        animation: round;
    }



    /* .wrapper div {
        width: 70px;
        height: 70px;
        border: 5px solid white;
        position: absolute;

    }

    .wrapper div:nth-child(1) {
        top: 10%;
        left: 30%;
        animation: round 5s linear infinite;
    }

    .wrapper div:nth-child(2) {
        top: 20%;
        left: 50%;
        animation: round 5s linear infinite;
    } */
    </style>



</head>

<body class="bg-gradient" style="background-color: #ECB390;">
    <div class="bg">
        <div class="wrapper">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>

            <div class="container">



                <!-- Outer Row -->
                <div class="row justify-content-center">

                    <div class="col-xl-10 col-lg-12 col-md-9">
                        <?php
        if(isset($_GET['alert'])){
          if($_GET['alert'] == "gagal"){
            echo "<div class='alert alert-danger mt-3'><b>LOGIN FAILED!</b><br>Username or Password invalid</div>";
          }
        }
        ?>
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-6 d-none d-lg-block">
                                        <img src="img/gambarloginadmin2.gif" width="110%">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4"> <b> Silahkan Login</b>
                                                </h1>
                                                <!-- <h1 clas="h4 text-gray-900 mb-4">Sign in now -->
                                                </h1>
                                            </div>
                                            <form class="user" method="POST" action="admin/proseslogin.php">
                                                <div class="form-group">
                                                    <input type="text" name="username" required
                                                        class="form-control form-control-user"
                                                        placeholder="Input Username">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" required
                                                        class="form-control form-control-user" id="exampleInputPassword"
                                                        placeholder="Input Password">
                                                </div>
                                                <div class="form-group">
                                                    <!-- <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div> -->
                                                </div>
                                                <button type="submit" class="btn btn text-light btn-user btn-block"
                                                    style="background-color: #A2B5BB;">
                                                    Login
                                                </button>

                                                <!-- <a href="index.html" class="btn btn btn-user btn-block"
                                                style="background-color: #CEE5D0;">
                                                <i class="fab fa-google fa-fw"></i> Login with Google
                                            </a> -->
                                                <!-- <a href="index.html" class="btn btn btn-user btn-block"
                                                style="background-color: #94B49F;">
                                                <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                            </a> -->
                                            </form>

                                            <!-- <div class="text-center">
                                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                                        </div> -->
                                            <!-- <div class="text-center">
                                            <a class="small" href="register.html">Create an Account!</a>
                                        </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>

        </div>
    </div>
    <?php include('script/script.php'); ?>

</body>

</html>