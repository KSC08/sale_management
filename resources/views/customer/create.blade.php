@extends('layouts.nav')
@section('content')
<div class="header">
    <h1 class="header-title">
        เพิ่มข้อมูลลูกค้า
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('customer.index')}}">ข้อมูลลูกค้า</a></li>
            <li class="breadcrumb-item active" aria-current="page">เพิ่มข้อมูลลูกค้า</li>
        </ol>
    </nav>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('customer.store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                {{ method_field('POST') }}
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label align="left">ชื่อลูกค้า <a style="color:red;">*</a></label>
                        <input type="text" class="form-control" name="fname" placeholder="กรอกชื่อลูกค้า" required>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label align="left">บริษัท <a style="color:red;">*</a></label>
                        <select class="form-control" name="company_id" placeholder="เลือกบริษัท" required>
                            @foreach($companies as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label align="left">ประเภทลูกค้า <a style="color:red;">*</a></label>
                        <select class="form-control" name="customer_type" placeholder="เลือกบริษัท" required>
                            @foreach($customer_types as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="mb-3 col-md-12">
                        <center>
                            <div class="form-group"><input type="submit" class="btn btn-primary" value="บันทึกข้อมูล">
                            </div>
                        </center>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<svg width="0" height="0" style="position:absolute">
    <defs>
        <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
            <path d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
            </path>
        </symbol>
    </defs>
</svg>
<script type="text/javascript">
    $("#comid").select2({
        placeholder: "Select a Name",
        allowClear: true
    });
</script>
@endsection
@section('css')
@endsection
@section('script')
@endsection
<!-- /Attachment Modal -->