function checkGiocatore() {
    let nome = $('#nome');
    let cognome = $('#cognome');
    let nome_msg = $("#nome-invalido");
    let cognome_msg = $("#cognome-invalido");
    let data = $('#data_di_nascita');
    let data_msg = $("#data-invalida");
    let idSquadra = $('#id_squadra');
    let squadra_msg = $("#squadra-invalida");
    let error = false;

    nome.on('input', function () {
        if (nome.val().trim() !== "") {
            nome_msg.html("").removeClass("error-span");
        }
    });

    cognome.on('input', function () {
        if (cognome.val().trim() !== "") {
            cognome_msg.html("").removeClass("error-span");
        }
    });

    data.on('input', function () {
        if (data.val().trim() !== "") {
            data_msg.html("").removeClass("error-span");
        }
    });

    idSquadra.on('input', function () {
        if (idSquadra.val() != 0) {
            squadra_msg.html("").removeClass("error-span");
        }
    });



    // Validate fields
    if (nome.val().trim() === "") {
        nome_msg.html("Il nome non può essere vuoto").addClass("error-span");
        nome.focus();
        error = true;
    } else {
        nome_msg.html("").removeClass("error-span");
    }

    if (cognome.val().trim() === "") {
        cognome_msg.html("Il cognome non può essere vuoto").addClass("error-span");
        cognome.focus();
        error = true;
    } else {
        cognome_msg.html("").removeClass("error-span");
    }

    let dataVal = data.val().trim();
    if (dataVal === "") {
        data_msg.html("La data di nascita non può essere vuota").addClass("error-span");
        data.focus();
        error = true;
    } else {
            data_msg.html("").removeClass("error-span");
        }
    
    if(!idSquadra.val()){
        squadra_msg.html("Seleziona una squadra").addClass("error-span");
        idSquadra.focus();
            error = true;
    } else {
        squadra_msg.html("").removeClass("error-span");
    }
        


    if (!error) {
        $('form').submit();
    }
}

function isValidFloat(value) {
    let regex = /^\d+(\.\d{1,2})?$/;
    return regex.test(value);
}


function checkProdotto() {
    let descrizione = $('#descrizione');
    let prezzo = $('#prezzo');
    let taglie = $('input[name="taglie[]"]:checked');
    let descrizione_msg = $("#descrizione-invalida");
    let prezzo_msg = $("#prezzo-invalido");
    let taglie_msg = $("#taglie-invalide");
    let error = false;

    // Reset error messages on input
    descrizione.on('input', function() {
        if (descrizione.val().trim() !== "") {
            descrizione_msg.html("").removeClass("error-span");
        }
    });

    prezzo.on('input', function() {
        let prezzoVal = prezzo.val().trim();
        if (prezzo.val().trim() !== "") {
            if(!isValidFloat(prezzoVal)){
                prezzo_msg.html("Il prezzo deve essere un numero valido con al massimo due decimali").addClass("error-span");
            } else {
            prezzo_msg.html("").removeClass("error-span");
            }
        }
    });

    // Validate fields
    if (descrizione.val().trim() === "") {
        descrizione_msg.html("La descrizione non può essere vuota").addClass("error-span");
        descrizione.focus();
        error = true;
    } else {
        descrizione_msg.html("").removeClass("error-span");
    }

    if (prezzo.val().trim() === "") {
        prezzo_msg.html("Il prezzo non può essere nullo").addClass("error-span");
        prezzo.focus();
        error = true;
    } else if(!isValidFloat(prezzo.val().trim())){
        prezzo_msg.html("Il prezzo deve essere un numero valido con massimo due decimali").addClass("error-span");
        prezzo.focus();
        error = true;
    } else {
        prezzo_msg.html("").removeClass("error-span");
    }

    // Check if at least one taglia is selected
    if (taglie.length === 0) {
        taglie_msg.html("Seleziona almeno una taglia").addClass("error-span");
        error = true;
    } else {
        taglie_msg.html("").removeClass("error-span");
    }

    // Submit form if no errors
    if (!error) {
        $('form').submit();
    }
}

function checkAllenatore(){
    let nome = $('#nome');
    let cognome = $('#cognome');
    let nome_msg = $("#nome-invalido");
    let cognome_msg = $("#cognome-invalido");
    let data = $('#data_di_nascita');
    let data_msg = $("#data-invalida");
    let squadre = $('input[name="squadre[]"]:checked');
    let squadre_msg = $("#squadre-invalide");
    let error = false;

    nome.on('input', function () {
        if (nome.val().trim() !== "") {
            nome_msg.html("").removeClass("error-span");
        }
    });

    cognome.on('input', function () {
        if (cognome.val().trim() !== "") {
            cognome_msg.html("").removeClass("error-span");
        }
    });

    data.on('input', function () {
        if (data.val().trim() !== "") {
            data_msg.html("").removeClass("error-span");
        }
    });

    
    if (nome.val().trim() === "") {
        nome_msg.html("Il nome non può essere vuoto").addClass("error-span");
        nome.focus();
        error = true;
    } else {
        nome_msg.html("").removeClass("error-span");
    }

    if (cognome.val().trim() === "") {
        cognome_msg.html("Il cognome non può essere vuoto").addClass("error-span");
        cognome.focus();
        error = true;
    } else {
        cognome_msg.html("").removeClass("error-span");
    }

    let dataVal = data.val().trim();
    if (dataVal === "") {
        data_msg.html("La data di nascita non può essere vuota").addClass("error-span");
        data.focus();
        error = true;
    } else {
        data_msg.html("").removeClass("error-span");
    }

    
    if (squadre.length === 0) {
        squadre_msg.html("Seleziona almeno una squadra").addClass("error-span");
        error = true;
    } else {
        squadre_msg.html("").removeClass("error-span");
    }

    if (!error) {
        $('form').submit();
    }

}

function checkNotizia(){
    let titolo = $('#titolo');
    let testo = $('#testo');
    let data = $('#data');
    let titolo_msg = $("#titolo-invalido");
    let testo_msg = $("#testo-invalido");
    let data_msg = $("#data-invalida");
    let error = false;

    titolo.on('input', function () {
        if (titolo.val().trim() !== "") {
            titolo_msg.html("").removeClass("error-span");
        } else {
            titolo_msg.html("Il titolo non può essere vuoto").addClass("error-span");
        }});

    testo.on('input', function () {
        if (testo.val().trim() !== "") {
            testo_msg.html("").removeClass("error-span");
        } else {
            testo_msg.html("Il testo non può essere vuoto").addClass("error-span");
        }});

    data.on('input', function () {
        if (data.val().trim() !== "") {
            data_msg.html("").removeClass("error-span");
        } else {
            data_msg.html("La data non può essere vuota").addClass("error-span");
        }});

    if(titolo.val().trim() === ""){
        titolo_msg.html("Il titolo non può essere vuoto").addClass("error-span");
        titolo.focus();
        error = true;
    } else {
        titolo_msg.html("").removeClass("error-span");
    }

    if(testo.val().trim() === ""){
        testo_msg.html("Il testo non può essere vuoto").addClass("error-span");
        testo.focus();
        error = true;
    } else {
        testo_msg.html("").removeClass("error-span");
    }

    if(data.val().trim() === ""){
        data_msg.html("La data non può essere vuota").addClass("error-span");
        data.focus();
        error = true;
    } else {
        data_msg.html("").removeClass("error-span");
    }

    if(!error){
        $('form').submit();
    }
}
