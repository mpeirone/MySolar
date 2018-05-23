<! doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8"/>
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <?php
        session_start();
        if (!isset($_SESSION["cCorrentista"])) {
            $cn = mysqli_connect('localhost', 'root', '', 'banche');

            if (mysqli_connect_error())
                die('Errore connessione DB');

            if ($_SERVER["REQUEST_METHOD"] == "GET") {

                echo("<form><label>Nome utente: <input type='text' name='txtUtente' style='margin-bottom: 10px'></label><br>");
                echo("<label>Password: <input type='password' name='txtPassword' style='margin-left: 21px'></label><br>");
                echo("<button type='submit' formmethod='post' formaction='login.php' style='margin-top: 10px'>ACCEDI</button>");
            } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (($_POST["txtUtente"] != "") && ($_POST["txtPassword"] != "")) {
                    /*$nome = $cn->real_escape_string($_POST["txtUtente"]);
                    $password = $cn->real_escape_string($_POST["txtPassword"]);*/
                    $nome = ($_POST["txtUtente"]);
                    $password = ($_POST["txtPassword"]);
                    echo(var_dump(isset($_POST["txtUtente"])));
                    $sql = "select cCorrentista from correntisti where Nome='$nome' and Pwd='$password'";
                    $rs = mysqli_query($cn, $sql);
                    echo($sql);
                    if (mysqli_num_rows($rs) == 0)
                        echo("<h3>Errore --> Nome utente o password non corretti</h3><h4>Clicca <a href='login.php'>qui</a></h4>");
                    else {
                        $riga = mysqli_fetch_array($rs);
                        //session_start();
                        $_SESSION["cCorrentista"] = $riga["cCorrentista"];
                        $_SESSION["nomeCorrentista"] = $nome;
                        $_SESSION["ultimoAccesso"] = time();
                        header("location:home.php");
                    }
                } else {
                    echo("Inserire i campi  ");
                    echo("<form><label>Nome utente: <input type='text' name='txtUtente' style='margin-bottom: 10px'></label><br>");
                    echo("<label>Password: <input type='password' name='txtPassword' style='margin-left: 21px'></label><br>");
                    echo("<button type='submit' formmethod='post' formaction='login.php' style='margin-top: 10px'>ACCEDI</button>");
                }
            }
        }
        else{
            echo("Utente già loggato");
        }
    ?>
</body>
</html>