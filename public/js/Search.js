// Assicurati che il DOM sia pronto per l'esecuzione dello script
document.addEventListener('DOMContentLoaded', function() {
    
    const searchInput = document.getElementById('searchInput_notizie');
    searchInput.addEventListener('input', function() {
        const searchText = searchInput.value.toLowerCase().trim();
        const notizie = document.querySelectorAll('.container-notizia');
        
        notizie.forEach(function(notizia) {
            const titolo = notizia.querySelector('h3').textContent.toLowerCase();
    
            if (titolo.includes(searchText)) {
                notizia.style.display = 'block';
            } else {
                notizia.style.display = 'none';
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    
    const searchInput = document.getElementById('searchInput_shop');
    searchInput.addEventListener('input', function() {
        const searchText = searchInput.value.toLowerCase().trim();
        const prodotto = document.querySelectorAll('.selettore-ricerca');
        
        prodotto.forEach(function(prodotto) {
            const titolo = prodotto.querySelector('h3').textContent.toLowerCase();
    
            if (titolo.includes(searchText)) {
                prodotto.style.display = 'block';
            } else {
                prodotto.style.display = 'none';
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    
    const searchInput = document.getElementById('searchInput_allenatori');
    searchInput.addEventListener('input', function() {
        const searchText = searchInput.value.toLowerCase().trim();
        const allenatore = document.querySelectorAll('.selettore-ricerca');
        
        allenatore.forEach(function(allenatore) {
            const nome = allenatore.querySelector('.nome').textContent.toLowerCase();
            const cognome = allenatore.querySelector('.cognome').textContent.toLowerCase();
            const fullName = nome + ' ' + cognome;
            
            if (fullName.includes(searchText)) {
                allenatore.style.display = 'flex';
            } else {
                allenatore.style.display = 'none';
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    
    const searchInput = document.getElementById('searchInput_prodotti');
    searchInput.addEventListener('input', function() {
        const searchText = searchInput.value.toLowerCase().trim();
        const prodotto = document.querySelectorAll('.selettore-ricerca');
        
        prodotto.forEach(function(prodotto) {
            const descrizione = prodotto.querySelector('.descrizione').textContent.toLowerCase();
            
            if (descrizione.includes(searchText)) {
                prodotto.style.display = 'flex';
            } else {
                prodotto.style.display = 'none';
            }
        });
    });
});
