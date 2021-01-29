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
                    
                    <a style="float: right" href="{{ url('/project/add') }}" class="btn btn-primary ">เพิ่มข้อมูล</a>
                </div>
                <div class="card-body">
                    <table id="datatables-basic" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>code</th>
                                <th>name</th>
                                <th>pro_status</th>
                                <th>pro_type</th>
                                <th>detail</th>
                                <th>created_by</th>
                                <th>update_by</th>
                                <td>setting</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($project as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->code}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->pro_status}}</td>
                                <td>{{$data->pro_type}}</td>
                                <td>{{$data->detail}}</td>
                                <td>{{$data->created_by}}</td>
                                <td>{{$data->update_by}}</td>
                                <td>
                                <a href="{{ url('/project/edit',$data->id) }}"><i class="align-middle mr-2" data-feather="edit"></i> <span class="align-middle"></span></a> 
                               <a href="{{ url('/project/delete',$data->id) }}"><i class="align-middle mr-2" data-feather="trash-2"></i> <span class="align-middle"></span></a>
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
   <div class="row" id="data_table">
      <div class="col-12 col-xl-12">
         <div class="card">
            <div class="card-header">
               <h1 class="text-primary mr-auto" align="center">ข้อมูลผู้ติดต่อ</h1>
            </div>
            <!-- <div align="center"><a href="{{route('visitor.create')}}" class="btn btn-primary">เพิ่มข้อมูลผู้ติดต่อ</a></div> -->
            <div class="card-body">
               <br><br>
               <!-- success -->
               @if(\Session::has('success'))
               <div class="alert alert-success alert-dismissible" role="alert">
                  <div class="alert-icon">
                     <i class="far fa-fw fa-bell"></i>
                  </div>
                  <div class="alert-message">
                     <strong>{{\Session::get('success')}}</strong>
                  </div>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               @endif
               <!-- alert -->
               @if(\Session::has('alert'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
						<div class="alert-icon">
							<i class="far fa-fw fa-bell"></i>
						</div>
						<div class="alert-message">
							<strong>{{\Session::get('alert')}}</strong>
						</div>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
					</div>
                @endif
               <table id="datatables-basic" class="table table-striped" style="width:100%">
                  <thead>
                     <tr>
                        <th width="10%">&nbsp;ชื่อ&nbsp;</th>
                        <th width="10%">&nbsp;นามสกุล&nbsp;</th>
                     </tr>
                  </thead>
                  <tbody>
                    @foreach($projects as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->vis_lname}}</td>
                    </tr>
                    @endforeach
                  </tbody>
               </table>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- /Attachment Modal -->