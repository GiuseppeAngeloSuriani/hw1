fetch("nulla[5].php").then(onResponse).then(onJson);

function onResponse(response){
  console.log(response);
  return response.json();
}

function onJson(json) {
  console.log(json);
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
    textFavourite.textContent='Aggiungi al carrello';
           
    const immagine = document.createElement('img');
    immagine.src="assets/plus.png";
    immagine.classList.add('plus-image');

    immagine.addEventListener("click", cart);
    image.addEventListener("click", apriModale);

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

function cart(event){
  const selectDiv = event.currentTarget.parentNode;
  const card = selectDiv.parentNode;
  
  const id_contenuto = card.querySelector('.id').textContent;
  const immagine = card.querySelector('img').src;
  const descrizione = card.querySelector('p1').textContent;
  const prezzo = card.querySelector('p').textContent;
  
  fetch("nulla[2].php?id=" + id_contenuto + "&immagine=" + immagine + "&descrizione=" + descrizione + "&prezzo=" + prezzo).then(onResponse);

  const updateSpan=selectDiv.querySelector('span');
  const updateImg=selectDiv.querySelector('img');  

  updateSpan.textContent='Aggiunto al carrello!';
  updateImg.src='assets/carrello.png';
}

function apriModale(event) {
	const image = document.createElement('img');
	image.src = event.currentTarget.src;
	modale.appendChild(image);
	modale.classList.remove('hidden');
	document.body.classList.add('no-scroll');
}

function chiudiModale(event) {
	if (event.key === 'Escape') {
		modale.classList.add('hidden');
		img = modale.querySelector('img');
		img.remove();
		document.body.classList.remove('no-scroll');
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
