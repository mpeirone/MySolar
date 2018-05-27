
<?php
session_start();
$con=new mysqli("localhost","root","","solardb");
if($con->connect_errno)
    die("null");
    $utente=$_SESSION["Id"];
    $sql="SELECT COUNT(*) AS 'Count',YEAR(`data`)as 'Anno', COALESCE(MAX(`PrivA1`),0)AS 'MaxPrivA1', COALESCE(MAX(`PrivA2`),0)AS 'MaxPrivA2', COALESCE(MAX(`PrivA3`),0)AS 'MaxPrivA3',COALESCE(MAX(`Priv-A1`),0)AS 'MaxPriv-A1', COALESCE(MAX(`Priv-A2`),0)AS 'MaxPriv-A2', COALESCE(MAX(`Priv-A3`),0)AS 'MaxPriv-A3',COALESCE(MAX(`GseA1`),0)AS 'MaxGseA1', COALESCE(MAX(`GseA2`),0)AS 'MaxGseA2', COALESCE(MAX(`GseA3`),0)AS 'MaxGseA3',COALESCE(MAX(`Gse-A1`),0)AS 'MaxGse-A1', COALESCE(MAX(`Gse-A2`),0)AS 'MaxGse-A2', COALESCE(MAX(`Gse-A3`),0)AS 'MaxGse-A3' FROM `dati` WHERE IdUtente=$utente GROUP BY YEAR(`Data`)";
    $rs=$con->query($sql);
    if(!$rs)
        die("null");
    if($rs->num_rows==0)
        echo("null");
    else{
        $vect=[];
        while($record=$rs->fetch_assoc())
            array_push($vect, $record);
        echo(json_encode($vect));
    }
    $con->close();

?>