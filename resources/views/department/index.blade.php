@extends('layouts.nav')
@section('content')
    <div class="header">
        <h1 class="header-title">
            ข้อมูลส่วนงาน
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
                    <h5 class="card-title">รายชื่อส่วนงานทั้งหมด
                        <a class ="btn btn-primary float-right" href="{{route('department.create')}}">เพิ่มข้อมูล</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table id="datatables-basic" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อส่วนงาน</th>
                                <th>ชื่อย่อส่วนงาน</th>
                                <th>ฝ่าย</th>
                                <th><i class="align-middle mr-2" data-feather="settings"></i> <span class="align-middle"></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0?>
                        @foreach($departments as $row)
                            <tr>
                                <?php $i++?>
                                <td>{{$i}}</td>
                                <td>{{$row->fname}}</td>
                                <td>{{$row->sname}}</td>
                                <td>{{$row->sec_fname}}</td>
                                <th>
                                    <a href="{{route('department.edit',$row->id)}}"><i class="align-middle mr-2" data-feather="edit"></i> <span class="align-middle"></span></a> 
                                    <a href="department_delete/{{$row->id}}"><i class="align-middle mr-2" data-feather="trash-2"></i> <span class="align-middle"></span></a>
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