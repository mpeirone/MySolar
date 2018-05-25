
<?php
session_start();
$con=new mysqli("localhost","root","","solardb");
if($con->connect_errno)
    die("null");
    $utente=$_SESSION["Id"];
    $sql="SELECT `IdDato`,`PrivA1`,`PrivA2`,`PrivA3`,`Priv-A1`,`Priv-A2`,`Priv-A3`,`GseA1`,`GseA2`,`GseA3`,`Gse-A1`,`Gse-A2`,`Gse-A3`,`Data` FROM `dati` WHERE IdUtente=$utente";
    $rs=$con->query($sql);
    if(!$rs)
        die("null");
    else{
        $vectgrezzi=[];
        $vectpuliti=[];
        while($record=$rs->fetch_assoc())
            array_push($vectgrezzi, $record);


        $vecttemp=[];
        $i = 0;
        $vecttemp["PrivA1"]=(int)$vectgrezzi[$i]["PrivA1"];
        $vecttemp["PrivA2"]=(int)$vectgrezzi[$i]["PrivA2"];
        $vecttemp["PrivA3"]=(int)$vectgrezzi[$i]["PrivA3"];
        $vecttemp["Priv-A1"]=(int)$vectgrezzi[$i]["Priv-A1"];
        $vecttemp["Priv-A2"]=(int)$vectgrezzi[$i]["Priv-A2"];
        $vecttemp["Priv-A3"]=(int)$vectgrezzi[$i]["Priv-A3"];
        $vecttemp["GseA1"]=(int)$vectgrezzi[$i]["GseA1"];
        $vecttemp["GseA2"]=(int)$vectgrezzi[$i]["GseA2"];
        $vecttemp["GseA3"]=(int)$vectgrezzi[$i]["GseA3"];
        $vecttemp["Gse-A1"]=(int)$vectgrezzi[$i]["Gse-A1"];
        $vecttemp["Gse-A2"]=(int)$vectgrezzi[$i]["Gse-A2"];
        $vecttemp["Gse-A3"]=(int)$vectgrezzi[$i]["Gse-A3"];
        $vecttemp["Data"]=$vectgrezzi[$i]["Data"];
        $vecttemp["IdDato"]=(int)$vectgrezzi[$i]["IdDato"];
        array_push($vectpuliti, $vecttemp);
        for ($i = 1; $i <= count($vectgrezzi)-1; $i++) {
            $vecttemp=[];
            $vecttemp["PrivA1"]=$vectgrezzi[$i]["PrivA1"]-$vectgrezzi[$i-1]["PrivA1"];
            $vecttemp["PrivA2"]=$vectgrezzi[$i]["PrivA2"]-$vectgrezzi[$i-1]["PrivA2"];
            $vecttemp["PrivA3"]=$vectgrezzi[$i]["PrivA3"]-$vectgrezzi[$i-1]["PrivA3"];
            $vecttemp["Priv-A1"]=$vectgrezzi[$i]["Priv-A1"]-$vectgrezzi[$i-1]["Priv-A1"];
            $vecttemp["Priv-A2"]=$vectgrezzi[$i]["Priv-A2"]-$vectgrezzi[$i-1]["Priv-A2"];
            $vecttemp["Priv-A3"]=$vectgrezzi[$i]["Priv-A3"]-$vectgrezzi[$i-1]["Priv-A3"];
            $vecttemp["GseA1"]=$vectgrezzi[$i]["GseA1"]-$vectgrezzi[$i-1]["GseA1"];
            $vecttemp["GseA2"]=$vectgrezzi[$i]["GseA2"]-$vectgrezzi[$i-1]["GseA2"];
            $vecttemp["GseA3"]=$vectgrezzi[$i]["GseA3"]-$vectgrezzi[$i-1]["GseA3"];
            $vecttemp["Gse-A1"]=$vectgrezzi[$i]["Gse-A1"]-$vectgrezzi[$i-1]["Gse-A1"];
            $vecttemp["Gse-A2"]=$vectgrezzi[$i]["Gse-A2"]-$vectgrezzi[$i-1]["Gse-A2"];
            $vecttemp["Gse-A3"]=$vectgrezzi[$i]["Gse-A3"]-$vectgrezzi[$i-1]["Gse-A3"];
            $vecttemp["Data"]=$vectgrezzi[$i]["Data"];
            $vecttemp["IdDato"]=(int)$vectgrezzi[$i]["IdDato"];
            array_push($vectpuliti, $vecttemp);
        }
        echo(json_encode($vectpuliti));
    }
    $con->close();
?>