@extends('layouts.nav')
@section('title','เพิ่มข้อมูลบริษัท')
@section('content')
<div class="container">
<div class="row">
    <div class="col-12 col-xl-12">

        <div class="card">
                <div class="card-header">

                
                <h1 class="text-primary mr-auto" align="center">เพิ่มข้อมูลติดต่อ</h1>
                </div>
                    <div class="card-body">

                    @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>@foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
                @endif

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
                <!-- Alert -->
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
                <form method="POST" action="{{url('/company_store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('POST') }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label style="color:red;">ชื่อ *</label>
                            <input type="text" name="name" class="form-control" placeholder="ป้อนชื่อ" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <center>
                            <div class="form-group"><input type="submit" class="btn btn-primary" value="บันทึกข้อมูลแล้วหยุด">
                                <a href="{{url('/company')}}" class="btn btn-danger">ย้อนกลับ</a>
                            </div>
                        </center>    
                        </div>
                    </div>
                </form>
                     </div>
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
    <div class="container">
        <div class="row">
            <div class="col-md-12"><br/>

            </div>
        </div>
    </div>
    <script type="text/javascript">
    $('.product-list').on('change', function() {
        $('.product-list').not(this).prop('checked', false);
    });
  </script>
    <script>

  function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text");
    var checkBox2 = document.getElementById("myCheck2");
    var text2 = document.getElementById("text2");
    if (checkBox.checked == true) {
        checkBox2.checked = false;
      text.style.display = "block";
      text2.style.display = "none";
    } else {
      text.style.display = "none";
    }
  }

  function myFunction2() {
    var checkBox2 = document.getElementById("myCheck2");
    var text2 = document.getElementById("text2");
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text");
    if (checkBox2.checked == true) {
        checkBox.checked = false;
        text2.style.display = "block";
        text.style.display = "none";
    } else {
        text2.style.display = "none";
    }
  }
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">

      $("#comid").select2({
            placeholder: "Select a Name",
            allowClear: true
        });
</script>
@stop
