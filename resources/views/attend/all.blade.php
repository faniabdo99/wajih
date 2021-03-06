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
                    <!-- /row -->
                    <div class="row">
                        <div class="col-sm-12">
                            @include('layout.alerts')
                            <div class="white-box">
                                 <h3 class="box-title">مستحقات الموظفين لشهر {{date('m')}} سنة {{date('Y')}}</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="display:none;"></th>
                                                <th class="text-right">الموظف</th>
                                                <th class="text-right">أيام العمل</th>
                                                <th class="text-right">ساعات التأخير</th>
                                                <th class="text-right">الخصومات</th>
                                                <th class="text-right">اضافي</th>
                                                <th class="text-right">سلف</th>
                                                <th class="text-right">المستحقات</th>
                                                <th style="display:none;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $TotalSalaries = 0; @endphp
                                            @forelse($FinalSalaryArray as $SingleEmployeeData)
                                            @php
                                                $TotalSalaries += $SingleEmployeeData['salary'];
                                            @endphp
                                            <tr>
                                               <td style="display:none;">0</td>
                                                <td>{{$SingleEmployeeData['name']}}</td>
                                                <td>{{$SingleEmployeeData['work_days']}}</td>
                                                <td>{{$SingleEmployeeData['off_hours']}}</td>
                                                <td>{{$SingleEmployeeData['cutoff']}}</td>
                                                <td>{{$SingleEmployeeData['additions']}}</td>
                                                <td>{{$SingleEmployeeData['loans']}}</td>
                                                <td><b class="final-salary">{{$SingleEmployeeData['salary']}}</b></td>
                                                <td style="display:none;"></td>
                                            </tr>
                                            @empty
                                            <p>لا يوجد بيانات في النظام</p>
                                            @endforelse
                                            <tr>
                                               <td style="display:none;">1</td>
                                                <td style="visibility: hidden;"></td>
                                                <td style="visibility: hidden;"></td>
                                                <td style="visibility: hidden;"></td>
                                                <td style="visibility: hidden;"></td>
                                                <td style="visibility: hidden;"></td>
                                                <td>اجمالي الرواتب</td>
                                                <td id="total-salaries">{{$TotalSalaries}}</td>
                                                <td style="display: none;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="white-box">
                              <h3 class="box-title">تقرير مستحقات الموظفين</h3>
                              <form class="form-horizontal form-material" action="{{route('reports.employees')}}" method="post">
                                <div class="form-group">
                                  @csrf
                                    <label class="col-md-12">التاريخ (أسبوع - شهر - سنة)</label>
                                     <div class="col-md-4">
                                        <select name="year" required class="form-control form-control-line">
                                            @for($i=2020 ; $i<2025 ; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
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
                                            <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                     </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" target="_blank" class="btn btn-success">طباعة التقرير</button>
                                    </div>
                                </div>
                              </form>
                            </div>
                            <div class="white-box">
                                <h3 class="box-title">بيانات الحضور ({{$MainData->count()}})</h3>
                                <a class="btn btn-success" href="{{route('attend.new.get')}}">اضافة بيانات حضور</a>
                                <div class="table-responsive">
                                    <table class="table datatable-print">
                                        <thead>
                                            <tr>
                                                <th class="text-right">#</th>
                                                <th class="text-right">الاسم</th>
                                                <th class="text-right">الأسبوع</th>
                                                <th class="text-right">الشهر</th>
                                                <th class="text-right">السنة</th>
                                                <th class="text-right">ساعات التأخير</th>
                                                <th class="text-right">أيام العمل</th>
                                                <th class="no-print text-right">خيارات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($MainData as $Item)
                                            <tr>
                                                <td>{{$Item->id}}</td>
                                                <td>{{$Item->Employee->name}}</td>
                                                <td>{{$Item->week_number}}</td>
                                                <td>{{$Item->month}}</td>
                                                <td>{{$Item->year}}</td>
                                                <td>{{$Item->off_hours}}</td>
                                                <td>{{$Item->work_days}}</td>
                                                <td class="no-print"><a class="btn btn-primary" href="{{route('attend.edit.get' , $Item->id)}}">تعديل</a> <a class="btn btn-danger" href="{{route('attend.delete' , $Item->id)}}">حذف</a></td>
                                            </tr>
                                            @empty
                                            <p>لا يوجد بيانات في النظام</p>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
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
</body>

</html>
