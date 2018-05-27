$( document ).ready(function() {
    send_request("../PHP/script/UltimiDati.php", "POST", "Data=" +new Date().toISOString().substr(0, 10), Cardegrafico3);
    send_request("../PHP/script/SommeAnnuali.php", "POST", "", AggiornaGrafico2);
    send_request("../PHP/script/MensiliPuliti.php", "POST", "", AggiornaGrafico1);
});
function Cardegrafico3(text){
    AggiornaCard(text);
    AggiornaGrafico3(text);
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
    var energiaprodotta=[];

    var anno=new Date(dati[0]["Data"]).getFullYear();
    var index=0;
    do{
            var i=0;
            var temp=[];
            while(i<12&&index<dati.length) {
                var data=new Date(dati[index]["Data"]);
                if ( data.getMonth()== i&&data.getFullYear()==anno) {
                    temp.push(dati[index]["PrivA2"]);
                    index++;
                } else {
                    temp.push(null);
                }
                i++;
            }

        energiaprodotta.push(temp);
        anno++;
    }while(index<dati.length);



    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno","Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"],
            datasets: [{
                spanGaps: true,
                label: "Kw prodotti",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 7,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 20,
                pointBorderWidth: 2,
                data: [10000, null, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651,21000],
            },],
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
                        max: 40000,
                        maxTicksLimit: 5
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: false
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
                label: "Revenue",
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
                backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745','#FF53FF','#000000'],
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