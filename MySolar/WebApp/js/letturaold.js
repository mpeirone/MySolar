$( document ).ready(function() {
    $("#DataLettura").on("change",function () {
        send_request("../PHP/script/UltimiDati.php", "POST", "Data=" +(String($("#DataLettura").val()).substr(0,8))+"01", ImpostaMin);
    });

    $("#btnLettura").click(function ()
    {
        resetErrori();
        if($("#numPrivA1").val()=="")
        {
            $("#numPrivA1").css("border-color","#a94442");
        }
        if($("#numPrivA2").val()==""){
            $("#numPrivA2").css("border-color","#a94442");
        }
        if($("#numPrivA3").val()==""){
            $("#numPrivA3").css("border-color","#a94442");
        }
        if($("#numPriv-A1").val()==""){
            $("#numPriv-A1").css("border-color","#a94442");
        }
        if($("#numPriv-A2").val()==""){
            $("#numPriv-A2").css("border-color","#a94442");
        }
        if($("#numPriv-A3").val()==""){
            $("#numPriv-A3").css("border-color","#a94442");
        }
        if($("#numGseA1").val()==""){
            $("#numGseA1").css("border-color","#a94442");
        }
        if($("#numGseA2").val()==""){
            $("#numGseA2").css("border-color","#a94442");
        }
        if($("#numGseA3").val()==""){
            $("#numGseA3").css("border-color","#a94442");
        }
        if($("#numGse-A1").val()==""){
            $("#numGse-A1").css("border-color","#a94442");
        }
        if($("#numGse-A2").val()==""){
            $("#numGse-A2").css("border-color","#a94442");
        }
        if($("#numGse-A3").val()==""){
            $("#numGse-A3").css("border-color","#a94442");
        }
        if($("#DataLettura").val()==""){
            $("#DataLettura").css("border-color","#a94442");
        }
        if($("#numPrivA1").val()!=""&&$("#numPrivA2").val()!=""&&$("#numPrivA3").val()!=""&&$("#numPriv-A1").val()!=""&&$("#numPriv-A2").val()!=""&&$("#numPriv-A3").val()!=""&&$("#numGseA1").val()!=""&&$("#numGseA2").val()!=""&&$("#numGseA3").val()!=""&&$("#numGse-A1").val()!=""&&$("#numGse-A2").val()!=""&&$("#numGse-A3").val()!=""&&$("#DataLettura").val()!="") {
            {
                    //if($("#numPrivA1").val()>$("#numPrivA1").prop("min")&&$("#numPrivA2").val()>$("#numPrivA2").prop("min")&&$("#numPrivA3").val()>$("#numPrivA3").prop("min")&&$("#numPriv-A1").val()>$("#numPriv-A1").prop("min")&&$("#numPriv-A2").val()>$("#numPriv-A2").prop("min")&&$("#numPriv-A3").val()>$("#numPriv-A3").prop("min")&&$("#numGseA1").val()>$("#numGseA1").prop("min")&&$("#numGseA2").val()>$("#numGseA2").prop("min")&&$("#numGseA3").val()>$("#numGseA3").prop("min")&&$("#numGse-A1").val()>$("#numGse-A1").prop("min")&&$("#numGse-A2").val()>$("#numGse-A2").prop("min")&&$("#numGse-A3").val()>$("#numGse-A3").prop("min"))
                    //{
                        send_request("../PHP/script/scrivi.php", "POST", "PrivA1=" + $("#numPrivA1").val() + "&PrivA2=" + $("#numPrivA2").val() + "&PrivA3=" + $("#numPrivA3").val() + "&Priv_A1=" + $("#numPriv-A1").val() + "&Priv_A2=" + $("#numPriv-A2").val() + "&Priv_A3=" + $("#numPriv-A3").val() + "&GseA1=" + $("#numGseA1").val() + "&GseA2=" + $("#numGseA2").val() + "&GseA3=" + $("#numGseA3").val() + "&Gse_A1=" + $("#numGse-A1").val() + "&Gse_A2=" + $("#numGse-A2").val() + "&Gse_A3=" + $("#numGse-A3").val() + "&Data=" + (String($("#DataLettura").val()).substr(0, 8)) + "01", analizza);
                    //}else
                    //{
                       // $("#lblerrore").html("Errore,alcuni dati inseriti sono maggiori di quelli presenti in una lettura precedente");
                       // $("#lblerrore").css("color","red");
                    //}

                    }
            }else{
                $("#lblerrore").html("Errore, non tutti i dati sono stati inseriti");
                $("#lblerrore").css("color","red");
        }

    });
    DataOdierna();
    resetErrori();
    send_request("../PHP/script/UltimiDati.php", "POST", "Data=" +(String($("#DataLettura").val()).substr(0,8))+"01", ImpostaMin);
        if($(".form-control").val()=="1"){
            $(this).css("border-color","#a94442");
        }
});

$(".form-control").on("change",function () {
    if($(this).val()<$(this).prop("min"))
        $(this).css("border-color","#a94442");
});


function resetErrori() {
    $(".form-control").css("border-color","");
    $("#lblerrore").html("")
}
function DataOdierna() {
    var now = new Date();
    var data=now.toISOString().substr(0, 10);
    $("#DataLettura").val(data);
    $("#DataLettura").prop("max",data);
}
function ImpostaMin(responseText) {
    if(responseText=="null"){
        $("#btnLettura").prop("disabled",true);
    }else{
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
    }

}
function analizza(responseText) {
    alert(responseText);
    if(responseText!="\r\nok"){
        alert("Errore durante l'inserimento dati, se il problema persiste contatta l'assistenza");}
        else
            {
                $(".form-control").val("");
                $("#lblerrore").html("Dati inseriti in modo corretto");
                $("#lblerrore").css("color","green");
        }
    }
function  AggiornaGrafico2() {
    console.log( "Aggiorno grafico 2!" );
}
function  AggiornaGrafico3() {
    console.log( "Aggiorno grafico 3!" );
}