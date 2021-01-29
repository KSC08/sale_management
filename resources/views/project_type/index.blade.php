@extends('layouts.nav')
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
                    <h5 class="card-title">Default</h5>
                    <h6 class="card-subtitle text-muted">Highly flexible tool that many advanced features to any HTML table.</h6>
                    
                    <a style="float: right" href="{{ url('/project_type/add') }}" class="btn btn-primary ">เพิ่มข้อมูล</a>
                </div>
                <div class="card-body">
                    <table id="datatables-basic" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>name</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($project_type as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                
                                <td>{{$data->name}}</td>
                                <td>
                               <a href="{{ url('/project_type/edit',$data->id) }}"><i class="align-middle mr-2" data-feather="edit"></i> <span class="align-middle"></span></a> 
                               <a href="{{ url('/project_type/delete',$data->id) }}"><i class="align-middle mr-2" data-feather="trash-2"></i> <span class="align-middle"></span></a>
                                </td>
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
@endsection

<!-- /Attachment Modal -->