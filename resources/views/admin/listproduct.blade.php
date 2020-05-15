@extends('layout.indexadmin');
@section('content');
<table style="margin-left:17%; width:82%" class="table table-hover">

    <thead>
        <tr >
            <th>ID</th>
            <th>Tên sản phẩm</th>
            {{-- <th>Category</th> --}}
            <th>Giá sản phẩm</th>
            <th>Hình sản phẩm</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($ds as $ds1)
        <td>#{{$ds1->id}}</td>
            <td>{{ $ds1->name }}</td>
            {{-- <td>{{ $ds->category->name }}</td> --}}
            <td>{{ $ds1->gia }} đ</td>
            <td>
                <img src="{{ asset('uploads') }}/{{ $ds1->hinhsp}}" width="60" >
            </td>
            <td>
            <a href="{{route('xoasp',['id'=>$ds1->id])}}" class="btn btn-xs btn-danger" onclick="return confirm('bạn có chắc muốn xóa')"><i class="fas fa-trash-alt"></i></a>
            <a href="{{route('suasp',['id'=>$ds1->id])}}" class="btn btn-xs btn-info"><i class="fas fa-hammer"></i></a>
            </td>
        </tr>
        @endforeach

    </tbody>
    <div class="buaa" style="margin-left:20%">
    <?php
// $tong=0;
// foreach ($tong ){
//     $tong+=$ds2;
// }
$lala = count($tong);
// $tong=$ds2+1;
echo"Tổng có  " ."$lala". "  sản phẩm";
       ?>
       </div>
</table>
<div class="panel-footer" style="margin-left:276px">
    {{ $ds->links() }}


</div>
@endsection
