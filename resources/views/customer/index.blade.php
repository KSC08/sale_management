@extends('layouts.nav')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Default</h5>
                <a class="btn btn-primary" href="{{route('customer.create')}}">เพิ่มข้อมูลลูกค้า</a>
            </div>
            <div class="card-body">
                <table id="datatables-basic" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ชื่อลูกค้า</th>
                            <td>ชื่อบริษัท</td>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->cus_name}}</td>
                            <td>{{$row->com_name}}</td>
                            <th><a href="{{route('customer.edit',$row->id)}}"><i class="fa fa-edit"></i></a>&nbsp&nbsp
                            <a href="{{url('customer_delete',$row->id)}}" onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่')"><i class="fa fa-trash"></i></a></th>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>ชื่อลูกค้า</th>
                            <th>ชื่อบริษัท</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // $(document).ready(function(){$('.delete_form').on('submit',function(){
    //     if(confirm("คุณต้องการลบข้อมูลหรือไม่ ?")){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // });
    // });

    $(document).on('click', '.delBtn', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        // alert(id);
        swal({
                title: "คุณต้องการลบ?",
                text: "หากคุณทำการลบข้อมูล จะไม่สามารถทำการกู้คืนได้อีก",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "DELETE",
                        url: '{{ url('
                        projects ')}}/' + id,
                        data: {
                            ids: id,
                            _token: $('#_token').val(),
                        },
                        success: function(data) {
                            if (data.success == "1") {
                                swal("ทำการลบข้อมูลสำเร็จ", {
                                    icon: "success",
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                swal({
                                    title: "พบข้อผิดพลาด",
                                    text: "กรุณาติดต่อผู้ดูแลระบบ",
                                    icon: "warning",
                                    dangerMode: true,
                                });
                            }
                        }
                    });
                } else {
                    swal("ยกเลิกการลบข้อมูล");
                }
            });
    });
</script>

<script>
    $(document).ready(function() {
        /**
         * for showing edit item popup
         */

        $(document).on('click', "#edit-item", function() {
            $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

            var options = {
                'backdrop': 'static'
            };
            $('#edit-modal').modal(options)
        })

        // on modal show
        $('#edit-modal').on('show.bs.modal', function() {
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");

            // get the data
            var id = el.data('item-id');
            var name = row.children(".name").text();
            var description = row.children(".description").text();

            // fill the data in the input fields
            $("#modal-input-id").val(id);
            $("#modal-input-name").val(name);
            $("#modal-input-description").val(description);

        })

        // on modal hide
        $('#edit-modal').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            $("#edit-form").trigger("reset");
        })
    })
</script>
<svg width="0" height="0" style="position:absolute">
    <defs>
      <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
        <path
          d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
        </path>
      </symbol>
    </defs>
  </svg>
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
@endsection
@section('css')
@endsection
@section('script')
@endsection
<!-- /Attachment Modal -->