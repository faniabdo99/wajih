@include('layout.head')
<body class="fix-header">
     @include('layout.preloader')
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        @include('layout.navbar')
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="wrapper">
            <!-- ============================================================== -->
            <!-- Page Content -->
            <!-- ============================================================== -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">
                                <h3 class="box-title font-weight-bold">بيانات حضور موظف</h3>
                                <form class="form-horizontal form-material" action="{{route('attend.edit.post' , $TheItem->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">الموظف: {{$TheItem->Employee->name}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">التاريخ (أسبوع - شهر - سنة)</label>
                                         <div class="col-md-4">
                                            <select name="year" required class="form-control form-control-line">
                                                @for($i=2020 ; $i<2025 ; $i++)
                                                <option @if($TheItem->year == $i) selected @endif value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                         </div>
                                         <div class="col-md-4">
                                            <select name="month" required class="form-control form-control-line">
                                                @for($i=1 ; $i<13 ; $i++)
                                                    <option @if(date('n') == $i) selected @endif value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                         </div>
                                         <div class="col-md-4">
                                            <select name="week_number" required class="form-control form-control-line">
                                                @for($i=1 ; $i<5 ; $i++)
                                                <option @if($TheItem->week_number == $i) selected @endif value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">السبت</label>
                                        <div class="col-md-12">
                                            <select required name="saturday" class="form-control">
                                                <option @if($TheItem->saturday == 1) selected @endif value="1">حضور</option>
                                                <option @if($TheItem->saturday == 0) selected @endif value="0">غياب</option>
                                            </select>
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">الأحد</label>
                                        <div class="col-md-12">
                                            <select required name="sunday" class="form-control">
                                                <option @if($TheItem->sunday == 1) selected @endif value="1">حضور</option>
                                                <option @if($TheItem->sunday == 0) selected @endif value="0">غياب</option>
                                            </select>
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">الاثنين</label>
                                        <div class="col-md-12">
                                            <select required name="monday" class="form-control">
                                                <option @if($TheItem->monday == 1) selected @endif value="1">حضور</option>
                                                <option @if($TheItem->monday == 0) selected @endif value="0">غياب</option>
                                            </select>
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">الثلاثاء</label>
                                        <div class="col-md-12">
                                            <select required name="tuesday" class="form-control">
                                                <option @if($TheItem->tuesday == 1) selected @endif value="1">حضور</option>
                                                <option @if($TheItem->tuesday == 0) selected @endif value="0">غياب</option>
                                            </select>
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">الأربعاء</label>
                                        <div class="col-md-12">
                                            <select required name="wednesday" class="form-control">
                                                <option @if($TheItem->wednesday == 1) selected @endif value="1">حضور</option>
                                                <option @if($TheItem->wednesday == 0) selected @endif value="0">غياب</option>
                                            </select>
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">الخميس</label>
                                        <div class="col-md-12">
                                            <select required name="thursday" class="form-control">
                                                <option @if($TheItem->thursday == 1) selected @endif value="1">حضور</option>
                                                <option @if($TheItem->thursday == 0) selected @endif value="0">غياب</option>
                                            </select>
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">ساعات التأخير</label>
                                        <div class="col-md-12">
                                            <input type="number" placeholder="أدخل الرقم هنا " value="{{$TheItem->off_hours}}" name="off_hours" step="0.01" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <input type="number" name="work_days" hidden value="{{$TheItem->work_days}}">
                                    <div class="form-group">
                                        <label class="col-md-12">سلف</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" placeholder="أدخل الرقم هنا " value="{{$TheItem->loans}}" name="loans" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">خصم</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" placeholder="أدخل الرقم هنا " value="{{$TheItem->cutoff}}" name="cutoff" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">مبلغ اضافي</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" placeholder="أدخل الرقم هنا "  value="{{$TheItem->additions}}" name="additions" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">تحديث البيانات</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    @include('layout.scripts')
    <script>
        var DaysInputs = $('select[name$="day"]');
        var TotalWorkingDays = 0;
        $('select[name$="day"]').change(function(){
            var TotalWorkingDays = 0;
            DaysInputs.each(function(){
                TotalWorkingDays += parseInt($(this).val());
             });
             $('input[name="work_days"]').val(TotalWorkingDays);
        });
    </script>
</body>

</html>
