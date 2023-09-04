@include('links')
<footer class="site-footer">
    <div class="footer-row footer-newsletter dark">
        <div class="container">
            <div class="site-newsletter row w-100 p-0 m-0">
                <div class="site-newslatter-text col-xl-6 col-lg-6 col-md-12 col-sm-12 p-2">
                    <h3 class="entry-title">Registruj se da ne bi propustio nista!</h3>
                    <div class="entry-description">
                        <p class="m-0">
                        Pratite najnovije vesti o nasoj prodavnici i <strong style="color: #2f3748; cursor: pointer;">posebnim ponudama</strong> putem e-poste.
                        </p>
                    </div>
                </div>
                <div class="site-newsletter-form d-flex justify-content-xl-end justify-content-lg-end justify-content-md-start align-items-center p-2 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="subscribe-form">
                        <form id="subscribe" method="POST">
                            @csrf
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                            <div class="mc4wp-form-fields">
                                <input class="subscribe-input" type="text" name="email" placeholder="Vasa email adresa" required="">
                                <button type="submit" id="subscribe-btn">Pretplati se</button>
                            </div>
                        </form>
                        <p id="subscribe-error">Doslo je do iznenadne greske. Molimo pokusajte kasnije!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-row footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col col-12 col-lg-3">
                    <div class="widget widget-nav-menu">
                        <h4 class="widget-title">Zaradite Novac sa Nama</h4>
                        <div class="menu-widgets">
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="#">Prodajte na PolovniTelefoni</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Prodajte Vas Telefon na PolovniTelefoni</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Prodajte Vas Tablet na PolovniTelefoni</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Prodajte Vas Pametni Sat na PolovniTelefoni</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Prodajte Delove na PolovniTelefoni</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Poboljsajte Prodaju</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Pratite Statistuku Prodaja</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-lg-3">
                    <div class="widget widget-nav-menu">
                        <h4 class="widget-title">Kategorije Proizvoda</h4>
                        <div class="menu-widgets">
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="#">Telefoni</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Tableti</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Pametni Satovi</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Slusalice</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Delovi za Telefone/Tablete</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-lg-3">
                    <div class="widget widget-nav-menu">
                        <h4 class="widget-title">Dozvolite da Vam Pomognemo</h4>
                        <div class="menu-widgets">
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="#">Vas Nalog</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Vase Porudzbine</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Povracaji i Promene</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Ocene Isporuke</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Uslovi Koriscenja</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Centar za Pomoc</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-lg-3">
                    <div class="widget widget-nav-menu">
                        <h4 class="widget-title">Upoznajte Nas</h4>
                        <div class="menu-widgets">
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="#">O Nama</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">O Sajtu PolovniTelefoni</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Odnosi Ulagaca</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Ocene Korisnika</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Uslovi Koriscenja</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Kontaktirajte Nas</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-row footer-details">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-details row">
                        <div class="site-brand col-xl-6 col-lg-6 col-md-12 col-sm-12 p-2">
                            <a href="#">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo Polovni Telefoni">
                            </a>
                        </div>
                        <div class="site-social d-flex justify-content-xl-end justify-content-lg-end justify-content-md-start align-items-center p-2 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <ul>
                                <li class="p-1">
                                    <a href="#">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul>
                                <li class="p-1">
                                    <a href="#">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul>
                                <li class="p-1">
                                    <a href="#">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul>
                                <li class="p-1">
                                    <a href="#">
                                        <i class="fa-brands fa-pinterest"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul>
                                <li class="p-1">
                                    <a href="#">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul>
                                <li class="p-1">
                                    <a href="#">
                                        <i class="fa-brands fa-youtube"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="site-details">
                        <ul class="tags">
                            <li><a href="#">apple</a></li>
                            <li><a href="#">apple satovi</a></li>
                            <li><a href="#">apple iPhone 14 Pro</a></li>
                            <li><a href="#">HD</a></li>
                            <li><a href="#">HTC</a></li>
                            <li><a href="#">HTC One</a></li>
                            <li><a href="#">Ipad</a></li>
                            <li><a href="#">Ipad 4 16Gb</a></li>
                            <li><a href="#">Ipad Mini</a></li>
                            <li><a href="#">Samsung</a></li>
                            <li><a href="#">Samsung Galaxy M11</a></li>
                            <li><a href="#">Samsung Galaxy M31</a></li>
                            <li><a href="#">Samsung Galaxy S5 - 64Gb</a></li>
                            <li><a href="#">Samsung Galaxy Tab 4</a></li>
                            <li><a href="#">Xiaomi</a></li>
                            <li><a href="#">Xiaomi Redmi Note 10 Pro</a></li>
                            <li><a href="#">Xiaomi Redmi Note 9s</a></li>
                            <li><a href="#">Xiaomi 12X</a></li>
                            <li><a href="#">Huawei</a></li>
                            <li><a href="#">huawei nova 9 SE 8Gb</a></li>
                            <li><a href="#">huawei Honor 9 Lite</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="footer-row footer-details">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-details site-details2 row">
                        <div class="site-brand col-xl-6 col-lg-6 col-md-12 col-sm-12 p-2">
                            <p>&copy; 2023 PolovniTelefoni. Sva prava zadrzana. Napravljeno od strane FlaminqoCompany.</p>
                        </div>
                        <div class="site-social2 d-flex justify-content-xl-end justify-content-lg-end justify-content-md-start align-items-center p-2 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <ul>
                                <li class="p-1">
                                    <a href="#">
                                        <i class="fa-brands fa-cc-visa" style="color: #ed6969;"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul>
                                <li class="p-1">
                                    <a href="#">
                                        <i class="fa-brands fa-cc-mastercard" style="color: #ed6969;"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul>
                                <li class="p-1">
                                    <a href="#">
                                        <i class="fa-brands fa-cc-paypal" style="color: #ed6969;"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary d-none" id="show-subscribe-modal" data-toggle="modal" data-target="#exampleModal">
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Uspesno ste se pretplatili!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background-color: transparent; border:none; font-size: 20px;">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    Cestitamo! Vi ste sada deo nase ekskluzivne zajednice koja prva saznaje o svim vrucim ponudama, tajnim popustima i svezim novostima.
                    <!-- U buducnosti, vasa e-mail adresa ce biti most ka svim iznenadjenjima koje pripremamo. Drzite se pripravno, jer sledi uzbudljivo putovanje! -->
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">U redu</button>
            </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        const subscribe = document.getElementById('subscribe');
        const subscribeError = document.getElementById('subscribe-error');
        const subscribeButton = document.getElementById('subscribe-btn');

        subscribe.addEventListener('submit', function(event){
            event.preventDefault();
            subscribeButton.disabled = "true";
            subscribeError.style.display = 'none';
            var email = document.getElementsByClassName('subscribe-input')[0].value;
            if(email == ''){
                alert('Email adresa je obavezna');
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
                url: "{{ route('subscribe') }}",
                data: formData,
                success: function(response){
                    subscribeButton.disabled = "false";
                    subscribeButton.enabled = "true";
                    switch(response){
                        case '1':
                            document.getElementById('show-subscribe-modal').click();
                            return;
                        case '2':
                            subscribeError.innerHTML = 'Korisnik sa unetom email adresom je vec pretplacen.';
                            subscribeError.style.display = 'block';
                            return;
                        default:
                            subscribeError.innerHTML = 'Doslo je do neocekivane greske. Molimo pokusajte kasnije!';
                            subscribeError.style.display = 'block';
                            return;
                    }
                }
            });
        });
    </script>
</footer>