@extends('layout.indexadmin');
@section('content');
<table style="margin-left:17%; width:82%" class="table table-hover">
    <thead>
        <tr >
            <th>ID</th>
            <th>Họ và tên</th>
            <th>Email</th>
            {{-- <th>Giá sản phẩm</th>
            <th>Hình sản phẩm</th> --}}
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($user as $u)
        <td>#{{$u->id}}</td>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            {{-- <td>{{ $u->gia }}</td>
            <td>{{ $u->hinhsp }}</td> --}}
            <td>
            <a href="{{route('xoatk',['id'=>$u->id])}}" class="btn btn-xs btn-danger" onclick="return confirm('bạn có chắc muốn xóa')"><i class="fas fa-trash-alt"></i></a>
            <a href="{{route('suatk',['id'=>$u->id])}}" class="btn btn-xs btn-info"><i class="fas fa-hammer"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="panel-footer">
    {{-- {{ $u->links() }} --}}
</div>
@endsection
