@extends('layouts.nav')
@section('title', 'แก้ไขข้อมูลส่วนงาน')
@section('content')
    <div class="container">
        <div class="header">
            <h1 class="header-title">
                แก้ไขข้อมูลส่วนงาน
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('department.index') }}">Division</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('department.index') }}">Index</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('department.create') }}">Edit</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 col-xl-12">

                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">แก้ไขข้อมูลส่วนงาน</h1>
                        <h6 class="card-subtitle text-muted">กรุณากรอกข้อมูลในเเบบฟอร์มด้านล่างให้ครบถ้วน</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('division_update', $divisions->div_id) }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('POST') }}
                            <div class="row">
                                <div class="mb-3 col-md-8">
                                    <label style="color:red;">ชื่อส่วนงาน*</label>
                                    <input type="text" name="fname" class="form-control"
                                        value="{{ $divisions->div_fname }}" placeholder="ป้อนชื่อเติม" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label style="color:red;">ชื่อย่อส่วนงาน*</label>
                                    <input type="text" name="sname" class="form-control"
                                        value="{{ $divisions->div_sname }}" placeholder="ป้อนชื่อย่อ" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label style="color:red;">ภายใต้ฝ่าย*</label>
                                <select class="form-control" name="department" required>
                                    <option value="{{ $divisions->department }}">{{ $divisions->dep_fname }}</option>
                                    @foreach ($dep as $data)
                                        <!--LOOP ข้อมูลใน $department-->
                                        <?php if ($divisions->department != $data->id) { ?>
                                        <option value="{{ $data->id }}">{{ $data->fname }}</option>
                                        <?php } ?>
                                    @endforeach
                                </select>
                                </div><br>
                                <div class="form-group col-md-12">
                                    <center>
                                        <div class="form-group"><input type="submit" class="btn btn-primary" value="บันทึก">
                                            <a href="{{ route('division.index') }}" class="btn btn-danger">ยกเลิก</a>
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
