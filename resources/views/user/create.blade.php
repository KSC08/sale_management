@extends('layouts.nav')
@section('title','เพิ่มข้อมูล User')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-xl-12">

            <div class="card">
                <div class="card-header">
                    <h1 class="text-primary mr-auto" align="center">เพิ่มข้อมูลDepartment</h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('POST') }}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label style="color:red;">ชื่อผู้ใช้งาน</label>
                                <input type="text" name="name" class="form-control" placeholder="ชื่อผู้ใช้งาน" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label style="color:red;">E-mail</label>
                                <input type="text" name="email" class="form-control" placeholder="ป้อนชื่อย่อ" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label style="color:red;">Password</label>
                                <input type="text" name="password" class="form-control" placeholder="E-mail" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label style="color:red;">ส่วนงาน</label>
                                <select class="custom-select " name="div_id" id="comid">
                                @foreach($division as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                        </select>

                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <center>
                                    <div class="form-group"><input type="submit" class="btn btn-primary" value="บันทึกข้อมูล">
                                    <input type="submit" class="btn btn-primary" value="ย้อนกลับ">
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