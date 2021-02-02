@extends('layouts.nav')
@section('content')
<div class="header">
    <h1 class="header-title">
        เเบบฟอร์มขออนุมัติการจัดหา ซื้อ/จ้าง/เช่า
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Page 1</a></li>
            <li class="breadcrumb-item"><a href="#">Page 2</a></li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Date Time Picker</h5>
                <h6 class="card-subtitle text-muted">Date and time picker designed to integrate into your Bootstrap project.</h6>
            </div>
            <div class="card-body">
            <form method="get" action="{{url('/create_project')}}">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="code">รหัสโครงการ</label>
                            <input type="text" class="form-control" id="code" name="code" value="PRO1234">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="pro_name">ชื่อโครงการ</label>
                            <input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="กรองชื่อโครงการ">
                        </div>
                        <?php $user_id = Auth::user()->id;
                        //echo $user_status;
                        ?>
<input name="create" type="hidden" value="{{$user_id}}">
<input name="update" type="hidden" value="{{$user_id}}">
                    </div>
                    <div class="mb-3 ">
                        <label for="status">สถานะโครงการ</label>
                        <select id="status" name="status" class="form-control">
                            <option selected>Choose...</option>
                            @foreach($project_status as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 ">
                        <label for="type">ประเภทโครงการ</label>
                        <select id="type" name="type" class="form-control">
                            <option selected>Choose...</option>
                            @foreach($project_type as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="detail">รายละเอียด</label>
                            <textarea class="form-control" placeholder="Textarea" rows="1" id="detail" name="detail"></textarea>
                        </div>
                      

                    </div>
                    
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- /Attachment Modal -->