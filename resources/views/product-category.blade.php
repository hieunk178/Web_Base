@extends('layouts.app')

@section('title', $category->name ?? $title)

@section('description', $category->desctiption ?? $description)

@section('keywords', $category->name ?? $title)
@section('image', $category->image ?? $imageShareUrl)
@section('canonical', env('APP_URL') . (isset($category) ? '/category/'. $category->slug : '/products'))

@section('page', 'product-category')
@section('file', 'product-category')


@section('content')
<div class="main">
    <h1 class="d-none">{{ $category->name ?? "Sản phẩm - " . $title }}</h1>
    <div class="breadcrumb bg-color-10 mb-0">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb d-flex fs-8 mb-0 py-3">
                    <li class="breadcrumb-item">
                        <a href="/" class="text-decoration-none fs-7 color-10">Trang chủ</a>
                    </li>
                    @if (isset($category))
                        <li class="breadcrumb-item">
                            <a href="#" class="text-decoration-none fs-7 color-1">{{ $category->name }}</a>
                        </li>
                    @else
                        <li class="breadcrumb-item">
                            <a href="#" class="text-decoration-none fs-7 color-1">Sản phẩm</a>
                        </li>
                    @endif
                </ol>
            </nav>
        </div>
    </div>
    <section class="bg-color-8 py-3">
        <div class="container py-0 py-md-4 my-0 my-md-2">
            <div class="row product-row ">
                <div class="accordion-item p-3 rounded-10 d-lg-none">
                    <h2 class="accordion-header" id="flush-headingMenu">
                        <button class="accordion-button px-3 fw-4 bg-color-10 shadow-none color-1 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseMenu" aria-expanded="false" aria-controls="flush-collapseOne">
                            <svg class="fill-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
                                <g id="Mask_Group_453" data-name="Mask Group 453" transform="translate(-98 -282)">
                                    <g id="category" transform="translate(97.826 281.828)">
                                        <path id="Path_14053" data-name="Path 14053" d="M8.3,10.472H2.42A2.248,2.248,0,0,1,.174,8.226V2.419A2.248,2.248,0,0,1,2.42.174H8.3a2.248,2.248,0,0,1,2.245,2.245V8.226A2.248,2.248,0,0,1,8.3,10.472ZM2.42,1.913a.508.508,0,0,0-.507.506V8.226a.508.508,0,0,0,.507.506H8.3a.507.507,0,0,0,.506-.506V2.419A.507.507,0,0,0,8.3,1.913Z" fill="#1ba370"></path>
                                        <path id="Path_14054" data-name="Path 14054" d="M8.329,24.17H2.448A2.249,2.249,0,0,1,.2,21.924V16.118a2.248,2.248,0,0,1,2.246-2.245h5.88a2.248,2.248,0,0,1,2.244,2.245v5.806A2.248,2.248,0,0,1,8.329,24.17Zm-5.88-8.559a.508.508,0,0,0-.507.506v5.806a.508.508,0,0,0,.507.507h5.88a.508.508,0,0,0,.506-.507V16.118a.507.507,0,0,0-.506-.506Z" fill="#1ba370"></path>
                                        <path id="Path_14055" data-name="Path 14055" d="M21.925,24.17h-5.88A2.249,2.249,0,0,1,13.8,21.924V16.118a2.248,2.248,0,0,1,2.246-2.245h5.88a2.248,2.248,0,0,1,2.245,2.245v5.806a2.248,2.248,0,0,1-2.245,2.246Zm-5.88-8.555a.508.508,0,0,0-.507.506v5.806a.508.508,0,0,0,.507.507h5.88a.508.508,0,0,0,.506-.507v-5.81a.507.507,0,0,0-.506-.506Z" fill="#1ba370"></path>
                                        <path id="Path_14056" data-name="Path 14056" d="M18.989,10.472a5.147,5.147,0,1,1,5.185-5.147,5.147,5.147,0,0,1-5.185,5.147Zm0-8.555a3.408,3.408,0,1,0,3.446,3.408,3.408,3.408,0,0,0-3.446-3.408Z" fill="#1ba370"></path>
                                    </g>
                                </g>
                            </svg>
                            <span class="p-3 fw-6 fs-5"> Danh mục sản phẩm</span>
                        </button>
                    </h2>

                    <div id="flush-collapseMenu" class="accordion-collapse collapse px-5" aria-labelledby="flush-headingMenu" data-bs-parent="#accordionFlushMenu">
                        <div class="accordion-body py-1 list-style-none">
                            @foreach($categories as $item)
                            <div class="list-category__item bg-color-5">
                                <div class="list-category__item-name position-relative d-flex align-items-center justify-content-between ">
                                    <a class="text-decoration-none text-reset py-2 fs-6 fw-6 flex-grow-1" href="/category/{{$item->slug}}">{{$item->name}}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="list-category col-lg-3 col-md-12 col-sm-12 col-12 d-lg-block d-none">
                    <div class="bg-color-5 rounded-10 py-3">
                        <div class="p-1">
                            <div class="px-3 d-flex align-items-center">
                                <div class="me-3">
                                    <svg class="fill-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
                                        <g id="Mask_Group_453" data-name="Mask Group 453" transform="translate(-98 -282)">
                                            <g id="category" transform="translate(97.826 281.828)">
                                                <path id="Path_14053" data-name="Path 14053" d="M8.3,10.472H2.42A2.248,2.248,0,0,1,.174,8.226V2.419A2.248,2.248,0,0,1,2.42.174H8.3a2.248,2.248,0,0,1,2.245,2.245V8.226A2.248,2.248,0,0,1,8.3,10.472ZM2.42,1.913a.508.508,0,0,0-.507.506V8.226a.508.508,0,0,0,.507.506H8.3a.507.507,0,0,0,.506-.506V2.419A.507.507,0,0,0,8.3,1.913Z" fill="#1ba370"></path>
                                                <path id="Path_14054" data-name="Path 14054" d="M8.329,24.17H2.448A2.249,2.249,0,0,1,.2,21.924V16.118a2.248,2.248,0,0,1,2.246-2.245h5.88a2.248,2.248,0,0,1,2.244,2.245v5.806A2.248,2.248,0,0,1,8.329,24.17Zm-5.88-8.559a.508.508,0,0,0-.507.506v5.806a.508.508,0,0,0,.507.507h5.88a.508.508,0,0,0,.506-.507V16.118a.507.507,0,0,0-.506-.506Z" fill="#1ba370"></path>
                                                <path id="Path_14055" data-name="Path 14055" d="M21.925,24.17h-5.88A2.249,2.249,0,0,1,13.8,21.924V16.118a2.248,2.248,0,0,1,2.246-2.245h5.88a2.248,2.248,0,0,1,2.245,2.245v5.806a2.248,2.248,0,0,1-2.245,2.246Zm-5.88-8.555a.508.508,0,0,0-.507.506v5.806a.508.508,0,0,0,.507.507h5.88a.508.508,0,0,0,.506-.507v-5.81a.507.507,0,0,0-.506-.506Z" fill="#1ba370"></path>
                                                <path id="Path_14056" data-name="Path 14056" d="M18.989,10.472a5.147,5.147,0,1,1,5.185-5.147,5.147,5.147,0,0,1-5.185,5.147Zm0-8.555a3.408,3.408,0,1,0,3.446,3.408,3.408,3.408,0,0,0-3.446-3.408Z" fill="#1ba370"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <span class="fs-5 color-6 fw-6">
                                    Tất cả danh mục
                                </span>
                            </div>
                            <div class="list-category__content px-3 accordion accordion-flush mt-3">
                                <div class="list-category__item-name position-relative d-flex align-items-center justify-content-between ">
                                    <a class="text-decoration-none text-reset py-2 fs-6 fw-6 flex-grow-1" href="/products">Tất cả sản phẩm</a>
                                </div>
                                @foreach($categories as $item)
                                <div class="list-category__item accordion bg-color-5">
                                    <div class="list-category__item-name flex-wrap position-relative d-flex align-items-center justify-content-between">
                                        <a class="text-decoration-none text-reset py-2 fs-6 fw-6 flex-grow-1" href="/category/{{$item->slug}}">{{$item->name}}</a>
                                        @if (count($item->children) > 0)
                                            <div class="py-2 ps-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$item->id}}" aria-expanded="true" aria-controls="collapse-{{$item->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 14 14">
                                                    <g id="arrow_down" data-name="arrow down" transform="translate(14 14) rotate(-180)" clip-path="url(#clip-path)">
                                                        <g id="Icons" transform="translate(0 0)">
                                                            <g id="Rounded" transform="translate(0 0)">
                                                                <g id="Navigation">
                                                                    <g id="_-Round-_-Navigation-_-arrow_back_ios" data-name="-Round-/-Navigation-/-arrow_back_ios">
                                                                        <g id="Group_1915" data-name="Group 1915">
                                                                            <path id="Path" d="M0,14H14V0H0Z" fill="none" fill-rule="evenodd" opacity="0.87"></path>
                                                                            <path id="_-Icon-Color" data-name="🔹-Icon-Color" d="M6.051,10.732a.729.729,0,0,1-1.033,0L.171,5.884a.581.581,0,0,1,0-.823L5.018.214A.73.73,0,0,1,6.051,1.247L1.827,5.476,6.056,9.705A.727.727,0,0,1,6.051,10.732Z" transform="translate(3.644 1.524)" fill-rule="evenodd" fill="currentColor"></path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            @include('layouts.cat-item-child', ['listCategory' => $item->children, 'id' => $item->id])
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <div class="product-row--right col-lg-9">
                    <div class="sort-bar py-12 d-flex justify-content-start align-items-center bg-color-5 rounded-10 p-3">
                        <form action="" method="GET" class="d-flex flex-column flex-md-row flex-grow-1 mb-0">
                            <div class="sort-bar-item pb-2 pb-md-0 d-flex align-items-center">
                                <span class="color-1 fs-7 w-100">Sắp xếp theo</span>
                                <select name="orderBy" class="border-0 bg-transparent orderby p-0 fs-7" onchange="this.form.submit()">
                                    <option value="" none="">
                                        Mặc định
                                    </option>
                                    <option value="Asc" none="" {{ request()->orderBy == "Asc" ? 'selected' : "" }}>
                                        Từ thấp đến cao
                                    </option>
                                    <option value="Desc" none="" {{ request()->orderBy == "Desc" ? 'selected' : "" }}>
                                        Từ cao xuống thấp
                                    </option>
                                </select>
                            </div>
                            <div class="vr mx-3 d-md-block d-none"></div>
                            <div class="sort-bar-item me-0 d-flex align-items-center">
                                <span class="color-1 fs-7 w-100">Hiển thị sản phẩm</span>
                                <select name="limit" class="border-0 bg-transparent product-display p-0 fs-7" onchange="this.form.submit()">
                                    <option value="12" {{ request()->limit == "12" ? 'selected' : "" }}>12</option>
                                    <option value="24" {{ request()->limit == "24" ? 'selected' : "" }}>24</option>
                                    <option value="30" {{ request()->limit == "30" ? 'selected' : "" }}>30</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        @foreach($products as $item)
                        <div class="product-item col-lg-4 col-6 mt-4">
                            <a href="/product/{{$item->slug}}" class="text-decoration-none h-auto">
                                <div class="product-item__inner bg-color-5 rounded-6 position-relative overflow-hidden box-product h-100 d-flex flex-column">
                                    <div class="box-product__image ratio ratio-1x1">
                                        <img loading="lazy" class="w-100 h-100 object-fit-cover" src="/images/product.webp" alt="iPhone 15 128GB">
                                    </div>
                                    @if($item->price > $item->new_price && $item->price > 0 && $item->new_price > 0)
                                        <div class="box--sale--off bg-color-13 color-14 rounded-2 d-flex align-items-center justify-content-center flex-column position-absolute p-2 m-2">
                                            <span class="fs-7">
                                                {{round(100 - ($item->new_price / $item->price) * 100)}}%
                                            </span>
                                            <span class="fs-9">
                                                GIẢM
                                            </span>
                                        </div>
                                    @endif
                                    <div class="p-3 d-flex flex-column flex-grow-1">
                                        <h3 class="product-item-name color-6 fs-5 flex-grow-1 fw-6">
                                            {{$item->name}}
                                        </h3>
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
                        <div class="mt-4 d-flex justify-content-center">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
