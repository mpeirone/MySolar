function send_request(url,method,parameters,callback) {
    $.ajax({
        url: url,           //pagina php da andare ad eseguire
        type: method,       //POST oppure GET
        data: parameters,   //parametri passati alla pagina php
        timeout: 10000,
        success: callback,  //se php ok si esegue la funzione di callbak jquery
        error: function(str_error){
            alert("Errore! " + str_error);
        }
    });
}