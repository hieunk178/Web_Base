@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm sản phẩm
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="name" id="name">
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="price">Giá</label>
                                <input class="form-control" type="text" name="price" id="price">
                            </div>
                            <div class="form-group col-6">
                                <label for="new_price">Giá khuyến mãi</label>
                                <input class="form-control" type="text" name="price_new" id="new_price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new_price">Số lượng</label>
                            <input class="form-control" type="text" name="quantity" id="quantity">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description">Mô tả sản phẩm</label>
                            <textarea name="description" class="form-control" id="intro" cols="30" rows="8"></textarea>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="intro">Chi tiết sản phẩm</label>
                    <textarea name="" class="form-control" id="intro" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Ảnh minh họa</label>
                    <div>
                        <input type="file" name="image" id="image" accept="image/gif, image/jpeg, image/png" onchange="loadFile(event)">
                        <div class="avatar-img">
                            <img id="image-show" src="{{asset('images/image_blank.jpg')}}" alt="Ảnh minh họa">
                        </div>
                    </div>
                    @error('image')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" id="">
                        @foreach($cat_list as $key=>$item)
                        <option value="{{$key}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Thương hiệu</label>
                    <select class="form-control" id="">
                        @foreach($brands as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection