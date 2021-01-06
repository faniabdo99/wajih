@include('layout.head')
<style media="screen">
    .customer-report-row {
        display: none;
        padding: 15px;
    }
    .customer-report-row ul{
      list-style: none;
    }
</style>

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
                                <h3 class="box-title">العملاء ({{$MainData->count()}})</h3>
                                <a class="btn btn-success" href="{{route('customers.new.get')}}">اضافة عميل جديد</a>
                                <div class="table-responsive">
                                    <table class="table" id="customers-table">
                                        <thead>
                                            <tr>
                                                <th class="text-right">#</th>
                                                <th class="text-right">الاسم</th>
                                                <th class="text-right">اسم الشركة</th>
                                                <th class="text-right">رقم الجوال</th>
                                                <th class="text-right">البريد الإلكتروني</th>
                                                <th class="text-right">خيارات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($MainData as $Item)
                                            <tr>
                                                <td>{{$Item->id}}</td>
                                                <td>{{$Item->name}}</td>
                                                <td>{{$Item->company_name}}</td>
                                                <td>{{$Item->phone_number}}</td>
                                                <td>{{$Item->email}}</td>
                                                <td>
                                                    <a class="btn btn-danger" href="{{route('customers.delete' , $Item->id)}}">حذف</a>
                                                    <a class="btn btn-primary" href="{{route('customers.edit.get' , $Item->id)}}">تعديل</a>
                                                    <button class="btn btn-success toggle-report">تقرير</button>
                                                    <div class="customer-report-row" style="width:100%;">
                                                      <ul>
                                                        <li>اجمالي المبيعات : {{$Item->Sales->sum('total')}}</li>
                                                        <li>اجمالي الدفعات : {{$Item->Payments->sum('amount')}}</li>
                                                        <li>الرصيد : {{-($Item->Sales->sum('total') - $Item->Payments->sum('amount'))}}</li>
                                                      </ul>
                                                    </div>
                                                </td>
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
    <script type="text/javascript">
    $('#customers-table').on('click','.toggle-report',function () {
      jQuery(this).next('.customer-report-row').slideToggle('fast');
    });
    </script>
</body>

</html>
