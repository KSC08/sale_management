@extends('layouts.nav')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">รายละเอียดข้อมูลลูกค้า</h5>
                <a class ="btn btn-primary float-right" href="{{route('customer_type.create')}}">เพิ่มรายละเอียดข้อมูลลูกค้า</a>
                <h6 class="card-subtitle text-muted">มีรายละเอียด ดังต่อไปนี้</h6>
            </div>
            <div class="card-body">
                <table id="datatables-basic" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>รหัสลูกค้า</th>
                            <th>ประเภทลูกค้า</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customer_types as $row)
                        <tr>
                            <td scope="row">{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>
                            <a  href="{{route('customer_type.edit',$row->id)}}" type="button" rel="tooltip"  class="btn btn-info btn-simple btn-xs" data-original-title="Edit Article">
                                <i class="fa fa-edit"></i>
                            </a>
                            
                            <a  href="customer_type/destroy/{{$row->id}}"  onclick="return confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่')" type="button" rel="tooltip" title="" class="btn btn-info btn-simple btn-xs" data-original-title="Edit Article">
                                <i class="fa fa-trash"></i>
                            </a>
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
