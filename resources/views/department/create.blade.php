@extends('layouts.nav')
@section('title','เพิ่มข้อมูลDepartment')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-xl-12">

            <div class="card">
                <div class="card-header">
                    <h1 class="text-primary mr-auto" align="center">เพิ่มข้อมูลDepartment</h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('department.store')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('POST') }}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label style="color:red;">ชื่อเติม*</label>
                                <input type="text" name="fullName" class="form-control" placeholder="ป้อนชื่อเติม" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label style="color:red;">ชื่อย่อ*</label>
                                <input type="text" name="shortName" class="form-control" placeholder="ป้อนชื่อย่อ" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <center>
                                    <div class="form-group"><input type="submit" class="btn btn-primary" value="บันทึกข้อมูลแล้วหยุด">
                                        <a href="{{route('department.index')}}" class="btn btn-danger">ย้อนกลับ</a>
                                    </div>
                                </center>
                            </div>
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