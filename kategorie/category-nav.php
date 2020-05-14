



<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title><?php echo $nazov ?> | Martinus</title>
    <meta name="author" content="Tomáš Ulej">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="theme-color" content="#D22121">
    <meta name="verify-v1" content="T+OHlS5UzwUGqeLzY9VCoZi05W1LWAjmytPCIQ2f3kw=">
    <link rel="stylesheet" href="fonts/Tabac-Sans/style.b0d0f9cd.css">
    <link rel="stylesheet" href="styles/main.b4a905c2.css">
    <script src="scripts/plugins/modernizr.72fdcb16.js"></script>
    <script src="https://kit.fontawesome.com/ab4eee0eea.js" crossorigin="anonymous"></script>
      <script
              src="https://code.jquery.com/jquery-3.5.0.min.js"
              integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
              crossorigin="anonymous"></script>


      <script src="http://demos.flesler.com/jquery/scrollTo/js/jquery.scrollTo-min.js"></script>

    <script>

    function loadProducts() {
        $('#product_list').html('<div class="wrapper-main"><svg class="icon icon-loader icon--xlarge text-color-grey loader" role="img" aria-hidden="true">\n' +
            '<use xlink:href="icons_/app.svg#icon-loader"></use>\n' +
            '</svg></div>');
        $('#product_list').load('products.php');
    }


    function addFilter(co) {
       $("#filter_badges").show();
       $("#filter_badges_content").append("                  <div class=\"badge mb-tiny filter_badge \">" + co + "\n"+
           "                    <div class=\"btn btn--small btn--clean btn--equal mb-none close\" onclick=\"$(this).parent().fadeOut();\">\n" +
           "                                        <svg class=\"icon icon-close  icon--small\" role=\"img\" aria-hidden=\"true\">\n" +
           "                                          <use xlink:href=\"icons_/app.svg#icon-close\"></use>\n" +
           "                                        </svg>\n" +
           "                    </div>\n" +
           "                  </div>");
        $('body').scrollTo('#produkty');
        loadProducts();

    }

    </script>





  </head>
  <body class="undefined has-header-warning" onload="loadProducts();">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=227452250615460';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div id="page-container">

     <!-- <div class="section section--small header-warning no-pad bg-violet">
        <div class="wrapper-main">
          <div class="mb-tiny"></div>
          <div class="bar mb-tiny align-items-middle">
            <div class="bar__item bar__item--shrinkable text-space-right-tiny">
              <svg class="icon icon-footer-package  icon--medium text-color-white" role="img" aria-hidden="true">
                <use xlink:href="icons_/app.svg#icon-footer-package"></use>
              </svg>
            </div>
            <div class="bar__item bar__item--fill text-color-white line-small"><small> Nezmeškajte 5€ poukážku k nákupu! <a class="link link--white text-bold" href="#">Viac info</a></small></div>
          </div>
        </div>
      </div> -->
      <header class="header">
        <div class="header__wrapper" data-sticky>
          <div class="wrapper-main">
            <div class="bar header__bar">
              <div class="bar__item header__logo"><a href="#">
                  <!--img(src=`${assetsPrefix}images/content/logo/november.svg`, alt="Martinus").show-l--><img class="show-l" src="images/content/logo.svg" alt="Martinus"><img class="hide-l" src="images/content/logo-small.svg" alt="Martinus"></a>
              </div>
              <div class="bar__item header__nav">
                <div class="btn-layout btn-layout--horizontal">
                  <div class="btn-dropdown no-mrg show-l">
                    <button class="btn btn--clean header-btn" data-mega-menu-trigger="#mega-menu-knihy" data-toggle="self" data-toggle-icon="icons_/app.svg#icon-chevron-up" data-toggle-expand aria-haspopup="true">Knihy
                            <svg class="icon icon-chevron-down icon-dropdown icon--small" role="img" aria-hidden="true">
                              <use xlink:href="icons_/app.svg#icon-chevron-down"></use>
                            </svg>
                    </button>
                  </div>
                  <div class="btn-dropdown no-mrg show-l">
                    <button class="btn btn--clean header-btn" data-mega-menu-trigger="#mega-menu-eknihy" data-toggle="self" data-toggle-icon="icons_/app.svg#icon-chevron-up" data-toggle-expand aria-haspopup="true">E-Knihy
                            <svg class="icon icon-chevron-down icon-dropdown icon--small" role="img" aria-hidden="true">
                              <use xlink:href="icons_/app.svg#icon-chevron-down"></use>
                            </svg>
                    </button>
                  </div>
                  <div class="btn-dropdown no-mrg show-l">
                    <button class="btn btn--clean header-btn" data-mega-menu-trigger data-toggle="self" data-toggle-icon="icons_/app.svg#icon-chevron-up" data-toggle-expand aria-haspopup="true">Filmy
                            <svg class="icon icon-chevron-down icon-dropdown icon--small" role="img" aria-hidden="true">
                              <use xlink:href="icons_/app.svg#icon-chevron-down"></use>
                            </svg>
                    </button>
                  </div>
                  <div class="btn-dropdown no-mrg hide">
                    <button class="btn btn--clean header-btn" data-mega-menu-trigger data-toggle="self" data-toggle-icon="icons_/app.svg#icon-chevron-up" data-toggle-expand aria-haspopup="true">Hry
                            <svg class="icon icon-chevron-down icon-dropdown icon--small" role="img" aria-hidden="true">
                              <use xlink:href="icons_/app.svg#icon-chevron-down"></use>
                            </svg>
                    </button>
                  </div>
                  <div class="btn-dropdown no-mrg btn-dropdown--no-icon show-l">
                    <button class="btn btn--clean header-btn" data-mega-menu-trigger="#mega-menu-other" data-toggle="self" data-toggle-expand aria-haspopup="true">
                            <svg class="icon icon-dots  icon--medium" role="img" aria-hidden="true">
                              <use xlink:href="icons_/app.svg#icon-dots"></use>
                            </svg>
                    </button>
                  </div>
                  <div class="btn-dropdown no-mrg btn-dropdown--no-icon hide-l">
                    <button class="btn btn--clean header-btn" data-mega-menu-trigger data-toggle="self" data-toggle-icon="icons_/app.svg#icon-close" data-toggle-expand aria-haspopup="true">
                            <svg class="icon icon-menu  icon--medium" role="img" aria-hidden="true">
                              <use xlink:href="icons_/app.svg#icon-menu"></use>
                            </svg>
                    </button>
                  </div>
                </div>
              </div>
              <div class="bar__item bar__item--fill header__search header-search">
                <div class="hide-m header-search__toggle no-mrg">
                  <button class="btn btn--clean header-btn no-mrg-bottom" data-toggle=".header" data-toggle-class-target="is-search-active">
                          <svg class="icon icon-search  icon--medium" role="img" aria-hidden="true">
                            <use xlink:href="icons_/app.svg#icon-search"></use>
                          </svg>
                  </button>
                </div>
                <div class="hide-m header-search__back">
                  <button class="btn btn--clean header-btn no-mrg-bottom" data-toggle=".header" data-toggle-class-target="is-search-active">
                          <svg class="icon icon-arrow-left  icon--medium" role="img" aria-hidden="true">
                            <use xlink:href="icons_/app.svg#icon-arrow-left"></use>
                          </svg>
                  </button>
                </div>
                <div class="header-search__search" style="position: relative;">
                  <div class="form-control form-control--input no-mrg-bottom">
                    <div class="input-addons">
                      <input class="input input--dark" id="search-in-header" type="text" placeholder="Titul, kategória alebo autor" data-input data-toggle-focus>
                      <div class="input-addons__item header-search__empty input-addons__item--dark">
                              <svg class="icon icon-search  icon--medium" role="presentation" aria-label="Search">
                                <use xlink:href="icons_/app.svg#icon-search"></use>
                              </svg>
                      </div>
                      <div class="input-addons__item input-addons__item no-pad header-search__value">
                        <div class="btn btn--primary text-nowrap">
                                <svg class="icon icon-search  icon--medium icon--left" role="presentation" aria-label="Search">
                                  <use xlink:href="icons_/app.svg#icon-search"></use>
                                </svg>Hladať
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bar__item header__user">
                      <div class="btn-dropdown btn-dropdown--no-icon header-user">
                        <button class="btn btn--clean btn--lowercase header-btn header-btn--no-arrow" data-toggle-expand data-toggle="self, next">
                                <svg class="icon icon-user  icon--medium icon--left header-user__icon" role="img" aria-hidden="true">
                                  <use xlink:href="icons_/app.svg#icon-user"></use>
                                </svg><span class="header-user__name">Janko</span>
                        </button>
                        <div class="dropdown dropdown--arrowhead" data-dropdown data-toggle-expand aria-expanded="false" style="min-width: 150px; max-height: 400px;">
                          <div class="dropdown__wrap" style="max-height: 400px;">
                            <div class="dropdown__group bg-secondary">
                              <h5 class="mb-none">Môj MARTINUS</h5><span class="text-medium text-color-grey text-semibold">Janko Martinusák</span>
                            </div><a class="dropdown__item" href="to-download.html">Na stiahnutie</a><a class="dropdown__item" href="my-library.html">Wishlist</a><a class="dropdown__item" href="orders.html">Moje objednávky</a><a class="dropdown__item" href="my-account.html">Môj účet</a>
                            <div class="dropdown__group">
                              <hr class="no-mrg">
                            </div><a class="dropdown__item" href="my-library.html">Moja knižnica</a><a class="dropdown__item" href="club-profile-private.html">Založiť profil
                                    <svg class="icon icon-plus  text-color-success icon--medium" role="img" aria-hidden="true" style="position: relative; top: -0.15em;">
                                      <use xlink:href="icons_/app.svg#icon-plus"></use>
                                    </svg></a>
                            <div class="dropdown__group">
                              <hr class="no-mrg">
                            </div><a class="dropdown__item text-color-error" href="#">Odhlásiť</a>
                          </div>
                        </div>
                      </div>
              </div>
              <div class="bar__item header__notifications">
                <div class="btn-dropdown btn-dropdown--no-icon"><a class="btn btn--clean header-btn" style="padding-right: 0.625rem;" data-toggle-expand data-toggle="self, next" data-notification="2">
                          <svg class="icon icon-bell  icon--medium" role="img" aria-hidden="true">
                            <use xlink:href="icons_/app.svg#icon-bell"></use>
                          </svg></a>
                  <div class="dropdown dropdown--arrowhead" data-dropdown data-toggle-expand aria-expanded="false" style="min-width: 300px; max-height: 420px;">
                    <div class="dropdown__wrap" style="max-height: 420px;">
                      <div class="dropdown__group bg-secondary">
                        <h5 class="mb-none">Oznámenia</h5>
                      </div><a class="flex dropdown__item dropdown__item--small align-items-middle">
                        <div class="flex-shrinkable text-space-right text-space-left-tiny">
                          <div class="portrait portrait--small" style="background-image: url('https://www.martinus.sk/data/autori/img/a1666.jpg');"></div>
                        </div>
                        <div class="flex-fill text-space-right"><b>Janko Martinusak </b><span class="text-color-grey-dark">pridal recenziu ku knihe <b>Harry Potter a Fenixov rad</b></span></div></a>
                      <hr class="mb-tiny"><a class="flex dropdown__item dropdown__item--small align-items-middle">
                        <div class="flex-shrinkable text-space-right text-space-left-tiny">
                          <div class="portrait portrait--small" style="background-image: url('https://www.martinus.sk/data/autori/img/a1666.jpg');"></div>
                        </div>
                        <div class="flex-fill text-space-right"><b>Janko Martinusak </b><span class="text-color-grey-dark">pridal recenziu ku knihe <b>Harry Potter a Fenixov rad</b></span></div></a>
                      <hr class="mb-tiny"><a class="flex dropdown__item dropdown__item--small align-items-middle">
                        <div class="flex-shrinkable text-space-right text-space-left-tiny">
                          <div class="portrait portrait--small" style="background-image: url('https://www.martinus.sk/data/autori/img/a1666.jpg');"></div>
                        </div>
                        <div class="flex-fill text-space-right"><b>Janko Martinusak </b><span class="text-color-grey-dark">pridal recenziu ku knihe <b>Harry Potter a Fenixov rad</b></span></div></a>
                      <hr class="mb-tiny"><a class="flex dropdown__item dropdown__item--small align-items-middle">
                        <div class="flex-shrinkable text-space-right text-space-left-tiny">
                          <div class="portrait portrait--small" style="background-image: url('https://www.martinus.sk/data/autori/img/a1666.jpg');"></div>
                        </div>
                        <div class="flex-fill text-space-right"><b>Janko Martinusak </b><span class="text-color-grey-dark">pridal recenziu ku knihe <b>Harry Potter a Fenixov rad</b></span></div></a>
                      <hr class="mb-tiny"><a class="flex dropdown__item dropdown__item--small align-items-middle">
                        <div class="flex-shrinkable text-space-right text-space-left-tiny">
                          <div class="portrait portrait--small" style="background-image: url('https://www.martinus.sk/data/autori/img/a1666.jpg');"></div>
                        </div>
                        <div class="flex-fill text-space-right"><b>Janko Martinusak </b><span class="text-color-grey-dark">pridal recenziu ku knihe <b>Harry Potter a Fenixov rad</b></span></div></a>
                      <hr class="mb-tiny"><a class="flex dropdown__item dropdown__item--small align-items-center">
                        <div class="flex-shrinkable">Viac noviniek
                                <svg class="icon icon-arrow-right " role="img" aria-hidden="true">
                                  <use xlink:href="icons_/app.svg#icon-arrow-right"></use>
                                </svg>
                        </div></a>
                      <div class="mb-tiny"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bar__item header__cart"><a class="btn btn--clean header-btn" href="cart.html" data-notification="4">
                        <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                          <use xlink:href="icons_/app.svg#icon-cart"></use>
                        </svg></a></div>
            </div>
          </div>
        </div>
        <div class="header__mega-menu mega-menu" data-mega-menu>
          <div class="mega-menu__contents" data-mega-menu-contents>
                    <div class="mega-menu__content" data-mega-menu-target id="mega-menu-knihy">
                      <div class="mega-menu__mobile-header" data-toggle="self, parent, [data-mega-menu-contents]" data-toggle-icon="icons_/app.svg#icon-arrow-left" data-toggle-expand aria-haspopup="true">
                        <div class="bar">
                          <div class="bar__item bar__item--fill">Knihy</div>
                          <div class="bar__item">
                                    <svg class="icon icon-arrow-right  icon--medium text-color-grey" role="img" aria-hidden="true">
                                      <use xlink:href="icons_/app.svg#icon-arrow-right"></use>
                                    </svg>
                          </div>


                        </div>
                      </div>
                      <div class="mega-menu__content-wrap">
                        <div class="mega-menu__recommended">
                          <h5>Odporúčame</h5>
                          <ul class="list--expanded no-pad no-mrg-bottom">
                            <li><a class="link link--black" href="#">Vianočné kolekcie
                                        <svg class="icon icon-xmas  icon--medium text-color-success" role="img" aria-hidden="true">
                                          <use xlink:href="icons_/app.svg#icon-xmas"></use>
                                        </svg></a></li>
                            <li><a class="link link--black" href="#">Akcie</a></li>
                            <li><a class="link link--black" href="#">Novinky</a></li>
                            <li><a class="link link--black" href="#">Bestsellery</a></li>
                            <li><a class="link link--black" href="#">Kolekcie</a></li>
                            <li><a class="link link--black" href="#">Pre Vás</a></li>
                          </ul>
                        </div>
                        <div class="mega-menu__categories mega-menu-categories">
                          <div class="row">
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Biografie, životopisy</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Cudzojazyčná lit.</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Ostatné jazyky</a></li>
                                <li><a class="link link--grey" href="#">Dvojjazyčné vydania</a></li>
                                <li><a class="link link--grey" href="#">Španielsky jazyk</a></li>
                                <li><a class="link link--grey" href="#">Francúzsky jazyk</a></li>
                                <li><a class="link link--grey" href="#">Nemecký jazyk</a></li>
                                <li><a class="link link--grey" href="#">Anglický jazyk</a></li>
                                <li><a class="link link--grey" href="#">+ 2 ďalšie</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Deti a mládež</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Domov, hobby</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Ekonomika, právo</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Sociálne zabezpečenie</a></li>
                                <li><a class="link link--grey" href="#">Verejná správa</a></li>
                                <li><a class="link link--grey" href="#">Súkromné právo</a></li>
                                <li><a class="link link--grey" href="#">Verejné právo</a></li>
                                <li><a class="link link--grey" href="#">Medzinárodné právo</a></li>
                                <li><a class="link link--grey" href="#">+ ďalších 5</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Ezoterika, mystika</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Geografia, cestovanie</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">História</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Manažment, biznis</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Medicína, zdravie</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Motivačná literatúra</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Náboženstvo, cirkev</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="mega-menu__content" data-mega-menu-target id="mega-menu-eknihy">
                      <div class="mega-menu__mobile-header" data-toggle="self, parent, [data-mega-menu-contents]" data-toggle-icon="icons_/app.svg#icon-arrow-left" data-toggle-expand aria-haspopup="true">
                        <div class="bar">
                          <div class="bar__item bar__item--fill">E-knihy</div>
                          <div class="bar__item">
                                    <svg class="icon icon-arrow-right  icon--medium text-color-grey" role="img" aria-hidden="true">
                                      <use xlink:href="icons_/app.svg#icon-arrow-right"></use>
                                    </svg>
                          </div>
                        </div>
                      </div>
                      <div class="mega-menu__content-wrap">
                        <div class="mega-menu__recommended">
                          <h5>Odporúčame</h5>
                          <ul class="list--expanded no-pad no-mrg-bottom">
                            <li><a class="link link--black" href="#">Vianočné kolekcie
                                        <svg class="icon icon-xmas  icon--medium text-color-success" role="img" aria-hidden="true">
                                          <use xlink:href="icons_/app.svg#icon-xmas"></use>
                                        </svg></a></li>
                            <li><a class="link link--black" href="#">Akcie</a></li>
                            <li><a class="link link--black" href="#">Novinky</a></li>
                            <li><a class="link link--black" href="#">Bestsellery</a></li>
                            <li><a class="link link--black" href="#">Kolekcie</a></li>
                            <li><a class="link link--black" href="#">Pre Vás</a></li>
                          </ul>
                        </div>
                        <div class="mega-menu__categories mega-menu-categories">
                          <div class="row">
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Biografie, životopisy</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Cudzojazyčná lit.</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Ostatné jazyky</a></li>
                                <li><a class="link link--grey" href="#">Dvojjazyčné vydania</a></li>
                                <li><a class="link link--grey" href="#">Španielsky jazyk</a></li>
                                <li><a class="link link--grey" href="#">Francúzsky jazyk</a></li>
                                <li><a class="link link--grey" href="#">Nemecký jazyk</a></li>
                                <li><a class="link link--grey" href="#">Anglický jazyk</a></li>
                                <li><a class="link link--grey" href="#">+ 2 ďalšie</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Deti a mládež</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Domov, hobby</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Ekonomika, právo</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Sociálne zabezpečenie</a></li>
                                <li><a class="link link--grey" href="#">Verejná správa</a></li>
                                <li><a class="link link--grey" href="#">Súkromné právo</a></li>
                                <li><a class="link link--grey" href="#">Verejné právo</a></li>
                                <li><a class="link link--grey" href="#">Medzinárodné právo</a></li>
                                <li><a class="link link--grey" href="#">+ ďalších 5</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Ezoterika, mystika</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Geografia, cestovanie</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">História</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Manažment, biznis</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Medicína, zdravie</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Motivačná literatúra</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Náboženstvo, cirkev</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Spomienky a udalosti</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti dnes</a></li>
                                <li><a class="link link--grey" href="#">Významné osobnosti minulosť</a></li>
                                <li><a class="link link--grey" href="#">Umelci</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="mega-menu__content" data-mega-menu-target id="mega-menu-other">
                      <div class="mega-menu__mobile-header" data-toggle="self, parent, [data-mega-menu-contents]" data-toggle-icon="icons_/app.svg#icon-arrow-left" data-toggle-expand aria-haspopup="true">
                        <div class="bar">
                          <div class="bar__item bar__item--fill">Ostatné</div>
                          <div class="bar__item">
                                    <svg class="icon icon-arrow-right  icon--medium text-color-grey" role="img" aria-hidden="true">
                                      <use xlink:href="icons_/app.svg#icon-arrow-right"></use>
                                    </svg>
                          </div>
                        </div>
                      </div>
                      <div class="mega-menu__content-wrap">
                        <div class="mega-menu__recommended">
                          <ul class="list--expanded no-pad no-mrg-bottom">
                            <li><a class="link link--black" href="#">Vianočné kolekcie
                                        <svg class="icon icon-xmas  icon--medium text-color-success" role="img" aria-hidden="true">
                                          <use xlink:href="icons_/app.svg#icon-xmas"></use>
                                        </svg></a></li>
                            <li><a class="link link--black" href="#">Kníhkupectvá</a></li>
                            <li><a class="link link--black" href="#">Pomoc</a></li>
                            <li><a class="link link--black" href="#">Niečo 1</a></li>
                            <li><a class="link link--black" href="#">Niečo 2</a></li>
                          </ul>
                        </div>
                        <div class="mega-menu__categories mega-menu-categories">
                          <div class="row">
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Káva a čaj</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Káva typ 1</a></li>
                                <li><a class="link link--grey" href="#">Káva typ 2</a></li>
                                <li><a class="link link--grey" href="#">Čaj typ 1</a></li>
                                <li><a class="link link--grey" href="#">Čaj typ 1</a></li>
                                <li><a class="link link--grey" href="#">ďalších 8</a></li>
                              </ul>
                            </div>
                            <div class="col--l-4 col--m-6"><a class="mega-menu-categories__title" href="#"><span class="link">Hudba</span></a>
                              <ul class="list--dot text-size-small no-pad show-m">
                                <li><a class="link link--grey" href="#">Hudba typ 1</a></li>
                                <li><a class="link link--grey" href="#">Hudba typ 2</a></li>
                                <li><a class="link link--grey" href="#">Hudba typ iny typ</a></li>
                                <li><a class="link link--grey" href="#">Techno</a></li>
                                <li><a class="link link--grey" href="#">+ 25 ďalších</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            <div class="mega-menu__banner text-center">
              <div class="row">
                <div class="col--l-12 col--m-12 col--s-8 ofst--center mb-medium">
                  <div class="h2">Kúpite výhodne spolu</div>
                  <div class="row align-items-bottom mb-medium">
                    <div class="col--6">
                      <div class="thumbnail thumbnail--book thumbnail--large align-self-right">
                        <div class="thumbnail__img-wrap"><img class="img img--fluid mb-medium" src="images/content/books/sample-5.jpg" alt="Základy rybolovu pro kluky a holky - Frank Weissert, Jack Thorne a John Tiffany"></div>
                      </div>
                    </div>
                    <div class="col--6">
                      <div class="thumbnail thumbnail--book thumbnail--large">
                        <div class="thumbnail__img-wrap"><img class="img img--fluid mb-medium" src="images/content/books/sample-8.jpg" alt="Základy rybolovu pro kluky a holky - Frank Weissert, Jack Thorne a John Tiffany"></div>
                      </div>
                    </div>
                  </div>
                  <div class="badges align-items-center mb-medium">
                    <div class="badge badge--primary">Ušetríte 3,50 €</div>
                  </div>
                  <button class="btn btn--primary btn--large mb-small">
                            <svg class="icon icon-cart  icon--left icon--medium" role="img" aria-hidden="true">
                              <use xlink:href="icons_/app.svg#icon-cart"></use>
                            </svg>Kúpiť spolu za <span class="text-nowrap">20,32 €</span>
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col--8 col--m-12 col--l-12 ofst--center"><a href="#"><img class="img--fluid" src="images/content/banners/square.jpg"></a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-overlay" id="checkout-notice" data-modal>
          <article class="modal modal--full">
            <div class="row no-mrg-horizontal modal__wrap">
              <section class="modal__content col--l-8 col--m-6 show-m bg-secondary">
                <div class="bar">
                  <div class="bar__item bar__item--fill text-left"><a class="link text-size-medium" href="#">
                              <svg class="icon icon-arrow-left icon--medium" role="img" aria-hidden="true">
                                <use xlink:href="icons_/app.svg#icon-arrow-left"></use>
                              </svg><span class="text-space-left">Chcem pokračovať v nákupe</span></a></div>
                </div>
                <h5>Posledné z vášho wishlistu</h5>
                <div class="row">
                  <div class="col--l-6">
                            <article class="product product--horizontal mb-medium">
                              <div class="product__img product__cover">
                                <div class="thumbnail thumbnail--book thumbnail--medium-large"><a href="detail-knihy.html">
                                    <div class="thumbnail__img-wrap"><img class="img" src="images/content/books/sample-15.jpg"></div></a>
                                </div>
                              </div>
                              <div class="product__caption">
                                <div class="bar bar--small no-mrg-bottom">
                                  <div class="bar__item bar__item--fill">
                                    <div class="text-ellipsis"><a class="text-semibold link link--product block mb-small line-medium text-size-regular" href="detail-knihy.html" title="Základy rybolovu pro kluky a holky">Základy rybolovu pro kluky a holky</a></div>
                                    <ul class="list-inline list-inline--delimited text-color-grey mb-small text-size-small mb-small">
                                      <li class="no-mrg">Frank Weissert</li>
                                      <li class="no-mrg">Jack Thorne</li>
                                      <li class="no-mrg">John Tiffany</li>
                                    </ul>
                                    <div class="bar bar--small bar--vertical-small mb-small">
                                      <div class="bar__item">
                                        <div class="badge">
                                                  <svg class="icon icon-star  text-color-yellow icon--small" role="img" aria-hidden="true">
                                                    <use xlink:href="icons_/app.svg#icon-star"></use>
                                                  </svg> 4.5
                                        </div>
                                      </div>
                                      <div class="bar__item">
                                        <div class="text-medium text-semibold">9999,99 €</div>
                                      </div>
                                      <div class="bar__item"><a class="btn btn--small btn--clean btn--equal text-color-theme" href="#">
                                                  <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                    <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                  </svg></a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </article>
                  </div>
                  <div class="col--l-6">
                            <article class="product product--horizontal mb-medium">
                              <div class="product__img product__cover">
                                <div class="thumbnail thumbnail--book thumbnail--medium-large"><a href="detail-knihy.html">
                                    <div class="thumbnail__img-wrap"><img class="img" src="images/content/books/sample-15.jpg"></div></a>
                                </div>
                              </div>
                              <div class="product__caption">
                                <div class="bar bar--small no-mrg-bottom">
                                  <div class="bar__item bar__item--fill">
                                    <div class="text-ellipsis"><a class="text-semibold link link--product block mb-small line-medium text-size-regular" href="detail-knihy.html" title="Základy rybolovu pro kluky a holky">Základy rybolovu pro kluky a holky</a></div>
                                    <ul class="list-inline list-inline--delimited text-color-grey mb-small text-size-small mb-small">
                                      <li class="no-mrg">Frank Weissert</li>
                                      <li class="no-mrg">Jack Thorne</li>
                                      <li class="no-mrg">John Tiffany</li>
                                    </ul>
                                    <div class="bar bar--small bar--vertical-small mb-small">
                                      <div class="bar__item">
                                        <div class="badge">
                                                  <svg class="icon icon-star  text-color-yellow icon--small" role="img" aria-hidden="true">
                                                    <use xlink:href="icons_/app.svg#icon-star"></use>
                                                  </svg> 4.5
                                        </div>
                                      </div>
                                      <div class="bar__item">
                                        <div class="text-medium text-semibold">9999,99 €</div>
                                      </div>
                                      <div class="bar__item"><a class="btn btn--small btn--clean btn--equal text-color-theme" href="#">
                                                  <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                    <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                  </svg></a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </article>
                  </div>
                </div>
                <h5>Zákazníci si kúpili aj...</h5>
                <div class="row">
                  <div class="col--l-6">
                            <article class="product product--horizontal mb-medium">
                              <div class="product__img product__cover">
                                <div class="thumbnail thumbnail--book thumbnail--medium-large"><a href="detail-knihy.html">
                                    <div class="thumbnail__img-wrap"><img class="img" src="images/content/books/sample-15.jpg"></div></a>
                                </div>
                              </div>
                              <div class="product__caption">
                                <div class="bar bar--small no-mrg-bottom">
                                  <div class="bar__item bar__item--fill">
                                    <div class="text-ellipsis"><a class="text-semibold link link--product block mb-small line-medium text-size-regular" href="detail-knihy.html" title="Základy rybolovu pro kluky a holky">Základy rybolovu pro kluky a holky</a></div>
                                    <ul class="list-inline list-inline--delimited text-color-grey mb-small text-size-small mb-small">
                                      <li class="no-mrg">Frank Weissert</li>
                                      <li class="no-mrg">Jack Thorne</li>
                                      <li class="no-mrg">John Tiffany</li>
                                    </ul>
                                    <div class="bar bar--small bar--vertical-small mb-small">
                                      <div class="bar__item">
                                        <div class="badge">
                                                  <svg class="icon icon-star  text-color-yellow icon--small" role="img" aria-hidden="true">
                                                    <use xlink:href="icons_/app.svg#icon-star"></use>
                                                  </svg> 4.5
                                        </div>
                                      </div>
                                      <div class="bar__item">
                                        <div class="text-medium text-semibold">9999,99 €</div>
                                      </div>
                                      <div class="bar__item"><a class="btn btn--small btn--clean btn--equal text-color-theme" href="#">
                                                  <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                    <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                  </svg></a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </article>
                  </div>
                  <div class="col--l-6">
                            <article class="product product--horizontal mb-medium">
                              <div class="product__img product__cover">
                                <div class="thumbnail thumbnail--book thumbnail--medium-large"><a href="detail-knihy.html">
                                    <div class="thumbnail__img-wrap"><img class="img" src="images/content/books/sample-15.jpg"></div></a>
                                </div>
                              </div>
                              <div class="product__caption">
                                <div class="bar bar--small no-mrg-bottom">
                                  <div class="bar__item bar__item--fill">
                                    <div class="text-ellipsis"><a class="text-semibold link link--product block mb-small line-medium text-size-regular" href="detail-knihy.html" title="Základy rybolovu pro kluky a holky">Základy rybolovu pro kluky a holky</a></div>
                                    <ul class="list-inline list-inline--delimited text-color-grey mb-small text-size-small mb-small">
                                      <li class="no-mrg">Frank Weissert</li>
                                      <li class="no-mrg">Jack Thorne</li>
                                      <li class="no-mrg">John Tiffany</li>
                                    </ul>
                                    <div class="bar bar--small bar--vertical-small mb-small">
                                      <div class="bar__item">
                                        <div class="badge">
                                                  <svg class="icon icon-star  text-color-yellow icon--small" role="img" aria-hidden="true">
                                                    <use xlink:href="icons_/app.svg#icon-star"></use>
                                                  </svg> 4.5
                                        </div>
                                      </div>
                                      <div class="bar__item">
                                        <div class="text-medium text-semibold">9999,99 €</div>
                                      </div>
                                      <div class="bar__item"><a class="btn btn--small btn--clean btn--equal text-color-theme" href="#">
                                                  <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                    <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                  </svg></a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </article>
                  </div>
                </div>
                <div class="row">
                  <div class="col--l-6">
                            <article class="product product--horizontal mb-medium">
                              <div class="product__img product__cover">
                                <div class="thumbnail thumbnail--book thumbnail--medium-large"><a href="detail-knihy.html">
                                    <div class="thumbnail__img-wrap"><img class="img" src="images/content/books/sample-15.jpg"></div></a>
                                </div>
                              </div>
                              <div class="product__caption">
                                <div class="bar bar--small no-mrg-bottom">
                                  <div class="bar__item bar__item--fill">
                                    <div class="text-ellipsis"><a class="text-semibold link link--product block mb-small line-medium text-size-regular" href="detail-knihy.html" title="Základy rybolovu pro kluky a holky">Základy rybolovu pro kluky a holky</a></div>
                                    <ul class="list-inline list-inline--delimited text-color-grey mb-small text-size-small mb-small">
                                      <li class="no-mrg">Frank Weissert</li>
                                      <li class="no-mrg">Jack Thorne</li>
                                      <li class="no-mrg">John Tiffany</li>
                                    </ul>
                                    <div class="bar bar--small bar--vertical-small mb-small">
                                      <div class="bar__item">
                                        <div class="badge">
                                                  <svg class="icon icon-star  text-color-yellow icon--small" role="img" aria-hidden="true">
                                                    <use xlink:href="icons_/app.svg#icon-star"></use>
                                                  </svg> 4.5
                                        </div>
                                      </div>
                                      <div class="bar__item">
                                        <div class="text-medium text-semibold">9999,99 €</div>
                                      </div>
                                      <div class="bar__item"><a class="btn btn--small btn--clean btn--equal text-color-theme" href="#">
                                                  <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                    <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                  </svg></a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </article>
                  </div>
                  <div class="col--l-6">
                            <article class="product product--horizontal mb-medium">
                              <div class="product__img product__cover">
                                <div class="thumbnail thumbnail--book thumbnail--medium-large"><a href="detail-knihy.html">
                                    <div class="thumbnail__img-wrap"><img class="img" src="images/content/books/sample-15.jpg"></div></a>
                                </div>
                              </div>
                              <div class="product__caption">
                                <div class="bar bar--small no-mrg-bottom">
                                  <div class="bar__item bar__item--fill">
                                    <div class="text-ellipsis"><a class="text-semibold link link--product block mb-small line-medium text-size-regular" href="detail-knihy.html" title="Základy rybolovu pro kluky a holky">Základy rybolovu pro kluky a holky</a></div>
                                    <ul class="list-inline list-inline--delimited text-color-grey mb-small text-size-small mb-small">
                                      <li class="no-mrg">Frank Weissert</li>
                                      <li class="no-mrg">Jack Thorne</li>
                                      <li class="no-mrg">John Tiffany</li>
                                    </ul>
                                    <div class="bar bar--small bar--vertical-small mb-small">
                                      <div class="bar__item">
                                        <div class="badge">
                                                  <svg class="icon icon-star  text-color-yellow icon--small" role="img" aria-hidden="true">
                                                    <use xlink:href="icons_/app.svg#icon-star"></use>
                                                  </svg> 4.5
                                        </div>
                                      </div>
                                      <div class="bar__item">
                                        <div class="text-medium text-semibold">9999,99 €</div>
                                      </div>
                                      <div class="bar__item"><a class="btn btn--small btn--clean btn--equal text-color-theme" href="#">
                                                  <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                    <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                  </svg></a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </article>
                  </div>
                </div>
                <div class="row show-l">
                  <div class="col--l-6">
                            <article class="product product--horizontal mb-medium">
                              <div class="product__img product__cover">
                                <div class="thumbnail thumbnail--book thumbnail--medium-large"><a href="detail-knihy.html">
                                    <div class="thumbnail__img-wrap"><img class="img" src="images/content/books/sample-15.jpg"></div></a>
                                </div>
                              </div>
                              <div class="product__caption">
                                <div class="bar bar--small no-mrg-bottom">
                                  <div class="bar__item bar__item--fill">
                                    <div class="text-ellipsis"><a class="text-semibold link link--product block mb-small line-medium text-size-regular" href="detail-knihy.html" title="Základy rybolovu pro kluky a holky">Základy rybolovu pro kluky a holky</a></div>
                                    <ul class="list-inline list-inline--delimited text-color-grey mb-small text-size-small mb-small">
                                      <li class="no-mrg">Frank Weissert</li>
                                      <li class="no-mrg">Jack Thorne</li>
                                      <li class="no-mrg">John Tiffany</li>
                                    </ul>
                                    <div class="bar bar--small bar--vertical-small mb-small">
                                      <div class="bar__item">
                                        <div class="badge">
                                                  <svg class="icon icon-star  text-color-yellow icon--small" role="img" aria-hidden="true">
                                                    <use xlink:href="icons_/app.svg#icon-star"></use>
                                                  </svg> 4.5
                                        </div>
                                      </div>
                                      <div class="bar__item">
                                        <div class="text-medium text-semibold">9999,99 €</div>
                                      </div>
                                      <div class="bar__item"><a class="btn btn--small btn--clean btn--equal text-color-theme" href="#">
                                                  <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                    <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                  </svg></a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </article>
                  </div>
                  <div class="col--l-6">
                            <article class="product product--horizontal mb-medium">
                              <div class="product__img product__cover">
                                <div class="thumbnail thumbnail--book thumbnail--medium-large"><a href="detail-knihy.html">
                                    <div class="thumbnail__img-wrap"><img class="img" src="images/content/books/sample-15.jpg"></div></a>
                                </div>
                              </div>
                              <div class="product__caption">
                                <div class="bar bar--small no-mrg-bottom">
                                  <div class="bar__item bar__item--fill">
                                    <div class="text-ellipsis"><a class="text-semibold link link--product block mb-small line-medium text-size-regular" href="detail-knihy.html" title="Základy rybolovu pro kluky a holky">Základy rybolovu pro kluky a holky</a></div>
                                    <ul class="list-inline list-inline--delimited text-color-grey mb-small text-size-small mb-small">
                                      <li class="no-mrg">Frank Weissert</li>
                                      <li class="no-mrg">Jack Thorne</li>
                                      <li class="no-mrg">John Tiffany</li>
                                    </ul>
                                    <div class="bar bar--small bar--vertical-small mb-small">
                                      <div class="bar__item">
                                        <div class="badge">
                                                  <svg class="icon icon-star  text-color-yellow icon--small" role="img" aria-hidden="true">
                                                    <use xlink:href="icons_/app.svg#icon-star"></use>
                                                  </svg> 4.5
                                        </div>
                                      </div>
                                      <div class="bar__item">
                                        <div class="text-medium text-semibold">9999,99 €</div>
                                      </div>
                                      <div class="bar__item"><a class="btn btn--small btn--clean btn--equal text-color-theme" href="#">
                                                  <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                    <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                  </svg></a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </article>
                  </div>
                </div>
              </section>
              <section class="modal__content col--l-4 col--m-6 no-pad">
                <div class="bar bar--vertical">
                  <div class="bar__item bar__item--fill no-mrg--m-down">
                    <article class="card card--success mb-small mb-medium-m">
                      <div class="card__content">
                        <div class="bar border-bottom-grey no-mrg--m-down">
                          <div class="bar__item bar__item--fill no-mrg--m-down">
                            <h3 class="text-color-success mb-medium text-semibold mb-none mb-small-m">Do košíka ste práve pridali:</h3>
                          </div>
                          <div class="bar__item no-mrg--m-down">
                            <button class="btn btn--clean mb-none mb-small-m" data-toggle="#checkout-notice">
                                      <svg class="icon icon-close  icon--medium icon--right" role="img" aria-hidden="true">
                                        <use xlink:href="icons_/app.svg#icon-close"></use>
                                      </svg>
                            </button>
                          </div>
                        </div>
                        <div class="mb-small mb-none-m"></div>
                                <article class="product product--horizontal no-mrg-bottom show-m">
                                  <div class="product__img product__cover">
                                    <div class="thumbnail thumbnail--book thumbnail--medium-large"><a href="detail-knihy.html">
                                        <div class="thumbnail__img-wrap"><img class="img" src="images/content/books/sample-15.jpg"></div></a>
                                    </div>
                                  </div>
                                  <div class="product__caption">
                                    <div class="bar bar--small no-mrg-bottom">
                                      <div class="bar__item bar__item--fill"><a class="text-semibold link link--product block mb-small line-medium text-color-grey-dark" href="detail-knihy.html" title="Základy rybolovu pro kluky a holky">Základy rybolovu pro kluky a holky</a>
                                        <ul class="list-inline list-inline--delimited text-color-grey mb-small text-size-small mb-small">
                                          <li class="no-mrg">Frank Weissert</li>
                                          <li class="no-mrg">Jack Thorne</li>
                                          <li class="no-mrg">John Tiffany</li>
                                        </ul>
                                        <div class="bar bar--small bar--vertical-small mb-small">
                                          <div class="bar__item">
                                            <div class="text-medium text-semibold">9999,99 €</div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </article>
                                <article class="product product--horizontal no-mrg-bottom hide-m">
                                  <div class="product__img product__cover">
                                    <div class="thumbnail thumbnail--book thumbnail--medium"><a href="detail-knihy.html">
                                        <div class="thumbnail__img-wrap"><img class="img" src="images/content/books/sample-15.jpg"></div></a>
                                    </div>
                                  </div>
                                  <div class="product__caption">
                                    <div class="bar bar--small no-mrg-bottom">
                                      <div class="bar__item bar__item--fill"><a class="text-semibold link link--product block mb-small line-medium text-color-grey-dark text-medium" href="detail-knihy.html" title="Základy rybolovu pro kluky a holky">Základy rybolovu pro kluky a holky</a>
                                        <ul class="list-inline list-inline--delimited text-color-grey mb-small text-size-small mb-small">
                                          <li class="no-mrg">Frank Weissert</li>
                                          <li class="no-mrg">Jack Thorne</li>
                                          <li class="no-mrg">John Tiffany</li>
                                        </ul>
                                        <div class="bar bar--small bar--vertical-small mb-small">
                                          <div class="bar__item">
                                            <div class="text-medium text-semibold">9999,99 €</div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </article>
                      </div>
                    </article>
                    <div class="text-center"><a class="link text-size-medium text-space-right" href="#">Zobraziť všetky (+3) </a>
                      <button class="btn btn--primary btn--small mb-none">objednať</button>
                    </div>
                    <div class="card hide">
                      <div class="card__content no-pad-bottom--m-down">
                        <h5>Zákazníci si kúpili aj...</h5>
                                <article class="product product--horizontal no-mrg-bottom">
                                  <div class="product__img product__cover">
                                    <div class="thumbnail thumbnail--book thumbnail--medium"><a href="detail-knihy.html">
                                        <div class="thumbnail__img-wrap"><img class="img" src="images/content/books/sample-15.jpg"></div></a>
                                    </div>
                                  </div>
                                  <div class="product__caption">
                                    <div class="bar bar--small no-mrg-bottom">
                                      <div class="bar__item bar__item--fill"><a class="text-semibold link link--product block mb-small line-medium text-medium" href="detail-knihy.html" title="Základy rybolovu pro kluky a holky">Základy rybolovu pro kluky a holky</a>
                                        <ul class="list-inline list-inline--delimited text-color-grey mb-small text-size-small mb-small">
                                          <li class="no-mrg">Frank Weissert</li>
                                          <li class="no-mrg">Jack Thorne</li>
                                          <li class="no-mrg">John Tiffany</li>
                                        </ul>
                                        <div class="bar bar--small bar--vertical-small mb-small">
                                          <div class="bar__item">
                                            <div class="text-medium text-semibold">9999,99 €</div>
                                          </div>
                                          <div class="bar__item"><a class="btn btn--small btn--clean btn--equal text-color-theme" href="#">
                                                      <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                        <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                      </svg></a></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </article>
                                <article class="product product--horizontal no-mrg-bottom hide-m">
                                  <div class="product__img product__cover">
                                    <div class="thumbnail thumbnail--book thumbnail--medium"><a href="detail-knihy.html">
                                        <div class="thumbnail__img-wrap"><img class="img" src="images/content/books/sample-15.jpg"></div></a>
                                    </div>
                                  </div>
                                  <div class="product__caption">
                                    <div class="bar bar--small no-mrg-bottom">
                                      <div class="bar__item bar__item--fill"><a class="text-semibold link link--product block mb-small line-medium text-medium" href="detail-knihy.html" title="Základy rybolovu pro kluky a holky">Základy rybolovu pro kluky a holky</a>
                                        <ul class="list-inline list-inline--delimited text-color-grey mb-small text-size-small mb-small">
                                          <li class="no-mrg">Frank Weissert</li>
                                          <li class="no-mrg">Jack Thorne</li>
                                          <li class="no-mrg">John Tiffany</li>
                                        </ul>
                                        <div class="bar bar--small bar--vertical-small mb-small">
                                          <div class="bar__item">
                                            <div class="text-medium text-semibold">9999,99 €</div>
                                          </div>
                                          <div class="bar__item"><a class="btn btn--small btn--clean btn--equal text-color-theme" href="#">
                                                      <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                        <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                      </svg></a></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </article><a class="link text-size-medium text-space-right" href="#">Zobraziť viac odporúčaní</a>
                      </div>
                    </div>
                    <div class="card hide">
                      <div class="card__content no-pad-bottom--m-down">
                        <h5>Zákazníci si kúpili aj...</h5>
                        <div class="bar bar--small mb-small align-items-bottom">
                          <div class="bar__item bar__item--fill">
                                    <div class="product mb-small">
                                              <div class="product__cover inline-block">
                                                <a class="thumbnail thumbnail--book thumbnail--medium thumbnail--clickable" href="#">
                                                  <div class="thumbnail__img-wrap"><img class="img" src="https://mrtns.eu/tovar/_m/320/m320007.jpg?v=1534842754"></div>
                                                </a>
                                              </div>
                                              <div class="product__title mb-none">
                                                <p class="text-semibold no-mrg text-ellipsis text-size-small link--product" title="Základy rybolovu pro kluky a holky"><a class="link link--product" href="#">Základy rybolovu pro kluky a holky</a>
                                                </p>
                                                <ul class="list-inline list-inline--delimited text-color-grey text-size-small no-mrg text-ellipsis">
                                                  <li class="no-mrg">Frank Weissert</li>
                                                  <li class="no-mrg">Jack Thorne</li>
                                                  <li class="no-mrg">John Tiffany</li>
                                                </ul>
                                              </div>
                                      <div class="bar mb-none align-items-center">
                                        <div class="bar__item">
                                          <div class="text-medium text-semibold">149,50&nbsp;€</div>
                                        </div>
                                        <div class="bar__item"><a class="btn btn--small btn--clean btn--equal text-color-theme" href="#">
                                                    <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                      <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                    </svg></a></div>
                                      </div>
                                    </div>
                          </div>
                          <div class="bar__item bar__item--fill">
                                    <div class="product mb-small">
                                              <div class="product__cover inline-block">
                                                <a class="thumbnail thumbnail--book thumbnail--medium thumbnail--clickable" href="#">
                                                  <div class="thumbnail__img-wrap"><img class="img" src="https://mrtns.eu/tovar/_m/302/m302555.jpg?v=1535094317"></div>
                                                </a>
                                              </div>
                                              <div class="product__title mb-none">
                                                <p class="text-semibold no-mrg text-ellipsis text-size-small link--product" title="Hobbit"><a class="link link--product" href="#">Hobbit</a>
                                                </p>
                                                <ul class="list-inline list-inline--delimited text-color-grey text-size-small no-mrg text-ellipsis">
                                                  <li class="no-mrg">J.R.R. Tolkien</li>
                                                </ul>
                                              </div>
                                      <div class="bar mb-none align-items-center">
                                        <div class="bar__item">
                                          <div class="text-medium text-semibold">149,50&nbsp;€</div>
                                        </div>
                                        <div class="bar__item"><a class="btn btn--small btn--clean btn--equal text-color-theme" href="#">
                                                    <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                      <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                    </svg></a></div>
                                      </div>
                                    </div>
                          </div>
                          <div class="bar__item bar__item--fill">
                                    <div class="product mb-small">
                                              <div class="product__cover inline-block">
                                                <a class="thumbnail thumbnail--book thumbnail--medium thumbnail--clickable" href="#">
                                                  <div class="thumbnail__img-wrap"><img class="img" src="https://mrtns.eu/tovar/_m/312/m312826.jpg?v=1531481391"></div>
                                                </a>
                                              </div>
                                              <div class="product__title mb-none">
                                                <p class="text-semibold no-mrg text-ellipsis text-size-small link--product" title="Ako ju získať"><a class="link link--product" href="#">Ako ju získať</a>
                                                </p>
                                                <ul class="list-inline list-inline--delimited text-color-grey text-size-small no-mrg text-ellipsis">
                                                  <li class="no-mrg">Michal Kopecký</li>
                                                </ul>
                                              </div>
                                      <div class="bar mb-none align-items-center">
                                        <div class="bar__item">
                                          <div class="text-medium text-semibold">149,50&nbsp;€</div>
                                        </div>
                                        <div class="bar__item"><a class="btn btn--small btn--clean btn--equal text-color-theme" href="#">
                                                    <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                      <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                    </svg></a></div>
                                      </div>
                                    </div>
                          </div>
                        </div><a class="link text-size-medium text-space-right" href="#">Zobraziť viac odporúčaní</a>
                      </div>
                    </div>
                    <div class="card hide-m">
                      <div class="card__content no-pad-bottom--m-down">
                        <h5>Zákazníci si kúpili aj...</h5>
                        <div class="carousel carousel--fade-outside carousel--fade-outside-white">
                          <div class="swiper-container" data-swiper-options="{&quot;nextButton&quot;:&quot;.carousel__btn--next&quot;,&quot;prevButton&quot;:&quot;.carousel__btn--prev&quot;,&quot;slidesPerView&quot;:3,&quot;slidesPerGroup&quot;:1,&quot;spaceBetween&quot;:20,&quot;loop&quot;:true}">
                            <div class="swiper-wrapper">
                              <div class="swiper-slide">
                                        <div class="product mb-small">
                                                  <div class="product__cover inline-block">
                                                    <a class="thumbnail thumbnail--book thumbnail--medium thumbnail--clickable" href="#">
                                                      <div class="thumbnail__img-wrap"><img class="img" src="https://mrtns.eu/tovar/_m/320/m320007.jpg?v=1534842754"></div>
                                                    </a>
                                                  </div>
                                                  <div class="product__title mb-none">
                                                    <p class="text-semibold no-mrg text-ellipsis text-size-small link--product" title="Základy rybolovu pro kluky a holky"><a class="link link--product" href="#">Základy rybolovu pro kluky a holky</a>
                                                    </p>
                                                    <ul class="list-inline list-inline--delimited text-color-grey text-size-small no-mrg text-ellipsis">
                                                      <li class="no-mrg">Frank Weissert</li>
                                                      <li class="no-mrg">Jack Thorne</li>
                                                      <li class="no-mrg">John Tiffany</li>
                                                    </ul>
                                                  </div>
                                          <div class="bar mb-none align-items-center bar--no-wrap">
                                            <div class="bar__item text-space-right">
                                              <div class="text-medium text-semibold">19,50&nbsp;€</div>
                                            </div>
                                            <div class="bar__item no-mrg-right"><a class="btn btn--small btn--clean text-color-theme no-pad" href="#">
                                                        <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                          <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                        </svg></a></div>
                                          </div>
                                        </div>
                              </div>
                              <div class="swiper-slide">
                                        <div class="product mb-small">
                                                  <div class="product__cover inline-block">
                                                    <a class="thumbnail thumbnail--book thumbnail--medium thumbnail--clickable" href="#">
                                                      <div class="thumbnail__img-wrap"><img class="img" src="https://mrtns.eu/tovar/_m/302/m302555.jpg?v=1535094317"></div>
                                                    </a>
                                                  </div>
                                                  <div class="product__title mb-none">
                                                    <p class="text-semibold no-mrg text-ellipsis text-size-small link--product" title="Hobbit"><a class="link link--product" href="#">Hobbit</a>
                                                    </p>
                                                    <ul class="list-inline list-inline--delimited text-color-grey text-size-small no-mrg text-ellipsis">
                                                      <li class="no-mrg">J.R.R. Tolkien</li>
                                                    </ul>
                                                  </div>
                                          <div class="bar mb-none align-items-center bar--no-wrap">
                                            <div class="bar__item text-space-right">
                                              <div class="text-medium text-semibold">19,50&nbsp;€</div>
                                            </div>
                                            <div class="bar__item no-mrg-right"><a class="btn btn--small btn--clean text-color-theme no-pad" href="#">
                                                        <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                          <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                        </svg></a></div>
                                          </div>
                                        </div>
                              </div>
                              <div class="swiper-slide">
                                        <div class="product mb-small">
                                                  <div class="product__cover inline-block">
                                                    <a class="thumbnail thumbnail--book thumbnail--medium thumbnail--clickable" href="#">
                                                      <div class="thumbnail__img-wrap"><img class="img" src="https://mrtns.eu/tovar/_m/312/m312826.jpg?v=1531481391"></div>
                                                    </a>
                                                  </div>
                                                  <div class="product__title mb-none">
                                                    <p class="text-semibold no-mrg text-ellipsis text-size-small link--product" title="Ako ju získať"><a class="link link--product" href="#">Ako ju získať</a>
                                                    </p>
                                                    <ul class="list-inline list-inline--delimited text-color-grey text-size-small no-mrg text-ellipsis">
                                                      <li class="no-mrg">Michal Kopecký</li>
                                                    </ul>
                                                  </div>
                                          <div class="bar mb-none align-items-center bar--no-wrap">
                                            <div class="bar__item text-space-right">
                                              <div class="text-medium text-semibold">19,50&nbsp;€</div>
                                            </div>
                                            <div class="bar__item no-mrg-right"><a class="btn btn--small btn--clean text-color-theme no-pad" href="#">
                                                        <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                          <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                        </svg></a></div>
                                          </div>
                                        </div>
                              </div>
                              <div class="swiper-slide">
                                        <div class="product mb-small">
                                                  <div class="product__cover inline-block">
                                                    <a class="thumbnail thumbnail--book thumbnail--medium thumbnail--clickable" href="#">
                                                      <div class="thumbnail__img-wrap"><img class="img" src="https://mrtns.eu/tovar/_m/310/m310659.jpg?v=1533280320"></div>
                                                    </a>
                                                  </div>
                                                  <div class="product__title mb-none">
                                                    <p class="text-semibold no-mrg text-ellipsis text-size-small link--product" title="Ako ju získať 2"><a class="link link--product" href="#">Ako ju získať 2</a>
                                                    </p>
                                                    <ul class="list-inline list-inline--delimited text-color-grey text-size-small no-mrg text-ellipsis">
                                                      <li class="no-mrg">Michal Kopecký</li>
                                                    </ul>
                                                  </div>
                                          <div class="bar mb-none align-items-center bar--no-wrap">
                                            <div class="bar__item text-space-right">
                                              <div class="text-medium text-semibold">19,50&nbsp;€</div>
                                            </div>
                                            <div class="bar__item no-mrg-right"><a class="btn btn--small btn--clean text-color-theme no-pad" href="#">
                                                        <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                          <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                        </svg></a></div>
                                          </div>
                                        </div>
                              </div>
                              <div class="swiper-slide">
                                        <div class="product mb-small">
                                                  <div class="product__cover inline-block">
                                                    <a class="thumbnail thumbnail--book thumbnail--medium thumbnail--clickable" href="#">
                                                      <div class="thumbnail__img-wrap"><img class="img" src="https://mrtns.eu/tovar/_m/238/m238108.jpg?v=1535967025"></div>
                                                    </a>
                                                  </div>
                                                  <div class="product__title mb-none">
                                                    <p class="text-semibold no-mrg text-ellipsis text-size-small link--product" title="Hobbit"><a class="link link--product" href="#">Hobbit</a>
                                                    </p>
                                                    <ul class="list-inline list-inline--delimited text-color-grey text-size-small no-mrg text-ellipsis">
                                                      <li class="no-mrg">J.R.R. Tolkien</li>
                                                    </ul>
                                                  </div>
                                          <div class="bar mb-none align-items-center bar--no-wrap">
                                            <div class="bar__item text-space-right">
                                              <div class="text-medium text-semibold">19,50&nbsp;€</div>
                                            </div>
                                            <div class="bar__item no-mrg-right"><a class="btn btn--small btn--clean text-color-theme no-pad" href="#">
                                                        <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                          <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                        </svg></a></div>
                                          </div>
                                        </div>
                              </div>
                              <div class="swiper-slide">
                                        <div class="product mb-small">
                                                  <div class="product__cover inline-block">
                                                    <a class="thumbnail thumbnail--book thumbnail--medium thumbnail--clickable" href="#">
                                                      <div class="thumbnail__img-wrap"><img class="img" src="https://mrtns.eu/tovar/_m/322/m322409.jpg?v=1534840867"></div>
                                                    </a>
                                                  </div>
                                                  <div class="product__title mb-none">
                                                    <p class="text-semibold no-mrg text-ellipsis text-size-small link--product" title="Steve Jobs - mam taký dlhší názov Venenatis Purus Ridiculus Justo Adipiscing"><a class="link link--product" href="#">Steve Jobs - mam taký dlhší názov Venenatis Purus Ridiculus Justo Adipiscing</a>
                                                    </p>
                                                    <ul class="list-inline list-inline--delimited text-color-grey text-size-small no-mrg text-ellipsis">
                                                      <li class="no-mrg">Walter Isaacson</li>
                                                    </ul>
                                                  </div>
                                          <div class="bar mb-none align-items-center bar--no-wrap">
                                            <div class="bar__item text-space-right">
                                              <div class="text-medium text-semibold">19,50&nbsp;€</div>
                                            </div>
                                            <div class="bar__item no-mrg-right"><a class="btn btn--small btn--clean text-color-theme no-pad" href="#">
                                                        <svg class="icon icon-cart  icon--medium" role="img" aria-hidden="true">
                                                          <use xlink:href="icons_/app.svg#icon-cart"></use>
                                                        </svg></a></div>
                                          </div>
                                        </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bar__item">
                    <article class="card">
                      <div class="card__content">
                        <p class="text-medium mb-small mb-medium-m">Nakúpte ešte za <span class="text-bold">8,23 €</span> a doručenie Slovenskou poštou máte <span class="text-bold">zadarmo</span>.</p>
                        <div class="bar mb-small mb-medium-m show-m">
                          <div class="bar__item">
                                    <svg class="icon icon-transit  text-color-blue icon--medium" role="presentation" aria-label="Doprava">
                                      <use xlink:href="icons_/app.svg#icon-transit"></use>
                                    </svg>
                          </div>
                          <div class="bar__item bar__item--fill">
                            <div class="progress-bar">
                              <div class="progress-bar__value progress-bar--round progress-bar__value--blue" style="width: 80%;"></div>
                            </div>
                          </div>
                          <div class="bar__item"><span class="text-size-medium">30 €</span></div>
                        </div>
                        <div class="bar align-items-bottom mb-none">
                          <div class="bar__item">Spolu</div>
                          <div class="bar__item bar__item--fill text-right">
                            <h1>21,77 €</h1>
                          </div>
                        </div>
                        <div class="bar align-items-bottom text-color-grey text-size-medium">
                          <div class="bar__item bar__item--fill text-right">U nás ušetríte 2,00 €</div>
                        </div>
                        <div class="btn-layout btn-layout--horizontal btn-layout--fill mb-small"><a class="btn btn--ghost" href="#">Ísť do košíka</a><a class="btn btn--primary" href="#">Objednať teraz</a></div>
                        <div class="flex align-items-middle mb-none">
                          <button class="btn btn--success btn--medium mb-none is-consent-show-m flex-fill text-space-right-tiny" data-toggle="#quick-checkout">
                                    <svg class="icon icon-fwd  icon--left icon--medium" role="img" aria-hidden="true">
                                      <use xlink:href="icons_/app.svg#icon-fwd"></use>
                                    </svg>Zrýchlený nákup
                          </button>
                                  <svg class="icon icon-info  icon--medium text-color-grey" role="img" aria-hidden="true" data-tooltip title="S tymto butonom nakupite strasne rychlo, ze si ani nevsimnete">
                                    <use xlink:href="icons_/app.svg#icon-info"></use>
                                  </svg>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </section>
            </div>
          </article>
        </div>
      </header>
      <main>
        <section class="section section--secondary no-pad-top" style="background-color: #133f7e;">
          <!-- <div class="wrapper-main"><a href="#"><img class="show-m img img--fluid no-mrg" src="images/content/banners/banner.jpg"><img class="hide-m img img--fluid no-mrg" src="images/content/banners/banner-mobile.jpg"></a></div> -->
        </section>
        <section class="section--breadcrumbs">
          <div class="wrapper-main">
            <div class="bar no-mrg-bottom">
              <div class="bar__item bar__item--shrinkable">
                <div class="breadcrumbs">
                    <?php echo $breadcrumbs;?>
                </div>
              </div>
            </div>
          </div>
        </section>

          <div id="produkty"></div>

          <section class="section--secondary section no-pad-top">
          <div class="wrapper-main">
            <div class="bar no-mrg-bottom">
              <div class="bar__item">
                <h1><?php echo $nazov; ?></h1>
              </div>
             <!-- <div class="bar__item bar__item--fill">
                <button class="btn btn--clean">
                          <svg class="icon icon-eye icon--large icon--medium icon--left" role="img" aria-hidden="true">
                            <use xlink:href="icons_/app.svg#icon-eye"></use>
                          </svg><span class="show-m">sledovať kategóriu</span>
                </button>
              </div>-->
            </div>
            <div class="mb-medium show-l"></div>
            <!--.bg-secondary#category-description(data-collapse="100")
            .cms-article
            
              .row
                .col--3
                  img.img(src="images/content/author.png")
                .col--9
                  p Harry zápasí s minulosťou, ktorá sa  
                    a(href="#") ustavične vracia
                    | . Jeho najmladšiemu synovi Albusovi pripadla ťarcha rodinného dedičstva, o ktoré nikdy nemal záujem. Keď minulosť a prítomnosť vytvoria hrozivú výbušnú zmes, otec aj syn musia čeliť nepríjemnej pravde, že raz sa temnota zjaví na nečakaných miestach.
            
                  p Slovenskú verziu scenára Harry Potter a prekliate dieťa v elektronickej verzii vydá spoločnosť Pottermore, globálny digitálny vydavateľ Harryho Pottera, ktorého založila sama J. K. Rowlingová v roku 2012.
            
                  p Slovenskú verziu scenára Harry Potter a prekliate dieťa v elektronickej verzii vydá spoločnosť Pottermore, globálny digitálny vydavateľ Harryho Pottera, ktorého založila sama J. K. Rowlingová v roku 2012.
            
            
            -->
            <!--.product-read-more.mb-mediuma.link.text-size-medium(href="javascript:void(0)", data-toggle="#category-description, self", data-toggle-icon="icons_/app.svg#icon-arrow-up", data-toggle-text="Čítaj menej", data-collapse-trigger, data-parent-hop="2") <span data-toggle-text-target>Čítaj viac</span> 
              +icon('arrow-down')
            
            -->
          </div>
        </section>
        <!--section.section--secondary.section.section--toolbar
        .wrapper-main
          .carousel-lite.mj-carousel(style="height: 7rem;").carousel-lite--fade-inside
            .carousel-lite__container.mj-carousel__scroll
              .carousel-lite__wrapper.mj-carousel__content.align-items-top
                each item, i in menu
                  .carousel-lite__slide.text-center(style="width: 6rem")
                    a.link
                      i.fal.fa-3x(class=`fa-${item.icon}`).text-color-grey.mb-small
                      .text-medium= item.title
        
        -->
        <!--section.section.section--overflow
        .wrapper-main
          h2 Najobľúbenejšie tituly a kolekcie
          +booksCarouselRecommended.carousel--fade-outside.carousel--fade-outside-white
        
        -->


          <section class="section section--toolbar no-pad hide-l bg-default" data-sticky data-scroll-offset="65" data-sticky-class="is-stuck" data-sticky-wrap data-sticky-to="1024">
          <div class="wrapper-main">
            <div class="bar mb-none">
              <div class="bar__item bar__item--fill">
                <div class="btn-layout btn-layout--horizontal no-mrg-bottom">
                  <button class="btn btn--clean is-active no-mrg-bottom no-mrg-right" data-toggle="#mobile-reduction">
                            <svg class="icon icon-reduction icon--medium icon--left" role="img" aria-hidden="true">
                              <use xlink:href="icons_/app.svg#icon-reduction"></use>
                            </svg><span class="show-s">Zúženie výberu</span>
                  </button>
                  <button class="btn btn--clean no-mrg-bottom no-mrg-right" data-toggle="#mobile-order">
                            <svg class="icon icon-order icon--medium icon--left" role="img" aria-hidden="true">
                              <use xlink:href="icons_/app.svg#icon-order"></use>
                            </svg><span class="show-s">Zoradiť</span>
                  </button>
                  <button class="btn btn--clean no-mrg-bottom">
                            <svg class="icon icon-close icon--medium icon--left" role="img" aria-hidden="true">
                              <use xlink:href="icons_/app.svg#icon-close"></use>
                            </svg>Zrušiť
                  </button>
                </div>
              </div>
              <div class="bar__item bar__item--shrinkable text-right hide-m">Titulov: <b>1762</b></div>
            </div>
          </div>
        </section>

        <section class="section">
          <div class="wrapper-main">
            <div class="row">
              <div class="col--l-3 mobile-wrapper mb-medium-l" id="mobile-reduction" data-toggle-lock>
                <div class="mobile-wrapper__header">
                  <div class="mobile-wrapper__header-title">Zúženie výberu</div>
                  <div class="btn btn--clean mobile-wrapper__close" data-toggle="#mobile-reduction">
                            <svg class="icon icon-close icon--medium" role="img" aria-hidden="true">
                              <use xlink:href="icons_/app.svg#icon-close"></use>
                            </svg>
                  </div>
                </div>
                <div class="mobile-wrapper__content no-pad">
                  <div class="filter-small">
                    <!--.row.show-l.align-items-middle.mb-medium
                    .col--fill
                      h2.no-mrg Filter
                    .col--shrink
                      if !collapseFilters
                        a.link.text-transform-upper.text-small zmazať filter
                    -->

                <?php echo $filters; ?>

                  </div>
                </div>
                <div class="mobile-wrapper__footer">
                  <div class="btn-layout btn-layout--vertical no-mrg-bottom">
                    <button class="btn">Zúžiť výber</button>
                  </div>
                </div>
              </div>


              <div class="col--l-9 col--12">
              <!--  <div id="category-description" data-collapse="200">
                  <div class="cms-article">
                    <div class="row">
                      <div class="col--3"><img class="img" src="images/content/author.png"></div>
                      <div class="col--9">
                        <p>Harry zápasí s minulosťou, ktorá sa  <a href="#">ustavične vracia</a>. Jeho najmladšiemu synovi Albusovi pripadla ťarcha rodinného dedičstva, o ktoré nikdy nemal záujem. Keď minulosť a prítomnosť vytvoria hrozivú výbušnú zmes, otec aj syn musia čeliť nepríjemnej pravde, že raz sa temnota zjaví na nečakaných miestach.</p>
                        <p>Slovenskú verziu scenára Harry Potter a prekliate dieťa v elektronickej verzii vydá spoločnosť Pottermore, globálny digitálny vydavateľ Harryho Pottera, ktorého založila sama J. K. Rowlingová v roku 2012.</p>
                        <p>Slovenskú verziu scenára Harry Potter a prekliate dieťa v elektronickej verzii vydá spoločnosť Pottermore, globálny digitálny vydavateľ Harryho Pottera, ktorého založila sama J. K. Rowlingová v roku 2012.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mb-large"><a class="link text-size-medium" href="javascript:void(0)" data-toggle="#category-description, self" data-toggle-icon="icons_/app.svg#icon-arrow-up" data-toggle-text="Čítaj menej" data-collapse-trigger data-parent-hop="2"><span data-toggle-text-target>Čítaj viac</span> 
                                      <svg class="icon icon-arrow-down " role="img" aria-hidden="true">
                                        <use xlink:href="icons_/app.svg#icon-arrow-down"></use>
                                      </svg></a></div>-->
                 <div id="produkty"></div>
                  <?php if (count($config[$p]["subs"])>0) { ?>
                  <div class="mb-large carousel-lite mj-carousel carousel-lite--fade-inside" style="height: 5rem;">
                  <div class="carousel-lite__container mj-carousel__scroll">
                    <div class="carousel-lite__wrapper mj-carousel__content align-items-stretch">
                        <!-- <a class="carousel-lite__slide text-space-right flex align-items-middle" style="width: 12rem; border: 1px solid #eee; padding: 10px 20px;" href="#products"><i class="fal fa-3x fa-fal fa-books text-color-error text-space-right"></i><span class="link line-small">Všetky</span></a> -->
                        <?php echo $subs; ?>
                    </div>
                  </div>

                      <button class="btn btn--carousel btn--large btn--equal carousel__btn carousel__btn--prev mj-carousel__btn--prev" style="left: 10px;">
                          <svg class="icon icon-arrow-left  icon--medium" role="img" aria-hidden="true">
                              <use xlink:href="icons_/app.svg#icon-arrow-left"></use>
                          </svg>
                      </button>
                      <button class="btn btn--carousel btn--large btn--equal carousel__btn carousel__btn--next mj-carousel__btn--next" style="right: 10px;">
                          <svg class="icon icon-arrow-right  icon--medium" role="img" aria-hidden="true">
                              <use xlink:href="icons_/app.svg#icon-arrow-right"></use>
                          </svg>
                      </button>

                  </div>





                  <?php } ?>

                <div class="mobile-wrapper mb-medium-l hide-m" id="mobile-order" data-toggle-lock>
                  <div class="mobile-wrapper__header">
                    <div class="mobile-wrapper__header-title">Radenie</div>
                    <div class="btn btn--clean mobile-wrapper__close" data-toggle="#mobile-order">
                                        <svg class="icon icon-close icon--medium" role="img" aria-hidden="true">
                                          <use xlink:href="icons_/app.svg#icon-close"></use>
                                        </svg>
                    </div>
                  </div>
                  <div class="mobile-wrapper__content">
                    <div class="bar mb-large">
                      <div class="bar__item text-left show-m">Počet titulov: <b>1762</b></div>
                      <div class="bar__item bar__item--fill-l bar__item--line text-right text-medium">
                        <div class="bar__item-content">Zoradiť podľa:</div>
                      </div>
                      <div class="bar__item">
                        <div class="form-control form-control--select">
                          <select class="js-select select--ghost">
                            <option value="ba-obchodna">Bratislava, Obchodná</option>
                            <option value="ba-obchodna">Bratislava, Obchodná</option>
                            <option value="ba-obchodna">Bratislava, Obchodná</option>
                            <option value="ba-obchodna">Bratislava, Obchodná</option>
                            <option value="ba-obchodna">Bratislava, Obchodná</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="hide-l align-items-bottom flex flex-1">
                      <div class="btn-layout btn-layout--vertical no-mrg-bottom">
                        <button class="btn">Zoradiť</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="badges mb-tiny" id="filter_badges" style="display:none">
                  <div class="text-space-right">Filtre:</div>
                  <div id="filter_badges_content"></div>
                  <div class="btn btn--small btn--clean mb-none" id="delete-filters" onclick="$('.filter_badge').hide();$('#filter_badges').hide();$('input:checkbox').prop('checked', false);">zmazať filter</div>
                </div>
                <ul class="tab-nav text-size-medium mb-large show-m bg-secondary" data-tabs-container>
                  <li class="tab-nav__item" data-tabs-item><a class="tab-nav__content tab-nav__content--link">najobľúbenejšie</a></li>
                  <li class="tab-nav__item" data-tabs-item><a class="tab-nav__content tab-nav__content--link">najlacnejšie</a></li>
                  <li class="tab-nav__item" data-tabs-item><a class="tab-nav__content tab-nav__content--link">najdrahšie</a></li>
                  <li class="tab-nav__item" data-tabs-item><a class="tab-nav__content tab-nav__content--link">najnovšie</a></li>
                  <li class="tab-nav__item" data-tabs-item><a class="tab-nav__content tab-nav__content--link">najstaršie</a></li>
                </ul>
                <!--GROUPED ITEM-->
                  <div id="product_list"></div>
            </div>
          </div>
        </section>
      </main>
      <footer class="footer">
        <div class="wrapper-main">
          <section class="mb-medium border-bottom-grey">
            <p class="text-color-yellow">
              Aj z drobných vecí sa dajú urobiť veľké. Vďaka vašim Anjelským drobným ste
              pri nákupoch na Martinuse darovali už<b class="text-color-white">
                 542 459,18 € na Dobrého
                Anjela</b>.
                                      Ďakujeme!
            </p>
          </section>
          <section class="row mb-medium">
            <div class="col--l-2 col--12">
              <div class="row">
                <div class="col--6 col--m-12">
                  <ul class="list--unstyled list--expanded mb-medium show-m">
                    <li><a class="link text-color-white" href="#">Knihy</a></li>
                    <li><a class="link text-color-white" href="#">E-knihy</a></li>
                    <li><a class="link text-color-white" href="#">Filmy</a></li>
                    <li><a class="link text-color-white" href="#">Hry</a></li>
                    <li><a class="link text-color-white" href="#">Káva a čaj</a></li>
                  </ul>
                  <ul class="list-inline mb-medium hide-m">
                    <li><a class="link text-color-white" href="#">Knihy</a></li>
                    <li><a class="link text-color-white" href="#">E-knihy</a></li>
                    <li><a class="link text-color-white" href="#">Filmy</a></li>
                    <li><a class="link text-color-white" href="#">Hry</a></li>
                    <li><a class="link text-color-white" href="#">Káva a čaj</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col--l-3 col--12">
              <h5>Kníhkupectvá</h5>
              <div class="bar bar--small">
                <div class="bar__item"><a class="link text-color-white text-size-medium text-bold text-space-right" href="#">Považská Bystrica</a><span class="text-size-medium clickable text-color-orange" data-tooltip data-html="#store-tooltip" data-theme="light">Zatvoríme o 21:00
                          <svg class="icon icon-info  icon--small text-color-grey-light" role="img" aria-hidden="true" style="position: relative; top: -0.05em;">
                            <use xlink:href="icons_/app.svg#icon-info"></use>
                          </svg></span>
                </div>
              </div>
              <div class="row">
                <div class="col--6 col--l-5">
                  <ul class="list--unstyled mb-medium">
                    <li><a class="link text-color-white text-size-medium text-normal" href="#">Bratislava</a></li>
                    <li><a class="link text-color-white text-size-medium text-normal" href="#">Košice</a></li>
                    <li><a class="link text-color-white text-size-medium text-normal" href="#">Lučenec</a></li>
                    <li><a class="link text-color-white text-size-medium text-normal" href="#">Martin</a></li>
                    <li><a class="link text-color-white text-size-medium text-normal" href="#">Nitra</a></li>
                    <li><a class="link text-color-white text-size-medium text-normal" href="#">Poprad</a></li>
                  </ul>
                </div>
                <div class="col--6 col--l-7">
                  <ul class="list--unstyled mb-medium">
                    <li><a class="link text-color-white text-size-medium text-normal" href="#">Považská Bystrica</a></li>
                    <li><a class="link text-color-white text-size-medium text-normal" href="#">Banská Bystrica</a></li>
                    <li><a class="link text-color-white text-size-medium text-normal" href="#">Trnava</a></li>
                    <li><a class="link text-color-white text-size-medium text-normal" href="#">Žilina</a></li>
                    <li><a class="link text-color-white text-size-medium text-normal" href="#"><b>Besedy</b></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col--l-2 col--6">
              <h5>Nakupujte u nás</h5>
              <ul class="list--unstyled mb-medium">
                <li><a class="link text-color-white text-size-medium text-normal" href="#">Prečo práve u nás?</a></li>
                <li><a class="link text-color-white text-size-medium text-normal" href="#">Ako nakupovať</a></li>
                <li><a class="link text-color-white text-size-medium text-normal" href="#">Najčastejšie otázky</a></li>
                <li><a class="link text-color-white text-size-medium text-normal" href="#">Poštovné</a></li>
                <li><a class="link text-color-white text-size-medium text-normal" href="#">Možnosti platby</a></li>
              </ul>
            </div>
            <div class="col--l-2 col--6">
              <h5>Martinus.sk</h5>
              <ul class="list--unstyled mb-medium">
                <li><a class="link text-color-white text-size-medium text-normal" href="#">Náš príbeh</a></li>
                <li><a class="link text-color-white text-size-medium text-normal" href="#">Náš blog</a></li>
                <li><a class="link text-color-white text-size-medium text-normal" href="#">Kontakty</a></li>
                <li><a class="link text-color-white text-size-medium text-normal" href="#">Partnerský systém</a></li>
                <li><a class="link text-color-white text-size-medium text-normal" href="#">Pridaj sa k nám</a></li>
                <li><a class="link text-color-white text-size-medium text-normal" href="#">Marketing</a></li>
              </ul>
            </div>
            <div class="col--l-2 col--6">
              <h5>Kontakt</h5>
              <ul class="list--unstyled mb-medium">
                <li><a class="link text-color-white text-size-medium text-normal" href="#">info@martinus.sk</a></li>
                <li class="text-color-white text-size-medium text-normal">Telefón: 043/3260 360 </li>
                <li class="text-color-white text-size-medium text-normal">v pracovné dni 8:00-18:00</li>
              </ul>
            </div>
          </section>
          <section class="row mb-medium align-items-middle">
            <div class="col--m-9 col--l-8">
              <div class="bar">
                <div class="bar__item bar__item--fill">
                  <div class="form-control form-control--m-inline form-control--input no-mrg-bottom">
                    <div class="form-label form-label--large">
                      <label class="text-color-white form-label--large" for="newsletter-input">Knižné a filmové novinky na e-mail (pre osoby staršie ako 16 rokov):</label>
                    </div>
                    <div class="bar bar--small no-mrg-bottom">
                      <div class="bar__item bar__item--fill">
                        <input class="input input--dark" type="text" placeholder="Napíšte nám váš e-mail" id="newsletter-input">
                      </div>
                      <div class="bar__item">
                        <button class="btn btn--primary">Odoslať</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col--m-3 col--l-4">
              <div class="bar footer__social">
                <div class="bar__item"><a href="#">
                          <svg class="icon icon-fb  icon--medium" role="img" aria-hidden="true">
                            <use xlink:href="icons_/app.svg#icon-fb"></use>
                          </svg></a></div>
                <div class="bar__item"><a href="#">
                          <svg class="icon icon-google  icon--medium" role="img" aria-hidden="true">
                            <use xlink:href="icons_/app.svg#icon-google"></use>
                          </svg></a></div>
                <div class="bar__item"><a href="#">
                          <svg class="icon icon-instagram  icon--medium" role="img" aria-hidden="true">
                            <use xlink:href="icons_/app.svg#icon-instagram"></use>
                          </svg></a></div>
                <div class="bar__item"><a href="#">
                          <svg class="icon icon-youtube  icon--medium" role="img" aria-hidden="true">
                            <use xlink:href="icons_/app.svg#icon-youtube"></use>
                          </svg></a></div>
              </div>
            </div>
          </section>
          <section class="row align-items-middle">
            <div class="col--l-7">
              <div class="bar bar--small mb-medium footer__copy align-items-middle">
                <div class="bar__item"><img src="images/content/logo-small.svg" alt="Martinus"></div>
                <div class="bar__item bar__item--fill">&copy; 2000-2019 Martinus. Internetové kníhkupectvo. Všetky práva vyhradené.</div>
              </div>
            </div>
            <div class="col--l-5 text-right">
              <ul class="list-inline">
                <li><a class="link text-color-white text-normal text-medium" href="#">Odvolanie súhlasu s cookies</a></li>
                <li><a class="link text-color-white text-normal text-medium" href="#">Obchodné podmienky</a></li>
                <li><a class="link text-color-white text-normal text-medium" href="#">Ochrana súkromia</a></li>
              </ul>
            </div>
          </section>
        </div>
      </footer>
      <div class="hide card" id="store-tooltip">
        <div class="card__content card__content--condensed text-left">
          <div class="mb-small"><a class="link text-bold">Považská Bystrica</a></div>
          <div class="mb-medium">
            <div class="row">
              <div class="col--6">Pondelok</div>
              <div class="col--6 text-nowrap">09:00 - 21:00</div>
            </div>
            <div class="row">
              <div class="col--6">Utorok</div>
              <div class="col--6 text-nowrap">09:00 - 21:00</div>
            </div>
            <div class="row">
              <div class="col--6">Streda</div>
              <div class="col--6 text-nowrap">09:00 - 21:00</div>
            </div>
            <div class="row">
              <div class="col--6">Štvrtok</div>
              <div class="col--6 text-nowrap">09:00 - 21:00</div>
            </div>
            <div class="row">
              <div class="col--6">Piatok</div>
              <div class="col--6 text-nowrap">09:00 - 21:00</div>
            </div>
            <div class="row">
              <div class="col--6">Sobota</div>
              <div class="col--6 text-nowrap">09:00 - 21:00</div>
            </div>
            <div class="row">
              <div class="col--6">Nedeľa</div>
              <div class="col--6 text-nowrap">09:00 - 21:00</div>
            </div>
          </div>
          <div class="mb-none"><a class="btn btn--small btn--ghost mb-small">Viac o kníhkupectve
                    <svg class="icon icon-arrow-right  icon--right icon--medium" role="img" aria-hidden="true">
                      <use xlink:href="icons_/app.svg#icon-arrow-right"></use>
                    </svg></a></div><a class="link text-medium">Zmeniť moje kníhkupectvo</a>
        </div>
      </div>
      <div class="alert-container" data-alert-area></div>
    </div>
    <script>
      window.myApp = window.myApp || {};
      window.myApp.selectLanguage = 'sk';
    </script>
    <script src="scripts/vendor.65bc34aa.js"></script>
    <script src="scripts/main.d2a86483.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmcfNr4Wrku7nwOEnrnoq33yPgH_Xi7uo&amp;callback=initMap" async defer></script>

    <script>
        document.addEventListener('myAppLoaded', function() {

            var carousel = new window.myApp.CarouselLite(document.querySelector('.mj-carousel'));
        });
    </script>

  </body>
</html>