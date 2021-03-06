@extends('layouts.nav')
@section('content')
<div class="header">
    <h1 class="header-title">
        ข้อมูลส่วนงาน
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('division.index')}}">Division</a></li>
            <li class="breadcrumb-item"><a href="{{route('division.index')}}">Index</a></li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">รายชื่อส่วนงานทั้งหมด</h5>
                <a class ="btn btn-primary float-right" href="{{route('division.create')}}"> สร้างส่วนงาน </a>
            </div>
            <div class="card-body">
                <table id="datatables-basic" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ชื่อส่วนงาน</th>
                            <th>ชื่อย่อส่วนงาน</th>
                            <th>ภายใต้ฝ่าย</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($divisions as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->fname}}</td>
                            <td>{{$row->sname}}</td>
                            <td>{{$row->dep_fname}}</td>
                            <th>
                                <a href="{{route('division.edit',$row->id)}}"><i class="align-middle fas fa-fw fa-pen"></i></i></a>&nbsp&nbsp
                                <a href="division_delete/{{$row->id}}" onclick="return confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่')"><i class="align-middle fas fa-fw fa-trash"></i></a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                            
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