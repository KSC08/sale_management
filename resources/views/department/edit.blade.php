@extends('layouts.nav')
@section('title', 'แก้ไขข้อมูลฝ่าย')
@section('content')
    <div class="container">
        <div class="header">
            <h1 class="header-title">
                แก้ไขข้อมูลฝ่าย
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('department.index') }}">Department</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('department.index') }}">Index</a></li>
                    <li class="breadcrumb-item"><a href="#">Edit</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">แก้ไขข้อมูลฝ่าย</h1>
                    <h6 class="card-subtitle text-muted">กรุณากรอกข้อมูลในเเบบฟอร์มด้านล่างให้ครบถ้วน</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('department_update', $departments->id) }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="row">
                            <div class="mb-3 col-md-8">
                                <label>ชื่อส่วนงาน
                                    <a style="color: red"> *</a>
                                </label>
                                <input type="text" name="fname" class="form-control" value="{{ $departments->fname }}"
                                    placeholder="ป้อนชื่อเติม" required>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>ชื่อย่อส่วนงาน
                                    <a style="color: red"> *</a>
                                </label>
                                <input type="text" name="sname" class="form-control" value="{{ $departments->sname }}"
                                    placeholder="ป้อนชื่อย่อ" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>ฝ่าย
                                    <a style="color: red"> *</a>
                                </label>
                                <select class="form-control" name="sec_fname" required>
                                    <option value="{{ $departments->sec_id }}">{{ $departments->sec_fname }}</option>
                                    @foreach ($sector as $data)
                                        <!--LOOP ข้อมูลใน $department-->
                                        <?php if ($departments->sec_id != $data->id) { ?>
                                        <option value="{{ $data->id }}">{{ $data->fname }}</option>
                                        <?php } ?>
                                    @endforeach
                                </select>
                            </div><br>
                        </div>
                       
                        <center>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="บันทึก">
                                <a href="{{ route('department.index') }}" class="btn btn-danger">ยกเลิก</a>
                            </div>

                        </center>
                    </form>
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
