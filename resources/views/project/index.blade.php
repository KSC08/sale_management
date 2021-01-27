@extends('layouts.nav')

@section('title', 'project')



@section('content')
<div class="container-fluid">

    <div class="header">
        <h1 class="header-title">
            DataTables
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard-default.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">DataTables</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">รายละเอียดโครงการ</h5>
                    <a class="btn btn-primary" >เพิ่มข้อมูล</a>
                </div>

                <div class="card-body">
                    <table id="datatables-basic" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>on.</th>
                                <th>รหัส</th>
                                <th>ชื่อโครงการ</th>
                                <th>สถานะโครงการ</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($project as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->code}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->pro_status}}</td>
                                
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
</div>
@stop