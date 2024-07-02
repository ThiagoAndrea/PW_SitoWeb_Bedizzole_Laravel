function checkGiocatore(){
    nome = $('#nome');
    nome_msg = $("#nome-invalido");
    error = false;

    if(nome.val().trim()===""){
        nome_msg.html("Il nome non può essere vuoto");
        nome.focus();
        error = true;
    }

    if(!error){
        $('form').submit();
    }
}