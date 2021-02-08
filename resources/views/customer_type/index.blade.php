@extends('layouts.nav')
@section('content')
<div class="header">
        <h1 class="header-title">
        รายละเอียดข้อมูลประเภทลูกค้า
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('department.index')}}">Customer Type</a></li>
                <li class="breadcrumb-item"><a href="{{route('department.index')}}">Index</a></li>
            </ol>
        </nav>
    </div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">รายละเอียดข้อมูลประเภทลูกค้าทั้งหมด <a class ="btn btn-primary float-right" href="{{route('customer_type.create')}}">เพิ่มข้อมูล</a></h5>
                
            </div>
            <div class="card-body">
                <table id="datatables-basic" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ประเภทลูกค้า</th>
                            <th><i class="align-middle mr-2" data-feather="settings"></i> <span class="align-middle"></span></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0?>
                        @foreach($customer_types as $row )
                        <tr>
                            <?php $i++?>
                            <td scope="row">{{$i}}</td>
                            <td>{{$row->name}}</td>
                            <td>

                            <a  href="{{route('customer_type.edit',$row->id)}}"><i class="align-middle mr-2" data-feather="edit"></i> <span class="align-middle"></span></a>              
                            <a  href="customer_type/destroy/{{$row->id}}" onclick="return confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่')"><i class="align-middle mr-2" data-feather="trash-2"></i> <span class="align-middle"></span></a>
                            
                            </td>

                        </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>


</div>


@endsection
