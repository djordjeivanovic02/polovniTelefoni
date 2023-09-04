<!--Za velike uredjaje-->
<nav class="navbar navbar-expand-xl custom-navbar
    d-xxl-block d-xl-block
    d-lg-none d-md-none d-sm-none d-xs-none d-none
    p-0
">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav pt-2 pb-2">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center" href="#">O nama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center" href="<?php echo e(route('my-account')); ?>">Moj nalog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center" href="#">Istaknuti proizvodi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center" href="#">Lista želja</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto d-none d-lg-flex">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center" href="#">Prati posiljku</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="jezikDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Srpski</a>
          <ul class="dropdown-menu" aria-labelledby="jezikDropdown">
            <li><a class="dropdown-item" href="#">Engleski</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="valutaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">RSD</a>
          <ul class="dropdown-menu" aria-labelledby="valutaDropdown">
            <li><a class="dropdown-item" href="#">EUR</a></li>
            <li><a class="dropdown-item" href="#">USD</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<!-- Za srednje uredjaje -->

<nav class="navbar navbar-expand navbar-light custom-navbar
d-xxl-none d-xl-none
    d-lg-block d-md-block d-sm-block d-xs-block d-block
    p-0"
">
  <div class="container">
    <div class="collapse navbar-collapse justify-content-center" id="navbarText">
      <ul class="navbar-nav d-flex">
        <li class="nav-item">
          <a class="nav-link fw-bold d-flex align-items-center" href="#">Prati posiljku</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-bold d-flex align-items-center" href="#" id="jezikDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Srpski</a>
          <ul class="dropdown-menu" aria-labelledby="jezikDropdown">
            <li><a class="dropdown-item dropdown" href="#">Engleski</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-bold d-flex align-items-center" href="#" id="valutaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">RSD</a>
          <ul class="dropdown-menu" aria-labelledby="valutaDropdown">
            <li><a class="dropdown-item" href="#">EUR</a></li>
            <li><a class="dropdown-item" href="#">USD</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <hr class="p-0 m-0">
</nav>





<!-- Za Velike Uredjaje Drugi NAV BAR -->

<nav class="navbar navbar-expand-lg navbar-light
d-xxl-block d-xl-block
    d-lg-none d-md-none d-sm-none d-xs-none d-none
    p-0
">
  <div class="container">
      <a class="navbar-brand" href="/"><img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class='navbar-logo'></a>
      <form class="d-flex custom-search-form justify-content-center" id="form-container">
          <div class="form-select-wrapper" id="form-container">
              <select class="form-select" id="mySelect" onchange="adjustSelectWidth(this)">
                  <option>Sve</option>
                  <option>Mobilni Telefoni</option>
                  <option>Tableti</option>
              </select>
          </div>
          <div id="search-products" class="d-flex align-items-center">
              <img src="<?php echo e(asset('images/search-icon.png')); ?>" alt="">
              <input class="form-control h-100" type="text" placeholder="Pretrazite Vas omiljeni proizvod...">
          </div>
          <button class="btn btn-primary fw-bold" type="submit">Pretraga</button>
      </form>
      <div class="navbar-nav d-flex align-items-center">
        <div class="row w-100 m-0">
          <a class="nav-link d-inline-block col-3 m-0" href="<?php echo e(route('my-account')); ?>">
            <img src="<?php echo e(asset('images/no-user.png')); ?>" alt="Prijavi se" style="width: 30px"> 
          </a>
          <div class="d-inline-block col-8 m-0" style="cursor: pointer" onclick="window.location.href = '/my-account/dashboard'">
            <p style="font-size: 12px; margin-bottom: 0">
              <?php echo e(Session::get('user') ? Session::get('user')->getUsername() ? 'Dobrodosli' : 'Prijavi se' : 'Prijavi se na'); ?>

            </p>
            <p style="font-size: 14px; font-weight: bold; margin-bottom: 0">
              <?php echo e(Session::get('user') ? Session::get('user')->getUsername() ? Session::get('user')->getUsername() : 'Profil' : 'Profil'); ?>

            </p>
          </div>
        </div>
      </div>
      <div class="navbar-nav">
          <a class="nav-link" href="#">
            <img src="<?php echo e(asset('images/heart.png')); ?>" alt="Prijavi se" style="width: 30px"> 
          </a>
          <div class="row w-100 m-0">
            <a class="nav-link d-inline-block col-4 m-0" href="#">
              <img src="<?php echo e(asset('images/shop-bag.png')); ?>" alt="Prijavi se" style="width: 30px"> 
            </a>
            <div class="d-inline-block col-8 m-0" style="cursor: pointer">
              <p style="font-size: 12px; margin-bottom: 0">Ukupno</p>
              <p style="font-size: 14px; font-weight: bold; margin-bottom: 0">0.00 RSD</p>
            </div>
          </div>
      </div>
  </div>
