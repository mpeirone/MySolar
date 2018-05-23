
<?php
$con=new mysqli("localhost","Admin","","solardb");
if($con->connect_errno)
    die("Errore connessione database. ".$con->connect_errno." ".$con->connect_error);
$PrivA1=$_POST['PrivA1'];
$PrivA2=$_POST['PrivA2'];
$PrivA3=$_POST['PrivA3'];
$PrivA_1=$_POST['Priv_A3'];
$PrivA_2=$_POST['Priv_A2'];
$PrivA_3=$_POST['Priv_A3'];
$GseA1=$_POST['PrivA1'];
$GseA2=$_POST['PrivA2'];
$GseA3=$_POST['PrivA3'];
$GseA_1=$_POST['Priv_A3'];
$GseA_2=$_POST['Priv_A2'];
$GseA_3=$_POST['Priv_A3'];
$Data=$_POST['Data'];
$utente=1;//$_SESSION["Id"];
$sql="INSERT INTO dati (`IdUtente`,`PrivA1`,`PrivA2`,`PrivA3`,`Priv-A1`,`Priv-A2`,`Priv-A3`,`GseA1`,`GseA2`,`GseA3`,`Gse-A1`,`Gse-A2`,`Gse-A3`,`Data`) VALUES (".$utente.",".$PrivA1.",".$PrivA2.",".$PrivA3.",".$PrivA_1.",".$PrivA_2.",".$PrivA_3.",".$GseA1.",".$GseA2.",".$GseA3.",".$GseA_1.",".$GseA_2.",".$GseA_3.",".$Data.")";
echo($sql);
$con->query($sql);
$con->close();
/*<?php
$con=new mysqli("localhost","Admin","","solardb");
if($con->connect_errno)
    die("Errore connessione database. ".$con->connect_errno." ".$con->connect_error);
$sql="INSERT INTO dati (`IdUtente`,`PrivA1`,`PrivA2`,`PrivA3`,`Priv-A1`,`Priv-A2`,`Priv-A3`,`GseA1`,`GseA2`,`GseA3`,`Gse-A1`,`Gse-A2`,`Gse-A3`) VALUES (1".$_GET['PrivA1'].$_GET['PrivA2'].$_GET['PrivA3'].$_GET['PrivA11'].$_GET['PrivA21'].$_GET['PrivA31'].$_GET['GseA1'].$_GET['GseA2'].$_GET['GseA3'].$_GET['GseA11'].$_GET['GseA21'].$_GET['GseA31'].")";
$con->query($sql);
$con->close();*/