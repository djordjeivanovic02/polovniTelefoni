<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <?php echo $__env->make('links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Polovni Telefoni</title>
    <link href="<?php echo e(asset('css/my-account-style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/loading-style.css')); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="site-content">
        <div class="shop-content" style="margin-top: 60px">
            <div class="container">
                <div>
                    <div class="content-wrapper sidebar-right">
                        <div class="col-12 content-primary">
                            <div class="my-account-wrapper row">
                                <div id="loading-form-screen" class="h-100 w-100 position-absolute align-items-center justify-content-center">
                                    <div class="custom-loader"></div>
                                </div>
                                <div class="my-account-navigation col-xl-3 col-lg-3 col-md-12 d-inline-block">
                                    <nav class="my-account-navigation-nav">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="#" id="dashboard">Kontrolna tabla</a>
                                            </li>
                                            <li>
                                                <a href="#" id="my-ads">Moji Oglasi</a>
                                            </li>
                                            <li class="is-active">
                                                <a href="#" id="new-ads">Dodaj Novi Oglas</a>
                                            </li>
                                            <li>
                                                <a href="#" id="downloads">Preuzimanja</a>
                                            </li>
                                            <li>
                                                <a href="#" id="addresses">Adrese</a>
                                            </li>
                                            <li>
                                                <a href="#" id="my-data">Podaci o nalogu</a>
                                            </li>
                                            <li>
                                                <a href="#" id="compare">Uporedi</a>
                                            </li>
                                            <li>
                                            <form action="/user/signOut" method="POST" id="signOutForm">
                                                <?php echo csrf_field(); ?>
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
                                    <div class="row w-100 m-0">
                                        <div class="col-12" id='update-error' style="display: none;">
                                            <?php echo csrf_field(); ?>
                                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                                            <p class="form-row w-100 p-2 pt-0">
                                                <label for="ads-title" class="w-100 mb-2 ads-hint register-error-p" id='update-error-p' style="border: 1px solid var(--default-border-color); padding: 15px;">
                                                    Doslo je do greske. Molimo pokusajte kasnije!
                                                    <!-- <span class="required">*</span> -->
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row w-100 two-divs m-0 pt-0">
                                        <div class="col-xl-6 col-lg-12">
                                            <?php echo csrf_field(); ?>
                                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                                            <p class="form-row w-100 p-2 pt-0">
                                                <label for="ads-title" class="w-100 mb-2 ads-hint">
                                                    Naslov Oglasa
                                                    <!-- <span class="required">*</span> -->
                                                </label>
                                                <input autocomplete="off" type="text" name="ads-title" id="ads-title" class="w-100" placeholder="Na prodaju iPhone 11 Pro Max" maxlength="70">
                                                <span class="input-limitation">Nemojte prekoraciti 70 karaktera prilikom unosa naslova proizvoda.</span>
                                            </p>
                                            <p class="form-row w-100 p-2 pt-0">
                                                <label for="ads-title" class="w-100 mb-2 ads-hint">
                                                    Kategorija
                                                    <!-- <span class="required">*</span> -->
                                                </label>
                                                <select name="ads-category" id="ads-category" class="w-100">
                                                    <option value="1">Mobilni Telefon</option>
                                                    <!-- <option value="mobile-phone-parts">Delovi za Mobilni Telefon</option>
                                                    <option value="mobile-accessories">Dodatak za Telefon</option>
                                                    <option value="mobile-mask">Maska za Telefon</option>
                                                    <option value="headphones">Slusalice</option>
                                                    <option value="smart-watch">Pametni Sat</option> -->
                                                </select>
                                                <!-- <span class="input-limitation">Nemojte prekoraciti 40 karaktera prilikom unosa naslova proizvoda.</span> -->
                                            </p>
                                            <div class="mobile-phone-info w-100 row m-0 p-0">
                                                <p class="form-row w-50 p-2 pt-0 d-inline-block">
                                                    <label for="ads-title" class="w-100 mb-2 ads-hint">
                                                        Brend
                                                        <!-- <span class="required">*</span> -->
                                                    </label>
                                                    <select name="mobile-phone-brand" id="mobile-phone-brand" class="w-100">
                                                        <?php echo $__env->make('mobile-phones/brands', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </select>
                                                </p>
                                                <p class="form-row w-50 p-2 pt-0 d-inline-block">
                                                    <label for="ads-title" class="w-100 mb-2 ads-hint">
                                                        Model
                                                        <!-- <span class="required">*</span> -->
                                                    </label>
                                                    <select name="mobile-phone-model" id="mobile-phone-model" class="w-100">
                                                        <option value="0" hidden selected>Model Mobilnog Telefona</option>
                                                        <!-- <?php echo $__env->make('mobile-phones/apple-models', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
                                                    </select>
                                                </p>
                                                <p class="form-row w-50 p-2 pt-0 d-inline-block">
                                                    <label for="ads-title" class="w-100 mb-2 ads-hint">
                                                        Boja Uredjaja
                                                        <!-- <span class="required">*</span> -->
                                                    </label>
                                                    <ul class="m-0 list-unstyled colors mb-4 d-flex flex-wrap">
                                                        <li>
                                                            <div style="background-color: black" id="1">
                                                                <input type="radio" name="color" id="1" class="d-none">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div style="background-color: white; border: 1px solid var(--placeholder-color);" id="2">
                                                                <input type="radio" name="color" id="2" class="d-none">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div style="background-color: grey" id="3">
                                                                <input type="radio" name="color" id="3" class="d-none">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div style="background-color: red" id="4">
                                                                <input type="radio" name="color" id="4" class="d-none">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div style="background-color: green" id="5">
                                                                <input type="radio" name="color" id="5" class="d-none">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div style="background-color: blue" id="6">
                                                                <input type="radio" name="color" id="6" class="d-none">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div style="background-color: orange" id="7">
                                                                <input type="radio" name="color" id="7" class="d-none">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div style="background-color: yellow" id="8">
                                                                <input type="radio" name="color" id="8" class="d-none">
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </p>
                                            </div>
                                            <div class="mobile-phone-info w-100 row m-0 p-0">
                                                <p class="form-row w-50 p-2 pt-0 d-inline-block">
                                                    <label for="ads-title" class="w-100 mb-2 ads-hint">
                                                        Stanje Uredjaja
                                                        <!-- <span class="required">*</span> -->
                                                    </label>
                                                    <label class="new-old-state w-100 active">
                                                        <input type="radio" name="state" id="1" class="d-none" checked>
                                                        Novo
                                                    </label>
                                                </p>
                                                <p class="form-row w-50 p-2 pt-0 d-inline-block">
                                                    <label for="ads-title" class="w-100 mb-2 ads-hint" style="opacity: 0">
                                                        Boja
                                                    </label>
                                                    <label class="new-old-state w-100">
                                                        <input type="radio" name="state" id="2" class="d-none">
                                                        Polovno
                                                    </label>
                                                </p>
                                            </div>
                                            <p class="form-row w-100 p-2 pt-0 d-inline-block">
                                                <label for="ads-title" class="w-100 mb-2 ads-hint">
                                                    Opis Oglasa
                                                </label>
                                                <textarea name="description" id="description" cols="30" rows="10" maxlength="20">
                                                </textarea>
                                                <span class="input-limitation">Potrudite se da ne prekoracite 280 karaktera prilikom unosa opisa proizvoda.</span>
                                            </p>
                                        </div>
                                        <div class="col-xl-6 col-lg-12">
                                            <?php echo csrf_field(); ?>
                                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                                            <p class="form-row w-100 p-2 pt-0">
                                                <label for="ads-title" class="w-100 mb-2 ads-hint">
                                                    Slike proizvoda
                                                    <!-- <span class="required">*</span> -->
                                                </label>
                                                <label class="image-grid d-flex flex-wrap justify-content-between w-100">
                                                    <label class="drop-zone first" style="cursor: default">
                                                        <i class="fa-regular fa-image"></i>
                                                        <span>Slika ce se automatski ocitati.</span>
                                                        <input type="file" id="file-input" accept="image/*" class="d-none" disabled/>
                                                        <img src="" alt="" id="main-image">
                                                    </label>
                                                    <label class="drop-zone second">
                                                        <i class="fa-regular fa-image"></i>
                                                        <span>Prevuci i otpusti sliku ovde ili <span style="color: var(--main-color); font-weight: 600">klikni za odabir</span>.</span>
                                                        <input type="file" accept="image/*" class="d-none file-input input-image"/>
                                                        <img src="" alt="">
                                                    </label>
                                                    <label class="drop-zone2 third">
                                                        <label id="drop-zone" class="drop-zone third one">
                                                            <i class="fa-regular fa-image"></i>
                                                            <input type="file" accept="image/*" class="d-none file-input input-image"/>
                                                            <img src="" alt="">
                                                        </label>
                                                        <label class="drop-zone third one">
                                                            <i class="fa-regular fa-image"></i>
                                                            <input type="file" accept="image/*" class="d-none file-input input-image"/>
                                                            <img src="" alt="">
                                                        </label>
                                                    </label>
                                                </label>
                                                <label class="image-grid d-flex flex-wrap justify-content-between w-100">
                                                    <label class="drop-zone small">
                                                        <i class="fa-regular fa-image"></i>
                                                        <input type="file" accept="image/*" class="d-none file-input input-image"/>
                                                        <img src="" alt="">
                                                    </label>
                                                    <label class="drop-zone small">
                                                        <i class="fa-regular fa-image"></i>
                                                        <input type="file" accept="image/*" class="d-none file-input input-image"/>
                                                        <img src="" alt="">
                                                    </label>
                                                    <label class="drop-zone small">
                                                        <i class="fa-regular fa-image"></i>
                                                        <input type="file" accept="image/*" class="d-none file-input input-image"/>
                                                        <img src="" alt="">
                                                    </label>
                                                    <label class="drop-zone small">
                                                        <i class="fa-regular fa-image"></i>
                                                        <input type="file" accept="image/*" class="d-none file-input input-image"/>
                                                        <img src="" alt="">
                                                    </label>
                                                </label>
                                                <label class="mt-2 hint">
                                                    Potrebno je dodati najmanje 4 slike. 
                                                    Obratite paznju na kvalitet slika koje dodajete, 
                                                    pridrzavajte se standarda za boju pozadine. 
                                                    Slike moraju biti određenih dimenzija. 
                                                    Primetite da proizvod prikazuje sve detalje.
                                                </label>
                                            </p>
                                            <p class="form-row w-75 p-2 pt-0">
                                                <label for="ads-title" class="w-100 mb-2 ads-hint">
                                                    Cena Proizvoda
                                                    <!-- <span class="required">*</span> -->
                                                </label>
                                                <input autocomplete="off" type="text" name="ads-price" id="ads-price" class="w-50 m-0 ads-price fs-3">
                                                <span class="price-euro m-0">€</span>
                                            </p>

                                            <p class="form-row w-100 p-2 pt-0">
                                                <label for="ads-title" class="w-100 mb-2 ads-hint">
                                                    Dodatna oprema (opciono)
                                                    <!-- <span class="required">*</span> -->
                                                </label>
                                                <input autocomplete="off" type="text" name="addons" id="addons" class="w-100" placeholder="Punjac, slusalice...">
                                                <span class="input-limitation">Navedite dodatnu opremu npr. punjac, slusalice, silikonska maska...</span>
                                            </p>
                                            <p class="form-row w-100 p-2 pt-0">
                                                <label for="ads-title" class="w-100 mb-2 ads-hint">
                                                    Ostecenja (ostaviti prazno ako nema ostecenja)
                                                    <!-- <span class="required">*</span> -->
                                                </label>
                                                <input autocomplete="off" type="text" name="bad" id="bad" class="w-100" placeholder="">
                                                <span class="input-limitation">Navedite ostecenje (naprsao ekran, ne radi ekran...)</span>
                                            </p>
                                            <p class="form-row w-100 p-2 pt-0">
                                                <label for="ads-title" class="w-100 mb-2 ads-hint">
                                                    Kontakt (broj telefona)
                                                    <!-- <span class="required">*</span> -->
                                                </label>
                                                <input autocomplete="off" type="text" name="phone-number" id="phone-number" class="w-100 fs-5" pattern="(\+381)?\d{8,12}">
                                            </p>
                                            <p class="form-row w-100 p-2 pt-0">
                                                <label class="mt-2 hint" style="font-size: 14px">
                                                    Vas uneti oglas će biti pazljivo pregledan 
                                                    kako bi se proverio kvalitet i tacnost oglasa. 
                                                    Nakon zavrsenog pregleda, bicete obavesteni o 
                                                    prihvatanju oglasa ili eventualnim potrebama za izmenama.
                                                    Hvala na strpljenju i razumevanju.
                                                </label>
                                            </p>
                                        </div>
                                        <div class="col-lg-12 ">
                                            <p class="form-row w-100 p-2 pt-0">
                                                <label for="ads-title" class="w-100 mb-2">
                                                    <button class="w-100" id="add-ads">Postavi Oglas</button>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="" alt="" id="proba">
    <script src="<?php echo e(asset('js/account-redirect.js')); ?>"></script>
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        tinymce.init({
            selector: '#description',
            plugins: 'link lists',
            toolbar: 'bold italic underline | numlist bullist | link',
            menubar: false,
        });

        var zones = document.querySelectorAll('.drop-zone');
        zones.forEach(dropZone=>{
            var fileInput = dropZone.querySelector('input[type="file"]');

            // Otpuštanje slike u drop zonu
            dropZone.addEventListener('drop', function (e) {
                e.preventDefault();
                var file = e.dataTransfer.files[0];
                handleFile(file);
                // console.log('Pustena slika');
            });

            // Onemogućavanje automatskog otvaranja slike u pregledniku kad se slika prevuče preko preglednika
            dropZone.addEventListener('dragover', function (e) {
                e.preventDefault();
            });

            // Odabir slike pomoću input polja
            fileInput.addEventListener('change', function () {
                var file = this.files[0];
                handleFile(file);
            });

            // Funkcija za rukovanje odabranom slikom
            function handleFile(file) {
                if (file && file.type.includes('image')) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var image = new Image();
                        image.src = e.target.result;
                        // Ovdje možete manipulirati sačitanom slikom, prikazati je na stranici, itd.
                        var slika = dropZone.querySelector('img');
                        slika.src= image.src;
                        slika.style.display = 'block';
                        slika.title = "Klikni za brisanje";
                        dropZone.style.border = 'none';

                        fileInput.disabled = true;
                        var fileList = new DataTransfer();
                        fileList.items.add(file);

                        // Postavite kreirani FileList kao vrednost input polja
                        fileInput.files = fileList.files;

                        slika.addEventListener('click', () => {
                            slika.style.display = "none";
                            fileList.items.remove(file);
                            // Postavite kreirani FileList kao vrednost input polja
                            fileInput.files = fileList.files;
                            fileInput.disabled = false;
                            dropZone.style.border = '2px dashed var(--default-border-color)';
                        });
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

    });
    const loadingScreen = document.getElementById('loading-form-screen');
    $(document).ready(function(){
        $('#mobile-phone-brand').on('change', function(){
            var selectedBrand = $(this).val();
            var $mobilePhoneModelSelect = $('#mobile-phone-model');
            $mobilePhoneModelSelect.empty();
            // console.log(selectedBrand);
            if(selectedBrand !== ''){
                
                $.get('/models/' + selectedBrand, function(data){
                    // console.log(data);
                    $mobilePhoneModelSelect.append(data);
                });
                
            }else{
                $mobilePhoneModelSelect.append('<option value="" hidden selected>Model Mobilnog Telefona</option>');
            }
        });
        $('#mobile-phone-model').on('change', function(){
            loadingScreen.style.display = "flex";
            var selectedModel = $(this).val();
            // console.log(selectedModel);
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            var mobilePhoneBrand = document.getElementById('mobile-phone-brand').value;
            $.ajax({
                method: 'get',
                url: "<?php echo e(route('mobilePhoneMainImage')); ?>",
                data: {
                    phoneBrand: mobilePhoneBrand,
                    phoneModel: selectedModel,
                },
                success: function(response){
                    var image = document.getElementById('main-image');
                    image.src = 'data:image/jpeg;base64,' + response;
                    image.style.display = 'block';
                    var parentNode = image.parentNode;
                    parentNode.style.border = 'none';
                    loadingScreen.style.display = "none";
                }
            });
        });
    });

    const newState = document.querySelectorAll('.new-old-state')[0];
    const oldState = document.querySelectorAll('.new-old-state')[1];
    newState.addEventListener('click', function(){
        if(!this.classList.contains('active')){
            newState.classList.toggle('active');
            oldState.classList.toggle('active');
            newState.querySelector('input[type="radio"]').checked = true;
        }
    });
    oldState.addEventListener('click', function(){
        if(!this.classList.contains('active')){
            oldState.classList.toggle('active');
            newState.classList.toggle('active');
            oldState.querySelector('input[type="radio"]').checked = true;
        }
    });

    const colorDivs = document.querySelectorAll('.colors li div');
    colorDivs.forEach(colorDiv => {
        colorDiv.addEventListener('click', function(){
            colorDivs.forEach(colorDiv2 => {
                if(colorDiv2 !== colorDiv){
                    colorDiv2.classList.remove('active');
                }
            });
            this.classList.toggle('active');
            var radio = this.querySelector('input[type="radio"]');
            radio.checked = !radio.checked;
        });
    });

    var textarea = document.getElementById('description');
    textarea.addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight + 10) + 'px';
    });

    const addButton = document.querySelector('#add-ads');
    const updateErrorDiv = document.querySelector('#update-error');
    const updateError = document.querySelector('#update-error-p');

    addButton.addEventListener('click', () => {
        loadingScreen.style.display = 'flex';
        const adsTitle = document.querySelector('#ads-title');
        const category = document.querySelector('#ads-category');
        const brand = document.querySelector('#mobile-phone-brand');
        const model = document.querySelector('#mobile-phone-model');
        const selectedColor = document.querySelector('input[name="color"]:checked');
        const state = document.querySelector('input[name="state"]:checked');
        const description = tinymce.get('description');
        const price = document.querySelector('#ads-price');
        const phoneNumber = document.querySelector('#phone-number');
        const addons = document.querySelector('#addons');
        const bad = document.querySelector('#bad');

        const inputs = document.querySelectorAll('.input-image');
        var inputCount = 0;
        inputs.forEach(inp => {
            if(inp.files.length != 0) inputCount++;
        });
        // console.log(inputCount);

        if(adsTitle.value == ''){
            updateError.innerHTML = 'Morate uneti naslov oglasa!';
            updateErrorDiv.style.display = 'block';
            window.location.href = "#update-error";
            loadingScreen.style.display = 'none';
            return;
        }else if(adsTitle.value.length < 10){
            updateError.innerHTML = 'Naslov oglasa mora biti duzi od 10 karaktera!';
            updateErrorDiv.style.display = 'block';
            window.location.href = "#update-error";
            loadingScreen.style.display = 'none';
            return;
        }else if(brand.value == "0"){
            updateError.innerHTML = 'Morate izabrati brend mobilnog telefona!';
            updateErrorDiv.style.display = 'block';
            window.location.href = "#update-error";
            loadingScreen.style.display = 'none';
            return;
        }else if(model.value == "0"){
            updateError.innerHTML = 'Morate izabrati model mobilnog telefona!';
            updateErrorDiv.style.display = 'block';
            window.location.href = "#update-error";
            loadingScreen.style.display = 'none';
            return;
        }else if(selectedColor === null){
            updateError.innerHTML = 'Morate izabrati boju mobilnog telefona!';
            updateErrorDiv.style.display = 'block';
            window.location.href = "#update-error";
            loadingScreen.style.display = 'none';
            return;
        }else if(description.getContent() == ''){
            updateError.innerHTML = 'Morate uneti opis!';
            updateErrorDiv.style.display = 'block';
            window.location.href = "#update-error";
            loadingScreen.style.display = 'none';
            return;
        }else if(inputCount < 4){
            updateError.innerHTML = 'Morate izabrati najmanje 4 slike!';
            updateErrorDiv.style.display = 'block';
            window.location.href = "#update-error";
            loadingScreen.style.display = 'none';
            return;
        }else if(price.value == ''){
            updateError.innerHTML = 'Morate uneti cenu proizvoda!';
            updateErrorDiv.style.display = 'block';
            window.location.href = "#update-error";
            loadingScreen.style.display = 'none';
            return;
        }else if(phoneNumber.value == ''){
            updateError.innerHTML = 'Morate uneti kontakt telefon!';
            updateErrorDiv.style.display = 'block';
            window.location.href = "#update-error";
            loadingScreen.style.display = 'none';
            return;
        }

        const formData = new FormData();
        formData.append('adsTitle', adsTitle.value);
        formData.append('category', category.value);
        formData.append('brand', brand.value);
        formData.append('model', model.value);
        formData.append('color', selectedColor.id);
        formData.append('state', state.id);
        formData.append('description', description.getContent());
        formData.append('price', price.value);
        formData.append('phoneNumber', phoneNumber.value);
        formData.append('addons', addons.value);
        formData.append('bad', bad.value);
        inputs.forEach((inp, index) => {
            if(inp.files.length !== 0){
                formData.append(`file_${index}`, inp.files[0]);
                // console.log(inp.files[0]);
            }
        });
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        $.ajax({
            method: 'post',
            url: "<?php echo e(route('addNewAds')); ?>",
            processData: false,
            contentType: false,
            data: formData,
            success: function(response){
                loadingScreen.style.display = 'none';
                // alert(response);
                switch(response){
                    case '1':
                        updateError.innerHTML = 'Sjajno! Vas oglas je uspesno kreiran i poslat na pregled. Nas tim ce pregledati vas oglas u najkracem mogucem roku. Nakon sto administrator odobri oglas, bicete obavesteni putem e-poste ili obavestenja u aplikaciji. Hvala vam na strpljenju i razumevanju dok cekate odobrenje.';
                        addButton.disabled = false;
                        updateErrorDiv.style.display = 'block';
                        window.location.href = "#update-error";
                        loadingScreen.style.display = 'none';
                        break;
                    default:
                        updateError.innerHTML = 'Doslo je do iznenadne greske. Molimo pokusajte kasnije!';
                        addButton.disabled = false;
                        updateErrorDiv.style.display = 'block';
                        window.location.href = "#update-error";
                        loadingScreen.style.display = 'none';
                        break;
                }
            }
        });
    });
</script><?php /**PATH C:\Users\djord\OneDrive\Documents\Laravel\polovnitelefoni\resources\views/add-new-ads.blade.php ENDPATH**/ ?>