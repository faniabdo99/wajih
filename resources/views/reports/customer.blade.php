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
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-right">النوع</th>
                                    <th class="text-right">مدين</th>
                                    <th class="text-right">دائن</th>
                                    <th class="text-right">الكمية</th>
                                    <th class="text-right">سعر القطعة</th>
                                    <th class="text-right">رصيد</th>
                                    <th class="text-right">التاريخ</th>
                                    <th class="text-right">البيان</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($MergedData as $Item)
                                @php 
                                    $CustomerAccount = $ReportCustomer->CurrentStates('ItemReport' , $Item->created_at);
                                @endphp
                                <tr>
                                    <td>@if($Item->pieces) بيع @else دفعة @endif</td>
                                    <td>@if($Item->pieces){{$Item->total}}@endif</td>
                                    <td>@if(!$Item->pieces){{$Item->amount}}@endif</td>
                                    <td>@if($Item->pieces){{$Item->pieces}}@else لا ينطبق @endif</td>
                                    <td>@if($Item->pieces){{$Item->price_per_piece}}@else لا ينطبق @endif</td>
                                    <td>{{$CustomerAccount['rassed']}}</td>
                                    <td>{{$Item->created_at->format('Y-m-d')}}</td>
                                    <td>{{$Item->notes}}</td>
                                </tr>
                                @empty 
                                <p>لا يوجد بيانات</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        @php
                            if($ReportType == 'عميل شهري'){
                                $CurrentStates = $ReportCustomer->CurrentStates('MonthReport' , request()->month);
                            }else{
                                $CurrentStates = $ReportCustomer->CurrentStates('MonthFiltersReport',null,Carbon\Carbon::parse(request()->start_date),Carbon\Carbon::parse(request()->end_date));
                            }
                        @endphp
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>الرصيد:</h3>
                    <p style="font-size: 16px;font-weight:bold;">@if($CurrentStates['rassed'] < 0) مدين {{-$CurrentStates['rassed'] }} @else دائن @endif  </p>
                </div>
            </div>
        </div>
</body>
</html>
