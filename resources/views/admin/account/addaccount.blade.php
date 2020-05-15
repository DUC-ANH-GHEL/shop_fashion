@extends('layout.indexadmin');
@section('content');

<form style="margin-left:19%; margin-top:-7%" action="" method="POST" role="form">
<input type="hidden" name="_token" value="{{csrf_token()}}">
    <legend style="color:green">THÊM MỚI TÀI KHOẢN</legend>

    <div class="form-group">
        <label for="">Name</label>
    <input type="text" class="form-control" id="" name="name" value="{{old('name')}}" placeholder="Họ và Tên">
        @if($errors->has('name'))
        <div class="help-block">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" id="" name="email" {{ old('email') }} placeholder="Email">
        @if($errors->has('email'))
        <div class="help-block">
            {{ $errors->first('email') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" id="" name="password"  placeholder="Password">
        @if($errors->has('password'))
        <div class="help-block">
            {{ $errors->first('password') }}
        </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">THÊM MỚI</button>
</form>
@endsection
