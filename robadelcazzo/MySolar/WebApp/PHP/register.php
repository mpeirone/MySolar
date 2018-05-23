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
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Registra un account</div>
        <div class="card-body">
            <form action="register.php"  method="get">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputName">Nome</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="Nome" placeholder="Inserisci il nome">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputLastName">Cognome</label>
                            <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="Cognome" placeholder="Inserisci il cognome">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" name="Email" placeholder="Inserisci l'Email">
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputPassword1">Password</label>
                            <input class="form-control" id="exampleInputPassword1" type="password" name="Password" placeholder="Password">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleConfirmPassword">Conferma password</label>
                            <input class="form-control" id="exampleConfirmPassword" type="password" name="ConfermaPassword" placeholder="Conferma password">
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Registati">
            </form>
            <?php
            if(isset($_GET['Nome'])&&isset($_GET['Cognome'])&&isset($_GET['Email'])&&isset($_GET['Password'])&&isset($_GET['ConfermaPassword']))
            {
                if(($_GET['Nome']!="")&&($_GET['Cognome']!="")&&($_GET['Email']!="")&&($_GET['Password']!="")&&($_GET['ConfermaPassword']!=""))
                {
                    if($_GET['Password']==$_GET['ConfermaPassword'])
                    {
                        //esegui registrazione
                    }else{
                        echo("<p>Le 2 password non corrispondono</p>");
                    }
                }else
                {
                if($_GET['Nome']=="")
                {
                    echo("<p>Campo nome non inserito</p>");
                }else if($_GET['Cognome']=="")
                {
                    echo("<p>Campo Cognome non inserito</p>");
                }else if($_GET['Email']=="")
                {
                    echo("<p>Campo email non inserito</p>");
                }else if($_GET['Password']=="")
                {
                    echo("<p>Campo password non inserito</p>");
                }else if($_GET['ConfermaPassword']=="")
                {
                    echo("<p>Campo conferma  non inserito</p>");
                }
                }
            }else
            {
                echo("<p>Pagina appena caricata</p>");
            }

            ?>
            <div class="text-center">
                <a class="d-block small mt-3" href="login.php">Login</a>
                <a class="d-block small" href="#">Password dimenticata?</a>
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

