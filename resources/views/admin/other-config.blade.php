@extends('layouts/admin')
@section('content')
<div class="container-fluid pt-5">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('success') }}
    </div>
    @endif
    @if (session('danger'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('danger') }}
    </div>
    @endif
    <div class="card">
        <div class="card-header font-weight-bold">
            Cấu hình thông tin website
        </div>
        <div class="card-body">
            <form action="{{route('admin.setting.other_config_update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @foreach ($option as $item)
                    <div class="row py-2">
                        <label class="col-3" for="">{{$item->name}}</label>
                        <div class="col-9 d-flex align-items-center">
                            <label for="{{$item->key}}">
                                @if ($item->type == "file")
                                    <img loading="lazy" class="image-option mr-3" src="{{ $item->value ?? '/images/image_blank.jpg'}}"
                                    onerror="this.onerror=null;this.src='/images/image_blank.jpg'"
                                    alt="">
                                @endif
                            </label>
                            @if ($item->type == "textarea")
                                <textarea class="w-100" rows="5" name="{{$item->key}}" id="{{$item->key}}">{{$item->value}}</textarea>
                            @else
                                <input class="w-100" type="{{$item->type}}" name="{{$item->key}}" id="{{$item->key}}" value="{{$item->value}}">
                            @endif
                        </div>
                    </div>
                @endforeach
                <button class="btn btn-primary mt-4" type="submit">Cập nhật</button>
            </form>
        </div>
    </div>

</div>
<style type="text/css">
    .image-option {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }
</style>
@endsection
