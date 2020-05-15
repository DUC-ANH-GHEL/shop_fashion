@extends('layout.indexadmin');
@section('content');

<form style="margin-left:19%; margin-top:-7%" action="" method="POST" enctype="multipart/form-data" role="form">
<input type="hidden" name="_token" value="{{csrf_token()}}">
    <legend style="color:green">THÊM MỚI DANH MỤC</legend>
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" id="name" name="name" onkeyup="ChangeToSlug();" placeholder="Tên danh mục">
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
    </div>
    <div class="form-group">
        <label for="">DANH MỤC CHA</label>
           <select  class="form-control" name="parent">
               <option value="0">Root</option>
            @foreach ($cats as $cat)
               <option value="{{ $cat->id }}">{{ $cat->name }}</option>
               @endforeach
           </select>
    </div>
    <button type="submit" class="btn btn-primary">THÊM MỚI</button>
</form>
@endsection
