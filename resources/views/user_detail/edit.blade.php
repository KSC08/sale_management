@extends('layouts.nav')
@section('title','แก้ไขรายละเอียดข้อมูลผู้ใช้')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-xl-12">

            <div class="card">
                <div class="card-header">
                    <h1 class="text-primary mr-auto" align="center">แก้ไขรายละเอียดข้อมูลผู้ใช้</h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{url('user_detail_update',$user_details->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('POST') }}
                        <center>
                       
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label style="color:red;">ชื่อผู้ใช้ &nbsp;&nbsp;&nbsp;:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <select class="custom-select " name="user_id" id="user_id" placeholder="ป้อนชื่อผู้ใช้" style="width:250px;">
                                <option value="{{$user_details->user_id}}">{{$user_details->user_name}}</option>
                                @foreach($User as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach</select>                              
                            </div><br>

                            <div class="form-group col-md-12">
                                <label style="color:red;">ชื่อลูกค้า &nbsp;:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <select class="custom-select " name="customer" id="customer" placeholder="ป้อนชื่อลูกค้า" style="width:250px;">
                                <option value="{{$user_details->customer}}">{{$user_details->cus_name}}</option>
                                @foreach($customers as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach</select>                            
                            </div><br>

                            <div class="form-group col-md-12">
                                <label style="color:red;">ส่วนงาน &nbsp;&nbsp;:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <select class="custom-select " name="div_id" id="div_id" placeholder="ป้อนส่วนงาน" style="width:250px;">
                                <option value="{{$user_details->div_id}}">{{$user_details->div_name}}</option>
                                @foreach($division as $row)
                                    <option value="{{$row->id}}">{{$row->fname}}</option>
                                @endforeach</select>                            
                                </div><br>     

                            <div class="form-group">
                                <label style="color:red;">เบอร์โทร &nbsp;:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="phone_number"  class="custom-select" maxlength="10" placeholder="ป้อนเบอร์โทร"  
                                onKeyUp="if(this.value*1!=this.value) this.value='' ;" value="{{$user_details->phone_number}}"  style="width:250px;" required>
                                
                            </div><br>
                            
                            
                        </div><br>
                        </center>

                        <div class="form-group col-md-12">
                                <center>
                                <button class="btn btn-primary">บันทึก</button>
                                    <!-- <div class="form-group"><input type="submit" class="btn btn-primary" value="บันทึกข้อมูล"> -->
                                    <a class="btn btn-primary" href="{{url('/user_detail')}}">ย้อนกลับ</a>
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