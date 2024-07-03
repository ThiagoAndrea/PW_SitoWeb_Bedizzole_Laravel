function checkGiocatore(){
    let nome = $('#nome');
    let cognome = $('#cognome');
    let data= $('#data_di_nascita');
    let nome_msg = $("#nome-invalido");
    let cognome_msg = $("#cognome-invalido");
    let data_msg = $("#data-invalida");
    let error = false;

    // Reset error messages on input
    nome.on('input', function() {
        if(nome.val().trim() !== ""){
            nome_msg.html("").removeClass("error-span");
        }
    });

    cognome.on('input', function() {
        if(cognome.val().trim() !== ""){
            cognome_msg.html("").removeClass("error-span");
        }
    });

    // Validate fields
    if(nome.val().trim() === ""){
        nome_msg.html("Il nome non può essere vuoto").addClass("error-span");
        nome.focus();
        error = true;
    } else {
        nome_msg.html("").removeClass("error-span"); // Clear error message if valid
    }

    if(cognome.val().trim() === ""){
        cognome_msg.html("Il cognome non può essere vuoto").addClass("error-span");
        cognome.focus();
        error = true;
    } else {
        cognome_msg.html("").removeClass("error-span"); // Clear error message if valid
    }

    // Submit form if no errors
    if(!error){
        $('form').submit();
    }
}
