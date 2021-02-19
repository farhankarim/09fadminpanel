<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="includes/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="includes/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
            .bg-login-image {
                background: url(https://images.unsplash.com/photo-1552566626-52f8b828add9?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mnx8cmVzdGF1cmFudHxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80);
                background-position: center;
                background-size: cover
            }
        </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?php
                                // if start here
                                if (isset($_SESSION['inccred'])) {
                                ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Holy guacamole!</strong> <?php echo $_SESSION['inccred']; ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php
                                    // if closing tag here
                                    unset($_SESSION["inccred"]);
                                }
                                ?>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit"  class="btn btn-primary btn-user btn-block" name="login">Login</button>
                                    
                                        <hr>
                                        
                                    </form>
                                    <hr>
                                   
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="includes/vendor/jquery/jquery.min.js"></script>
    <script src="includes/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="includes/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="includes/js/sb-admin-2.min.js"></script>

</body>

</html>

<?php

// inlcude db details
include('includes/db.php');

//login pressed or not
if(isset($_POST['login']))
{

$email=$_POST["email"];
$pass=md5( $_POST["pass"]);

//query execute and check user exist or not
//return associative array
$check=mysqli_query($con,"select * from users where email='$email' and pass='$pass'");
// var_dump(mysqli_num_rows($check));
//returns indexed array
$user_details=mysqli_fetch_row($check);
// var_dump($user_details);
if(mysqli_num_rows($check)==1){
    //if exists then index.php
    $_SESSION["username"] = $user_details[1];
    $_SESSION["email"] = $user_details[2];
    header("location: index.php");
}
else{
    //else show error
    // echo "<script>alert('invalid email/password');</script>";
    $_SESSION["inccred"]="Incorrect email/password";
    header("location: login.php");
}
}
?>

<?php ob_flush();?>