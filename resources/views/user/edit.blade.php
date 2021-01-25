@extends('layouts.nav')
@section('title','แก้ไขข้อมูลผู้ใช้งาน')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-xl-12">

            <div class="card">
                <div class="card-header">
                    <h1 class="text-primary mr-auto" align="center">แก้ไขข้อมูลผู้ใช้งาน</h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{url('user_update',$user->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('POST') }}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label style="color:red;">ชื่อผู้ใช้งาน</label>
                                <input type="text" name="name" class="form-control" placeholder="ชื่อผู้ใช้งาน" value="{{$user->name}}" required>
                            </div><br>
                            <div class="form-group col-md-12">
                                <label style="color:red;">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="ป้อน E-mail" value="{{$user->email}}" required>
                            </div><br>
                            <div class="form-group">
                                <label style="color:red;">เบอร์โทร</label>
                                <input type="text" name="phone_number"  class="form-control" maxlength="10" placeholder="ป้อนเบอร์โทร"  
                                value="{{$user->phone_number}}" style="width:250px;" onKeyUp="if(this.value*1!=this.value) this.value='' ;" required>
                                
                            </div><br>
                            <div class="form-group col-md-12">
                                <label style="color:red;">ส่วนงาน</label><br>
                                <select class="custom-select " name="div_id" id="comid" placeholder="ป้อนส่วนงาน" style="width:250px;">
                                <option value="{{$user->div_id}}">{{$user->division}}</option>
                                @foreach($division as $row)
                                <?php if($user->div_id!=$row->id){?>
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                <?php }?>
                                @endforeach</select>
                            </div>
                            
                        </div><br>
                          
                            <div class="form-group col-md-12">
                                <center>
                                    <div class="form-group"><input type="submit" class="btn btn-primary" value="บันทึกข้อมูล">
                                    <input type="submit" class="btn btn-primary" value="ย้อนกลับ">
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