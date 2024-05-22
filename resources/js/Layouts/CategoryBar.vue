<script>
export default {
    name: 'CategoryBar',
}
</script>

<template>
    <!-- Header bottom-->
    <div class="header-bottom hidden-compact">
        <div class="container">
            <div class="header-bottom-inner">
                <div class="row">
                    <div class="header-bottom-left menu-vertical col-md-3 col-sm-3 col-xs-3">
                        <div class="megamenu-style-dev">
                            <div class="responsive">
                                <div class="so-vertical-menu no-gutter">
                                    <nav class="navbar-default">
                                        <div class=" container-megamenu  container   vertical  ">
                                            <div id="menuHeading">
                                                <div class="megamenuToogle-wrapper">
                                                    <div class="megamenuToogle-pattern">
                                                        <div class="container">
                                                            <div>
                                                                <span></span>
                                                                <span></span>
                                                                <span></span>
                                                            </div>
                                                            <span class="title-mega">
                                                                All Categories
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="navbar-header">
                                                <span class="title-navbar hidden-lg hidden-md"> All Categories </span>
                                                <button type="button" id="show-verticalmenu" data-toggle="collapse"
                                                    class="navbar-toggle">
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                </button>
                                            </div>
                                            <div class="vertical-wrapper">
                                                <span id="remove-verticalmenu" class="fa fa-times"></span>
                                                <div class="megamenu-pattern">
                                                    <div class="container">
                                                        <ul class="megamenu" data-transition="slide"
                                                            data-animationtime="300">
                                                            <li class="item-vertical  style1">
                                                                <p class='close-menu'></p>
                                                                <a href="#" class="clearfix">
                                                                    <span>
                                                                        <strong><i class="icon icon1"></i><img
                                                                                src="theme/image/catalog/demo/menu/icon/icon-6.png"
                                                                                alt="">Hot Deal</strong>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li
                                                                class="item-vertical  vertical-style2 with-sub-menu hover">
                                                                <p class='close-menu'></p>
                                                                <a class="clearfix">
                                                                    <span>
                                                                        <strong><i class="icon  icon2"></i><img
                                                                                src="theme/image/catalog/demo/menu/icon/icon-1.png"
                                                                                alt="">Electronics</strong>
                                                                    </span>
                                                                    <b class='fa fa-caret-right'></b>
                                                                </a>
                                                                <div class="sub-menu" style="width:890px">
                                                                    <div class="content">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="html item-1">
                                                                                    <div class="row">
                                                                                        <div
                                                                                            class="col-lg-7 col-md-7 col-sm-8">
                                                                                            <div
                                                                                                class="item-3 col-lg-6 col-md-6 icon-1">
                                                                                                <a href="#"
                                                                                                    title="Mobile &amp; Table">Mobile
                                                                                                    &amp; Table</a>
                                                                                                <ul>
                                                                                                    <li>
                                                                                                        <a href="#"
                                                                                                            title="Laptops &amp; Tablets">Laptops
                                                                                                            &amp;
                                                                                                            Tablets</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#"
                                                                                                            title="Computer Accessories">Computer
                                                                                                            Accessories</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                            <div
                                                                                                class="item-3 col-lg-6 col-md-6 cat-child icon-2 parent">
                                                                                                <a href="#"
                                                                                                    title="Sound">Sound</a>
                                                                                                <ul>
                                                                                                    <li class="">
                                                                                                        <a href="#"
                                                                                                            title="Bluetooth Speakers">Bluetooth
                                                                                                            Speakers</a>
                                                                                                    </li>
                                                                                                    <li class="">
                                                                                                        <a href="#"
                                                                                                            title="Wireless Speakers">Wireless
                                                                                                            Speakers</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                            <div
                                                                                                class="item-3 col-lg-6 col-md-6 cat-child icon-3 parent">
                                                                                                <a href="#"
                                                                                                    title="Headphone">Headphone</a>
                                                                                                <ul>
                                                                                                    <li class="">
                                                                                                        <a href="#"
                                                                                                            title="VGA and CPU">VGA
                                                                                                            and CPU</a>
                                                                                                    </li>
                                                                                                    <li class="">
                                                                                                        <a href="#"
                                                                                                            title="Desna Jacket">Desna
                                                                                                            Jacket</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                            <div
                                                                                                class="item-3 col-lg-6 col-md-6 cat-child icon-4 parent">
                                                                                                <a href="#"
                                                                                                    title="Video &amp; Camera">Video
                                                                                                    &amp; Camera</a>
                                                                                                <ul>
                                                                                                    <li class="">
                                                                                                        <a href="#"
                                                                                                            title="Camera New">Camera
                                                                                                            New</a>
                                                                                                    </li>
                                                                                                    <li class="">
                                                                                                        <a href="#"
                                                                                                            title="Video You">Video
                                                                                                            You</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                            <div
                                                                                                class="item-3 col-lg-6 col-md-6 cat-child icon-5 parent">
                                                                                                <a href="#"
                                                                                                    title="Mobile &amp; Table">USB
                                                                                                    &amp; HDD</a>
                                                                                                <ul>
                                                                                                    <li class="">
                                                                                                        <a href="#"
                                                                                                            title="Usb Computer">USB
                                                                                                            Computer</a>
                                                                                                    </li>
                                                                                                    <li class="">
                                                                                                        <a href="#"
                                                                                                            title="HDD Computer">HDD
                                                                                                            Computer</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                            <div
                                                                                                class="item-3 col-lg-6 col-md-6 icon-6">
                                                                                                <a href="#"
                                                                                                    title="Cell &amp; Cable">Cell
                                                                                                    &amp; Cable</a>
                                                                                                <ul>
                                                                                                    <li class="">
                                                                                                        <a href="#"
                                                                                                            title="Cell Computers">Cell
                                                                                                            Computers</a>
                                                                                                    </li>
                                                                                                    <li class="">
                                                                                                        <a href="#"
                                                                                                            title="Cable Com">Cable
                                                                                                            Com</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                            <div
                                                                                                class="item-3 col-lg-6 col-md-6 icon-7">
                                                                                                <a href="#"
                                                                                                    title="Cell &amp; Cable">Laptop</a>
                                                                                                <ul>
                                                                                                    <li class="">
                                                                                                        <a href="#"
                                                                                                            title="Computer Headsets">Computer
                                                                                                            Headsets</a>
                                                                                                    </li>
                                                                                                    <li class="">
                                                                                                        <a href="#"
                                                                                                            title="Headphone Earpads">Headphone
                                                                                                            Earpads</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                            <div
                                                                                                class="item-3 col-lg-6 col-md-6 cat-child icon-8 parent">
                                                                                                <a href="#"
                                                                                                    title="Case">Case</a>
                                                                                                <ul>
                                                                                                    <li class="">
                                                                                                        <a href="#"
                                                                                                            title="Case Computer">Case
                                                                                                            Computer</a>
                                                                                                    </li>
                                                                                                    <li class="">
                                                                                                        <a href="#"
                                                                                                            title="Vafar Comfaoe">Vafar
                                                                                                            Comfaoe</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="img-banner col-lg-5 col-md-5 col-sm-4">
                                                                                            <a href="#"><img
                                                                                                    src="theme/image/catalog/demo/menu/img-static-megamenu-h.jpg"
                                                                                                    alt="banner"></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="item-vertical  vertical-style3 with-sub-menu hover">
                                                                <p class='close-menu'></p>
                                                                <a href="#" class="clearfix">
                                                                    <span>
                                                                        <strong><i class="icon  icon3"></i><img
                                                                                src="theme/image/catalog/demo/menu/icon/icon-2.png"
                                                                                alt="">Travel &amp; Vacation</strong>
                                                                    </span>
                                                                    <b class='fa fa-caret-right'></b>
                                                                </a>
                                                                <div class="sub-menu" style="width:495px">
                                                                    <div class="content">
                                                                        <div class="row">
                                                                            <div class="col-sm-5">
                                                                                <div class="html item-1">
                                                                                    <div class="label-vertical">
                                                                                        <div><a href="#"><span
                                                                                                    class="color1">Hot!</span>Best
                                                                                                Sellers </a></div>
                                                                                        <div><a href="#"><span
                                                                                                    class="color2">New!</span>New
                                                                                                Arrivals </a> </div>
                                                                                        <div><a href="#"><span
                                                                                                    class="color3">Sale!</span>Special
                                                                                                Offers </a></div>
                                                                                    </div>
                                                                                    <ul>
                                                                                        <li class=""><a href="#">Hotel
                                                                                                &amp; Resort</a></li>
                                                                                        <li class=""><a href="#"
                                                                                                title="Best Tours">Best
                                                                                                Tours</a></li>
                                                                                        <li class=""><a href="#"
                                                                                                title="Vacation Rentanls">Vacation
                                                                                                Rentanls</a></li>
                                                                                        <li class=""><a href="#"
                                                                                                title="Infocus">Infocus</a>
                                                                                        </li>
                                                                                        <li class=""><a href="#"
                                                                                                title="Restaurants">Restaurants</a>
                                                                                        </li>
                                                                                        <li class=""><a href="#"
                                                                                                title="Travel Trekking">Travel
                                                                                                Trekking</a></li>
                                                                                        <li class=""><a href="#"
                                                                                                title="Destinations">Destinations</a>
                                                                                        </li>
                                                                                        <li class=""><a href="#"
                                                                                                title="Cruises">Cruises</a>
                                                                                        </li>
                                                                                        <li class=""><a href="#"
                                                                                                title="Water Parks">Water
                                                                                                Parks</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-7">
                                                                                <div class="html ">
                                                                                    <div class="row img-banner">
                                                                                        <a href="#"><img
                                                                                                src="theme/image/catalog/demo/menu/ver-img-1.jpg"
                                                                                                alt="banner"></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="item-vertical ">
                                                                <p class='close-menu'></p>
                                                                <a href="#" class="clearfix">
                                                                    <span>
                                                                        <strong><i class="icon  icon4"></i><img
                                                                                src="theme/image/catalog/demo/menu/icon/icon-3.png"
                                                                                alt="">Book Stationery</strong>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="item-vertical   item-style3 with-sub-menu hover">
                                                                <p class='close-menu'></p>
                                                                <a class="clearfix">
                                                                    <span>
                                                                        <strong><i class="icon  icon5"></i><img
                                                                                src="theme/image/catalog/demo/menu/icon/icon-4.png"
                                                                                alt="">Fashion</strong>
                                                                    </span>
                                                                    <b class='fa fa-caret-right'></b>
                                                                </a>
                                                                <div class="sub-menu" style="width:650px">
                                                                    <div class="content">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="categories ">
                                                                                    <div class="row">
                                                                                        <div
                                                                                            class="col-sm-4 static-menu">
                                                                                            <div class="menu">
                                                                                                <ul>
                                                                                                    <li>
                                                                                                        <a href="#"
                                                                                                            onclick="window.location = '#';"
                                                                                                            class="main-menu">Digital
                                                                                                            &amp;
                                                                                                            Electronics</a>
                                                                                                        <ul>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Girls
                                                                                                                    New</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Bluetooth
                                                                                                                    Speakers</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Pearl
                                                                                                                    mens</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Digital
                                                                                                                    &amp;
                                                                                                                    Electronics</a>
                                                                                                            </li>
                                                                                                            <li><a href="h#"
                                                                                                                    onclick="window.location = '#';">Book
                                                                                                                    Stationery</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Bluetooth
                                                                                                                    Speakers</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Cell
                                                                                                                    &amp;
                                                                                                                    Cable</a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-sm-4 static-menu">
                                                                                            <div class="menu">
                                                                                                <ul>
                                                                                                    <li>
                                                                                                        <a href="#"
                                                                                                            onclick="window.location = '#';"
                                                                                                            class="main-menu">Fashion
                                                                                                            &amp;
                                                                                                            Accessories</a>
                                                                                                        <ul>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Pearl
                                                                                                                    mens</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Girls
                                                                                                                    New</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = 'h#';">Pearl
                                                                                                                    Jewelry</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Spa
                                                                                                                    &amp;
                                                                                                                    Massage</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Digital
                                                                                                                    &amp;
                                                                                                                    Electronics</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Camera
                                                                                                                    New</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Bags</a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-sm-4 static-menu">
                                                                                            <div class="menu">
                                                                                                <ul>
                                                                                                    <li>
                                                                                                        <a href="#"
                                                                                                            onclick="window.location = '#';"
                                                                                                            class="main-menu">Western
                                                                                                            Wear</a>
                                                                                                        <ul>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Video
                                                                                                                    You</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Pearl
                                                                                                                    mens</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Dress
                                                                                                                    Ladies</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Jean</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Web
                                                                                                                    Cameras</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Laptop
                                                                                                                    &amp;
                                                                                                                    Notebook</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Dress
                                                                                                                    Ladies</a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="border"></div>
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="link banner-full">
                                                                                    <img src="theme/image/catalog/demo/menu/menu_bg2.jpg"
                                                                                        alt="" style="width: 100%;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="item-vertical ">
                                                                <p class='close-menu'></p>
                                                                <a class="clearfix">
                                                                    <span>
                                                                        <strong><i class="icon  icon6"></i><img
                                                                                src="theme/image/catalog/demo/menu/icon/icon-5.png"
                                                                                alt="">Sport &amp; Entertaiment</strong>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="item-vertical  css-menu with-sub-menu hover">
                                                                <p class='close-menu'></p>
                                                                <a href="#" class="clearfix">
                                                                    <span>
                                                                        <strong><i class="icon  icon8"></i><img
                                                                                src="theme/image/catalog/demo/menu/icon/icon-8.png"
                                                                                alt="">Spa &amp; Massage</strong>
                                                                    </span>
                                                                    <b class='fa fa-caret-right'></b>
                                                                </a>
                                                                <div class="sub-menu" style="width:250px">
                                                                    <div class="content">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="categories ">
                                                                                    <div class="row">
                                                                                        <div
                                                                                            class="col-sm-12 hover-menu">
                                                                                            <div class="menu">
                                                                                                <ul>
                                                                                                    <li>
                                                                                                        <a href="#"
                                                                                                            onclick="window.location = '#';"
                                                                                                            class="main-menu">Book
                                                                                                            Stationery<b
                                                                                                                class="fa fa-angle-right"></b></a>
                                                                                                        <ul>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Camera
                                                                                                                    New</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Dress
                                                                                                                    Ladies</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#   ';">Jean</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Case</a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#"
                                                                                                            onclick="window.location = '#';"
                                                                                                            class="main-menu">Book
                                                                                                            Stationery<b
                                                                                                                class="fa fa-angle-right"></b></a>
                                                                                                        <ul>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Girls
                                                                                                                    New</a>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <a href="#"
                                                                                                                    onclick="window.location = '#';">Pearl
                                                                                                                    mens<b
                                                                                                                        class="fa fa-angle-right"></b></a>
                                                                                                                <ul>
                                                                                                                    <li><a href="#"
                                                                                                                            onclick="window.location = '#';">Bluetooth
                                                                                                                            Speakers</a>
                                                                                                                    </li>
                                                                                                                </ul>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Fashion
                                                                                                                    &amp;
                                                                                                                    Accessories</a>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <a href="#"
                                                                                                                    onclick="window.location = '#';">Trending<b
                                                                                                                        class="fa fa-angle-right"></b></a>
                                                                                                                <ul>
                                                                                                                    <li><a href="#"
                                                                                                                            onclick="window.location = '#';">Punge
                                                                                                                            nenune</a>
                                                                                                                    </li>
                                                                                                                </ul>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li><a href="#"
                                                                                                            onclick="window.location = '#';"
                                                                                                            class="main-menu">Kitchen</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#"
                                                                                                            onclick="window.location = '#';"
                                                                                                            class="main-menu">Book
                                                                                                            Stationery<b
                                                                                                                class="fa fa-angle-right"></b></a>
                                                                                                        <ul>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Cell
                                                                                                                    &amp;
                                                                                                                    Cable</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Camera
                                                                                                                    New</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Digital
                                                                                                                    &amp;
                                                                                                                    Electronics</a>
                                                                                                            </li>
                                                                                                            <li><a href="#"
                                                                                                                    onclick="window.location = '#';">Pearl
                                                                                                                    mens</a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#"
                                                                                                            onclick="window.location = '#';"
                                                                                                            class="main-menu">Case<b
                                                                                                                class="fa fa-angle-right"></b></a>
                                                                                                        <ul>
                                                                                                            <li>
                                                                                                                <a href="#"
                                                                                                                    onclick="window.location = '#';">Bluetooth
                                                                                                                    Speakers<b
                                                                                                                        class="fa fa-angle-right"></b></a>
                                                                                                                <ul>
                                                                                                                    <li><a href="#"
                                                                                                                            onclick="window.location = '#';">Cell
                                                                                                                            &amp;
                                                                                                                            Cable</a>
                                                                                                                    </li>
                                                                                                                    <li><a href="#"
                                                                                                                            onclick="window.location = '#';">Bags</a>
                                                                                                                    </li>
                                                                                                                    <li><a href="#"
                                                                                                                            onclick="window.location = '#';">Women
                                                                                                                            Fashion</a>
                                                                                                                    </li>
                                                                                                                </ul>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="item-vertical ">
                                                                <p class='close-menu'></p>
                                                                <a href="#" class="clearfix">
                                                                    <span>
                                                                        <strong><i class="icon  icon9"></i><img
                                                                                src="theme/image/catalog/demo/menu/icon/icon-9.png"
                                                                                alt="">Real House</strong>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="item-vertical ">
                                                                <p class='close-menu'></p>
                                                                <a href="#" class="clearfix">
                                                                    <span>
                                                                        <strong><img
                                                                                src="theme/image/catalog/demo/menu/icon/icon-6.png"
                                                                                alt="">Mom &amp; Baby</strong>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="item-vertical ">
                                                                <p class='close-menu'></p>
                                                                <a href="#" class="clearfix">
                                                                    <span>
                                                                        <strong><img
                                                                                src="theme/image/catalog/demo/menu/icon/icon-7.png"
                                                                                alt="">Food &amp; Restaurant</strong>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="item-vertical ">
                                                                <p class='close-menu'></p>
                                                                <a href="#" class="clearfix">
                                                                    <span>
                                                                        <strong><img
                                                                                src="theme/image/catalog/demo/menu/icon/icon-9.png"
                                                                                alt="">Jewelry &amp; Watches</strong>
                                                                    </span>
                                                                    <span class="labelho"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-search col-lg-6 col-md-5 col-sm-6 col-xs-9">
                        <!-- BOX CONTENT MENU -->
                        <div class="header_search">
                            <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                                <form method="GET" action="index.php">
                                    <div id="search0" class="search input-group form-group">
                                        <div class="select_category filter_type  icon-select">
                                            <select class="no-border" name="category_id">
                                                <option value="0">All Categories </option>
                                                <option value="82 ">Book Stationery </option>
                                                <option value="65">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Girls New
                                                </option>
                                                <option value="56">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kitchen
                                                </option>
                                                <option value="61">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pearl mens
                                                </option>
                                                <option value="38 ">Laptop &amp; Notebook </option>
                                                <option value="52 ">Spa &amp; Massage </option>
                                                <option value="44">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Latenge mange
                                                </option>
                                                <option value="53">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Necklaces
                                                </option>
                                                <option value="54">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pearl Jewelry
                                                </option>
                                                <option value="55">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Slider 925
                                                </option>
                                                <option value="24">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Phones &amp;
                                                    PDAs </option>
                                                <option value="59 ">Sport &amp; Entertaiment </option>
                                                <option value="69">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Camping &amp;
                                                    Hiking </option>
                                                <option value="70">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cusen mariot
                                                </option>
                                                <option value="74">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Engite nanet
                                                </option>
                                                <option value="64">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fashion
                                                </option>
                                                <option value="66">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Men </option>
                                                <option value="60 ">Travel &amp; Vacation </option>
                                                <option value="71">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Best Tours
                                                </option>
                                                <option value="72">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cruises
                                                </option>
                                                <option value="73">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Destinations
                                                </option>
                                                <option value="67">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hotel &amp;
                                                    Resort </option>
                                                <option value="63">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Infocus
                                                </option>
                                                <option value="18 ">Laptops &amp; Notebooks </option>
                                                <option value="46">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Macs </option>
                                                <option value="45">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Windows
                                                </option>
                                                <option value="34 ">Food &amp; Restaurant </option>
                                                <option value="47">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hanet magente
                                                </option>
                                                <option value="43">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Knage unget
                                                </option>
                                                <option value="48">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Punge nenune
                                                </option>
                                                <option value="49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qunge genga
                                                </option>
                                                <option value="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tange manue
                                                </option>
                                                <option value="51">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Web Cameras
                                                </option>
                                                <option value="39 ">Shop Collection </option>
                                                <option value="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hanet magente
                                                </option>
                                                <option value="41">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Knage unget
                                                </option>
                                                <option value="42">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Latenge mange
                                                </option>
                                                <option value="58">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Punge nenune
                                                </option>
                                                <option value="17">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qunge genga
                                                </option>
                                                <option value="57">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tange manue
                                                </option>
                                                <option value="35 ">Fashion &amp; Accessories </option>
                                                <option value="36">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dress Ladies
                                                </option>
                                                <option value="31">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jean </option>
                                                <option value="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Men Fashion
                                                </option>
                                                <option value="88">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; T-shirt
                                                </option>
                                                <option value="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Trending
                                                </option>
                                                <option value="37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Western Wear
                                                </option>
                                                <option value="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Women Fashion
                                                </option>
                                                <option value="32">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bags </option>
                                                <option value="33 ">Digital &amp; Electronics </option>
                                                <option value="83">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cell Computers
                                                </option>
                                                <option value="84">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Computer
                                                    Accessories </option>
                                                <option value="85">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Computer
                                                    Headsets </option>
                                                <option value="86">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Desna Jacket
                                                </option>
                                                <option value="87">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Electronics
                                                </option>
                                                <option value="89">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Headphone
                                                </option>
                                                <option value="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Laptops
                                                </option>
                                                <option value="78">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobiles
                                                </option>
                                                <option value="79">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sound </option>
                                                <option value="80">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; USB &amp; HDD
                                                </option>
                                                <option value="81">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; VGA and CPU
                                                </option>
                                                <option value="62">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Video &amp;
                                                    Camera </option>
                                                <option value="76">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Video You
                                                </option>
                                                <option value="75">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Wireless
                                                    Speakers </option>
                                                <option value="29">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Camera New
                                                </option>
                                                <option value="28">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Case </option>
                                                <option value="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cell &amp; Cable
                                                </option>
                                                <option value="77">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobile &amp;
                                                    Table </option>
                                                <option value="25">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bluetooth
                                                    Speakers </option>
                                            </select>
                                        </div>
                                        <input class="autosearch-input form-control" type="text" value="" size="50"
                                            autocomplete="off" placeholder="Search" name="search">
                                        <span class="input-group-btn">
                                            <button type="submit" class="button-search btn btn-default btn-lg"
                                                name="submit_search"><i class="fa fa-search"></i><span
                                                    class="hidden">Search</span></button>
                                        </span>
                                    </div>
                                    <input type="hidden" name="route" value="product/search" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="header-cart-phone col-lg-3 col-md-4 col-sm-3 col-xs-0">
                        <div class="bt-head header-phone hidden-md hidden-sm hidden-xs">
                            <div class="call-us hidden-sm-down">
                                <div class="icon"></div>
                                <div class="text">
                                    <p class="text">Free Call Us</p>
                                    <p class="phone">(+123) 456 7890</p>
                                </div>
                            </div>
                        </div>
                        <div class="bt-head header-cart">
                            <div id="cart" class="btn-shopping-cart">
                                <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle"
                                    data-toggle="dropdown">
                                    <div class="shopcart">
                                        <span class="handle pull-left"></span>
                                        <div class="cart-info">
                                            <h2 class="title-cart">Shopping cart</h2>
                                            <h2 class="title-cart2 hidden">My Cart</h2>
                                            <span class="total-shopping-cart cart-total-full">
                                                <span class="items_cart">2 </span>
                                                <span class="items_cart2">item(s)</span>
                                                <span class="items_carts"> - $206.80</span>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu pull-right shoppingcart-box">
                                    <li class="content-item">
                                        <table class="table table-striped" style="margin-bottom:10px;">
                                            <tbody>
                                                <tr>
                                                    <td class="text-center size-img-cart">
                                                        <a href="product.html"><img
                                                                src="theme/image/catalog/demo/product/travel/10-54x54.jpg"
                                                                alt="Bougainvilleas on Lombard Street,  San Francisco, Tokyo"
                                                                title="Bougainvilleas on Lombard Street,  San Francisco, Tokyo"
                                                                class="img-thumbnail"></a>
                                                    </td>
                                                    <td class="text-left"><a href="product.html">Bougainvilleas on
                                                            Lombard Street, San Francisco, Tokyo</a>
                                                        <br> - <small>Size M</small>
                                                    </td>
                                                    <td class="text-right">x1</td>
                                                    <td class="text-right">$120.80</td>
                                                    <td class="text-center">
                                                        <button type="button" title="Remove"
                                                            class="btn btn-danger btn-xs"><i
                                                                class="fa fa-trash-o"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-striped" style="margin-bottom:10px;">
                                            <tbody>
                                                <tr>
                                                    <td class="text-center size-img-cart">
                                                        <a href="product.html"><img
                                                                src="theme/image/catalog/demo/product/travel/2-54x54.jpg"
                                                                alt="Canada Travel One or Two European Facials at  Studio"
                                                                title="Canada Travel One or Two European Facials at  Studio"
                                                                class="img-thumbnail"></a>
                                                    </td>
                                                    <td class="text-left"><a href="product.html">Canada Travel One or
                                                            Two European Facials at Studio</a>
                                                        <br> - <small>Size M</small>
                                                    </td>
                                                    <td class="text-right">x1</td>
                                                    <td class="text-right">$86.00</td>
                                                    <td class="text-center">
                                                        <button type="button" title="Remove"
                                                            class="btn btn-danger btn-xs"><i
                                                                class="fa fa-trash-o"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <div class="checkout clearfix">
                                            <a href="cart.html" class="btn btn-view-cart inverse"> View Cart</a>
                                            <a href="checkout.html" class="btn btn-checkout pull-right">Checkout</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>