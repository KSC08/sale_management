@extends('layouts.nav')
@section('content')
    <div class="header">
        <h1 class="header-title">
            ข้อมูลฝ่าย
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('department.index')}}">Sector</a></li>
                <li class="breadcrumb-item"><a href="{{route('department.index')}}">Index</a></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">รายชื่อฝ่ายทั้งหมด
                        <a class ="btn btn-primary float-right" href="{{route('sector.create')}}">เพิ่มฝ่าย</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table id="datatables-basic" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ชื่อฝ่าย</th>
                                <th>ชื่อย่อฝ่าย</th>
                                <th>Setting</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($sectors as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->fname}}</td>
                                <td>{{$row->sname}}</td>
                                <th>
                                    <a href="{{route('sector.edit',$row->id)}}"><i class="align-middle mr-2" data-feather="edit"></i> <span class="align-middle"></span></a> 
                                    <a href="sector_delete/{{$row->id}}"><i class="align-middle mr-2" data-feather="trash-2"></i> <span class="align-middle"></span></a>
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