</nav>

<script>

    $(document).ready(function() {
        adjustSelectWidth();
    });

    $(window).on('resize', function() {
        adjustSelectWidth();
    });

    $('#mySelect').on('change', function() {
        adjustSelectWidth();
    });

    function adjustSelectWidth() {
        var selectElement = $('#mySelect');
        var selectedOption = selectElement.find('option:selected').text();
        var textWidth = getTextWidth(selectedOption, selectElement.css('font'));
        selectElement.width(textWidth);
        var selectWidth = document.getElementById('mySelect').offsetWidth;
        var x = document.getElementById('form-container').offsetWidth * 0.7;
        $('#search-products').width(x-selectWidth);
        //console.log(document.getElementById('search-products').offsetWidth);
    }

    function getTextWidth(text, font) {
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        context.font = font;
        var metrics = context.measureText(text);
        return metrics.width;
    }
</script>


<!-- Za male uredjaje drugi nav bar -->

<nav class="navbar navbar-light d-xxl-none d-xl-none d-lg-block d-md-block d-sm-block d-xs-block d-block p-0">
    <div class="container-fluid hamburger pt-2 pb-2">
        <button onclick="openMobileMenu()" class="navbar-toggler open-phone-menu" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent2" aria-controls="navbarToggleExternalContent1" aria-expanded="false" aria-label="Toggle navigation">
            <img src="<?php echo e(asset('images/hamburger-navbar.png')); ?>" alt="">
        </button>
        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="" style="width: 90%; max-width: 150px">
        <img src="<?php echo e(asset('images/shop-bag.png')); ?>" alt="Prijavi se" style="width: 30px"> 
    </div>
    <hr class="mt-0">
