fetch("nulla[0].php").then(json).then(carica);

function json(response){
    return response.json();
}

function carica(json){
    const label = document.querySelectorAll(".value");
    console.log(json);

    label[0].textContent = json.name;
    label[1].textContent = json.surname;
    label[2].textContent = json.username;
    label[3].textContent = json.email;
}


function fetchResponse(response) {
  if (!response.ok) return null;
  return response.json();
}

function checkPasswordOld(event) {
  const input = document.querySelector('#password_old-field');
  if ((formStatus['password_old'] = input.value.length > 0)) {
    fetch("check_password.php?q=" + encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckPassword);
  }
}

function jsonCheckPassword(json) {
  const errorSpan = document.querySelector('.password_old .error-message');

  if (!json) {
    if (!errorSpan) {
      const span = document.createElement('span');
      span.textContent = "Password attuale errata";
      span.classList.add('error-message');
      const div = document.querySelector('.form-group.password_old');
      div.appendChild(span);
    }
  } else {
    if (errorSpan) {
      errorSpan.remove();
    }
  }
}

function checkConfirmPassword(event) {
  const passwordInput = document.querySelector('#password-field');
  const confirmPasswordInput = document.querySelector('#confirm_password-field');
  const errorSpan = document.querySelector('.confirm_password .error-message');

  if (confirmPasswordInput.value !== passwordInput.value) {
    if (!errorSpan) {
      const span = document.createElement('span');
      span.textContent = "Le password non coincidono";
      span.classList.add('error-message');
      const div = document.querySelector('.form-group.confirm_password');
      div.appendChild(span);
    }
  } else {
    if (errorSpan) {
      errorSpan.remove();
    }
  }
}


function checkPassword(event) {
  const passwordInput = document.querySelector('#password-field');
  const errorSpan = document.querySelector('.password .error-message');

  if (passwordInput.value.length < 8) {
    if (!errorSpan) {
      const span = document.createElement('span');
      span.textContent = "La password deve contenere almeno 8 caratteri";
      span.classList.add('error-message');
      const div = document.querySelector('.form-group.password');
      div.appendChild(span);
    }
  } else {
    if (errorSpan) {
      errorSpan.remove();
    }
  }
}


const formStatus = {};

document.querySelector('#password_old-field').addEventListener('blur', checkPasswordOld);
document.querySelector('#password-field').addEventListener('blur', checkPassword);
document.querySelector('#confirm_password-field').addEventListener('blur', checkConfirmPassword);
