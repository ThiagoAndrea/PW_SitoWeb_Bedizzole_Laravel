// Assicurati che il DOM sia pronto per l'esecuzione dello script
document.addEventListener('DOMContentLoaded', function() {
    // Seleziona l'input di ricerca
    const searchInput = document.getElementById('searchInput');
    
    // Aggiungi un event listener per l'evento di input
    searchInput.addEventListener('input', function() {
        // Ottieni il valore dell'input di ricerca
        const searchText = searchInput.value.toLowerCase().trim();
        
        // Seleziona tutte le notizie
        const notizie = document.querySelectorAll('.container-notizia');
        
        // Itera su ogni notizia e mostra/nascondi in base al testo cercato
        notizie.forEach(function(notizia) {
            // Seleziona il titolo della notizia
            const titolo = notizia.querySelector('h3').textContent.toLowerCase();
            
            // Controlla se il titolo contiene il testo cercato
            if (titolo.includes(searchText)) {
                notizia.style.display = 'block';  // Mostra la notizia se corrisponde
            } else {
                notizia.style.display = 'none';   // Nascondi la notizia se non corrisponde
            }
        });
    });
});
