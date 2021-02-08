@extends('layouts.nav')
@section('content')
<div class="header">
    <h1 class="header-title">
        รายละเอียดโครงการ
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashbord</a></li>
            <li class="breadcrumb-item"><a href="{{url('project')}}">โครงการ</a></li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label style="color:#084C92">รหัสโครงการ : </label>
                        <label for="code">{{$project->code}}</label>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label style="color:#084C92">ชื่อโครงการ : </label>
                        <label for="pro_name">{{$project->name}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label style="color:#084C92">สถานะโครงการ : </label>
                        <label for="code">{{$project->pro_status}}</label>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label style="color:#084C92">ประเถทโครงการ : </label>
                        <label for="pro_name">{{$project->pro_type}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label style="color:#084C92">ลูกค้าเจ้าของโครงการ : </label>
                        <label for="code">{{$project->cus_name}}</label>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label style="color:#084C92">ส่วนงาน : </label>
                        <label for="pro_name">{{$project->dep_name}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label style="color:#084C92">รายระเอียด : </label>
                        <label for="code">{{$project->detail}}</label>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formOperation">
                    เพิ่มข้อมูลแผนการดำเนินงาน
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal เพิ่มข้อมูลแผนการดำเนินงาน -->
<div class="modal fade" id="formOperation" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เพิ่มข้อมูลแผนการดำเนินงาน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="code">รายละเอียดแผนการดำเนินงาน(ไม่ต้องกรองก็ได้ถ้ามีไฟล์)</label>
                        <textarea class="form-control" name="name" rows="2" placeholder="กรอกรายละเอียดแผนการดำเนินงาน"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="pro_name">ไฟล์รายละเอียดแผนการดำเนินงาน(ถ้ามี)</label>
                        <input type="file" class="form-control" id="code" name="operation_file" accept="application/pdf">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">บันทึกข้อมูล</button>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- /Attachment Modal -->