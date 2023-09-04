<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <?php echo $__env->make('links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Polovni Telefoni</title>
    <link href="<?php echo e(asset('css/my-account-style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/loading-style.css')); ?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
</head>
<body>
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
    <div style="height: 60px"></div>
        <div class="form-containter w-100 m-auto site-login-container position-relative">
            <div id="loading-form-screen" class="h-100 w-100 position-absolute align-items-center justify-content-center">
                <div class="custom-loader"></div>
            </div>
            <div class="site-login-overflow overflow-hidden">
                <ul class="m-auto d-flex align-items-center justify-content-center list-unstyled">
                    <li><a class="site-login-overflow-active" href="#" id='login-link'>prijava</a></li>
                    <li><a class="site-login-overflow-noactive" href="#" id='register-link'>registracija</a></li>
                </ul>
                <div class="login-form-container d-flex">
                    <div class="login-form w-50" id='login-form'>
                        <form class="login">
                            <?php echo csrf_field(); ?>
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                            <p class="form-row">
                                <label for="username" class="mb-2">Email adresa&nbsp;<span class="required">*</span></label>
                                <input type="text" class="d-inline-flex align-items-center w-100" name="email_username" id="email_login" value="">							
                            </p>
                            <p class="form-row p-0">
                                <label for="username" class="mb-2">Lozinka&nbsp;<span class="required">*</span></label>
                                <input type="password" class="d-inline-flex align-items-center w-100" name="password" id="password_login" value="">							
                            </p>
                            <p class="form-row pt-2 pb-2">
                                <a href="#" class="forgot-password">Zaboravili ste lozinku?</a>
                            </p>
                            <p class="form-row">
                                <button class="w-100 pb-2">Prijavi Se</button>
                                <div class='register-error' id="login-error">
                                    <p class='register-error-p' id="login-error-p">Molimo Vas unesite ispravnu email adresu!</p>
                                </div>
                                <p class="form-row pt-2 pb-2">
                                    <a href="#" class="send-verification-code">Posalji verifikacioni kod</a>
                                </p>
                            </p>
                        </form>
                    </div>
                    <div class="login-form w-50 register-form" id='register-form'>
                        <form class="login" id="register">
                            <?php echo csrf_field(); ?>
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                            
                            <div class="form-row">
                                <label for="username_reg" class="mb-2">Korisnicko ime&nbsp;<span class="required">*</span></label>
                                <input type="text" class="d-inline-flex align-items-center w-100" name="username_reg" id="username_reg" value="" pattern="[a-zA-Z][a-zA-Z0-9_.]*" >	
                            </div>
                                                    
                            <div class="form-row">
                                <label for="email_reg" class="mb-2">Email adresa&nbsp;<span class="required">*</span></label>
                                <input type="text" class="d-inline-flex align-items-center w-100" name="email_reg" id="email_reg" value="">
                            </div>
                                                                    
                            <div class="form-row mb-0">
                                <label for="password_reg" class="mb-2">Lozinka&nbsp;<span class="required">*</span></label>
                                <input type="password" class="d-inline-flex align-items-center w-100" name="password_reg" id="password_reg" value="">							
                            </div>
                            <p class="m-0">
                                <div class="password-strength" aria-live="polite">
                                    Veoma slaba - Molimo Vas unesite jacu lozinku
                                </div>
                                <small class="password-hint">
                                    Hint: Lozinka bi trebala da bude duza od dvanaest karaktera. Da biste je ucinili jacom, upotrebite velika i mala slova, brojeve, i simbole kao sto su ! " ? $ % ^ & ).
                                </small>
                            </p>
                            <div class="privacy-policy-text">
                                <p>
                                    Vasi licni podaci ce se koristiti samo u cilju poboljsanja vaseg iskustva na ovoj web lokaciji,
                                    za upravljanje pristupa vasem nalogu i drugih svrha opisane su u nasoj politici privatnosti.
                                </p>
                            </div>
                            <p class="form-row">
                                <button class="w-100">Registruj se</button>
                                <div class='register-error' id='register-error'>
                                    <p class='register-error-p' id='register-error-p'>Molimo Vas unesite ispravnu email adresu!</p>
                                </div>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 100px"></div>
</body>
</html>

<script>
    const element1 = document.getElementById('login-link');
    const element2 = document.getElementById('register-link');
    const registerForm = document.getElementById('register-form');
    const loginForm = document.getElementById('login-form');
    const passwordRegInput = document.getElementById('password_reg');
    const registerFormReal = document.getElementById('register');
    const loader = document.getElementById('loading-form-screen');

    passwordRegInput.addEventListener('input', function(event){
        const strength = document.getElementsByClassName('password-strength')[0];
        const pswHint = document.getElementsByClassName('password-hint')[0];
        const password = passwordRegInput.value;

        if(password.length <= 3){
            strength.style.display = "block";
            strength.innerHTML = 'Veoma slaba - Molimo Vas unesite jacu lozinku';
            strength.style.color = 'red';
            pswHint.style.display = "block";
        }else if(password.length <= 8){
            strength.style.display = "block";
            strength.innerHTML = 'Slaba - Molimo Vas unesite jacu lozinku';
            strength.style.color = 'red';
            pswHint.style.display = "block";
        }else if(password.length <= 10){
            strength.style.display = "block";
            strength.innerHTML = 'Srednja';
            strength.style.color = 'green';
            pswHint.style.display = "none";
        }else{
            strength.style.display = "block";
            strength.innerHTML = 'Jaka';
            strength.style.color = 'green';
            pswHint.style.display = "none";
        }
    });

    document.getElementsByClassName('login')[0].addEventListener('submit', function(event){
        event.preventDefault();
        loader.style.display = 'flex';                                                      // loading aktivan
        var email = document.getElementById('email_login').value;
        var password = document.getElementById('password_login').value;

        var loginError = document.getElementById('login-error');
        var loginErrorText = document.getElementById('login-error-p');
        
        if(email == ''){
            loader.style.display = 'none';                                       // loading neaktivan
            loginError.style.display = 'block';
            loginErrorText.innerHTML = '<b>Greska:</b> Email je obavezan!';
            return;
        }else if(password == ''){
            loader.style.display = 'none';                                       // loading neaktivan
            loginError.style.display = 'block';
            loginErrorText.innerHTML = '<b>Greska:</b> Lozinka je obavezna!';
            return;
        }
        var formData = $(this).serialize();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        
        $.ajax({
            method: 'POST',
            url: "<?php echo e(route('login')); ?>",
            data: formData,
            success: function(response){
                //alert(response);
                switch(response){
                    case '1':
                        window.location.replace('');
                        break;
                    case '2':
                        loader.style.display = 'none';                                       // loading neaktivan
                        loginError.style.display = 'block';
                        loginErrorText.innerHTML = '<b>Greska:</b> Email adresa <b>'+email+'</b> nije registrovana na ovom sajtu.</b>!';
                        return;
                    case '3':
                        loader.style.display = 'none';                                       // loading neaktivan
                        loginError.style.display = 'block';
                        loginErrorText.innerHTML = '<b>Greska:</b> Email adresa <b>'+email+'</b> nije ispravna. Molimo unesite ispravnu email adresu</b>!';
                        return;
                    case '4':
                        loader.style.display = 'none';                                       // loading neaktivan
                        loginError.style.display = 'block';
                        loginErrorText.innerHTML = '<b>Greska:</b> Lozinka koju ste uneli nije ispravna. Molimo pokusajte ponovo!';
                        return;
                    case '5':
                        loader.style.display = 'none';                                       // loading neaktivan
                        loginError.style.display = 'block';
                        loginErrorText.innerHTML = '<b>Greska:</b> Email adresa <b>'+email+'</b> nije verifikovana!<br>';
                        document.getElementsByClassName('send-verification-code')[0].style.display = "block";
                        return;
                    default:
                        loader.style.display = 'none';                                       // loading neaktivan
                        loginError.style.display = 'block';
                        loginErrorText.innerHTML = '<b>Greska:</b> Doslo je do neocekivane greske. Molimo pokusajte kasnije!';
                        return;
                }
            }
        })
    });

    element1.addEventListener('click', function(event){
        event.preventDefault();
        if(!this.classList.contains('site-login-overflow-active')){
            changeActive(element2, element1);
            registerForm.classList.toggle('register-form-clicked');
            loginForm.classList.toggle('login-form-clicked');
        }
    });

    element2.addEventListener('click', function(event){
        event.preventDefault();
        if(!this.classList.contains('site-login-overflow-active')){
            changeActive(element1, element2);
            registerForm.classList.toggle('register-form-clicked');
            loginForm.classList.toggle('login-form-clicked');
        }
    });

    function changeActive(element1, element2){
        element1.classList.remove('site-login-overflow-active');
        element1.classList.add('site-login-overflow-noactive');

        element2.classList.remove('site-login-overflow-noactive');
        element2.classList.add('site-login-overflow-active');
    }
    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validateInput(input) {
        var regex = /^[a-zA-Z][a-zA-Z0-9_.]*$/;
        if (!regex.test(input)) {
            return false;
        }
        return true;
    }
    
    registerFormReal.addEventListener('submit', function(event){
        event.preventDefault();
        loader.style.display = 'flex';
        const username = document.getElementById('username_reg');
        const email = document.getElementById('email_reg');
        const password = document.getElementById('password_reg');

        const registerError = document.getElementById('register-error');
        const registerErrorP = document.getElementById('register-error-p');

        var sveIspravno = false;

        if(username.value==''){
            registerErrorP.innerHTML = 'Korisnicko ime je obavezno!';
            registerError.style.display = 'block';
            loader.style.display = 'none';
        }else if(username.value.length < 8){
            registerErrorP.innerHTML = 'Korisnicko ime mora biti duze od 8 karaktera!';
            registerError.style.display = 'block';
            loader.style.display = 'none';
        }else if(username.value[0] >= 0 && username.value[0] <= 9){
            registerErrorP.innerHTML = 'Korisnicko ime ne sme da pocinje cifrom!';
            registerError.style.display = 'block';
            loader.style.display = 'none';
        }else if(!validateInput(username.value)){
            registerErrorP.innerHTML = 'Korisnicko ne sme da pocinje brojem i ne sme da sadrzi nikakve specijalne znakove sem <b>_</b> i <b>.</b>!';
            registerError.style.display = 'block';
            loader.style.display = 'none';
        }else if(email.value==''){
            registerErrorP.innerHTML = 'Email adresa je obavezna!';
            registerError.style.display = 'block';
            loader.style.display = 'none';
        }else if(!validateEmail(email.value)){
            registerErrorP.innerHTML = 'Email adresa je neispravna!';
            registerError.style.display = 'block';
            loader.style.display = 'none';
        }else if(password.value==''){
            registerErrorP.innerHTML = 'Lozinka je obavezna!';
            registerError.style.display = 'block';
            loader.style.display = 'none';
        }else if(password.value.length <= 8){
            registerErrorP.innerHTML = 'Lozinka je slaba!';
            registerError.style.display = 'block';
            loader.style.display = 'none';
        }else{
            sveIspravno = true;
        }


        if(sveIspravno){
            var formData = $(this).serialize();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            $.ajax({
                method: 'POST',
                url: "<?php echo e(route('register')); ?>",
                data: formData,
                success: function(response){
                    //alert(response);
                    loader.style.display = 'none';
                    switch(response){
                        case "1":
                            registerErrorP.innerHTML = '<b>Obavestenje:</b> Na email adresu <b>'+email.value+'</b> smo Vam poslali verifikacioni link. Molimo vas da proverite prijemno sanduce i verifikujete vas nalog. <br><b>Necete moci da se prijavite dok ne verifikujete nalog.</b>';
                            registerError.style.display = 'block';
                            break;
                        case "2":
                            registerErrorP.innerHTML = '<b>Greska:</b> Postoji nalog sa email adresom <b>'+email.value+'</b>. Ukoliko je taj nalog Vas pokusajte da se prijavite.';
                            registerError.style.display = 'block';
                            break;
                        case "3":
                            registerErrorP.innerHTML = '<b>Greska:</b> Lozinka mora biti jaca!';
                            registerError.style.display = 'block';
                            break;
                        case "4":
                            registerErrorP.innerHTML = '<b>Greska:</b> Korisnicko ime <b>'+username.value+'</b> je zauzeto!';
                            registerError.style.display = 'block';
                            break;
                        case 5: default:
                            registerErrorP.innerHTML = '<b>Greska:</b> Doslo je do neocekivane greske. Molimo pokusajte kasnije!';
                            registerError.style.display = 'block';
                            break;
                    }
                }
            });
        }
    });

    document.getElementsByClassName('forgot-password')[0].addEventListener('click', function(event){
        event.preventDefault();
        loader.style.display = 'flex';                                                  // loader aktivan
        var loginError = document.getElementsByClassName('register-error')[0];
        var loginErrorText = document.getElementsByClassName('register-error-p')[0];

        var form = document.getElementsByClassName('login')[0];
        var formData = new FormData(form);
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', "<?php echo e(route('forgotPassword')); ?>", true);
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                loader.style.display = 'none';                                          //loader neaktivan
                var response = xhr.responseText;
                switch(response){
                    case "1":
                        loginError.style.display = 'block';
                        loginErrorText.innerHTML = '<b>Obavestenje:</b> Link za promenu lozinke je poslat na Vasu email adresu. Molimo proverite prijemno sanduce</b>!';
                        return;
                    case "2":
                        loginError.style.display = 'block';
                        loginErrorText.innerHTML = '<b>Greska:</b> Email adresa nije registrovana na ovom sajtu!';
                        return;
                    case "3":
                        loginError.style.display = 'block';
                        loginErrorText.innerHTML = '<b>Greska:</b> Doslo je do greske pri slanju emaila za resetovanje lozinke.';
                        return;
                    default:
                        loginError.style.display = 'block';
                        loginErrorText.innerHTML = '<b>Greska:</b> Doslo je do neocekivane greske. Molimo pokusajte kasnije!';
                        return;
                }
            }
        };
        xhr.send(formData);
    });

    document.getElementsByClassName('send-verification-code')[0].addEventListener('click', function(event){
        event.preventDefault();
        loader.style.display = 'flex';
        var form = document.getElementsByClassName('login')[0];
        var formData = new FormData(form);
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        var loginError = document.getElementsByClassName('register-error')[0];
        var loginErrorText = document.getElementsByClassName('register-error-p')[0];
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', "<?php echo e(route('verifyEmail')); ?>", true);
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                loader.style.display = 'none';
                document.getElementsByClassName('send-verification-code')[0].style.display = "none";
                var response = xhr.responseText;
                switch(response){
                    case "1":
                        loginError.style.display = 'block';
                        loginErrorText.innerHTML = '<b>Obavestenje:</b> Link za promenu lozinke je poslat na Vasu email adresu. Molimo proverite prijemno sanduce</b>!';
                        return;
                    case "2":
                        loginError.style.display = 'block';
                        loginErrorText.innerHTML = '<b>Greska:</b> Email adresa nije registrovana na ovom sajtu!';
                        return;
                    case "3":
                        loginError.style.display = 'block';
                        loginErrorText.innerHTML = '<b>Greska:</b> Doslo je do greske pri slanju emaila za resetovanje lozinke.';
                        return;
                    default:
                        loginError.style.display = 'block';
                        loginErrorText.innerHTML = '<b>Greska:</b> Doslo je do neocekivane greske. Molimo pokusajte kasnije!';
                        return;
                }
            }
        };
        xhr.send(formData);
    });

</script>
<?php /**PATH C:\Users\djord\OneDrive\Documents\Laravel\polovnitelefoni\resources\views/login-register.blade.php ENDPATH**/ ?>