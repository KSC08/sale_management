@extends('layouts.nav')
@section('content')


<div class="header">
    <h1 class="header-title">
        Form Layouts
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard-default.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Layouts</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">เพิ่มข้อมูลสถานะโครงการ</h5>
            </div>
            <div class="card-body">
            <form method="POST" action="{{url('/project_update')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('POST') }}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="hidden" name="id" value="{{$project->id}}">
                            <label style="color:red;">รหัสโครงการ</label>
                            <input type="text" name="code" class="form-control" placeholder="ป้อนชื่อ" value="{{$project->code}}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="hidden" name="id" value="{{$project->id}}">
                            <label style="color:red;">ชื่อ *</label>
                            <input type="text" name="pro_name" class="form-control" placeholder="ป้อนชื่อ" value="{{$project->name}}" required>
                        </div>
                    </div>
                    <div class="mb-3 ">
                        <label for="status">สถานะโครงการ</label>
                        <select id="status" name="status" class="form-control">
                            <option value="{{$project->pro_status_id}}" selected>{{$project->pro_status}}</option>
                            @foreach($project_status as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 ">
                        <label for="type">ประเภทโครงการ</label>
                        <select id="type" name="type" class="form-control">
                            <option value="{{$project->pro_status_id}}" selected>{{$project->pro_type}}</option>
                            @foreach($project_type as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 ">
                        <label for="type">ลูกค้าเจ้าของโครงการ</label>
                        <select id="type" name="customer" class="form-control">
                            <option selected>Choose...</option>
                            @foreach($customers as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="hidden" name="id" value="{{$project->id}}">
                            <label style="color:red;">รายละเอียด</label>
                            <input type="text" name="detail" class="form-control" placeholder="ป้อนชื่อ" value="{{$project->detail}}" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <center>
                            <div class="form-group"><input type="submit" class="btn btn-primary" value="บันทึกการแก้ไข">
                            </div>
                        </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- /Attachment Modal -->