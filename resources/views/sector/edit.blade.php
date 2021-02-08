@extends('layouts.nav')
@section('content')


<div class="header">
    <h1 class="header-title">
        แก้ไขข้อมูลฝ่าย
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('sector.index')}}">Sector</a></li>
            <li class="breadcrumb-item"><a href="{{route('sector.index')}}">Index</a></li>
            <li class="breadcrumb-item"><a href="#">Edit</a></li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h6 class="card-subtitle text-muted">กรุณากรอกข้อมูลในเเบบฟอร์มด้านล่างให้ครบถ้วน</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('sector_update',$sectors->id)}}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="row">
                    <div class="mb-3 col-md-8">
                        <label>ชื่อฝ่าย
                            <a style="color: red"> *</a>
                        </label>
                        <input type="text" name="fname" class="form-control" value="{{ $sectors->fname }}"
                            placeholder="ป้อนชื่อเติม" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label>ชื่อย่อฝ่าย
                            <a style="color: red"> *</a>
                        </label>
                        <input type="text" name="sname" class="form-control" value="{{ $sectors->sname }}"
                            placeholder="ป้อนชื่อย่อ" required>
                    </div>
                </div>
                <center>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="บันทึก">
                        <a href="{{ route('sector.index') }}" class="btn btn-danger">ยกเลิก</a>
                    </div>
                </center>
            </form>
        </div>
    </div>
</div>

@endsection

<!-- /Attachment Modal -->