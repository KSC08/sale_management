@extends('layouts.nav')
@section('content')
<div class="header">
    <h1 class="header-title">
        เพิ่มข้อมูลโครงการ
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('/project')}}">ข้อมูลโครงการ</a></li>
            <li class="breadcrumb-item"><a href="#">หน้าเพิ่มข้อมูลโครงการ</a></li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <form method="POST" action="{{url('/create_project')}}">
                {{csrf_field()}}
                {{ method_field('POST') }}
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="code">รหัสโครงการ</label>
                            <input type="text" class="form-control" id="code" name="code" value="PRO1234">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="pro_name">ชื่อโครงการ</label>
                            <input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="กรองชื่อโครงการ">
                        </div>
                        <?php $user_dep = Auth::user()->department;
                        //echo $user_status;
                        ?>
                        <input type="hidden" name="department" value="{{$user_dep}}">
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
                    <div class="mb-3 ">
                        <label for="type">ลูกค้าเจ้าของโครงการ</label>
                        <select id="type" name="customer" class="form-control">
                            <option selected>Choose...</option>
                            @foreach($customers as $data)
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