
<?php
session_start();
$con=new mysqli("localhost","root","","solardb");
if($con->connect_errno)
    die("null");
if(isset($_POST['Data']))
{
$Data=$_POST['Data'];
$utente=$_SESSION["Id"];
$sql="SELECT COUNT(*) AS 'Count', COALESCE(MAX(`PrivA1`),0)AS 'MaxPrivA1', COALESCE(MAX(`PrivA2`),0)AS 'MaxPrivA2', COALESCE(MAX(`PrivA3`),0)AS 'MaxPrivA3',COALESCE(MAX(`Priv-A1`),0)AS 'MaxPriv-A1', COALESCE(MAX(`Priv-A2`),0)AS 'MaxPriv-A2', COALESCE(MAX(`Priv-A3`),0)AS 'MaxPriv-A3',COALESCE(MAX(`GseA1`),0)AS 'MaxGseA1', COALESCE(MAX(`GseA2`),0)AS 'MaxGseA2', COALESCE(MAX(`GseA3`),0)AS 'MaxGseA3',COALESCE(MAX(`Gse-A1`),0)AS 'MaxGse-A1', COALESCE(MAX(`Gse-A2`),0)AS 'MaxGse-A2', COALESCE(MAX(`Gse-A3`),0)AS 'MaxGse-A3' FROM `dati` WHERE IdUtente=$utente AND Data<='$Data'";
$rs=$con->query($sql);
    if(!$rs)
        die("null");
    if($rs->num_rows==0)
        echo("null"); //Nel momento in cui avviene l'echo si interrompe il webService e restituisce al callback
    else{
        $vect=[];
            array_push($vect, $record=$rs->fetch_assoc());
        echo(json_encode($vect));
    }
$con->close();
}else
    {
        if(isset($_POST['PrivA3']))
            echo("settato!");
        echo("MANCANO PARAMETRI!");
    }

/*<?php
$con=new mysqli("localhost","Admin","","solardb");
if($con->connect_errno)
    die("Errore connessione database. ".$con->connect_errno." ".$con->connect_error);
$sql="INSERT INTO dati (`IdUtente`,`PrivA1`,`PrivA2`,`PrivA3`,`Priv-A1`,`Priv-A2`,`Priv-A3`,`GseA1`,`GseA2`,`GseA3`,`Gse-A1`,`Gse-A2`,`Gse-A3`) VALUES (1".$_GET['PrivA1'].$_GET['PrivA2'].$_GET['PrivA3'].$_GET['PrivA11'].$_GET['PrivA21'].$_GET['PrivA31'].$_GET['GseA1'].$_GET['GseA2'].$_GET['GseA3'].$_GET['GseA11'].$_GET['GseA21'].$_GET['GseA31'].")";
$con->query($sql);
$con->close();*/