
$( document ).ready(function () {
    resetErrori();
    send_request("../PHP/script/UltimiDati.php", "POST", "Data=" +(String($("#DataLettura").val()).substr(0,8))+"01", ImpostaMin);
    $("#btnLettura").click(InviaDati);

});




function InviaDati() {
    var errore=false;
    $("[name=selection]").each(function () {
        if($(this).val()=="")
        {
            $(this).css("border-color","#ff0000");
            $("#lblerrore").html("Errore, non tutti i dati sono stati inseriti");
            $("#lblerrore").css("color","red");
            errore=true;
        }else if($(this).val()<$(this).prop("min"))
        {
            $(this).css("border-color","#ff0000");
            $("#lblerrore").html("Alcuni dati non sono corretti rispetto alla lettura precedente!");
            $("#lblerrore").css("color","red");
            errore=true;
        }});
    if(!errore) {
        send_request("../PHP/script/modifica.php", "POST", "PrivA1=" + $("#numPrivA1").val() + "&PrivA2=" + $("#numPrivA2").val() + "&PrivA3=" + $("#numPrivA3").val() + "&Priv_A1=" + $("#numPriv-A1").val() + "&Priv_A2=" + $("#numPriv-A2").val() + "&Priv_A3=" + $("#numPriv-A3").val() + "&GseA1=" + $("#numGseA1").val() + "&GseA2=" + $("#numGseA2").val() + "&GseA3=" + $("#numGseA3").val() + "&Gse_A1=" + $("#numGse-A1").val() + "&Gse_A2=" + $("#numGse-A2").val() + "&Gse_A3=" + $("#numGse-A3").val() + "&IdDato=" + $("#IdDato").html() + "&Data=" + (String($("#DataLettura").val()).substr(0, 8)) + "01", Risposta);
    }
    else
    {
        $("#lblerrore").html("Inserire tutti i dati");
        $("#lblerrore").css("color","red");
    }

}
$("#DataLettura").on("change",function () {
    send_request("../PHP/script/UltimiDati.php", "POST", "Data=" +(String($("#DataLettura").val()).substr(0,8))+"01", ImpostaMin);
});

$(".form-control").on("change",function () {
    //alert("Valore: "+$(this).val()+" Minimo: "+$(this).prop("min"));
    if($(this).val()<$(this).prop("min")||$(this).val()=="")
    {
        $(this).css("border-color","#ff0000");
    }
    else
        $(this).css("border-color","");

});
function resetErrori() {
    $(".form-control").css("border-color","");
    $("#lblerrore").html("")
}
function Risposta(responseText){
    responseText=responseText.replace("\n","").replace("\r","");
    if(responseText=="Data esistente")
    {
        $("#lblerrore").html("Data già inserita, controllare sull'apposita pagina");
    }
    else if(responseText=="MANCANO PARAMETRI!")
    {
        $("#lblerrore").html("Mancano dei dati");
    }
    else if(responseText=="OK")
    {
        $("#lblerrore").html("Dati aggiornati");
        $("#lblerrore").css("color","green");
    }else{
        $("#lblerrore").html("Errore generico");
        $("#lblerrore").css("color","red");
    }
}
function ImpostaMin(responseText)
{
    if(responseText=="null")
    {
        $("#btnLettura").prop("disabled",true);
    }else
    {
        var jsonMinimi=JSON.parse(responseText);
        $("#numPrivA1").prop("min",jsonMinimi[0]["MaxPrivA1"]);
        $("#numPrivA2").prop("min",jsonMinimi[0]["MaxPrivA2"]);
        $("#numPrivA3").prop("min",jsonMinimi[0]["MaxPrivA3"]);
        $("#numPriv-A1").prop("min",jsonMinimi[0]["MaxPriv-A1"]);
        $("#numPriv-A2").prop("min",jsonMinimi[0]["MaxPriv-A2"]);
        $("#numPriv-A3").prop("min",jsonMinimi[0]["MaxPriv-A3"]);
        $("#numGseA1").prop("min",jsonMinimi[0]["MaxGseA1"]);
        $("#numGseA2").prop("min",jsonMinimi[0]["MaxGseA2"]);
        $("#numGseA3").prop("min",jsonMinimi[0]["MaxGseA3"]);
        $("#numGse-A1").prop("min",jsonMinimi[0]["MaxGse-A1"]);
        $("#numGse-A2").prop("min",jsonMinimi[0]["MaxGse-A2"]);
        $("#numGse-A3").prop("min",jsonMinimi[0]["MaxGse-A3"]);
        $("[name=selection]").each(function ()
        {
            $(this).value="";
        });
    }
}