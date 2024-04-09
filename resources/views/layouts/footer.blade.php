    <footer class="footer bg-color-6">
        <div class="footer-container container py-2">
            <div class="row">
                <div class="col-12 col-lg-4 col-sm-6 py-3 d-md-block color-5">
                    <div class="">
                        <div onclick="location.href =('/')" class="footer-logo">
                            <img loading="lazy" class="logo-image w-100 h-auto object-fit-contain" src="{{ $logo }}" alt="logo">
                        </div>
                        <p class="color-5 mb-0 mb-0 mb-2 color-5 mt-3">
                            {{  $description }}
                        </p>
                        <p class="mb-0">
                            <i class="fa-solid fs-7 fa-location-dot footer-icon-color"></i>
                            <a class="color-5 text-decoration-none fs-7 mb-0 color-5" href="#">
                                {{ $address }}
                            </a>
                        </p>
                        <p class="footer-info__phone mb-0">
                            <i class="fa-solid fs-7 fa-phone footer-icon-color"></i>
                            <a class="color-5 text-decoration-none fs-7 mb-0" href="tel:{{ $phone }}">
                                {{ $phone }}
                            </a>
                        </p>
                        <p class="footer-info__email mb-0">
                            <i class="fa-solid fs-7 fa-envelope footer-icon-color"></i>
                            <a class="color-5 text-decoration-none fs-7 mb-0" href="mailto:{{ $email }}" subject="subject color-5">{{ $email }}</a>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-sm-6 py-3 d-md-block">
                    <div class="color-5 fw-5">LIÊN KẾT NHANH</div>
                    <div class="color-5-left">
                        <div class="mt-1">
                            <a class="color-5 fs-7 text-decoration-none" href="/">Trang chủ</a>
                        </div>
                        <div class="mt-1">
                            <a class="color-5 fs-7 text-decoration-none" href="/product">Sản phẩm</a>
                        </div>
                        <div class="mt-1">
                            <a class="color-5 fs-7 text-decoration-none" href="/lien-he">Liên hệ</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 py-3 d-md-block">
                    {!! $iframe !!}
                    <div class="social-network">
                        <div class="color-5">
                            THEO DÕI CHÚNG TÔI
                        </div>
                        <div class="color-5 d-flex">
                            <div class="inline">
                                <a class="social-network-item" href="https://www.facebook.com/" rel="nofollow" target="_blank" aria-label="facebook link">
                                    <i class="fa-brands color-5 fa-facebook"></i>
                                </a>
                            </div>
                            <div class="inline" class="ms-3">
                                <a class="social-network-item" href="https://www.instagram.com/" rel="nofollow" target="_blank" aria-label="insta link">
                                    <i class="fa-brands color-5 fa-instagram"></i>
                                </a>
                            </div>
                            <div class="inline" class="ms-3">
                                <a class="social-network-item" href="https://twitter.com/" rel="nofollow" target="_blank" aria-label="twitter link">
                                    <i class="fa-brands color-5 fa-twitter"></i>
                                </a>
                            </div>
                            <div class="inline" class="ms-3">
                                <a class="social-network-item" href="https://mail.google.com/" rel="nofollow" target="_blank" aria-label="mail link">
                                    <i class="fa-brands color-5 fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright bg-color-1 fs-7 py-2 text-center color-2 fw-5">COPYRIGHT &copy; 2024</div>
    </footer>
