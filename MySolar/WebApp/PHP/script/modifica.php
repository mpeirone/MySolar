
<?php
session_start();
$con=new mysqli("localhost","root","","solardb");
if($con->connect_errno)
    die("Errore connessione database. ".$con->connect_errno." ".$con->connect_error);
if(isset($_POST['PrivA1'])&&isset($_POST['PrivA2'])&&isset($_POST['PrivA3'])&&isset($_POST['Priv_A1'])&&isset($_POST['Priv_A2'])&&isset($_POST['Priv_A3'])&&isset($_POST['GseA1'])&&isset($_POST['GseA2'])&&isset($_POST['GseA3'])&&isset($_POST['Gse_A1'])&&isset($_POST['Gse_A2'])&&isset($_POST['Gse_A3'])&&isset($_POST['Data'])&&isset($_POST['IdDato'])) {
    $sql = "select * from dati where Data='" . $_POST['Data']."' and IdUtente=".$_SESSION["Id"]." and IdDato!=". $_POST['IdDato'];
    $rs = $con->query($sql);
    if ($rs->num_rows > 0) {
        echo("Data esistente");
    } else {
        $PrivA1 = $_POST['PrivA1'];
        $PrivA2 = $_POST['PrivA2'];
        $PrivA3 = $_POST['PrivA3'];
        $PrivA_1 = $_POST['Priv_A1'];
        $PrivA_2 = $_POST['Priv_A2'];
        $PrivA_3 = $_POST['Priv_A3'];
        $GseA1 = $_POST['GseA1'];
        $GseA2 = $_POST['GseA2'];
        $GseA3 = $_POST['GseA3'];
        $GseA_1 = $_POST['Gse_A1'];
        $GseA_2 = $_POST['Gse_A2'];
        $GseA_3 = $_POST['Gse_A3'];
        $Data = $_POST['Data'];
        $utente = $_SESSION["Id"];
        $IdDato = $_POST['IdDato'];
        $sql = "UPDATE dati SET `PrivA1`=$PrivA1,`PrivA2`=$PrivA2,`PrivA3`=$PrivA3,`Priv-A1`=$PrivA_1,`Priv-A2`=$PrivA_2,`Priv-A3`=$PrivA_3,`GseA1`=$GseA1,`GseA2`=$GseA2,`GseA3`=$GseA3,`Gse-A1`=$GseA_1,`Gse-A2`=$GseA_2,`Gse-A3`=$GseA_3,`Data`='$Data' where `IdUtente`=$utente and `IdDato`=$IdDato";
        $rs = $con->query($sql);
        if (!$rs)
            die("Errore query. " . $con->errno . " " . $con->error);
        echo("OK");
        $con->close();
    }
}
else
{
    echo("MANCANO PARAMETRI!");
}
?>