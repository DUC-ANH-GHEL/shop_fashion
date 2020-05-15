@extends('layout.indexadmin');
@section('content');
<table style="margin-left:17%; width:82%" class="table table-hover">
    <thead>
        <tr >
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Đường dẫn tĩnh</th>
            <th>Danh mục cha</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($cats as $cat)
        <td>#{{$cat->id}}</td>
            <td>{{ $cat->name }}</td>
            <td>{{ $cat->slug }}</td>
            <td>{{ $cat->parent}}</td>


            <td>
            <a href="{{route('xoadm',['id'=>$cat->id])}}" class="btn btn-xs btn-danger" onclick="return confirm('bạn có chắc muốn xóa')"><i class="fas fa-trash-alt"></i></a>
            <a href="{{route('suadm',['id'=>$cat->id])}}" class="btn btn-xs btn-info"><i class="fas fa-hammer"></i></a>
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
echo  "Tổng có  " ."$lala". "  danh mục";
       ?>
       </div>
</table>
<div class="panel-footer" style="margin-left:276px">
    {{ $cats->links() }}


</div>
@endsection
