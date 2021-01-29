@extends('layouts.nav')
@section('title','เพิ่มข้อมูลบริษัท')
@section('content')
<div class="header">
    <h1 class="header-title">
        แก้ไขข้อมูลลูกค้า
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('customer.index')}}">ข้อมูลลูกค้า</a></li>
            <li class="breadcrumb-item active" aria-current="page">แก้ไขข้อมูลลูกค้า</li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row">
    <center>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{url('/customer_update',$customers->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('POST') }}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">ชื่อลูกค้า</label>
                                <br>
                                <input type="text" name="name" class="form-control" placeholder="ป้อนชื่อ" value="{{$customers->cus_name}}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <br>
                                <label for="inputState">บริษัท</label>
                                <select class="custom-select " name="company_id" style="width: 250px;">
                                    <option value="{{$customers->com_id}}">{{$customers->com_name}}</option>
                                    @foreach($companies as $row)
                                        <?php if ($customers->com_id != $row->id) { ?>
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        <?php } ?>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <br>
                                <label for="inputState">ประเภทลูกค้า</label>
                                <select class="custom-select " name="customer_type" style="width: 250px;">
                                    <option value="{{$customers->cus_type_id}}">{{$customers->cus_type_name}}</option>
                                    @foreach($customer_types as $row)
                                        <?php if ($customers->cus_type_id != $row->id) { ?>
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        <?php } ?>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                            <center>
                            <br>
                                <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
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

        </center>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12"><br />

        </div>
    </div>
</div>
<script type="text/javascript">
    $('.product-list').on('change', function() {
        $('.product-list').not(this).prop('checked', false);
    });
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