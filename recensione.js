function onResponse(response){
  console.log(response);
  return response.json();
}

function onJson(json) {
  const library = document.querySelector('#results');
  library.innerHTML = '';
  const result = json.length;

  if(result === 0){
    alert("Non ci sono elementi corrispondenti alla tua ricerca");
  }

  for (let i = 0; i < result; i++) {
    const item = json[i];

    const id = document.createElement("div");
    id.classList.add('id');
    id.textContent = item.id;

    const card = document.createElement('div');
    card.classList.add('card');

    const image = document.createElement('img');
    image.src = item.immagine;

    const description = document.createElement('p1');
    description.textContent = item.descrizione;

    const price = document.createElement('p');
    price.textContent = "€" + item.prezzo;

    const addFavourite = document.createElement('div');
    addFavourite.classList.add('addFavourite');

    const textFavourite = document.createElement('span');
    textFavourite.textContent='Visualizza recensioni';
           
    const immagine = document.createElement('img');
    immagine.src="assets/recensione.png";
    immagine.classList.add('plus-image');

    immagine.addEventListener("click", Recensioni);

    card.appendChild(image);
    card.appendChild(description);
    card.appendChild(price);
    card.appendChild(addFavourite);
    card.appendChild(id);
    addFavourite.appendChild(textFavourite);
    addFavourite.appendChild(immagine);
    library.classList.remove('hidden');

    library.appendChild(card);
  }
}

function onJsonRecensioni(json){
    const result = json.length;

    if(result === 0){
        alert("Non ci sono recensioni per questo elemento");
    }
    const card = document.createElement('div');
    card.classList.add('card');

    const image = document.createElement('img');
    image.src = json[0].immagine;
    card.appendChild(image);

    const description = document.createElement('p1');
    description.textContent = json[0].descrizione;
    card.appendChild(description);

    const price = document.createElement('p');
    price.textContent = json[0].prezzo;
    card.appendChild(price);

    const textFavourite = document.createElement('span');
    textFavourite.textContent='RECENSIONI:';       
    card.appendChild(textFavourite);

    for (let i = 0; i < result; i++) {
        const item = json[i];

        const addFavourite = document.createElement('div');
        addFavourite.classList.add("addFavourite");
        

        const nome = document.createElement('span');
        nome.textContent = item.username + ":";
        nome.classList.add("addFavourite")

        const recensione = document.createElement('span');
        recensione.textContent = item.recensione;
        nome.classList.add("addFavourite");
    
        
        addFavourite.appendChild(nome);
        addFavourite.appendChild(recensione);
        card.appendChild(addFavourite);
        
    }
    modale.classList.remove('hidden');
    modale.appendChild(card);
    document.body.classList.add('no-scroll');
}

function Recensioni(event){
    const selectDiv = event.currentTarget.parentNode;
    const card = selectDiv.parentNode;
  
    const id_contenuto = card.querySelector('.id').textContent;
    fetch("nulla[7].php?id_contenuto=" + id_contenuto).then(onResponse).then(onJsonRecensioni);
}

function chiudiModale(event) {
	if (event.key === 'Escape') {
		modale.classList.add('hidden');
		img = modale.querySelector('img');
		img.remove();
		document.body.classList.remove('no-scroll');
        modale.innerHTML="";
	}
}

function search(event){
  event.preventDefault();
  const content = document.querySelector('.search').value;
  if(!content){
    alert("Non ci sono elementi corrispondenti alla tua ricerca");
  }
  fetch("nulla[1].php?descrizione=" + content).then(onResponse).then(onJson)
}


const search_content = document.querySelector("#barra");
search_content.addEventListener("submit", search);
window.addEventListener('keydown', chiudiModale);
