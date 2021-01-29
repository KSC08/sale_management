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

<svg width="0" height="0" style="position:absolute">
    <defs>
      <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
        <path
          d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
        </path>
      </symbol>
    </defs>
  </svg>
 <script src="js/app.js"></script>

 <script>
  $(function() {
   // Datatables basic
   $('#datatables-basic').DataTable({
    responsive: true
   });
   // Datatables with Buttons
   var datatablesButtons = $('#datatables-buttons').DataTable({
    lengthChange: !1,
    buttons: ["copy", "print"],
    responsive: true
   });
   datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
  });
 </script>

<!-- sweetalert -->
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">





@endsection
