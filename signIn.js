function checkName(event) {
    const input = document.querySelector('#name-field');
    const errorSpan = document.querySelector('.name .error-message');
  
    if (input.value.length <= 0) {
      if (!errorSpan) {
        const span = document.createElement('span');
        span.textContent = "Inserire un nome";
        span.classList.add('error-message');
        const div = document.querySelector('.form-group.name');
        div.appendChild(span);
      }
    } else {
      if (errorSpan) {
        errorSpan.remove();
      }
    }
}

function checkSurname(event) {
    const input = document.querySelector('#surname-field');
    const errorSpan = document.querySelector('.surname .error-message');
  
    if (input.value.length <= 0) {
      if (!errorSpan) {
        const span = document.createElement('span');
        span.textContent = "Inserire un cognome";
        span.classList.add('error-message');
        const div = document.querySelector('.form-group.surname');
        div.appendChild(span);
      }
    } else {
      if (errorSpan) {
        errorSpan.remove();
      }
    }    
}

function jsonCheckUsername(json) {
    const errorSpan = document.querySelector('.username .error-message');
    if (json.exists===true) {
        if (!errorSpan) {
            const span = document.createElement('span');
            span.textContent = "Username già usato";
            span.classList.add('error-message');
            const div = document.querySelector('.form-group.username');
            div.appendChild(span);
        }
    } else {
        if (errorSpan) {
            errorSpan.remove();
        }
    }
}

function jsonCheckEmail(json) {
    const errorSpan = document.querySelector('.email .error-message');
    if (json.exists===true) {
        if (!errorSpan) {
            const span = document.createElement('span');
            span.textContent = "Email già utilizzata";
            span.classList.add('error-message');
            const div = document.querySelector('.form-group.email');
            div.appendChild(span);
        }
    } else {
        if (errorSpan) {
            errorSpan.remove();
        }
    }
}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function checkUsername(event) {
    const input = document.querySelector('#username-field');
    const errorSpan = document.querySelector('.username .error-message');
    if ((formStatus['username'] = input.value.length >0) && /^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        fetch("check_username.php?q=" + encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckUsername);
    }else{
            if (!errorSpan) {
                const span = document.createElement('span');
                span.textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
                span.classList.add('error-message');
                const div = document.querySelector('.form-group.username');
                div.appendChild(span);
            } else {
            if (errorSpan) {
                errorSpan.remove();
            }
        }
    }
}

function checkEmail(event) {
    const input = document.querySelector('#email-field');
    const errorSpan = document.querySelector('.email .error-message');
    if ((formStatus['email'] = input.value.length >0) && /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(input.value).toLowerCase())) {
        fetch("check_email.php?q=" + encodeURIComponent(String(input.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }else{
            if (!errorSpan) {
                const span = document.createElement('span');
                span.textContent = "E-mail non valida";
                span.classList.add('error-message');
                const div = document.querySelector('.form-group.email');
                div.appendChild(span);
            } else {
            if (errorSpan) {
                errorSpan.remove();
            }
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

document.querySelector('#name-field').addEventListener('blur', checkName);
document.querySelector('#surname-field').addEventListener('blur', checkSurname);
document.querySelector('#username-field').addEventListener('blur', checkUsername);
document.querySelector('#email-field').addEventListener('blur', checkEmail);
document.querySelector('#password-field').addEventListener('blur', checkPassword);
document.querySelector('#confirm_password-field').addEventListener('blur', checkConfirmPassword);