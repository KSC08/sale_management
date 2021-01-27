@extends('layouts.nav')
@section('title','เพิ่มข้อมูลฝ่าย')
@section('content')
<div class="container">
    <div class="header">
        <h1 class="header-title">
            เพิ่มข้อมูลฝ่าย
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('department.index')}}">Department</a></li>
                <li class="breadcrumb-item"><a href="{{route('department.index')}}">Index</a></li>
                <li class="breadcrumb-item"><a href="{{route('department.create')}}">Create</a></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">เพิ่มข้อมูลฝ่าย</h1>
                    <h6 class="card-subtitle text-muted">กรุณากรอกข้อมูลในเเบบฟอร์มด้านล่างให้ครบถ้วน</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('department.store')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('POST') }}
                        <div class="row">
                            <div class="mb-3 col-md-8">
                                <label style="color:red;">ชื่อฝ่าย*</label>
                                <input type="text" name="fullName" class="form-control" placeholder="ชื่อฝ่าย" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label style="color:red;">ชื่อย่อฝ่าย*</label>
                                <input type="text" name="shortName" class="form-control" placeholder="ชื่อย่อฝ่าย" required>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <center>
                                <div class="form-group"><input type="submit" class="btn btn-primary" value="บันทึก">
                                    <a href="{{route('department.index')}}" class="btn btn-danger">ยกเลิก</a>
                                </div>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
    $("#comid").select2({
        placeholder: "Select a Name",
        allowClear: true
    });
</script>
@endsection