fetch("nulla[3].php").then(onResponse).then(onJson);

function onResponse(response){
    console.log(response);
    return response.json();
}

function onJson(json){
    console.log(json);
    const library = document.querySelector('#results');
    library.innerHTML = '';
    const result = json.length;
    const result0 = Object.keys(json).length;

    if( result0 === 0){
        noResult();
        return;
    }

    for (let i = 0; i < result; i++) {
        const item = json[i];

        const id_contenuto = document.createElement("div");
        id_contenuto.classList.add('id');
        id_contenuto.textContent = item.id_contenuto;

        const card = document.createElement('div');
        card.classList.add('card');

        const image = document.createElement('img');
        image.src = item.immagine;

        const description = document.createElement('p1');
        description.textContent = item.descrizione;
    
        const price = document.createElement('p');
        price.textContent = item.prezzo;
    
        const addFavourite = document.createElement('div');
        addFavourite.classList.add('addFavourite');

        const addRecensione = document.createElement('div');
        addRecensione.classList.add('addFavourite'); 

        const textFavourite = document.createElement('span');
        textFavourite.textContent='Rimuovi dal carrello';

        const recensione = document.createElement('span');
        recensione.textContent='Inserisci una recensione';
            
        const immagine = document.createElement('img');
        immagine.src="assets/deleted.png";
        immagine.classList.add('plus-image');

        const immagine_r = document.createElement('img');
        immagine_r.src="assets/recensione.png";
        immagine_r.classList.add('plus-image');

        immagine.addEventListener("click", remove);
        immagine_r.addEventListener("click", Recensione);

        card.appendChild(image);
        card.appendChild(description);
        card.appendChild(price);
        card.appendChild(addFavourite);
        card.appendChild(addRecensione);
        card.appendChild(id_contenuto);
        addFavourite.appendChild(textFavourite);
        addFavourite.appendChild(immagine);
        addRecensione.appendChild(recensione);
        addRecensione.appendChild(immagine_r);
        library.classList.remove('hidden');

        library.appendChild(card);
    }
}

function remove(event){
    const selectDiv = event.currentTarget.parentNode;
    const card = selectDiv.parentNode;
    
    const id_contenuto = card.querySelector('.id').textContent;

    
    fetch("nulla[4].php?id_contenuto=" + encodeURIComponent(id_contenuto)).then(response => response.json()).then(data => {
    if (data === true) {
      console.log("Cancellazione avvenuta con successo.");
    } else {
      console.log("Si è verificato un errore durante la cancellazione.");
    }
    })

    const resultDiv = document.querySelector('#results');
    const cards = resultDiv.querySelectorAll('.card');
    var allHidden = true;

    for (let i = 0; i < cards.length - 1; i++) {
        const div = cards[i];
        if (!div.classList.contains('hidden')) {
            allHidden = false;
        }else {
            allHidden = true;
        }
    }
    if (allHidden) {
        noResult();
    }
    
    card.classList.add("hidden");
}

function Recensione(event) {
    const selectDiv = event.currentTarget.parentNode;
    const img = event.currentTarget;
    img.removeEventListener("click", Recensione);
    const card = selectDiv.parentNode;
    const form = document.createElement('form');
    const input = document.createElement('input');
    input.type = 'text';
    form.autocomplete = "off";
    form.appendChild(input);
    card.appendChild(form);
    const search_content = document.querySelector("form");
    search_content.addEventListener("submit", search);
}
  
function search(event){
    event.preventDefault();
    const search = document.querySelector('input');
    const selectDiv = event.currentTarget.parentNode;
    const card = selectDiv.parentNode;
  
    const id_contenuto = card.querySelector('.id').textContent;
    const immagine = card.querySelector('img').src;
    const descrizione = card.querySelector('p1').textContent;
    const prezzo = card.querySelector('p').textContent;
    const recensione = search.value;
    fetch("nulla[6].php?id=" + id_contenuto + "&immagine=" + immagine + "&descrizione=" + descrizione + "&prezzo=" + prezzo  + "&recensione=" + recensione).then(onResponse);
    search.value="";
}

function noResult(){
    const div = document.querySelector("#results");
    div.innerHTML="";

    const message = document.createElement('div');
    message.className = "messaggio";
    message.textContent = "Il tuo Carrello è vuoto!";
    div.appendChild(message);
    div.classList.remove('hidden');
}
