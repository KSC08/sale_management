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
                <form method="get" action="{{url('/create_project_type')}}">
                    <div class="mb-3 ">
                        <label class="form-label">ชื่อ</label>
                        <input name="name" type="text" class="form-control" placeholder="กรุณากรอกชื่อสถานะโครงการ">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- /Attachment Modal -->