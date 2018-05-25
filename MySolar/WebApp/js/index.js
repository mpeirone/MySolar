$( document ).ready(function() {
    AggiornaCard();
    AggiornaGrafico1();
    AggiornaGrafico2();
    AggiornaGrafico3();
});
function AggiornaCard() {
    console.log( "Aggiorno le card!" );
}
function AggiornaGrafico1() {
    send_request("../PHP/script/MensiliPuliti.php", "POST", "", al);
}
function al(text) {
    alert(text);
}
function  AggiornaGrafico2() {
    console.log( "Aggiorno grafico 2!" );
}
function  AggiornaGrafico3() {
    console.log( "Aggiorno grafico 3!" );
}