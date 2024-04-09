@extends('layouts.app')

@section('title', $title)

@section('description', $description)

@section('keywords', $title . ', ' . $description)

@section('page', 'home-page')
@section('file', 'home-page')

@section('canonical', env('APP_URL'))

@section('image', $imageShareUrl)

@section('content')
<div class="main">
    <h1 class="d-none">{{ $title }}</h1>
    <section class="swiper swiper-custom home-page__slider ">
        <div class="swiper-wrapper">
            @foreach ($slide as $item)
            <div class="swiper-slide ratio ratio-21x9">
                <img loading="lazy" class="d-block h-100 object-fit-cover w-100" alt="slide" src="{{ $item->url }}">
            </div>
            @endforeach
        </div>
        <div class="swiper-button-next inside position-absolute">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 14 14">
                <g id="arrow_down" data-name="arrow down" transform="translate(14 14) rotate(-180)" clip-path="url(#clip-path)">
                    <g id="Icons" transform="translate(0 0)">
                        <g id="Rounded" transform="translate(0 0)">
                            <g id="Navigation">
                                <g id="_-Round-_-Navigation-_-arrow_back_ios" data-name="-Round-/-Navigation-/-arrow_back_ios">
                                    <g id="Group_1915" data-name="Group 1915">
                                        <path id="Path" d="M0,14H14V0H0Z" fill="none" fill-rule="evenodd" opacity="0.87" />
                                        <path id="_-Icon-Color" data-name="🔹-Icon-Color" d="M6.051,10.732a.729.729,0,0,1-1.033,0L.171,5.884a.581.581,0,0,1,0-.823L5.018.214A.73.73,0,0,1,6.051,1.247L1.827,5.476,6.056,9.705A.727.727,0,0,1,6.051,10.732Z" transform="translate(3.644 1.524)" fill-rule="evenodd" fill="var(--bs-white)" />
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
        <div class="swiper-button-prev inside position-absolute">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 10 10" class="mdl-js">
                <g id="arrow_down" data-name="arrow down">
                    <g id="Icons" transform="translate(0 0)">
                        <g id="Rounded" transform="translate(0 0)">
                            <g id="Navigation">
                                <g id="_-Round-_-Navigation-_-arrow_back_ios" data-name="-Round-/-Navigation-/-arrow_back_ios">
                                    <g id="Group_1915" data-name="Group 1915">
                                        <path id="Path" d="M0,10H10V0H0Z" fill="none" fill-rule="evenodd" opacity="0.87" />
                                        <path id="_-Icon-Color" data-name="🔹-Icon-Color" d="M4.322,7.666a.521.521,0,0,1-.738,0L.122,4.2a.415.415,0,0,1,0-.588L3.584.153a.521.521,0,1,1,.738.737L1.305,3.911,4.326,6.932A.519.519,0,0,1,4.322,7.666Z" transform="translate(2.603 1.089)" fill-rule="evenodd" fill="var(--bs-white)" />
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
    </section>
    @isset($productNew)
    <section class="product-latest py-5 bg-color-8">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="product-latest__title text-center ">Sản phẩm mới nhất</h2>
                </div>
            </div>
        </div>
        <div class="container pt-4">
            <div class="row">
                <div class="product-latest__slider col-12 position-relative swiper-custom">
                    <div class="swiper p-1">
                        <div class="swiper-wrapper">
                            @foreach ($productNew as $item)
                            <div class="product-home-item swiper-slide h-auto bg-color-5 rounded-3 overflow-hidden">
                                <a href="{{ route('product-detail', $item->slug) }}" class="text-decoration-none">
                                    <div class="product-home-item__inner border h-100 d-flex flex-column">
                                        <div class="product-latest__image ratio ratio-1x1 rounded-4 overflow-hidden">
                                            <img loading="lazy" class="w-100 h-100 object-fit-cover" src="{{ $item->image }}" alt="{{ $item->name }}">
                                        </div>
                                        <div class="product-latest__content p-3 flex-grow-1 d-flex flex-column">
                                            <h3 class="product-latest__title text-limit-2 fs-6 color-1 flex-grow-1">{{ $item->name }}</h3>
                                            <div class="product-latest__price d-flex align-items-center gap-3 text-limit-2">
                                                <span class="product-latest__price-value fs-6 fw-bold color-1">{{ $item->new_price }}₫</span>
                                                <span class="fs-7 color-9"><del>{{ $item->price }}₫</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next inside position-absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 14 14">
                            <g id="arrow_down" data-name="arrow down" transform="translate(14 14) rotate(-180)" clip-path="url(#clip-path)">
                                <g id="Icons" transform="translate(0 0)">
                                    <g id="Rounded" transform="translate(0 0)">
                                        <g id="Navigation">
                                            <g id="_-Round-_-Navigation-_-arrow_back_ios" data-name="-Round-/-Navigation-/-arrow_back_ios">
                                                <g id="Group_1915" data-name="Group 1915">
                                                    <path id="Path" d="M0,14H14V0H0Z" fill="none" fill-rule="evenodd" opacity="0.87" />
                                                    <path id="_-Icon-Color" data-name="🔹-Icon-Color" d="M6.051,10.732a.729.729,0,0,1-1.033,0L.171,5.884a.581.581,0,0,1,0-.823L5.018.214A.73.73,0,0,1,6.051,1.247L1.827,5.476,6.056,9.705A.727.727,0,0,1,6.051,10.732Z" transform="translate(3.644 1.524)" fill-rule="evenodd" fill="var(--bs-white)" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="swiper-button-prev inside position-absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 10 10" class="mdl-js">
                            <g id="arrow_down" data-name="arrow down">
                                <g id="Icons" transform="translate(0 0)">
                                    <g id="Rounded" transform="translate(0 0)">
                                        <g id="Navigation">
                                            <g id="_-Round-_-Navigation-_-arrow_back_ios" data-name="-Round-/-Navigation-/-arrow_back_ios">
                                                <g id="Group_1915" data-name="Group 1915">
                                                    <path id="Path" d="M0,10H10V0H0Z" fill="none" fill-rule="evenodd" opacity="0.87" />
                                                    <path id="_-Icon-Color" data-name="🔹-Icon-Color" d="M4.322,7.666a.521.521,0,0,1-.738,0L.122,4.2a.415.415,0,0,1,0-.588L3.584.153a.521.521,0,1,1,.738.737L1.305,3.911,4.326,6.932A.519.519,0,0,1,4.322,7.666Z" transform="translate(2.603 1.089)" fill-rule="evenodd" fill="var(--bs-white)" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endisset

    @if(isset($categories))
    @foreach ($categories as $category)
        @if(count($category->products) > 0)
            <section class="product-home container py-5">
                <div class="product-home-header d-lg-flex d-block border-bottom">
                    <div class="product-home-header_title">
                        <a class=" text-decoration-none" href="{{ route('category-detail', $category->slug) }}">
                            <h2 class="bg-color-1 fs-5 fw-5 color-2 px-4 py-2 mb-0 rounded-top">
                                {{ $category->name }}
                            </h2>
                        </a>
                    </div>
                    {{-- <div class="filter-price d-flex align-items-center">
                        <span class="p-2 fw-6 d-none d-sm-block">Mức giá:</span>
                        <ul class="d-flex m-0 list-unstyled overflow-auto py-2">
                            <li><a class="text-decoration-none px-2 text-nowrap" href="#">5 Triệu - 10 Triệu</a></li>
                            <li><a class="text-decoration-none px-2 text-nowrap" href="#">10 Triệu - 20 Triệu</a></li>
                            <li><a class="text-decoration-none px-2 text-nowrap" href="#">20 Triệu - 30 Triệu</a></li>
                            <li><a class="text-decoration-none px-2 text-nowrap" href="#">Trên 30 Triệu</a></li>
                        </ul>
                    </div> --}}
                </div>

                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
                    @foreach ($category->products as $item)
                        <div class="product-home-item col mt-4">
                            <a href="{{ route('product-detail', $item->slug) }}" class="text-decoration-none h-auto" aria-label="{{ $item->name }}">
                                <div class="product-home-item__inner bg-color-5 rounded-6 border position-relative overflow-hidden box-product-home h-100 d-flex flex-column">
                                    <div class="box-product-home__image ratio ratio-1x1 overflow-hidden">
                                        <img loading="lazy" class="w-100 h-100 object-fit-cover" src="{{ $item->image }}" alt="{{ $item->name }}">
                                    </div>
                                    @if ($item->price > $item->new_price && $item->new_price > 0 && $item->price > 0)
                                    <div class="box--sale--off bg-color-13 color-14 rounded-2 d-flex align-items-center justify-content-center flex-column position-absolute p-2 m-2">
                                        <span class="fs-7">
                                            {{ round(100 - (($item->price - $item->new_price) / $item->price) * 100) }}%
                                        </span>
                                        <span class="fs-9">
                                            GIẢM
                                        </span>
                                    </div>
                                    @endif
                                    <div class="p-3 d-flex flex-column flex-grow-1">
                                        <h3 class="product-home-item-name text-limit-2 color-6 fs-6 flex-grow-1 fw-6">
                                            {{ $item->name }}
                                        </h3>
                                        <div class="d-flex align-items-center">
                                            <span class="me-2 pe-1 color-1 fs-6 fw-6">
                                                {{ number_format($item->new_price, 0, '.', ',') }}₫
                                            </span>
                                            <span class="text-decoration-line-through fs-8 color-9">
                                                {{ number_format($item->price, 0, '.', ',') }}₫
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    @endforeach
    @endif
    @isset($brands)
    <section class="brand py-5 bg-color-8">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="brand__title text-center ">Thương hiệu</h2>
                </div>
            </div>
        </div>
        <div class="container pt-4">
            <div class="row">
                <div class="brand__slider col-12 position-relative swiper-custom">
                    <div class="swiper p-1">
                        <div class="swiper-wrapper">
                            @foreach ($brands as $item)
                            <div class="swiper-slide h-auto">
                                <div class="brand__item border rounded-4 overflow-hidden h-100 d-flex flex-column">
                                    <div class="brand__image ratio ratio-16x9">
                                        <img loading="lazy" class="w-100 h-100 object-fit-cover" src="{{ $item->image }}" alt="{{ $item->name }}">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next outside position-absolute d-none d-sm-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 14 14">
                            <g id="arrow_down" data-name="arrow down" transform="translate(14 14) rotate(-180)" clip-path="url(#clip-path)">
                                <g id="Icons" transform="translate(0 0)">
                                    <g id="Rounded" transform="translate(0 0)">
                                        <g id="Navigation">
                                            <g id="_-Round-_-Navigation-_-arrow_back_ios" data-name="-Round-/-Navigation-/-arrow_back_ios">
                                                <g id="Group_1915" data-name="Group 1915">
                                                    <path id="Path" d="M0,14H14V0H0Z" fill="none" fill-rule="evenodd" opacity="0.87" />
                                                    <path id="_-Icon-Color" data-name="🔹-Icon-Color" d="M6.051,10.732a.729.729,0,0,1-1.033,0L.171,5.884a.581.581,0,0,1,0-.823L5.018.214A.73.73,0,0,1,6.051,1.247L1.827,5.476,6.056,9.705A.727.727,0,0,1,6.051,10.732Z" transform="translate(3.644 1.524)" fill-rule="evenodd" fill="var(--bs-white)" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="swiper-button-prev outside position-absolute d-none d-sm-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 10 10" class="mdl-js">
                            <g id="arrow_down" data-name="arrow down">
                                <g id="Icons" transform="translate(0 0)">
                                    <g id="Rounded" transform="translate(0 0)">
                                        <g id="Navigation">
                                            <g id="_-Round-_-Navigation-_-arrow_back_ios" data-name="-Round-/-Navigation-/-arrow_back_ios">
                                                <g id="Group_1915" data-name="Group 1915">
                                                    <path id="Path" d="M0,10H10V0H0Z" fill="none" fill-rule="evenodd" opacity="0.87" />
                                                    <path id="_-Icon-Color" data-name="🔹-Icon-Color" d="M4.322,7.666a.521.521,0,0,1-.738,0L.122,4.2a.415.415,0,0,1,0-.588L3.584.153a.521.521,0,1,1,.738.737L1.305,3.911,4.326,6.932A.519.519,0,0,1,4.322,7.666Z" transform="translate(2.603 1.089)" fill-rule="evenodd" fill="var(--bs-white)" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endisset
</div>
@endsection
