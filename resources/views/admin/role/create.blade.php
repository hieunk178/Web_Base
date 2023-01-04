@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm nhóm phân quyền
        </div>
        <div class="card-body">
            <form action="{{route('admin.role.store')}}" method="POST" role="form">
                @csrf
                <div class="form-group">
                    <label for="name">Tên nhóm quyền</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="name">Routes</label>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="route[]" value="admin.category.index">
                            Category index
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="route[]" value="admin.category.create">
                            Category create
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="route[]" value="admin.category.edit">
                            Category edit
                        </label>
                    </div>

                </div>
                <button type="submit" name="btnCreate" value="Thêm mới" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection