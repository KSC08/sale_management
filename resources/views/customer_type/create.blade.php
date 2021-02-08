@extends('layouts.nav')
@section('title','เพิ่มข้อมูลประเภทลูกค้า')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-xl-12">

            <div class="card">
                <div class="card-header">
                    <h1 class="text-primary mr-auto" align="center">เพิ่มรายละเอียดข้อมูลประเภทลูกค้า</h1>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{route('customer_type.store')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('POST') }}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="bold">ประเภทลูกค้า</label>
                                <input type="text" name="name" class="form-control" placeholder="ประเภทลูกค้า" required>
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

<style>     
    .bold{
        font-weight: 600;
    }
    
</style>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
    $("#comid").select2({
        placeholder: "Select a Name",
        allowClear: true
    });
</script>
@stop