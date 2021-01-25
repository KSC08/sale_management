@extends('layouts.nav')
@section('content')
<div class="header">
    <h1 class="header-title">
        ข้อมูลฝ่าย
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('department.index')}}">Department</a></li>
            <li class="breadcrumb-item"><a href="{{route('department.index')}}">Index</a></li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">รายชื่อฝ่ายทั้งหมด</h5>
                <a class ="btn btn-primary float-right" href="{{route('department.create')}}">สร้างฝ่าย</a>
            </div>
            <div class="card-body">
                <table id="datatables-basic" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ชื่อฝ่าย</th>
                            <th>ชื่อย่อฝ่าย</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->fullName}}</td>
                            <td>{{$row->shortName}}</td>
                            <th>
                                <a href="{{route('department.edit',$row->id)}}"><i class="align-middle fas fa-fw fa-pen"></i></i></a>&nbsp&nbsp
                                <a href="department_delete/{{$row->id}}" onclick="return confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่')"><i class="align-middle fas fa-fw fa-trash"></i></a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
@endsection
@section('script')
@endsection
<!-- /Attachment Modal -->