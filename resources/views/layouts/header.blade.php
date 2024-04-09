<header class="header">
    <div class="header-top py-1  bg-color-8 d-none d-md-block">
        <div class="container">
            <span class="header-top__item">
                <i class="fa-solid fa-phone"></i>
                <a class="header-top__link" href="tel:{{ $phone }}"
                    aria-label="Gọi đến số {{ $phone }}">{{ $phone }}</a>
            </span>
            <span class="header-top__item ms-4">
                <i class="fa-solid fa-envelope"></i>
                <a class="header-top__link" href="mailto:{{ $email }}"
                    aria-label="Gửi mail đến {{ $email }}">{{ $email }}</a>
            </span>
            <span class="header-top__item ms-4">
                <i class="fa-solid fa-location-dot"></i>
                <a class="header-top__link" href="#"
                    aria-label="Địa chủ {{ $address }}">{{ $address }}</a>
            </span>
        </div>
    </div>
    <div class="header-main d-flex justify-content-between container py-3 d-none d-md-flex">
        <div class="header-main__logo header-main-- left">
            <a href="/">
                <img loading="lazy" class="logo-image w-100 h-auto object-fit-contain" src="{{ $logo }}"
                    alt="logo" />
            </a>
        </div>
        <div class="header-main--right d-flex flex-grow-1 justify-content-center align-items-center">
            <div class="search-form col-6 position-relative m-auto">
                <form class="mb-0 rounded-6 overflow-hidden" role="search" method="get" action="/search">
                    <input type="text" name="keyWord" class="py-2 px-4 rounded-6 border border-color-14 fs-7 w-100"
                        placeholder="Nhập từ khoá tìm kiếm..." />
                    <button type="submit" value="Tìm kiếm"
                        class="position-absolute top-50 end-0 translate-middle-y border-0 me-3 bg-transparent"
                        aria-label="Tìm kiếm">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
            <div class="header-main__action d-flex align-items-center">
                <div class="header-top__ d-flex align-items-center">
                    <a href="tel:{{ $phone }}" class="header-top__icon text-decoration-none"
                        aria-label="Điện thoại">
                        <i class="fa-solid fa-phone-volume color-1 fs-1"></i>
                    </a>
                    <div class="header-top__item ms-3">
                        <div class="header-top__item-title">Điên thoại</div>
                        <div>
                            <a href="tel:{{ $phone }}"
                                class="fs-8 color-9 text-decoration-none text link-text">{{ $phone }}</a>
                        </div>
                    </div>
                </div>
                <div class="header-top__item d-flex ms-4 d-none d-lg-flex">
                    <div class="wheader-top__icon__item ">
                        <a class="wheader-top__icon  text-decoration-none" href="https://zalo.me/{{ $phone }}"
                            aria-label="Zalo">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50"
                                viewBox="0 0 50 50">
                                <path
                                    d="M 9 4 C 6.2504839 4 4 6.2504839 4 9 L 4 41 C 4 43.749516 6.2504839 46 9 46 L 41 46 C 43.749516 46 46 43.749516 46 41 L 46 9 C 46 6.2504839 43.749516 4 41 4 L 9 4 z M 9 6 L 15.580078 6 C 12.00899 9.7156859 10 14.518083 10 19.5 C 10 24.66 12.110156 29.599844 15.910156 33.339844 C 16.030156 33.549844 16.129922 34.579531 15.669922 35.769531 C 15.379922 36.519531 14.799687 37.499141 13.679688 37.869141 C 13.249688 38.009141 12.97 38.430859 13 38.880859 C 13.03 39.330859 13.360781 39.710781 13.800781 39.800781 C 16.670781 40.370781 18.529297 39.510078 20.029297 38.830078 C 21.379297 38.210078 22.270625 37.789609 23.640625 38.349609 C 26.440625 39.439609 29.42 40 32.5 40 C 36.593685 40 40.531459 39.000731 44 37.113281 L 44 41 C 44 42.668484 42.668484 44 41 44 L 9 44 C 7.3315161 44 6 42.668484 6 41 L 6 9 C 6 7.3315161 7.3315161 6 9 6 z M 33 15 C 33.55 15 34 15.45 34 16 L 34 25 C 34 25.55 33.55 26 33 26 C 32.45 26 32 25.55 32 25 L 32 16 C 32 15.45 32.45 15 33 15 z M 18 16 L 23 16 C 23.36 16 23.700859 16.199531 23.880859 16.519531 C 24.050859 16.829531 24.039609 17.219297 23.849609 17.529297 L 19.800781 24 L 23 24 C 23.55 24 24 24.45 24 25 C 24 25.55 23.55 26 23 26 L 18 26 C 17.64 26 17.299141 25.800469 17.119141 25.480469 C 16.949141 25.170469 16.960391 24.780703 17.150391 24.470703 L 21.199219 18 L 18 18 C 17.45 18 17 17.55 17 17 C 17 16.45 17.45 16 18 16 z M 27.5 19 C 28.11 19 28.679453 19.169219 29.189453 19.449219 C 29.369453 19.189219 29.65 19 30 19 C 30.55 19 31 19.45 31 20 L 31 25 C 31 25.55 30.55 26 30 26 C 29.65 26 29.369453 25.810781 29.189453 25.550781 C 28.679453 25.830781 28.11 26 27.5 26 C 25.57 26 24 24.43 24 22.5 C 24 20.57 25.57 19 27.5 19 z M 38.5 19 C 40.43 19 42 20.57 42 22.5 C 42 24.43 40.43 26 38.5 26 C 36.57 26 35 24.43 35 22.5 C 35 20.57 36.57 19 38.5 19 z M 27.5 21 C 27.39625 21 27.29502 21.011309 27.197266 21.03125 C 27.001758 21.071133 26.819727 21.148164 26.660156 21.255859 C 26.500586 21.363555 26.363555 21.500586 26.255859 21.660156 C 26.148164 21.819727 26.071133 22.001758 26.03125 22.197266 C 26.011309 22.29502 26 22.39625 26 22.5 C 26 22.60375 26.011309 22.70498 26.03125 22.802734 C 26.051191 22.900488 26.079297 22.994219 26.117188 23.083984 C 26.155078 23.17375 26.202012 23.260059 26.255859 23.339844 C 26.309707 23.419629 26.371641 23.492734 26.439453 23.560547 C 26.507266 23.628359 26.580371 23.690293 26.660156 23.744141 C 26.819727 23.851836 27.001758 23.928867 27.197266 23.96875 C 27.29502 23.988691 27.39625 24 27.5 24 C 27.60375 24 27.70498 23.988691 27.802734 23.96875 C 28.487012 23.82916 29 23.22625 29 22.5 C 29 21.67 28.33 21 27.5 21 z M 38.5 21 C 38.39625 21 38.29502 21.011309 38.197266 21.03125 C 38.099512 21.051191 38.005781 21.079297 37.916016 21.117188 C 37.82625 21.155078 37.739941 21.202012 37.660156 21.255859 C 37.580371 21.309707 37.507266 21.371641 37.439453 21.439453 C 37.303828 21.575078 37.192969 21.736484 37.117188 21.916016 C 37.079297 22.005781 37.051191 22.099512 37.03125 22.197266 C 37.011309 22.29502 37 22.39625 37 22.5 C 37 22.60375 37.011309 22.70498 37.03125 22.802734 C 37.051191 22.900488 37.079297 22.994219 37.117188 23.083984 C 37.155078 23.17375 37.202012 23.260059 37.255859 23.339844 C 37.309707 23.419629 37.371641 23.492734 37.439453 23.560547 C 37.507266 23.628359 37.580371 23.690293 37.660156 23.744141 C 37.739941 23.797988 37.82625 23.844922 37.916016 23.882812 C 38.005781 23.920703 38.099512 23.948809 38.197266 23.96875 C 38.29502 23.988691 38.39625 24 38.5 24 C 38.60375 24 38.70498 23.988691 38.802734 23.96875 C 39.487012 23.82916 40 23.22625 40 22.5 C 40 21.67 39.33 21 38.5 21 z"
                                    fill="var(--color-1)"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="header-top__item ms-3">
                        <div class="header-top__item-title">Zalo</div>
                        <div>
                            <a href="https://zalo.me/{{ $phone }}"
                                class="fs-8 color-9 text-decoration-none text link-text">{{ $phone }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom d-none d-md-block bg-color-1">
        <div class="container px-md-0 d-flex justify-content-between">
            <div class="header__bottom__left">
                <div class="header-bottom__category position-relative">
                    <button class="py-3 px-4 border-0 bg-color-3 color-4" type="button">
                        <i class="fa-solid fa-bars me-2"></i>
                        Danh mục sản phẩm
                    </button>
                    <ul
                        class="list-category w-100 rounded-0 list-group-numbered ps-0 bg-color-5 shadow-sm py-0 position-absolute start-0">
                        @foreach ($listCategory as $item)
                            <li class="list-category__item header-bottom__category position-relative d-flex align-items-center justify-content-between px-0">
                                <a class="color-6 text-decoration-none py-2 px-3 w-100 d-block"
                                    href="/category/{{ $item->slug }}">{{ $item->name }}
                                </a>
                                @if ($item->children->count() > 0)
                                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="14" height="14" viewBox="0 0 14 14">
                                        <g id="arrow_down" data-name="arrow down"
                                            transform="translate(14 14) rotate(-180)" clip-path="url(#clip-path)">
                                            <g id="Icons" transform="translate(0 0)">
                                                <g id="Rounded" transform="translate(0 0)">
                                                    <g id="Navigation">
                                                        <g id="_-Round-_-Navigation-_-arrow_back_ios"
                                                            data-name="-Round-/-Navigation-/-arrow_back_ios">
                                                            <g id="Group_1915" data-name="Group 1915">
                                                                <path id="Path" d="M0,14H14V0H0Z" fill="none"
                                                                    fill-rule="evenodd" opacity="0.87"></path>
                                                                <path id="_-Icon-Color" data-name="🔹-Icon-Color"
                                                                    d="M6.051,10.732a.729.729,0,0,1-1.033,0L.171,5.884a.581.581,0,0,1,0-.823L5.018.214A.73.73,0,0,1,6.051,1.247L1.827,5.476,6.056,9.705A.727.727,0,0,1,6.051,10.732Z"
                                                                    transform="translate(3.644 1.524)"
                                                                    fill-rule="evenodd" fill="currentColor"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    @include('layouts.cat-item-menu', ['listCategory' => $item->children])
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="header-bottom--right drowdown-menu">
                <ul class="menu">
                    <li class="menu-item py-3">
                        <a href="/" class="text-decoration-none">
                            Trang chủ
                        </a>
                    <li class="menu-item py-3">
                        <a href="/products" class="text-decoration-none">
                            Sản phẩm
                        </a>
                    </li>
                    <li class="menu-item py-3">
                        <a href="tel:{{ $phone }}" class="text-decoration-none">
                            Liên hệ
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- header mobile -->
    <div class="header-mobile d-md-none container-fluid py-2 shadow-sm">
        <div class="header-mobile-top d-flex justify-content-between py-2">
            <div class="header-mobile-top__canvas">
                <button class="btn .bg-light fs-2" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title color-1 fw-1" id="offcanvasRightLabel">Danh mục</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="menu-mobile">
                            <li class="menu-mobile-item py-3">
                                <a href="/" class="text-decoration-none color-1">
                                    Trang chủ
                                </a>
                            </li>
                            <li class="menu-mobile-item py-3">
                                <a href="/products" class="text-decoration-none color-1">
                                    Sản phẩm
                                </a>
                            </li>
                            <li class="menu-mobile-item py-3">
                                <a href="/contact" class="text-decoration-none color-1">
                                    Liên hệ
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-mobile-top__logo">
                <a href="/">
                    <img loading="lazy" class="header-mobile-logo" src="{{ $logo }}" alt="logo" />
                </a>
            </div>
            <div class="header-mobile-top__item ms-3">
                <div class="header-mobile-top__item-title text-center">
                    <a href="/contact" class="header-top__icon text-decoration-none" aria-label="Contact">
                        <i class="fa-solid fa-phone-volume color-1 fs-5"></i>
                    </a>
                    <span class="d-none d-sm-inline">Liên hệ</span>
                </div>
                <div>
                    <a href=" tel:{{ $phone }}"
                        class="fs-8 color-9 text-decoration-none text link-text">{{ $phone }}</a>
                </div>
            </div>
        </div>
        <div class="header-mobile-bottom position-relative">
            <form class="mb-0 rounded-6 overflow-hidden" role="search" method="get" action="/search">
                <input type="text" name="keyWord" class="py-2 px-4 rounded-6 border border-color-14 fs-7 w-100"
                    placeholder="Nhập từ khoá tìm kiếm..." />
                <button type="submit" value="Tìm kiếm"
                    class="position-absolute top-50 end-0 translate-middle-y border-0 me-3 bg-transparent"
                    aria-label="Tìm kiếm">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- kdk -->
</header>
