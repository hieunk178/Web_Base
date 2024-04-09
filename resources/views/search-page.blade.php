@extends('layouts.app')

@section('title', 'Tìm kiếm')

@section('description', 'Tìm kiếm')

@section('keywords', 'Tìm kiếm')

@section('page', 'search-page')
@section('file', 'search-page')

@section('image', '/images/logo.png')

@section('content')
<div class="main">
    <section class="breadcrumb bg-color-10 mb-0">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb d-flex fs-8 mb-0 py-3">
                    <li class="breadcrumb-item">
                        <a href="/" class="text-decoration-none fs-7 color-10">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/search" class="text-decoration-none fs-7 color-1">Tìm kiếm</a>
                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="product-search container py-5">
        <div class="row">
            @foreach($products as $item)
                <div class="product-search-item col-xl-3 col-lg-4 col-sm-6 col-12 mt-4">
                    <a href="/product/{{ $item->slug }}" class="text-decoration-none h-auto">
                        <div class="product-search-item__inner bg-color-5 rounded-6 border position-relative overflow-hidden box-product h-100 d-flex flex-column">
                            <div class="box-product-search__image ratio ratio-1x1">
                                <img loading="lazy" class="w-100 h-100 object-fit-cover" src="{{ $item->image }}" alt="{{ $item->name }}">
                            </div>
                            <div class="p-3 d-flex flex-column flex-grow-1">
                                <h4 class="product-search-item-name text-limit-2 color-6 fs-6 flex-grow-1 fw-6">
                                    {{ $item->name }}
                                </h4>
                                <div class="d-flex align-items-center">
                                    <span class="me-2 pe-1 color-1 fs-6 fw-6">
                                        {!! number_format($item->new_price, 0, '.', ',') !!}₫
                                    </span>
                                    <span class="text-decoration-line-through fs-8 color-9">
                                        {!! number_format($item->price, 0, '.', ',') !!}₫
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </section>
</div>
@endsection
