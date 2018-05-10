<?php
session_start();
if(isset($_SESSION['Id'])) {
    //header("location: index.php");
}else
{
    echo("Id non settato");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form action="login.php"  method="get">
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <input class="form-control" id="InputEmail" type="email" name="InputEmail" aria-describedby="emailHelp" placeholder="Inserisci Email" value="boo@boo.it">
                </div>
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input class="form-control" id="InputPassword" name="InputPassword" type="password" placeholder="Password">
                </div>
                <?php
                if (isset($_GET['InputEmail'])&&isset($_GET['InputPassword'])) {
                    if(false)//controlli di login
                    {
                        $_SESSION['Id'] = "1";
                    }
                    else
                        {
                            echo("<p>Username o password errati</p>");
                        }


                }else
                {
                    echo("<p>Username o password non inseriti</p>");
                }

                ?>
                <input class="btn btn-primary btn-block" type="submit" value="Login">
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="register.html">Registra un account</a>
                <a class="d-block small" href="forgot-password.html">Pasword dimenticata?</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>


