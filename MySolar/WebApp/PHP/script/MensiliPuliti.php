
<?php
session_start();
$con=new mysqli("localhost","root","","solardb");
if($con->connect_errno)
    die("null");
    $utente=$_SESSION["Id"];
    $sql="SELECT `PrivA1`,`PrivA2`,`PrivA3`,`Priv-A1`,`Priv-A2`,`Priv-A3`,`GseA1`,`GseA2`,`GseA3`,`Gse-A1`,`Gse-A2`,`Gse-A3`,`Data` FROM `dati` WHERE IdUtente=$utente";
    $rs=$con->query($sql);
    if(!$rs)
        die("null");
    else{
        $vectgrezzi=[];
        $vectpuliti=[];
        while($record=$rs->fetch_assoc())
            array_push($vectgrezzi, $record);

        for ($i = 1; $i <= count($vectgrezzi); $i++) {
            $vecttemp=[];
            $vecttemp["PrivA1"]=$vectgrezzi[i]["PrivA1"];
            var_dump($vecttemp);







            array_push($vectpuliti, $vecttemp);
        }
        echo(json_encode($vectpuliti));
    }
    $con->close();
?>