@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Sửa thương hiệu
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.brand.update', $brand->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên thương hiệu</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{$brand->name}}">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="description" id="description" class="form-control" rows="8">{{$brand->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Ảnh minh họa</label>
                            <div>
                                <input type="file" name="image" id="image" accept="image/gif, image/jpeg, image/png, image/webp" onchange="loadFile(event)">
                                <div class="avatar-img">
                                    <img id="image-show" src="{{$brand->image}}" alt="Ảnh minh họa">
                                </div>
                            </div>
                            @error('image')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" name="update" class="btn btn-primary btn_action">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
