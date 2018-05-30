var dati;
var dataset=[];
$( document ).ready(function() {
    $("#containergrafico").hide();
    send_request("../PHP/script/MensiliPuliti.php", "POST", "", impostaMassimiMinimi);

});

$("#btnLettura").click(function () {
    dataset=[];
    $("#lblerrore").html("");
    $("#lblerrore").css("color","red");
    var indici=[];
    if($("#mese1").val()!=""&&$("#mese2").val()!="")
    {
        if((String($("#mese1").val()).substr(0,8))!=(String($("#mese2").val()).substr(0,8)))
        {
            for(var i=0;i<dati.length;i++)
            {
                if((dati[i]["Data"].substr(0,8))==(String($("#mese1").val()).substr(0,8))||(dati[i]["Data"].substr(0,8))==(String($("#mese2").val()).substr(0,8)))
                {
                    indici.push(i);
                }
            }
            if(indici.length>=2)
            {
                for(var i=0;i<2;i++)
                {
                    var mese=[];
                    var menAtot=dati[indici[i]]["Priv-A1"]+dati[indici[i]]["Priv-A2"]+dati[indici[i]]["Priv-A3"];
                    var Atot=dati[indici[i]]["PrivA1"]+dati[indici[i]]["PrivA2"]+dati[indici[i]]["PrivA3"];
                    var prodotta=dati[indici[i]]["Gse-A1"]+dati[indici[i]]["Gse-A2"]+dati[indici[i]]["Gse-A3"];
                    mese.push(menAtot);
                    mese.push(Atot);
                    mese.push(-(Atot-menAtot));
                    mese.push(prodotta);
                    mese.push((prodotta-menAtot));
                    mese.push(Atot+(prodotta-menAtot));
                    mese.push(dati[indici[i]]["Data"]);
                    dataset.push(mese)
                }
                var ctx = $("#myBarChart");
                var myLineChart= new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Energia Venduta', 'Energia comprata', 'Saldo', 'Energia prodotta', 'Autoconsumo', 'Energia Consumata'],
                    datasets: [{
                        label: DatetoString(dataset[0][6]),
                        backgroundColor: "rgba(255,0,0,0.5)",
                        borderColor: "red",
                        borderWidth: 1,
                        data: dataset[0]
                    }, {
                        label: DatetoString(dataset[1][6]),
                        backgroundColor: "rgba(0,0,255,0.3)",
                        borderColor: "blue",
                        borderWidth: 1,
                        data: dataset[1]
                    }]

                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: false
                    }
                }
            });
                $("#containergrafico").show();




            }else {
                if(indici.length==0)
                    $("#lblerrore").html("Attenzione, nessuna dei mesi inseriti contiene dati");
                else{
                    if((dati[indici[0]]["Data"].substr(0,8))==(String($("#mese1").val()).substr(0,8)))
                        $("#lblerrore").html("Attenzione, la seconda data immessa non è valida");
                    else
                        $("#lblerrore").html("Attenzione, la prima data immessa non è valida");
                }

            }
        }else
        {
            $("#lblerrore").html("Attenzione, stai confrontando lo stesso mese");

        }

    }else
    {
        $("#lblerrore").html("Attenzione, non hai inserito entrambe le date");
    }
});



function impostaMassimiMinimi(text) {
    dati = $.parseJSON(text);
    $(".date").prop("min",dati[0]["Data"]);
    $(".date").prop("max",new Date().toISOString().substr(0, 10));
}
function DatetoString(Data)
{
    var d = new Date(Data);
    var mese = d.getMonth()+1;
    var month="";
    switch(mese)
    {
        case 1:
            month="Gennaio";
            break;
        case 2:
            month="Febbraio";
            break;
        case 3:
            month="Marzo";
            break;
        case 4:
            month="Aprile";
            break;
        case 5:
            month="Maggio";
            break;
        case 6:
            month="Giugno";
            break;
        case 7:
            month="Luglio";
            break;
        case 8:
            month="Agosto";
            break;
        case 9:
            month="Settembre";
            break;
        case 10:
            month="Ottobre";
            break;
        case 11:
            month="Novembre";
            break;
        case 12:
            month="Dicembre";
            break;
    }
    return month+" "+d.getFullYear();

}