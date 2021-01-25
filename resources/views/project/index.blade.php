@extends('layouts.template')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-12 col-xl-12">
         <div class="card">
            <div class="card-header">
               <h1 class="text-primary mr-auto" align="center">ค้นหา</h1>
            </div>
            <div class="card-body">
               <form action="{{action('VisitorController@search')}}" method="get">
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label class="form-label">ชื่อ</label>
                        <input class="form-control" placeholder="กรอกชื่อ" type="text" name="vis_name">
                     </div>
                     <div class="form-group col-md-6">
                        <label class="form-label">นามสกุล</label>
                        <input class="form-control" placeholder="กรอกนามสกุล" type="text" name="vis_lname">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label class="form-label">&nbsp;หน่วยงาน&nbsp;</label>
                        <input class="form-control" placeholder="กรอกชื่อหน่วยงาน" type="text" name="com_name_TH">
                     </div>
                     <div class="form-group col-md-6">
                        <label class="form-label">&nbsp;เลขบัตรประชาชน &nbsp;/passpost</label>
                        <input class="form-control" placeholder="กรอกเลขบัตรประชาชน/passpost" type="text" name="ID_card">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label class="form-label">เบอร์โทร</label>
                        <input class="form-control" placeholder="กรอกเบอร์โทร" type="text" name="phone">
                     </div>
                     <div class="form-group col-md-6">
                        <label class="form-label">E-mail</label>
                        <input class="form-control" placeholder="กรอกE-mail" type="text" name="vis_email">
                     </div>
                  </div>
                  <center>
                     <button type="submit" class="btn btn-primary" name="btnSearch" value="Search">ค้นหา</button>
                     <div class="mb-2">
                        <a href="{{route('visitor.index')}}"><i class="align-middle mr-2" data-feather="rotate-cw"></i> <span class="align-middle"></span></a>
                     </div>
                  </center>
               </form>
            </div>
         </div>
      </div>
   </div>
   <div class="row" id="data_table">
      <div class="col-12 col-xl-12">
         <div class="card">
            <div class="card-header">
               <h1 class="text-primary mr-auto" align="center">ข้อมูลผู้ติดต่อ</h1>
            </div>
            <!-- <div align="center"><a href="{{route('visitor.create')}}" class="btn btn-primary">เพิ่มข้อมูลผู้ติดต่อ</a></div> -->
            <div class="card-body">
               <br><br>
               <!-- success -->
               @if(\Session::has('success'))
               <div class="alert alert-success alert-dismissible" role="alert">
                  <div class="alert-icon">
                     <i class="far fa-fw fa-bell"></i>
                  </div>
                  <div class="alert-message">
                     <strong>{{\Session::get('success')}}</strong>
                  </div>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               @endif
               <!-- alert -->
               @if(\Session::has('alert'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
						<div class="alert-icon">
							<i class="far fa-fw fa-bell"></i>
						</div>
						<div class="alert-message">
							<strong>{{\Session::get('alert')}}</strong>
						</div>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
					</div>
                @endif
               <table id="datatables-basic" class="table table-striped" style="width:100%">
                  <thead>
                     <tr>
                        <th width="10%">&nbsp;ชื่อ&nbsp;</th>
                        <th width="10%">&nbsp;นามสกุล&nbsp;</th>
                     </tr>
                  </thead>
                  <tbody>
                    @foreach($projects as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->vis_lname}}</td>
                    </tr>
                    @endforeach
                  </tbody>
               </table>
            </div>
            <script src="{{asset('js/sweetalert.min.js') }}"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.11.10/xlsx.core.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/blob-polyfill/1.0.20150320/Blob.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/4.0.11/js/tableexport.min.js"></script>
            <script>
               TableExport(document.getElementsByTagName("table"), {
                   headers: true, // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
                   footers: true, // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
                   formats: ['xlsx', 'csv', 'txt'], // (String[]), filetype(s) for the export, (default: ['xls', 'csv', 'txt'])
                   filename: 'id', // (id, String), filename for the downloaded file, (default: 'id')
                   bootstrap: false, // (Boolean), style buttons using bootstrap, (default: true)
                   exportButtons: true, // (Boolean), automatically generate the built-in export buttons for each of the specified formats (default: true)
                   position: 'bottom', // (top, bottom), position of the caption element relative to table, (default: 'bottom')
                   ignoreRows: null, // (Number, Number[]), row indices to exclude from the exported file(s) (default: null)
                   ignoreCols: null, // (Number, Number[]), column indices to exclude from the exported file(s) (default: null)
                   trimWhitespace: true // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s) (default: false)
               });
            </script>
         </div>
      </div>
   </div>
</div>
<!-- <script type="text/javascript">
   // $(document).ready(function(){$('.delete_form').on('submit',function(){
   //     if(confirm("คุณต้องการลบข้อมูลหรือไม่ ?")){
   //         return true;
   //     }else{
   //         return false;
   //     }
   // });
   // });

   $(document).on('click', '.delBtn', function (e) {
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
                        url: '{{ url('projects')}}/' + id,
                        data: { ids: id, _token: $('#_token').val(), },
                        success: function (data) {
                            if (data.success == "1") {
                                swal("ทำการลบข้อมูลสำเร็จ", {
                                    icon: "success",
                                }).then(() => { location.reload(); });
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
</script> -->
</div>
</div>
</div>
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
@endsection
@section('css')
@endsection
@section('script')
@endsection
<!-- /Attachment Modal -->
