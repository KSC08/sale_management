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
<div class="card">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">1.ข้อมูลทั่วไปโครงการ</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="code">รหัสโครงการ</label>
                            {{-- <label for="">{{$project->code}}</label> --}}
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="pro_name">ชื่อโครงการ</label>
                            <label>{{$project->name}}</label>
                        </div>
                        <?php $user_dep = Auth::user()->department;
                        //echo $user_status;
                        ?>

                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="status">สถานะโครงการ</label>
                            <label for="">{{$project->pro_status}}</label>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="type">ประเภทโครงการ</label>
                            <label for="">{{$project->pro_type}}</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label for="detail">รายละเอียด</label>
                            <label for="">{{$project->detail}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="pmname">ชื่อ(ทีมเทคนิคที่ดูแลโครงการ) </label>
                            <label for="">{{$project->pmname}}</label>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="pmlname">นามสกุล(ทีมเทคนิคที่ดูแลโครงการ) </label>

                            <label for="">{{$project->pmlname}}</label>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="pmphone">เบอร์โทร</label>

                            <label for="">{{$project->pmphone}}</label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="inputState">ลูกค้า (ชื่อ เบอร์โทร Email)</label>
                            <label for="">{{$project->customer}}</label>
                        </div>
                    </div>
                    <fieldset class="mb-3">
                        <div class="row">
                            <label class="col-form-label col-sm-2 text-sm-right pt-sm-0">การชำระเงิน</label>

                            <label for="">{{$project->Payment}}</label>


                        </div>
                    </fieldset>
                    <?php if (!empty($project->file6)) { ?>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#file1">
                            ดูเอกสาร
                        </button>
                    <?php } else {
                        echo "ไม่มีเอกสาร";
                    }  ?>
                    <div class="modal fade" id="file1" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Large modal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body m-3">
                                    <embed src="{{ asset('pro_doc/' . $project->file6) }}" width="800px" height="2100px" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">2.เป้าหมายในการดำเนินการ</h5>

                                </div>
                                <div class="card-body">
                                    <div class="mb-3 row">

                                        <label for="">{{$project->operational_goals}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">3.ขอบเขตการดำเนินงาน</h5>
                                </div>
                                <div class="card-body" style="margin-left: 20px">
                                    <div class="mb-3 row">
                                        <label class="col-form-label">3.1.รายละเอียดวงจร ประกอบด้วยชนิดของบริการ
                                            ความเร็ว จำนวนวงจร (บริการของ เอ็นที)</label>
                                    </div>
                                    <div class="mb-3 row">


                                        <label for="">{{$project->scope_detail1}}</label>


                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-form-label">3.2. ข้อมูลอุปกรณ์/บริการ
                                            (บริการที่ต้องจัดหาจากภายนอก)</label>
                                    </div>
                                    <div class="mb-3 row">

                                        <label for="">{{$project->scope_detail2}}</label>

                                    </div>
                                    <label class="col-form-label">3.3. ประมาณการค่าปรับ </label>

                                    <div class="mb-3 row" style="margin-left: 20px">

                                        <label class="col-form-label">3.3.1.หลักเกณฑ์การคิดค่าปรับ </label>
                                        <label for="">{{$project->scope_detail3}}</label>
                                        <label class="col-form-label">3.3.2.ประมาณการค่าปรับ (ระบุจำนวน)
                                        </label>
                                        <div class="mb-3 row" style="margin-left: 20px">

                                            <label class="col-form-label">1. ค่าปรับจากการส่งมอบ </label>

                                            <label for="">{{$project->scope_detail4}}</label>

                                            <label class="col-form-label">2. ประมาณการค่าปรับตาม SLA
                                                หากไม่มีค่าปรับให้ระบุเหตุผล </label>
                                            <label for="">{{$project->scope_detail5}}</label>
                                        </div>

                                        <label class="col-form-label">3.3.3.กรณีมีค่าปรับจากปีก่อนหน้า
                                            กรุณาระบุจำนวน และสาเหตุ</label>
                                        <label for="">{{$project->scope_detail6}}</label>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">4.แผนการดำเนินงาน</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label class="col-form-label">4.1. ระยะเวลาในการดำเนินงานของ เอ็นที </label>
                                    </div>

                                    <div class="mb-3 row">


                                        <label for="">{{$project->action_plan1}}</label>

                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-form-label">4.2 ระยะเวลาในการให้บริการตามสัญญา (DDMMYY ถึง
                                            DDMMYY) (ระหว่าง เอ็นที กับลูกค้า)</label>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="mb-3 col-xl-6">
                                            <label for="date_start">วันที่เรื่ม</label>
                                            <label for="">{{$project->action_plan_date2}}</label>

                                        </div>
                                        <div class="mb-3 col-xl-6">
                                            <label for="date_start">วันที่สิ้นสุด</label>
                                            <label for="">{{$project->action_plan_date3}}</label>

                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-form-label">4.3. กำหนดส่งมอบงาน (ครั้งเดียว, รายงวด,
                                            รายเดือน) </label>
                                    </div>

                                    <div class="mb-3 row">

                                        <label class="col-form-label">1. ครั้งเดียว DDMMYY
                                            (ตามสัญญาหรือคาดการณ์)</label>

                                        <label for="">{{$project->action_plan4}}</label>


                                    </div>
                                    <label class="col-form-label">2. รายงวด ( X งวด)</label>

                                    <div class="mb-3 row">
                                        <label class="col-form-label">1. งวดที่ 1 วันที่ (ตามสัญญาหรือคาดการณ์)
                                        </label>
                                    </div>

                                    <div class="mb-3 row">


                                        <label for="">{{$project->action_plan5}}</label>


                                    </div>
                                    <div class="mb-3 row">

                                        <label class="col-form-label">3. รายเดือน (ทุกวันที่ DD ของเดือน)</label>

                                        <label for="">{{$project->action_plan6}}</label>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">5.ข้อมูลด้านการเงิน</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label class="col-form-label">5.1. ต้นทุนในการบริการ</label>
                                    </div>

                                    <div class="mb-3 row">

                                        <label class="col-form-label">5.1.1. เงินลงทุน (ค่าใช้จ่ายกรณีเป็นงบลงทุนของ
                                            เอ็นที) (หากไม่มีข้อมูล ใส่ว่ารอข้อมูลจาก......)</label>


                                        <label for="">{{$project->finance1}}</label>


                                    </div>
                                    <div class="mb-3 row">

                                        <label class="col-form-label">5.1.2.ใช้จ่ายในการดำเนินงาน
                                            (ค่าใช้จ่ายกรณีเป็นงบทำการของ เอ็นที) (หากไม่มีข้อมูล
                                            ใส่ว่ารอข้อมูลจาก........)</label>

                                        <label for="">{{$project->finance2}}</label>


                                    </div>


                                    <div class="mb-3 row">
                                        <label class="col-form-label">5.1.3. รายได้จากการให้บริการ </label>
                                    </div>

                                    <div class="mb-3 row">

                                        <label class="col-form-label">5.1.3.1. รายได้ค่าติดตั้ง </label>

                                        <label for="">{{$project->finance3}}</label>


                                    </div>
                                    <div class="mb-3 row">

                                        <label class="col-form-label">5.1.3.2. รายได้ค่าเช่าวงจร </label>

                                        <label for="">{{$project->finance4}}</label>


                                    </div>
                                    <div class="mb-3 row">

                                        <label class="col-form-label">5.1.3.3. รายได้ ICT Solution </label>
                                        <h6>(ตัวอย่าง 1) บริการ IP-VPN ความเร็ว 100Mbps จำนวน XX วงจร
                                            มีรายได้ค่าบริการ 10000 บาท/วงจร/เดือน (ไม่รวม VAT)
                                            (ตัวอย่าง 2) อุปกรณ์ Router แบบที่ 1 จำนวน XX ชุด มีรายได้ค่าเช่า 5000
                                            บาท/ชุด/เดือน (ไม่รวม VAT)
                                        </h6>

                                        <label for="">{{$project->finance5}}</label>


                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">6.ผลการดำเนินงานที่คาดว่าจะเกิดขึ้น</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label class="col-form-label">6.1. ผลตอบแทนที่เป็นตัวเงิน =
                                            รายได้รวมของโครงการ (ไม่รวม VAT) </label>
                                        <h6>(หมายเหตุ) เมื่อคำนวณ รายได้กับบริการใน ข้อ 5.1.3 แล้ว
                                            ต้องเป็นจำนวนที่เท่ากับ ผลตอบแทนที่เป็นตัวเงิน</h6>

                                        <label for="">{{$project->performance1}}</label>

                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-form-label">6.2. ผลตอบแทนที่ไม่เป็นตัวเงิน </label>
                                        <label for="">{{$project->performance2}}</label>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">7.ความเสี่ยงของแผนงาน/โครงการ/ผู้ประสานงาน/เอกสารแนบ</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label class="col-form-label">7.1.ความเสี่ยงของแผนงาน (Freeform)</label>
                                        <h6>(ตัวอย่าง 1) มีระยะเวลาติดตั้งน้อย
                                            อาจส่งผลให้ไม่สามารถส่งมอบบริการ/อุปกรณ์ ได้ตามกำหนด
                                            (ตัวอย่าง 2) SLA หรือเงื่อนไขการให้บริการ ที่สูงมาก
                                            อาจไม่สามารถทำตามข้อกำหนดได้
                                        </h6>

                                        <label for="">{{$project->Risk}}</label>

                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-form-label">7.2. เอกสารประกอบ</label>
                                    </div>
                                    <div class="mb-3 row">

                                        <label class="col-form-label">7.2.1. ☐ ใบเสนอราคา ระหว่าง เอ็นที กับลูกค้า
                                            ☐เอกสารลดราคา(ถ้ามี) </label>

                                        <?php if (!empty($project->file1)) { ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#file1">
                                                Large
                                            </button>
                                        <?php } else {
                                            echo "ไม่มีเอกสาร";
                                        }  ?>
                                        <div class="modal fade" id="file1" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Large modal</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body m-3">
                                                        <embed src="{{ asset('pro_doc/' . $project->file1) }}" width="800px" height="2100px" />
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3 row">

                                        <label class="col-form-label">7.2.2.ข้อกำหนด/ขอบเขตงาน ระหว่าง เอ็นที
                                            กับลูกค้า </label>
                                        <h6>(กรณีที่ในปีปัจจุบันยังไม่มีให้ปรับ /แก้ไข /พิมพ์สีแดง
                                            /เพิ่มเติมในเอกสารของปีก่อน ส่งให้ ส่วนงานเทคนิค
                                            เพื่อดำเนินการจัดหาตามกรรมวิธีต่อไป)</h6>
                                        <?php if (!empty($project->file2)) { ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#file1">
                                                Large
                                            </button>
                                        <?php } else {
                                            echo "ไม่มีเอกสาร";
                                        }  ?>
                                        <div class="modal fade" id="file1" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Large modal</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body m-3">
                                                        <embed src="{{ asset('pro_doc/' . $project->file2) }}" width="800px" height="2100px" />
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3 row">

                                        <label class="col-form-label">7.2.3.สัญญาระหว่าง เอ็นที กับลูกค้า(ถ้ามี)
                                            หรือจัดส่งให้ ส่วนงานเทคนิค ภายหลัง </label>
                                        <h6>(กรณีที่ในปีปัจจุบันยังไม่มีให้ปรับ /แก้ไข /พิมพ์สีแดง
                                            /เพิ่มเติมในเอกสารของปีก่อน ส่งให้ ส่วนงานเทคนิค
                                            เพื่อดำเนินการจัดหาตามกรรมวิธีต่อไป) </h6>
                                        <?php if (!empty($project->file3)) { ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#file1">
                                                Large
                                            </button>
                                        <?php } else {
                                            echo "ไม่มีเอกสาร";
                                        }  ?>
                                        <div class="modal fade" id="file1" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Large modal</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body m-3">
                                                        <embed src="{{ asset('pro_doc/' . $project->file3) }}" width="800px" height="2100px" />
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3 row">

                                        <label class="col-form-label">7.2.4 เอกสารโปรโมชั่นของบริการ
                                            ที่ใช้ในโครงการนี้(ถ้ามี การใช้โปรโมชั่น) </label>

                                        <?php if (!empty($project->file4)) { ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#file1">
                                                Large
                                            </button>
                                        <?php } else {
                                            echo "ไม่มีเอกสาร";
                                        }  ?>
                                        <div class="modal fade" id="file1" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Large modal</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body m-3">
                                                        <embed src="{{ asset('pro_doc/' . $project->file4) }}" width="800px" height="2100px" />
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3 row">

                                        <label class="col-form-label">7.2.5. ประวัติการโทร CDR
                                            ของลูกค้าย้อนหลังอย่างน้อย 3 เดือน (หากมีบริการโทรศัพท์)</label>
                                        <?php if (!empty($project->file5)) { ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#file1">
                                                Large
                                            </button>
                                        <?php } else {
                                            echo "ไม่มีเอกสาร";
                                        }  ?>
                                        <div class="modal fade" id="file1" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Large modal</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body m-3">
                                                        <embed src="{{ asset('pro_doc/' . $project->file5) }}" width="800px" height="2100px" />
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>

    </div>




</div>
@endsection

<!-- /Attachment Modal -->