</nav>
<div class="phone-menu-background" onclick="closeMobileMenu()">
  <div class="phone-menu" id='phone-menu'>
    <div class="container">
      <div class="row d-flex align-items-center">
        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="logo" class="col-10 ">
        <img src="<?php echo e(asset('images/close.png')); ?>" alt="close" class="col-2" style="height: 30px" onclick="closeMobileMenu()">
      </div>
    </div>
    <div class="container" id="category-choose-mobile">
      <ul class="navbar-nav mt-2 bg-light mb-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center w-75 m-auto" href="#">
              <img class="d-inline-block" src="<?php echo e(asset('images/hamburger-navbar.png')); ?>" alt="" style="width: 20px;">
              <span class="flex-grow-1 text-left p-3" style="font-weight: 600">Sve Kategorije</span>
              <i class="bi-chevron-down"></i>
            </a>
          <ul class="dropend dropdown-menu rounded-0 w-100 m-0 p-0">
            <li class="pt-2 pb-2 pl-0">
              <a class="dropdown-toggle" href="" onclick="showMobilePhones()" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="d-inline-block" src="<?php echo e(asset('images/mobile-phone-icon.png')); ?>" alt="">
                Mobilni Telefoni
              </a>
            </li>
            <hr class="dropdown-divider">
            <li class="p-2">
              <img class="d-inline-block" src="<?php echo e(asset('images/headphones.png')); ?>" alt="">
              <a class="d-inline-block" href="#">Slusalice</a>
            </li>
            <hr class="dropdown-divider">
            <li class="p-2">
              <img class="d-inline-block" src="<?php echo e(asset('images/charger.png')); ?>" alt="">
              <a class="d-inline-block" href="#">Punjaci</a>
            </li>
            <hr class="dropdown-divider">
            <li class="p-2">
              <img class="d-inline-block" src="<?php echo e(asset('images/tablet.png')); ?>" alt="">
              <a class="d-inline-block" href="#">Tableti</a>
            </li>
          </ul>
        </li>
      </ul>
      <hr class="m-0 p-0">
    
    <div class="container mt-3 mb-3">
      <ul class="list-unstyled dropend">
        <li class="nav-item p-2">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#">
            <span class="flex-grow-1 text-left">Pocetna</span>
            <i class="bi bi-chevron-right rotate-180"></i>
          </a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#">
            <span class="flex-grow-1 text-left">Sop</span>
            <i class="bi bi-chevron-right rotate-180"></i>
          </a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link d-flex align-items-center" href="">
            <img class="d-inline-block" src="<?php echo e(asset('images/mobile-phone-icon.png')); ?>" alt="phone" style="width: 30px; margin-right: 10px">
            Prodaja Telefona
          </a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link d-flex align-items-center" href="">
            <img class="d-inline-block" src="<?php echo e(asset('images/headphones.png')); ?>" alt="phone" style="width: 30px; margin-right: 10px">
            Slusalice
          </a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#">
            <span class="flex-grow-1 text-left">Blog</span>
            <i class="bi bi-chevron-right rotate-180"></i>
          </a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#">
            <span class="flex-grow-1 text-left">Kontakt</span>
            <i class="bi bi-chevron-right rotate-180"></i>
          </a>
        </li>
      </ul>
      <hr class="mb-3 p-0">
      <ul class="list-unstyled">
        <li class="nav-item p-2">
          <a class="nav-link d-flex align-items-center" href="#">
            <span class="flex-grow-1 text-left">Prati posiljku</span>
          </a>
        </li>
        <ul class="navbar-nav mt-2 mb-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center w-100 p-2" href="#">
              <span class="flex-grow-1 text-left">Srpski</span>
              <i class="bi-chevron-down"></i>
            </a>
          <ul class=" dropdown-menu rounded-0 w-100 m-0 p-0">
            <li class="pt-2 pb-2 pl-0">
              <a href="" role="button" >
                English
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center w-100 p-2" href="#">
              <span class="flex-grow-1 text-left">RSD</span>
              <i class="bi-chevron-down"></i>
            </a>
          <ul class="dropdown-menu rounded-0 w-100 m-0 p-0">
            <li class="pt-2 pb-2 pl-0">
              <a href="" role="button" >
                EUR
              </a>
            </li>
            <li class="pt-2 pb-2 pl-0">
              <a href="" role="button">
                USD
              </a>
            </li>
          </ul>
        </li>
        <hr class="mb-3 p-0">
        <li class="nav-item p-2">
          <a class="nav-link d-flex align-items-center" href="">
            <img class="d-inline-block" src="<?php echo e(asset('images/no-user.png')); ?>" alt="phone" style="width: 30px; margin-right: 10px">
            Moj nalog
          </a>
        </li>

        <p class="mt-4 copyright">
          Sadržaj sajta polovnitelefoni.shop je vlasništvo <b>FlaminqoCompany</b>. Zabranjeno je njegovo preuzimanje bez dozvole FlaminqoCompany, zarad komercijalne upotrebe ili u druge svrhe, osim za lične potrebe posetilaca sajta.
          Sajt Polovni Telefoni je deo FlaminqoCompany grupe.
        </p>
    </div>
  </div>
  <div class="category-mobile-phones" id="category-mobile-phones">
    <div class="container m-3">
      <img src="<?php echo e(asset('images/back-icon.png')); ?>" alt="back-icon" style="width: 25px" onclick="closeMobilePhones()">
      <a class="m-2" style="font-size: 18px; font-weight: 600">Mobilni Telefoni</a>
    </div>
    <hr class="m-3">
    <div class="container m-3">
    <ul class="list-unstyled">
      <li class="pt-2 pl-0">
        <a href="#">Apple iPhone</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">Samsung</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">Xiaomi</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">Huawei</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">Motorola</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">Nokia</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">Google</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">OnePlus</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">Honor</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">Alcatel</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">Poco</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">Realme</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">Tesla</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">LG</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">Microsoft</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">ZTE</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">Oppo</a>
      </li>
      <li class="pt-2 pl-0">
        <a href="#">Vivo</a>
      </li>
      <li class="pt-2 pb-2 pl-0">
        <a href="#">Blackberry</a>
      </li>
    </ul>
    </div>
  </div>
  </div>
</div>


<!-- Otvaranje i zatvaranje menija za male uredjaje -->
<script>
  var bck = document.getElementsByClassName('phone-menu-background')[0];
  function openMobileMenu(){
    bck.style.display = 'block';
    document.getElementsByClassName('phone-menu')[0].classList.toggle('phone-menu-showed');
  }
  function closeMobileMenu(){
    bck.style.display = 'none';
  }
  function showMobilePhones(){
    document.getElementById('category-choose-mobile').style.display='none';
    document.getElementById('category-mobile-phones').style.display='block';
  }
  function closeMobilePhones(){
    document.getElementById('category-mobile-phones').style.display='none';
    document.getElementById('category-choose-mobile').style.display='block';
  }
</script>




<!-- Za velike uredjaje treci navbar -->
<nav class="navbar navbar-expand-lg navbar-light mb-0 pb-0
d-xxl-block d-xl-block
    d-lg-none d-md-none d-sm-none d-xs-none d-none
