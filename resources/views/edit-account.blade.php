<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('links')
    <title>Polovni Telefoni</title>
    <link href="{{ asset('css/my-account-style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loading-style.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    @include('header')

    <div class="site-content position-relative">
        <div id="loading-form-screen" class="h-100 w-100 position-absolute align-items-center justify-content-center">
            <div class="custom-loader"></div>
        </div>
        <div class="shop-content" style="margin-top: 60px">
            <div class="container">
                <div>
                    <div class="content-wrapper sidebar-right">
                        <div class="col-12 content-primary">
                            <div class="my-account-wrapper row">
                                <div class="my-account-navigation col-xl-3 col-lg-3 col-md-12 d-inline-block">
                                    <nav class="my-account-navigation-nav">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="#" id="dashboard">Kontrolna tabla</a>
                                            </li>
                                            <li>
                                                <a href="#" id="my-ads">Moji Oglasi</a>
                                            </li>
                                            <li>
                                                <a href="#" id="new-ads">Dodaj Novi Oglas</a>
                                            </li>
                                            <li>
                                                <a href="#" id="orders">Narudzbine</a>
                                            </li>
                                            <li>
                                                <a href="#" id="downloads">Preuzimanja</a>
                                            </li>
                                            <li>
                                                <a href="#" id="addresses">Adrese</a>
                                            </li>
                                            <li class="is-active">
                                                <a href="#" id="my-data">Podaci o nalogu</a>
                                            </li>
                                            <li>
                                                <a href="#" id="compare">Uporedi</a>
                                            </li>
                                            <li>
                                            <form action="/user/signOut" method="POST" id="signOutForm">
                                                @csrf
                                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                                                <a href="#" id='signOutLink'>Odjavi se</a>
                                            </form>
                                                <!-- <a href="#">Odjavi se</a> -->
                                            </li>
                                            <li>
                                                <a href="#" id="wish-list">Lista zelja</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="my-account-content col-xl-9 col-lg-9 col-md-12 d-inline-block">
                                    <div class='register-error w-75 m-2 mb-4' id='update-error'>
                                        <p class='register-error-p' id='update-error-p'>Doslo je do greske. Molimo pokusajte kasnije!</p>
                                    </div>
                                    <form id="update-data">
                                        @csrf
                                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                                        <p class="form-row w-50 float-start p-2 pt-0">
                                            <label for="account-first-name" class="w-100 mb-2">
                                                Ime
                                                <span class="required">*</span>
                                            </label>
                                            <input autocomplete="off" type="text" name="account-first-name" id="account-first-name" class="w-100" value="{{ Session::get('user')->getFirstName() ? Session::get('user')->getFirstName() : '' }}">
                                        </p>
                                        <p class="form-row w-50 float-start p-2 pt-0">
                                            <label for="account-second-name" class="w-100 mb-2">
                                                Prezime
                                                <span class="required">*</span>
                                            </label>
                                            <input autocomplete="off" type="text" name="account-second-name" id="account-second-name" class="w-100" value="{{ Session::get('user')->getSecondName() ? Session::get('user')->getSecondName() : '' }}">
                                        </p>
                                        <p class="form-row w-100 p-2 pt-0">
                                            <label for="account-username" class="w-100 mb-2">
                                                Korisnicko ime
                                                <span class="required">*</span>
                                            </label>
                                            <input autocomplete="off" type="text" name="account-username" id="account-username" class="w-100 mb-0 pb-0" value="{{ Session::get('user')->getUsername() ? Session::get('user')->getUsername() : '' }}">
                                            <i class="m-0 p-0">Ovako ce se prikazivati Vase ime u sekciji naloga i recenzijama</i>
                                        </p>
                                        <p class="form-row w-100 p-2 pt-0">
                                            <label for="account-email" class="w-100 mb-2">
                                                Email adresa (Ne moze se promeniti)
                                            </label>
                                            <input autocomplete="off" style="opacity: 0.7;" disabled type="text" name="account-email" id="account-email" class="w-100 mb-0 pb-0" value="{{ Session::get('user')->getEmail() ? Session::get('user')->getEmail() : '' }}">
                                        </p>
                                        <p class="form-row w-100 p-2 pt-0" style="font-size: 1.5rem;">
                                            Promena lozinke
                                        </p>
                                        <p class="form-row w-100 p-2 pt-0">
                                            <label for="account-old-password" class="w-100 mb-2">
                                                Stara lozinka (ostavite prazno ukoliko ne zelite da promenite lozinku)
                                            </label>
                                            <input type="password" name="account-old-password" id="account-old-password" class="w-100 mb-0 pb-0">
                                        </p>
                                        <p class="form-row w-100 p-2 pt-0">
                                            <label for="account-new-password" class="w-100 mb-2">
                                                Nova lozinka (ostavite prazno ukoliko ne zelite da promenite lozinku)
                                            </label>
                                            <input type="password" name="account-new-password" id="account-new-password" class="w-100 mb-0 pb-0">
                                        </p>
                                        <p class="form-row w-100 p-2 pt-0">
                                            <label for="account-verify-new-password" class="w-100 mb-2">
                                                Potvrdite novu lozinku
                                            </label>
                                            <input type="password" name="account-verify-new-password" id="account-verify-new-password" class="w-100 mb-0 pb-0">
                                        </p>
                                        <p class="form-row p-2">
                                            <button>Sacuvaj promene</button>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/account-redirect.js') }}"></script>
    <script>
        document.getElementById('update-data').addEventListener('submit', function(event){
            //alert('Click');
            event.preventDefault();
            const firstName = document.getElementById('account-first-name').value;
            const secondName = document.getElementById('account-second-name').value;
            const username = document.getElementById('account-username').value;
            const oldPassword = document.getElementById('account-old-password').value;
            const newPassword = document.getElementById('account-new-password').value;
            const verifyNewPassword = document.getElementById('account-verify-new-password').value;

            //const pattern = /^[a-zA-Z][a-zA-Z0-9_.]*$/;
            var pattern = /^[a-zA-Z][a-zA-Z0-9_.]*$/;
            const updateError = document.getElementById('update-error');
            const updateErrorText = document.getElementById('update-error-p');

            const loadingScreen = document.getElementById('loading-form-screen');

            if(firstName == ''){
                updateErrorText.innerHTML = 'Morate uneti Vase <b>Ime</b>';
                updateError.style.display = 'block';
                window.location.href = "#update-error";
                return;
            }else if(secondName == ''){
                updateErrorText.innerHTML = 'Morate uneti Vase <b>Prezime</b>';
                updateError.style.display = 'block';
                window.location.href = "#update-error";
                return;
            }else if(username == ''){
                updateErrorText.innerHTML = 'Morate uneti Vase <b>Korisnicko ime</b>';
                updateError.style.display = 'block';
                window.location.href = "#update-error";
                return;
            }else if(!pattern.test(username) || username.length <= 8 || (username[0] >= '0' && username[0] <= '9')){
                updateErrorText.innerHTML = 'Korisnicko ime koje ste uneli ne zadovoljava sve zahteve.<br><b>Pomoc:</b> Korisnicko ime mora biti duze od 8 karaktera i ne sme pocinjati cifrom';
                updateError.style.display = 'block';
                window.location.href = "#update-error";
                return;
            }else{
                loadingScreen.style.display = "flex";
                var formData = $(this).serialize();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                
                $.ajax({
                    method: 'POST',
                    url: "{{ route('updateMyData') }}",
                    data: formData,
                    success: function(response){
                        // alert(response);
                        if(response == '1'){
                            window.location.href = "";
                        }else if(response == '2'){
                            loadingScreen.style.display = "none";
                            updateErrorText.innerHTML = 'Korisnicko ime koje ste uneli vec postoji. Molimo pokusajte sa drugim korisnickim imenom.';
                            updateError.style.display = 'block';
                            window.location.href = "#update-error";
                        }
                    }
                });
            }

        });
    </script>
</body>
</html>