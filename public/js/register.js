const registerForm = document.querySelector('#email-form-2');
registerForm.addEventListener('submit', function(e){
    e.preventDefault();

    startLoadingAnimation();

    const registerErrorDiv = document.querySelector('#register-error-div');
    const registerErrorDiv2 = registerErrorDiv.querySelector('#register-error-div2');
    registerErrorDiv2.classList.remove("animate");
    registerErrorDiv.style.display = "none";

    const username = registerForm.querySelector('#signup-username').value;
    const email = registerForm.querySelector('#signup-email').value;
    const password = registerForm.querySelector('#signup-password').value;
    const repeatedPassword = registerForm.querySelector('#signup-repeaterpassword').value;

    if(password === repeatedPassword){
        register(username, email, password, repeatedPassword);
    }
});
function startLoadingAnimation(){
    var submitButton = document.querySelector("#register-submit");
    const originalValue = submitButton.value;
    const waitImage = new Image();
    waitImage.src = submitButton.getAttribute('data-wait');

    submitButton.value = '';

    submitButton.style.backgroundImage = `url('${waitImage.src}')`;
    submitButton.style.backgroundSize = '7%';
    submitButton.style.backgroundRepeat = 'no-repeat';
    submitButton.style.backgroundPosition = 'center';
}
function stopLoadingAnimation(){
    var submitButton = document.querySelector("#register-submit");
    submitButton.value = submitButton.getAttribute('data-value');
    submitButton.style.backgroundImage = 'none';
}
function register(username, email, password, repeatedPassword){
    fetch('../app/controllers/userController.php',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            action: 'register',
            username: username,
            email: email,
            password: password,
            repeatedPassword: repeatedPassword,
        })
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Doslo je do greske prilikom prihvatanja zahteva.');
        }
    })
    .then(data => { 
        console.log(data);
        stopLoadingAnimation();
        if(data.status === 'error'){
            console.log(data.message);
            showNotification(1, data.message);
        }else{
            console.log('Uspesna registracija');
            //window.location.href = "../views/index.php";
            showNotification(2, email);
        }
    })
    .catch(error => {
        console.log('Greska:', error);
    });
}

function showNotification(action, data){
    const registerErrorDiv = document.querySelector('#register-error-div');
    registerErrorDiv.style.display = 'block';
    setTimeout(()=>{
        const registerErrorDiv2 = registerErrorDiv.querySelector('#register-error-div2');
        const registerError = registerErrorDiv.querySelector('#register-error');
        const boldText= registerError.querySelector('b');
        const errorText = registerError.querySelector('span');

        if(action === 1){
            errorText.innerHTML = data;
        }else{
            boldText.innerHTML = "Obaveštenje";
            errorText.innerHTML = `Uspešno ste se registrovali. Na Vašu email adresu (${data}) smo poslasli verifikacioni link. Molimo vas da verifikujete email adresu a nakon toga ćete moći da se prijavite.`;
        }

        registerErrorDiv2.classList.toggle('animate');
    }, 50);
}

const registerShowPassword = document.querySelector('#register-show-password');
const registerHidePassword = document.querySelector('#register-hide-password');
const password = registerForm.querySelector('#signup-password');

registerShowPassword.addEventListener('click', function(){
    this.style.display = "none";
    registerHidePassword.style.display = "block";
    password.type = "text";
});
registerHidePassword.addEventListener('click', function(){
    this.style.display = "none";
    registerShowPassword.style.display = "block";
    password.type = "password";
});

const registerShowRepeatedPassword = document.querySelector('#register-show-repeated-password');
const registerHideRepeatedPassword = document.querySelector('#reqister-hide-repeated-password');
const repeatedPassword = registerForm.querySelector('#signup-repeaterpassword')

registerShowRepeatedPassword.addEventListener('click', function(){
    this.style.display = "none";
    registerHideRepeatedPassword.style.display = "block";
    repeatedPassword.type = "text";
});
registerHideRepeatedPassword.addEventListener('click', function(){
    this.style.display = "none";
    registerShowRepeatedPassword.style.display = "block";
    repeatedPassword.type = "password";
});