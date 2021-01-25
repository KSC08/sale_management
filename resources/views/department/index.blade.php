@extends('layouts.nav')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Department</h5>
                <h6 class="card-subtitle text-muted">Highly flexible tool that many advanced features to any HTML table.</h6>
                <a class="btn btn-primary" href="{{route('department.create')}}">Create Department</a>
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
                            <th><a href="{{route('department.edit',$row->id)}}"><i class="fa fa-edit"></i></a>&nbsp&nbsp
                            <a href="{{url('department_delete',$row->id)}}" onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่')"><i class="fa fa-trash"></i></a></th>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>ชื่อฝ่าย</th>
                            <th>ชื่อย่อฝ่าย</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
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