@extends('layout.indexadmin');
@section('content');

<form style="margin-left:19%; margin-top:-7%" action="" method="POST" role="form">
<input type="hidden" name="_token" value="{{csrf_token()}}">
    <legend style="color:green">SỬA TÀI KHOẢN</legend>

    <div class="form-group">
        <label for="">HỌ VÀ TÊN</label>
    <input type="text" class="form-control" id="" name="name" value="{{$edit->name}}" placeholder="họ và tên">
    @if($errors->has('name'))
    <div class="help-block">
        {{ $errors->first('name') }}
    </div>
    @endif
    </div>
    <div class="form-group">
        <label for="">EMAIL</label>
        <input type="text" class="form-control" id="" name="email" value="{{$edit->email}}" placeholder="email">
        @if($errors->has('slug'))
        <div class="help-block">
            {{ $errors->first('slug') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="">PASSWORD</label>
        <input type="text" class="form-control" id="" name="password" value="{{$edit->password}}" placeholder="password">
        @if($errors->has('gia'))
        <div class="help-blokc">
            {{ $errors->first('gia') }}
        </div>
        @endif
    </div>


    <button type="submit" class="btn btn-primary">SỬA</button>
</form>
@endsection