">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <div class="bg-light" style="width: 250px">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-black d-inline-block m-1" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="d-inline-block" src="<?php echo e(asset('images/hamburger-navbar.png')); ?>" alt="" srcset="" style="width: 20px; margin-left: 10px; margin-right: 10px;">
              Sve Kategorije
            </a>
            <ul class="dropend dropdown-menu w-100 rounded-0" aria-labelledby="categoryDropdown" >
              <li class="pt-2 pb-2 pl-0">
                <a class="dropdown-toggle" href="#" id="subcategoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img class="d-inline-block" src="<?php echo e(asset('images/mobile-phone-icon.png')); ?>" alt="">
                  Mobilni Telefoni
                </a>
                <ul class="dropdown-menu rounded-0 m-0 p-0 mobile-phone-background" aria-labelledby="subcategoryDropdown">
                  <li class="pt-2 pb-2 pl-0">
                    <a href="#" style="font-size: 20px; color: #ed6969">Svi telefoni</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">Apple iPhone</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">Samsung</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">Xiaomi</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">Huawei</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">Motorola</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">Nokia</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">Google</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">OnePlus</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">Honor</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">Alcatel</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">Poco</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">Realme</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">Tesla</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">LG</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">Microsoft</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">ZTE</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">Oppo</a>
                  </li>
                  <li class="pt-2 pl-0">
                    <a href="#">Vivo</a>
                  </li>
                  <li class="pt-2 pb-2 pl-0">
                    <a href="#">Blackberry</a>
                  </li>
                </ul>
              </li>
              <hr class="dropdown-divider">
              <li class="p-2">
                <img class="d-inline-block" src="<?php echo e(asset('images/headphones.png')); ?>" alt="">
                <a class="d-inline-block" href="#">Slusalice</a>
              </li>
              <hr class="dropdown-divider">
              <li class="p-2">
                <img class="d-inline-block" src="<?php echo e(asset('images/charger.png')); ?>" alt="">
                <a class="d-inline-block" href="#">Punjaci</a>
              </li>
              <hr class="dropdown-divider">
              <li class="p-2">
                <img class="d-inline-block" src="<?php echo e(asset('images/tablet.png')); ?>" alt="">
                <a class="d-inline-block" href="#">Tableti</a>
              </li>
            </ul>
          </li>
        </div>
        <div class="third-navbar d-flex">
          <li class="nav-item p-2"><a class="nav-link" href="#">Pocetna</a></li>
          <li class="nav-item p-2"><a class="nav-link" href="#">Sop</a></li>
          <li class="nav-item p-2"><a class="nav-link" href="#">Prodaja Telefona</a></li>
          <li class="nav-item p-2"><a class="nav-link" href="#">Slusalice</a></li>
          <li class="nav-item p-2"><a class="nav-link" href="#">Blog</a></li>
          <li class="nav-item p-2"><a class="nav-link" href="#">Kontakt</a></li>
        </div>
      </ul>
    </div>
    <div class="navbar-nav">
      <li class="nav-item dropdown">
        <div class="d-flex align-items-center">
          <img src="<?php echo e(asset('images/discount.png')); ?>" alt="" class="d-inline-block" style="width: 25px; margin-right: 5px;">
          <a class="nav-link dropdown-toggle text-black d-inline-block" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="d-inline-block m-0">
              <p class="m-0" style="font-size: 10px; color: #98a5b3">Samo ovog vikenda</p>
              <p class="m-0" style="font-size: 14px; font-weight: 600">Super snizenja</p>
            </div>  
          </a>
        </div>
        <ul class="dropdown-menu" aria-labelledby="userDropdown">
          <li><a href="#">Profil</a></li>
          <li><a href="#">Odjava</a></li>
        </ul>
      </li>
    </div>
  </div>
  <hr class="m-0 p-0">
</nav>


<!-- JavaScript kod za otvaranje dropdown menija na hover -->
<script>
  document.querySelectorAll('.dropdown').forEach(function (dropdown) {
    dropdown.addEventListener('click', function () {
      if(!dropdown.querySelector('.dropdown-menu').classList.contains('show'))
        dropdown.querySelector('.dropdown-menu').classList.add('show');
      else
        dropdown.querySelector('.dropdown-menu').classList.remove('show');
    });
    dropdown.addEventListener('mouseover', function () {
      dropdown.querySelector('.dropdown-menu').classList.add('show');
    });

    dropdown.addEventListener('mouseout', function () {
      dropdown.querySelector('.dropdown-menu').classList.remove('show');
    });
  });
</script><?php /**PATH C:\Users\djord\OneDrive\Documents\Laravel\polovnitelefoni\resources\views/header.blade.php ENDPATH**/ ?>