<?php
if(isset($_GET['Id']))
{
    session_start();
    $con=new mysqli("localhost","root","","solardb");
    if($con->connect_errno)
        die("Errore di connessione");

        $utente=$_SESSION["Id"];
        $sql="Delete FROM dati where Iddato= ".$_GET['Id']." and IdUtente=$utente";
        echo($sql);
        $rs=$con->query($sql);
        if(!$rs)
            die("Errore query");
        $con->close();

}
header("location: ../dati.php");
?>