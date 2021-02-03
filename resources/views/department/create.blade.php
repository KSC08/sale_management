@extends('layouts.nav')
@section('title','เพิ่มข้อมูลส่วน')
@section('content')
<div class="container">
    <div class="header">
        <h1 class="header-title">
            เพิ่มข้อมูลส่วน
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
                    <h1 class="card-title">เพิ่มข้อมูลส่วน</h1>
                    <h6 class="card-subtitle text-muted">กรุณากรอกข้อมูลในเเบบฟอร์มด้านล่างให้ครบถ้วน</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('department.store')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('POST') }}
                        <div class="row">
                            <div class="mb-3 col-md-8">
                                <label> ชื่อส่วนงาน
                                    <a style="color:red;"> *</a>
                                </label>
                                <input type="text" name="fname" class="form-control" placeholder="ชื่อส่วน" required>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label> ชื่อย่อส่วนงาน
                                    <a style="color:red;"> *</a>
                                </label>
                                <input type="text" name="sname" class="form-control" placeholder="ชื่อย่อส่วน" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 ">
                                <label for="sector">ฝ่าย</label>
                                <select id="sector" name="sec_fname" class="form-control">
                                    <option selected>Choose...</option>
                                    @foreach($sector as $data)
                                    <option value="{{$data->id}}">{{$data->fname}}</option>
                                    @endforeach
                                </select>
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
@stop