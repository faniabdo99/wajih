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
<body class="text-right" dir="rtl">
    <div class="controls">
        <button class="btn btn-primary" onclick="window.location='{{route('home')}}';">عودة للرئيسية</button>
        <button class="btn btn-primary" onclick="document.title='{{$ReportTitle}}'; window.print(); return false;">طباعة / تصدير الى PDF</button>
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
                    <h3 class="report-title">{{$ReportType ?? ''}}</h3>
                    <p>{{$ReportDate ?? ''}}</p>
                </div>
            </div>
            <div class="row">
                <div class="report-content">
                            @php
                            $TotalSales = App\Sales::whereMonth('created_at' , request()->month)->get()->sum('total');   
                            $TotalIncome = App\Payment::whereMonth('created_at' , request()->month)->sum('amount'); 
                            $TotalExpenses = App\Expense::whereMonth('created_at' , request()->month)->sum('amount');
                            $TotalProfit = $TotalSales - $TotalExpenses;
                        @endphp
                         <h2>المصاريف ({{$TotalExpenses}} L.E)</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-right">النوع</th>
                                    <th class="text-right">القيمة الاجمالية</th>
                                    <th class="text-right">عدد الفواتير</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ExpensesList as $Item)
                                <tr>
                                    <td>{{$Item->first()->type_text}}</td>
                                    <td>{{$Item->sum('amount')}} L.E</td>
                                    <td>{{count($Item)}}</td>
                                </tr>
                                @empty 
                                <p>لا يوجد بيانات</p>
                                @endforelse
                            </tbody>
                        </table>
                        <br><br>
                        <h2>المبيعات ({{$TotalSales}} L.E)</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-right">العميل</th>
                                    <th class="text-right">القيمة الاجمالية</th>
                                    <th class="text-right">عدد الفواتير</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($SalesList as $Item)
                                <tr>
                                    <td>{{$Item->first()->Customer->name}}</td>
                                    <td>{{$Item->sum('total')}} L.E</td>
                                    <td>{{count($Item)}}</td>
                                </tr>
                                @empty 
                                <p>لا يوجد بيانات</p>
                                @endforelse
                            </tbody>
                        </table>
                        <br><br>
                        <h2>المدخول ({{$TotalIncome}} L.E)</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-right">العميل</th>
                                    <th class="text-right">القيمة الاجمالية</th>
                                    <th class="text-right">عدد الفواتير</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($PaymentsList as $Item)
                                <tr>
                                    <td>{{$Item->first()->Customer->name}}</td>
                                    <td>{{$Item->sum('amount')}} L.E</td>
                                    <td>{{count($Item)}}</td>
                                </tr>
                                @empty 
                                <p>لا يوجد بيانات</p>
                                @endforelse
                            </tbody>
                        </table>





                        <div class="col-md-3">
                            <h3>اجمالي أرباح شهر {{request()->month}}</h3>
                            <p>{{$TotalProfit}} L.E</p>
                        </div>
                        <div class="col-md-3">
                            <h3>اجمالي المصاريف لشهر {{request()->month}}</h3>
                            <p>{{$TotalExpenses}} L.E</p>
                        </div>
                        <div class="col-md-3">
                            <h3>اجمالي المدخول لشهر {{request()->month}}</h3>
                            <p>{{$TotalIncome}} L.E</p>
                        </div>
                        <div class="col-md-3">
                            <h3>اجمالي المبيعات لشهر {{request()->month}}</h3>
                            <p>{{$TotalSales}} L.E</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
