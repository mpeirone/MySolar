$(document).ready(function() {
    $('#dataTable').hide();
    send_request("../PHP/script/MensiliPuliti.php", "POST", "", DatiTabella);





} );


function DatiTabella(Text) {
    var dati = $.parseJSON(Text);
    var riga,Atot,menAtot,prodotta;
    for(var i=0;i<dati.length;i++){
        menAtot=dati[i]["Priv-A1"]+dati[i]["Priv-A2"]+dati[i]["Priv-A3"];
        Atot=dati[i]["PrivA1"]+dati[i]["PrivA2"]+dati[i]["PrivA3"];
        prodotta=dati[i]["Gse-A1"]+dati[i]["Gse-A2"]+dati[i]["Gse-A3"];
        riga=$("<tr></tr>")
        riga.append($("<td>"+dati[i]["Data"]+"</td>"));
        riga.append($("<td>"+menAtot+"</td>"));
        riga.append($("<td>"+(Atot)+"</td>"));
        riga.append($("<td>"+-(Atot-menAtot)+"</td>"));
        riga.append($("<td>"+prodotta+"</td>"));
        riga.append($("<td>"+(prodotta-menAtot)+"</td>"));
        riga.append($("<td>"+(Atot+(prodotta-menAtot))+"</td>"));
        riga.append($("<td>"+(((prodotta-menAtot)/(Atot+(prodotta-menAtot)))*100).roundTo(2)+"%</td>"));
        riga.append($("<td><a href='./script/Rimuovi.php?Id="+dati[i]["IdDato"]+"' style='color:black'><i class='fas fa-pencil-alt'></i></a> <a href='./script/Rimuovi.php?Id="+dati[i]["IdDato"]+"' style='color:black'><i class='fas fa-times'></i></a>"));
        $('#TBodyDati').append(riga);
    }




    $('#dataTable').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Italian.json"
        }
    } );
    $('#dataTable').show();
}

function roundTo(decimalpositions)
{
    var i = this * Math.pow(10,decimalpositions);
    i = Math.round(i);
    return i / Math.pow(10,decimalpositions);
}
Number.prototype.roundTo = roundTo;