$( document ).ready(function() {
    send_request("../PHP/script/UltimiDati.php", "POST", "Data=" +new Date().toISOString().substr(0, 10), Cardegrafico3);
    send_request("../PHP/script/SommeAnnuali.php", "POST", "", AggiornaGrafico2);
    send_request("../PHP/script/MensiliPuliti.php", "POST", "", AggiornaGrafico1);
});
function Cardegrafico3(text){
    AggiornaCard(text);
    AggiornaGrafico3(text);
    $(".last-update").html("Dati aggiornati all'ultima lettura di "+DatetoString($.parseJSON(text)[0]["MaxData"]));
}
function AggiornaCard(text) {
    text=text.replace("\n", "")
    var dati = $.parseJSON(text);
    var Atot,menAtot,prodotta;
    menAtot=parseInt(dati[0]["MaxPriv-A1"])+parseInt(dati[0]["MaxPriv-A2"])+parseInt(dati[0]["MaxPriv-A3"]);
    Atot=parseInt(dati[0]["MaxPrivA1"])+parseInt(dati[0]["MaxPrivA2"])+parseInt(dati[0]["MaxPrivA3"]);
    prodotta=parseInt(dati[0]["MaxGse-A1"])+parseInt(dati[0]["MaxGse-A2"])+parseInt(dati[0]["MaxGse-A3"]);
    $("#AKwTot").html(prodotta);
    $("#APercAutoConsumo").html((((prodotta-menAtot)/(Atot+(prodotta-menAtot)))*100).roundTo(2));
    $("#ASaldo").html(Atot-menAtot);
    $("#AMediaMesile").html((prodotta/parseInt(dati[0]["Count"])).roundTo(2));
}
function AggiornaGrafico1(text) {
    var dati = $.parseJSON(text);
    var energiaprodotta=[],anni=[];

    var anno=new Date(dati[0]["Data"]).getFullYear();
    var index=0;
    do{
            var i=0;
            var temp=[];
            var data;
            while(i<12&&index<dati.length) {
                data=new Date(dati[index]["Data"]);
                if ( data.getMonth()== i&&data.getFullYear()==anno) {
                    temp.push(parseInt(dati[index]["Gse-A1"])+parseInt(dati[index]["Gse-A2"])+parseInt(dati[index]["Gse-A3"]));
                    index++;
                } else {
                    temp.push(null);
                }
                i++;
            }
        anni.push(data.getFullYear());
        energiaprodotta.push(temp);
        anno++;
    }while(index<dati.length);
    var i=0;
    var dataset=[];
    var colori=["rgba(2,117,216,k)","rgba(248,148,6,k)","rgba(39,255,18,k)","rgba(0,255,255,k)"]
    do{
        var set={
            spanGaps: true,
            label: "Kw anno "+anni[anni.length-i-1],
            lineTension: 0.3,
            backgroundColor: colori[i].replace("k","0.2"),
            borderColor: colori[i].replace("k","1"),
            pointRadius: 5,
            pointBackgroundColor: colori[i].replace("k","1"),
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 7,
            pointHoverBackgroundColor: colori[i].replace("k","1"),
            pointHitRadius: 20,
            pointBorderWidth: 2,
            data: energiaprodotta[energiaprodotta.length-i-1],
        };
        dataset.push(set);

        i++;
    }while(i<4||energiaprodotta.length<i)


    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno","Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"],
            datasets: dataset,
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        maxTicksLimit: 5
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: true,
                position:'top'
            }
        }
    });
}
function  AggiornaGrafico2(text) {
    var dati = $.parseJSON(text);
    var anni = [];
    var energiaprodotta = [];
    anni.push(dati[0]["Anno"]);
    energiaprodotta.push(parseInt(dati[0]["MaxGse-A1"]) + parseInt(dati[0]["MaxGse-A2"]) + parseInt(dati[0]["MaxGse-A3"]));
    for (var i = 1; i < dati.length; i++){
    anni.push(dati[i]["Anno"]);
    energiaprodotta.push((parseInt(dati[i]["MaxGse-A1"]) + parseInt(dati[i]["MaxGse-A2"]) + parseInt(dati[i]["MaxGse-A3"]))-(parseInt(dati[i-1]["MaxGse-A1"]) + parseInt(dati[i-1]["MaxGse-A2"]) + parseInt(dati[i-1]["MaxGse-A3"])));}
    var ctx = $("#myBarChart");
    var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: anni,
            datasets: [{
                label: "Kw prodotti",
                backgroundColor: "rgba(2,117,216,1)",
                borderColor: "rgba(2,117,216,1)",
                data: energiaprodotta,
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'year'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        //max: 15000,
                        maxTicksLimit: 5
                    },
                    gridLines: {
                        display: true
                    }
                }],
            },
            legend: {
                display: false
            }
        }
    });
}
function  AggiornaGrafico3(text) {
    var dati = $.parseJSON(text);
    var ctx = $("#myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Autoconsumata in fascia A1", "Autoconsumata in fascia A2", "Autoconsumata in fascia A3", "Venduta in fascia A1","Venduta in fascia A2","Venduta in fascia A3"],
            datasets: [{
                data: [parseInt(dati[0]["MaxGse-A1"])-parseInt(dati[0]["MaxPriv-A1"]), parseInt(dati[0]["MaxGse-A2"])-parseInt(dati[0]["MaxPriv-A2"]), parseInt(dati[0]["MaxGse-A3"])-parseInt(dati[0]["MaxPriv-A3"]), parseInt(dati[0]["MaxPriv-A1"]),parseInt(dati[0]["MaxPriv-A2"]),parseInt(dati[0]["MaxPriv-A3"])],
                backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745','#86E2D5','#F89406'],
            }],
        },
    });

}


function roundTo(decimalpositions)
{
    var i = this * Math.pow(10,decimalpositions);
    i = Math.round(i);
    return i / Math.pow(10,decimalpositions);
}
Number.prototype.roundTo = roundTo;

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