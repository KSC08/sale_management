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
            <form method="POST" action="{{url('/project_status_update')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('POST') }}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="hidden" name="id" value="{{$project_status->id}}">
                            <label style="color:red;">ชื่อ *</label>
                            <input type="text" name="name" class="form-control" placeholder="ป้อนชื่อ" value="{{$project_status->name}}" required>
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