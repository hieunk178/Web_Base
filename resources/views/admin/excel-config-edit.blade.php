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
            Cấu hình import dữ liệu từ Excel
        </div>
        <div class="card-body">
            <form action="{{route('admin.setting.excel.update')}}" method="POST">
                @csrf
                @foreach ($excelSetting as $item)
                    <div class="row py-2">
                        <label class="col-3" for="">{{$item->name}}</label>
                        <input class="col-9" type="number" name="{{$item->key}}" value="{{$item->value ?? $item->default}}">
                    </div>
                @endforeach
                <button class="btn btn-primary mt-4" type="submit">Cập nhật</button>
            </form>
        </div>
    </div>

</div>
@endsection
