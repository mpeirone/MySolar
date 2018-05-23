$( document ).ready(function() {
/*    ImpostaMin();
    AggiornaGrafico1();
    AggiornaGrafico2();
    AggiornaGrafico3();*/
    $("#btnLettura").on("click",function ()
    {
        if($("#numPrivA1").val()!=""&&$("#numPrivA2").val()!=""&&$("#numPrivA3").val()!=""&&$("#numPriv-A1").val()!=""&&$("#numPriv-A2").val()!=""&&$("#numPriv-A3").val()!=""&&$("#numGseA1").val()!=""&&$("#numGseA2").val()!=""&&$("#numGseA3").val()!=""&&$("#numGse-A1").val()!=""&&$("#numGse-A2").val()!=""&&$("#numGse-A3").val()!="")
            send_request("../PHP/scrivi.php","POST","PrivA1="+$("#numPrivA1").val()+"&PrivA2="+$("#numPrivA2").val()+"&PrivA3="+$("#numPrivA3").val()+"&Priv_A1="+$("#numPriv-A1").val()+"&Priv_A2="+$("#numPriv-A2").val()+"&Priv_A3="+$("#numPriv-A3").val()+"&GseA1="+$("#numGseA1").val()+"&GseA2="+$("#numGseA2").val()+"&GseA3="+$("#numGseA3").val()+"&Gse_A1="+$("#numGse-A1").val()+"&Gse_A2="+$("#numGse-A2").val()+"&Gse_A3="+$("#numGse-A3").val()+"Data:"+$("#data"),leggi);
        else
            alert("Dati non inseriti correttamente");
    });
});
function ImpostaMin() {
    console.log( "Imposto i min!" );
}
function leggi() {
    //non ho idea di cosa fare qui;
}
function  AggiornaGrafico2() {
    console.log( "Aggiorno grafico 2!" );
}
function  AggiornaGrafico3() {
    console.log( "Aggiorno grafico 3!" );
}