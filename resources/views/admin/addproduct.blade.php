@extends('layout.indexadmin');
@section('content');

<form style="margin-left:19%; margin-top:-7%" action="" method="POST" enctype="multipart/form-data" role="form">
<input type="hidden" name="_token" value="{{csrf_token()}}">
    <legend style="color:green">THÊM MỚI SẢN PHẨM</legend>

    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" id="name" name="name" onkeyup="ChangeToSlug();" placeholder="Tên sản phẩm">
        @if($errors->has('name'))
        <div class="help-block">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" placeholder="Tên slug">
        @if($errors->has('slug'))
        <div class="help-block">
            {{ $errors->first('slug') }}
        </div>
        @endif
        <div class="form-group">
            <label for="">Danh Mục Cha</label>
            <select id="" class="form-control" name="parent">
                @foreach ($cats as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="">Giá</label>
        <input type="text" class="form-control" id="" name="gia"  placeholder="giá sản phẩm">
        @if($errors->has('gia'))
        <div class="help-block">
            {{ $errors->first('gia') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="">Hình sản phẩm</label>
        <input type="file" class="form-control" id="" name="hinhsp" placeholder="hình sản phẩm">
        @if($errors->has('hinhsp'))
        <div class="help-block">
            {{ $errors->first('hinhsp') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="">Mô tả</label>
        <textarea type="text" class="form-control" id="mota" name="mota"  placeholder="Mô tả sản phẩm"></textarea>

        @if($errors->has('mota'))
        <div class="help-block">
            {{ $errors->first('mota') }}
        </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">THÊM MỚI</button>
</form>
@endsection
