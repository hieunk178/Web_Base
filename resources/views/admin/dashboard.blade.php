@extends('layouts/admin')
@section('content')
<div class="container-fluid pt-5">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{session('success')}}
    </div>
    @endif
    @if(session('danger'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{session('danger')}}
    </div>
    @endif
    <div class="row row-cols-3 mb-4">
        <div class="col">
            <div class="card text-white bg-primary mb-3 h-100">
                <div class="card-header">SỐ LƯỢNG SẢN PHẨM</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalProduct ?? 0 }}</h5>
                    <p class="card-text">Tổng số sản phẩm trong cửa hàng</p></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-danger mb-3 h-100">
                <div class="card-header">SỐ LƯỢNG DANH MỤC</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalCategory ?? 0 }}</h5>
                    <p class="card-text">Tổng số lượng danh mục trong cửa hàng</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-white bg-success mb-3 h-100">
                <div class="card-header">DUNG LƯỢNG</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalSize ?? 0 }} MB</h5>
                    <p class="card-text">Tổng số dụng lưu trữ</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end analytic  -->
    <div class="card">
        <div class="card-header font-weight-bold">
            Sản phẩm mới
        </div>
        <div class="card-body">

        </div>
    </div>

</div>
@endsection
