@extends('layouts.app')

@section('title', $product->name . ' - ' . $title)

@section('description', $product->desctiption . ' - ' . $description)

@section('keywords', $product->name . ' - ' . $title)
@section('image', $product->image ?? $imageShareUrl)
@section('canonical', env('APP_URL') . '/product/'. $product->slug)


@section('page', 'product-detail')

@section('file', 'product-detail')


@section('content')
<div class="main">
    <div class="breadcrumb bg-color-10 mb-0">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb d-flex fs-8 mb-0 py-3">
                    <li class="breadcrumb-item">
                        <a href="/" class="text-decoration-none fs-7 color-10">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ $product->category ? '/category/' . $product->category->slug : '/products' }}" class="text-decoration-none fs-7 color-1">{{ $product->category->name ?? 'Sản phẩm' }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/category/{{ $product->slug }}" class="text-decoration-none fs-7 color-1">{{ $product->name }}</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    @isset($product)
    <section class="product container py-5">
        <div class="row">
            <div class="col-12 col-md-5">
                <div class="product-detail__image ratio ratio-1x1 rounded-4 border overflow-hidden">
                    <img loading="lazy" class="w-100 h-100 object-fit-cover" src="{{$product->image}}" alt="{{$product->name}}">
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div class="product-detail__content">
                    <h1 class="product-detail__title fs-2 fw-4">{{$product->name}}</h1>
                    <div class="product-detail__info d-flex gap-3">
                        <div class="product-detail__status">
                            Trạng thái:
                            @if($product->quantity > 0)
                            <span class="text-success">Còn hàng</span>
                            @else
                            <span class="text-danger">Hết hàng</span>
                            @endif
                        </div>
                        <div>
                            Thương hiệu: <span class="color-1">{{$product->brand->name}}</span>
                        </div>
                    </div>
                    <div class="product-detail__price py-3">
                        <span class="product-detail__price-value fs-3 fw-bold">{!! number_format($product->new_price, 0, '.', ',') !!}₫</span>
                        <span class="fs-5 ms-3 color-9"><del>{!! number_format($product->price, 0, '.', ',') !!}₫</del></span>
                    </div>
                    <div class="product-detail__description">
                        {!! $product->description !!}
                    </div>
                </div>
                <div class="product-detail__action pt-3">
                    <a class="text-decoration-none py-3 fw-4 px-5 bg-color-1 color-2 hover-bg-color-3 hover-color-4 rounded" href="tel:{{app('proxy')->getOptionByKey('phone')}}">
                        Liên hệ mua hàng
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <h2 class="product-detail__title pt-4 fw-4 pb-3">Chi tiết sản phẩm</h2>
                <div class="product-detail__description">
                    {!! $product->product_detail !!}
                </div>
            </div>
        </div>
    </section>
    @endisset

    @isset($relatedProduct)
    <section class="product-related pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="product-related__title fw-5">Sản phẩm liên quan</h2>
                </div>
            </div>
        </div>
        <div class="container pt-4">
            <div class="row">
                <div class="product-related__slider col-12 position-relative swiper-custom">
                    <div class="swiper p-1">
                        <div class="swiper-wrapper">
                            @foreach($relatedProduct as $item)
                            <div class="swiper-slide h-auto">
                                <a href="/product/{{ $item->slug }}" aria-label="{{$item->name}}" class="text-decoration-none text-reset">
                                    <div class="product-related__item border rounded-3 overflow-hidden h-100 d-flex flex-column">
                                        <div class="product-related__image ratio ratio-1x1 rounded-4 overflow-hidden">
                                            <img loading="lazy" class="w-100 h-100 object-fit-cover" src="{{$item->image}}" alt="{{$item->name}}">
                                        </div>
                                        <div class="product-related__content p-3 flex-grow-1 d-flex flex-column">
                                            <h3 class="product-related__title text-limit-2 fs-6  color-1 flex-grow-1">{{$item->name}}</h3>
                                            <div class="product-related__price d-flex align-items-center gap-3 text-limit-2">
                                                <span class="product-related__price-value fs-6 fw-bold color-1">{!! number_format($item->new_price, 0, '.', ',') !!}₫</span>
                                                <span class="fs-7 color-9"><del>{!! number_format($item->price, 0, '.', ',') !!}₫</del></span>
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
</div>
@endsection
