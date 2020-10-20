@include('layout.head')
<style>
    #wrapper{
        padding: 70px 40px;
    }
    .company-name{
        font-weight: bold;
        font-size: 1.1em;
    }
    .report-title{
        font-size: 1.3em;
        font-weight: bold;
    }
    table, th, td , tr {
        border: 2px solid #ccc;
    }
    .controls{
        padding: 20px;
    }
</style>
<style type="text/css" media="print">
    .controls{
        display:none;
    }
</style>
<body class="text-right" id="body" dir="rtl">
    <div class="controls">
        <button class="btn btn-primary" onclick="window.location='{{route('home')}}';">عودة للرئيسية</button>
        <button class="btn btn-primary" onclick="document.title='{{'تقرير رواتب الموظفين'}}'; window.print(); return false;">طباعة / تصدير الى PDF</button>
        <button class="btn btn-primary" onclick="location.reload();">تحديث الصفحة</button>
    </div>
    <div id="wrapper">
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-lg-2 text-center">
                @if(auth()->user()->company_image)
                    <img src="{{auth()->user()->main_image}}" width="100" height="100" alt="">
                @endif
                    <p class="company-name">{{auth()->user()->company_name}}</p>
            </div>
            <div class="col-lg-10">
                <h3 class="report-title">كشف رواتب الموظفين</h3>
                <p>للأسبوع {{$RequestData['week_number']}} من شهر {{$RequestData['month']}} لسنة {{$RequestData['year']}}</p>
            </div>
        </div>
        <div class="row">
                <div class="report-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                  <th class="text-right">الموظف</th>
                                  <th class="text-right">أيام العمل</th>
                                  <th class="text-right">ساعات التأخير</th>
                                  <th class="text-right">الخصومات</th>
                                  <th class="text-right">اضافي</th>
                                  <th class="text-right">سلف</th>
                                  <th class="text-right">المستحقات</th>
                                </tr>
                            </thead>
                            <tbody>
                              @php $TotalSalaries = 0; @endphp
                              @forelse($FinalSalaryArray as $SingleEmployeeData)
                              @php
                                  $TotalSalaries += $SingleEmployeeData['salary'];
                              @endphp
                              <tr>
                                  <td>{{$SingleEmployeeData['name']}}</td>
                                  <td>{{$SingleEmployeeData['work_days']}}</td>
                                  <td>{{$SingleEmployeeData['off_hours']}}</td>
                                  <td>{{$SingleEmployeeData['cutoff']}}</td>
                                  <td>{{$SingleEmployeeData['additions']}}</td>
                                  <td>{{$SingleEmployeeData['loans']}}</td>
                                  <td><b class="final-salary">{{$SingleEmployeeData['salary']}}</b></td>
                              </tr>
                              @empty
                              <p>لا يوجد بيانات في النظام</p>
                              @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>اجمالي الرواتب:</h3>
                    <p style="font-size: 16px;font-weight:bold;">{{$TotalSalaries}}</p>
                </div>
            </div>
        </div>
</body>
</html>
