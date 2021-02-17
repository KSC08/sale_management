@extends('layouts.nav')
@section('content')
<div class="header">
    <h1 class="header-title">
        เเบบฟอร์มขออนุมัติการจัดหา ซื้อ/จ้าง/เช่า
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('/project')}}">ข้อมูลโครงการ</a></li>
            <li class="breadcrumb-item"><a href="#">ข้อมูลโครงการ</a>หน้าเเบบฟอร์มขออนุมัติการจัดหา</li>
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
                    <form method="post" action="{{ url('/create_project') }}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('POST') }}
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="code">รหัสโครงการ</label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="กรอกรหัสโครงการ" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="pro_name">ชื่อโครงการ</label>
                                <input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="กรอกชื่อโครงการ" required>
                            </div>
                            <?php $user_dep = Auth::user()->department;
                            //echo $user_status;
                            ?>
                            <input type="hidden" name="department" value="{{ $user_dep }}">
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="status">สถานะโครงการ</label>
                                <select id="status" name="status" class="form-control" required>
                                    <option value="" selected>Choose...</option>
                                    @foreach ($project_status as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="type">ประเภทโครงการ</label>
                                <select id="type" name="type" class="form-control" onchange="rolechang();" required>
                                    <option value="" selected>Choose...</option>
                                    @foreach ($project_type as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <script>
                                function rolechang() {
                                        var value = document.getElementById('type').value;
                                        var x = document.getElementById("type_else_div");
                                        if (value == '4') {
                                            x.style.display = "block";
                                        } else{
                                            x.style.display = "none";
                                        }
                                    }
                            </script>
                        </div>
                        <div class="row" id="type_else_div" style="display:none">
                            <div class="mb-3">
                                <textarea class="form-control" placeholder="กรุณาระบุ..................." rows="3" name="type_else"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="detail">งบประมาณ</label>
                                <input type="text" class="form-control" placeholder="กรอกงบประมาณ" rows="1" id="detail" name="budget" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="detail">รายละเอียด</label>
                                <textarea class="form-control" placeholder="Textarea" rows="1" id="detail" name="detail" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="pmname">ชื่อ(ทีมเทคนิคที่ดูแลโครงการ) </label>

                                <input type="text" class="form-control" id="pmname" name="pmname" placeholder="กรอกชื่อผู้ดูแลโครงการ" required>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="pmlname">นามสกุล(ทีมเทคนิคที่ดูแลโครงการ) </label>

                                <input type="text" class="form-control" id="pmlname" name="pmlname" placeholder="กรอกนามสกุลผู้ดูแลโครงการ" required>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="pmphone">เบอร์โทร</label>

                                <input type="text" class="form-control" id="pmphone" name="pmphone" placeholder="กรอกเบอร์โทรผู้ติดต่อโครงการ" required>
                            </div>
                        </div>
                        <div class="row">

                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="inputState">ลูกค้า (ชื่อ เบอร์โทร Email)</label>
                                <select id="inputState" class="form-control" name="customer" required>
                                    <option value="" selected>Choose...</option>
                                    @foreach($customer as $data => $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <fieldset class="mb-3">
                            <div class="row">
                                <label class="col-form-label col-sm-2 text-sm-right pt-sm-0">การชำระเงิน</label>

                                <div class="col-sm-3">
                                    <label class="form-check">
                                        <input name="Payment" type="radio" class="form-check-input" checked value="รายงวด">
                                        <span class="form-check-label">รายงวด</span>
                                    </label>
                                </div>
                                <div class="col-sm-3">
                                    <label class="form-check">
                                        <input name="Payment" type="radio" class="form-check-input" value="รายเดือน">
                                        <span class="form-check-label">รายเดือน</span>
                                    </label>
                                </div>
                                <div class="col-sm-3">
                                    <label class="form-check">
                                        <input name="Payment" type="radio" class="form-check-input" value="ครั้งเดียว">
                                        <span class="form-check-label">ครั้งเดียว</span>
                                    </label>
                                </div>


                            </div>
                        </fieldset>
                        <div class="mb-3 row">
                            <label class="col-form-label">ไฟล์เอกสารข้อมูลทั่วไปโครงการ(ถ้ามี) </label>
                            <input type="file" id="code" name="file6">
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">2.เป้าหมายในการดำเนินการ</h5>

                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 row">

                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="operational_goals"></textarea>

                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label">ไฟล์เอกสารเป้าหมายในการดำเนินการ(ถ้ามี) </label>
                                            <input type="file" id="code" name="file7">
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
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label class="col-form-label">3.1.รายละเอียดวงจร ประกอบด้วยชนิดของบริการ
                                                ความเร็ว จำนวนวงจร (บริการของ เอ็นที)</label>
                                        </div>
                                        <div class="mb-3 row">


                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="scope_detail1"></textarea>

                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label">3.2. ข้อมูลอุปกรณ์/บริการ
                                                (บริการที่ต้องจัดหาจากภายนอก)</label>
                                        </div>
                                        <div class="mb-3 row">


                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="scope_detail2"></textarea>

                                        </div>
                                        <div class="mb-3 row">

                                            <label class="col-form-label">3.3. ประมาณการค่าปรับ </label>
                                            <label class="col-form-label">3.3.1.หลักเกณฑ์การคิดค่าปรับ </label>
                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="scope_detail3"></textarea>
                                            <label class="col-form-label">3.3.2.ประมาณการค่าปรับ (ระบุจำนวน)
                                            </label>
                                            <label class="col-form-label">1. ค่าปรับจากการส่งมอบ </label>

                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="scope_detail4"></textarea>

                                            <label class="col-form-label">2. ประมาณการค่าปรับตาม SLA
                                                หากไม่มีค่าปรับให้ระบุเหตุผล </label>
                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="scope_detail5"></textarea>
                                            <label class="col-form-label">3.3.3.กรณีมีค่าปรับจากปีก่อนหน้า
                                                กรุณาระบุจำนวน และสาเหตุ</label>
                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="scope_detail6"></textarea>


                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label">ไฟล์เอกสารขอบเขตการดำเนินงาน(ถ้ามี) </label>
                                            <input type="file" id="code" name="file8">
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
                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="action_plan1"></textarea>

                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label">4.2 ระยะเวลาในการให้บริการตามสัญญา (DDMMYY ถึง
                                                DDMMYY) (ระหว่าง เอ็นที กับลูกค้า)</label>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="mb-3 col-xl-6">
                                                <label for="date_start">วันที่เรื่ม</label>
                                                <input type="date" class="form-control" id="date_start" name="action_plan_date2" >
                                            </div>
                                            <div class="mb-3 col-xl-6">
                                                <label for="date_start">วันที่สิ้นสุด</label>
                                                <input type="date" class="form-control" id="date_start" name="action_plan_date3" >
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-form-label">4.3. กำหนดส่งมอบงาน (ครั้งเดียว, รายงวด,
                                                รายเดือน) </label>
                                        </div>

                                        <div class="mb-3 row">

                                            <label class="col-form-label">1. ครั้งเดียว DDMMYY
                                                (ตามสัญญาหรือคาดการณ์)</label>

                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="action_plan4"></textarea>

                                        </div>
                                        <label class="col-form-label">2. รายงวด ( X งวด)</label>

                                        <div class="mb-3 row">
                                            <label class="col-form-label">1. งวดที่ 1 วันที่ (ตามสัญญาหรือคาดการณ์)
                                            </label>
                                        </div>

                                        <div class="mb-3 row">


                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="action_plan5"></textarea>

                                        </div>
                                        <div class="mb-3 row">

                                            <label class="col-form-label">3. รายเดือน (ทุกวันที่ DD ของเดือน)</label>

                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="action_plan6"></textarea>

                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label">ไฟล์เอกสารแผนการดำเนินงาน(ถ้ามี) </label>
                                            <input type="file" id="code" name="file9">
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

                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="finance1"></textarea>

                                        </div>
                                        <div class="mb-3 row">

                                            <label class="col-form-label">5.1.2.ใช้จ่ายในการดำเนินงาน
                                                (ค่าใช้จ่ายกรณีเป็นงบทำการของ เอ็นที) (หากไม่มีข้อมูล
                                                ใส่ว่ารอข้อมูลจาก........)</label>

                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="finance2"></textarea>

                                        </div>


                                        <div class="mb-3 row">
                                            <label class="col-form-label">5.1.3. รายได้จากการให้บริการ </label>
                                        </div>

                                        <div class="mb-3 row">

                                            <label class="col-form-label">5.1.3.1. รายได้ค่าติดตั้ง </label>

                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="finance3"></textarea>

                                        </div>
                                        <div class="mb-3 row">

                                            <label class="col-form-label">5.1.3.2. รายได้ค่าเช่าวงจร </label>

                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="finance4"></textarea>

                                        </div>
                                        <div class="mb-3 row">

                                            <label class="col-form-label">5.1.3.3. รายได้ ICT Solution </label>
                                            <h6>(ตัวอย่าง 1) บริการ IP-VPN ความเร็ว 100Mbps จำนวน XX วงจร
                                                มีรายได้ค่าบริการ 10000 บาท/วงจร/เดือน (ไม่รวม VAT)
                                                (ตัวอย่าง 2) อุปกรณ์ Router แบบที่ 1 จำนวน XX ชุด มีรายได้ค่าเช่า 5000
                                                บาท/ชุด/เดือน (ไม่รวม VAT)
                                            </h6>

                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="finance5"></textarea>

                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label">ไฟล์เอกสารข้อมูลด้านการเงิน(ถ้ามี) </label>
                                            <input type="file" id="code" name="file10">
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
                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="performance1"></textarea>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label">6.2. ผลตอบแทนที่ไม่เป็นตัวเงิน </label>
                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="performance2"></textarea>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label">ไฟล์เอกสารผลการดำเนินงานที่คาดว่าจะเกิดขึ้น(ถ้ามี) </label>
                                            <input type="file" id="code" name="file11">
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
                                            <textarea class="form-control" placeholder="กรอกรายละเอียด" rows="3" name="Risk"></textarea>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label">7.2. เอกสารประกอบ</label>
                                        </div>
                                        <div class="mb-3 row">

                                            <label class="col-form-label">7.2.1. ใบเสนอราคา ระหว่าง เอ็นที กับลูกค้า หรือ เอกสารลดราคา(ถ้ามี) </label>

                                            <input type="file" id="code" name="file1">

                                        </div>
                                        <div class="mb-3 row">

                                            <label class="col-form-label">7.2.2.ข้อกำหนด/ขอบเขตงาน ระหว่าง เอ็นที
                                                กับลูกค้า </label>
                                            <h6>(กรณีที่ในปีปัจจุบันยังไม่มีให้ปรับ /แก้ไข /พิมพ์สีแดง
                                                /เพิ่มเติมในเอกสารของปีก่อน ส่งให้ ส่วนงานเทคนิค
                                                เพื่อดำเนินการจัดหาตามกรรมวิธีต่อไป)</h6>
                                            <input type="file" id="code" name="file2">

                                        </div>
                                        <div class="mb-3 row">

                                            <label class="col-form-label">7.2.3.สัญญาระหว่าง เอ็นที กับลูกค้า(ถ้ามี)
                                                หรือจัดส่งให้ ส่วนงานเทคนิค ภายหลัง </label>
                                            <h6>(กรณีที่ในปีปัจจุบันยังไม่มีให้ปรับ /แก้ไข /พิมพ์สีแดง
                                                /เพิ่มเติมในเอกสารของปีก่อน ส่งให้ ส่วนงานเทคนิค
                                                เพื่อดำเนินการจัดหาตามกรรมวิธีต่อไป) </h6>
                                            <input type="file" id="code" name="file3">

                                        </div>
                                        <div class="mb-3 row">

                                            <label class="col-form-label">7.2.4 เอกสารโปรโมชั่นของบริการ
                                                ที่ใช้ในโครงการนี้(ถ้ามี การใช้โปรโมชั่น) </label>

                                            <input type="file" id="code" name="file4">

                                        </div>
                                        <div class="mb-3 row">

                                            <label class="col-form-label">7.2.5. ประวัติการโทร CDR
                                                ของลูกค้าย้อนหลังอย่างน้อย 3 เดือน (หากมีบริการโทรศัพท์)</label>

                                            <input type="file" id="code" name="file5">

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <center>
                            <button type="submit" class="btn btn-primary">บันทึก</button>

                        </center>

                    </form>
                </div>
            </div>
        </div>

    </div>




</div>
@endsection

<!-- /Attachment Modal -->