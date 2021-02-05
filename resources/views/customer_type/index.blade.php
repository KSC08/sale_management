@extends('layouts.nav')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">รายละเอียดข้อมูลลูกค้า <a class ="btn btn-primary float-right" href="{{route('customer_type.create')}}">เพิ่มรายละเอียดข้อมูลลูกค้า</a></h5>
                
                <h6 class="card-subtitle text-muted">มีรายละเอียด ดังต่อไปนี้</h6>
            </div>
            <div class="card-body">
                <table id="datatables-basic" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>ประเภทลูกค้า</th>
                            <th>Setting</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customer_types as $row)
                        <tr>
                            <td scope="row">{{$row->id}}</td>
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
