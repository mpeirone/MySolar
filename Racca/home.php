<! doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8"/>
    <title>Giusiano home</title>
    <script type="application/javascript" src="../jquery.js"></script>
    <script type="application/javascript" src="home.js"></script>
</head>
<body>
    <?php
        session_start();
        if(!(isset($_SESSION["cCorrentista"]))) {
            header("location:login.php");
            exit();
        }
        if (isset($_SESSION["ultimoAccesso"]) && (time() - $_SESSION["ultimoAccesso"] > 100) ) {
            header("location:sessioneScaduta.php");
            exit();
        }
        echo("----->" . time() . "----->" . $_SESSION["ultimoAccesso"] . "<br>");
        $_SESSION["ultimoAccesso"] = time();
        $cCorrentista=$_SESSION["cCorrentista"];
        $cn = mysqli_connect('localhost', 'root', '', 'banche');
        if (mysqli_connect_error())
            die('Errore connessione DB');
        if($_SERVER["REQUEST_METHOD"]=="GET")
        {
            $data=date('Y-m-d');
            echo('<h1>Pagamento/Versamento online</h1><form id="form">');
            echo('<label>Tipo: <input type="radio" name="rdbTipo" value="1" checked style="margin-left: 5px">Pagamento<input type="radio" name="rdbTipo" value="2" style="margin-left: 20px">Versamento</label><br>');
            echo('<label>Data: <input type="date" name="dtpData" value="'.$data.'"></label><br>');
            $sql = "select filiali.Nome,conti.cConto from filiali,conti where conti.cFiliale=filiali.cFiliale and conti.cCorrentista=$cCorrentista";
            $rs = mysqli_query($cn, $sql);
            echo('<label>Filiale: <select name="lstFiliale">');
            while ($riga = mysqli_fetch_array($rs)) {
                echo('<option value="' . $riga["cConto"] . '">' . $riga["Nome"] . '</option>');
            }
            echo('</select></label><br>');
            echo('<label>Importo: <input type="text" name="txtImporto" id="txtImporto"></label><br>');
            echo('<button type="button" id="btnConferma">CONFERMA</button></form><br>');
            echo('<button type="button" id="btnCambiaPassword" onclick="window.location.href=\'cambiaPassword.php\'">CAMBIA PASSWORD</button>');
        }
        else if($_SERVER["REQUEST_METHOD"]=="POST") {
            $sql = 'insert into movimenti(cConto,cOperazione,Data,Importo) values ("' . $_POST["lstFiliale"] . '", "' . $_POST["rdbTipo"] . '", "' . $_POST["dtpData"] . '", "' . $_POST["txtImporto"] . '")';
            $rs = mysqli_query($cn, $sql);
            $sql = 'select cMovimento from movimenti order by cMovimento desc limit 1';
            $rs = mysqli_query($cn, $sql);
            $riga = mysqli_fetch_array($rs);
            header('location:riepilogo.php?cMovimento='.$riga["cMovimento"]);
        }
    ?>
</body>
</html>