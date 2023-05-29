function search(event) {
    window.alert("Per cercare nello Shop devi prima accedere.");
}

const form = document.querySelector('#search_content');
form.addEventListener('submit', search);