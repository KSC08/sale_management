@extends('layouts.nav')
@section('content')
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            ข้อมูลโครงการ
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">ข้อมูลโครงการ</a></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">ตารางข้อมูลโครงการ
                    <?php if(Auth::user()->role =='user'){ ?>
                        <a style="float: right" href="{{ url('/project/add') }}" class="btn btn-primary ">เพิ่มข้อมูล</a>
                    <?php }?></h5>
                    
                </div>
                <div class="card-body">
                    <table id="datatables-basic" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>code</th>
                                <th>name</th>
                                <th>department</th>
                                <th>created_by</th>
                                <td><i class="align-middle mr-2" data-feather="settings"></i> <span class="align-middle"></span></td>
                            </tr>
                        </thead>
                      
                        <tbody><?php $i = 0?>
                        @foreach($project as $data)
                            <tr><?php $i++?>
                                <td>{{$i}}</td>
                                <td>{{$data->code}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->department}}</td>
                                <td>{{$data->creater_name}}</td>
                                <td>
                                <a href="{{ url('/project/edit',$data->id) }}"><i class="align-middle mr-2" data-feather="edit"></i> <span class="align-middle"></span></a> 
                               <a href="{{ url('/project/delete',$data->id) }}"><i class="align-middle mr-2" data-feather="trash-2"></i> <span class="align-middle"></span></a>
                               <a href="{{ url('/project/detail',$data->id) }}"><i class="align-middle mr-2" data-feather="zoom-in"></i> <span class="align-middle"></span></a>

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