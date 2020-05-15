@extends('layout.indexadmin');
@section('content');

<form style="margin-left:19%; margin-top:-7%" action="" method="POST" role="form">
<input type="hidden" name="_token" value="{{csrf_token()}}">
    <legend style="color:green">SỬA SẢN PHẨM</legend>

    <div class="form-group">
        <label for="">Name</label>
    <input type="text" class="form-control" id="" name="name" value="{{$edit->name}}" placeholder="Tên sản phẩm">
    @if($errors->has('name'))
    <div class="help-block">
        {{ $errors->first('name') }}
    </div>
    @endif
    </div>
    <div class="form-group">
        <label for="">Slug</label>
        <input type="text" class="form-control" id="" name="slug" value="{{$edit->slug}}" placeholder="Tên slug">
        @if($errors->has('slug'))
        <div class="help-block">
            {{ $errors->first('slug') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="">Giá</label>
        <input type="text" class="form-control" id="" name="gia" value="{{$edit->gia}}" placeholder="giá sản phẩm">
        @if($errors->has('gia'))
        <div class="help-blokc">
            {{ $errors->first('gia') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="">Hình sản phẩm</label>
        <input type="file" class="form-control" id="" name="hinhsp" value="{{$edit->hinhsp}}" placeholder="hình sản phẩm">
        @if($errors->has('hinhsp'))
        <div class="help-block">
            {{ $errors->first('hinhsp') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="">Mô tả</label>
        <textarea type="text" class="form-control" id="" name="mota" value="{{$edit->mota}}" placeholder="Mô tả sản phẩm"></textarea>
        @if($errors->has('mota'))
        <div class="help-block">
            {{ $errors->first('mota') }}
        </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">SỬA</button>
</form>
@endsection
