<?php
session_start();
if(isset($_SESSION['Id']))
    header("location: index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MySolar-Login</title>
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
            <form action="login.php"  method="post">
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <input class="form-control" id="InputEmail" type="email" name="InputEmail" aria-describedby="emailHelp" placeholder="Inserisci Email" value="m.peirone.9953@vallauri.edu">
                </div>
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input class="form-control" id="InputPassword" name="InputPassword" type="password" placeholder="Password" value="password">
                </div>
                <?php
                if (isset($_POST['InputEmail'])&&isset($_POST['InputPassword'])) {
                    if($_POST['InputEmail']==""||$_POST['InputPassword']=="")
                    {
                        echo("<p>Username o password non inseriti</p>");
                    }else {
                        $con=new mysqli("localhost","root","","solardb");
                        if($con->connect_errno)
                            die("Errore connessione database. ".$con->connect_errno." ".$con->connect_error);

                        $sql="select count(*) as 'count' from utenti where email='".$_POST["InputEmail"]."'";
                        $rs=$con->query($sql);
                        if(!$rs)
                            die("Errore query. ".$con->errno." ".$con->error);
                        else{
                            $scalar=((int)$rs->fetch_assoc() ["count"]);
                                    if($scalar>=1)
                                    {
                                        $sql="select IdUtente from utenti where email='".$_POST["InputEmail"]."' and password='".$_POST['InputPassword']."'";
                                        $rs=$con->query($sql);
                                        if(!$rs)
                                            die("Errore query. ".$con->errno." ".$con->error);
                                        if($rs->num_rows==0)
                                            echo("<p>Password sbagliata</p>");
                                        else{
                                            $_SESSION["Id"]=$rs->fetch_assoc()["IdUtente"];
                                            header("location: index.php");
                                        }
                                    }
                                    else
                                    {
                                        echo("<p>Email sbagliata</p>");
                                    }
                                }

                        }
                        $con->close();
                    }
                ?>
                <input class="btn btn-primary btn-block" type="submit" value="Login">
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="register.php">Registra un account</a>
                <a class="d-block small" href="PasswordDimenticata.php">Password dimenticata?</a>
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


