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
                                <h3 class="box-title">دفعات العملاء({{$MainData->count()}})</h3>
                                <a class="btn btn-success" href="{{route('payments.new.get')}}">اضافة دفعة</a>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-right">#</th>
                                                <th class="text-right">العميل</th>
                                                <th class="text-right">القيمة</th>
                                                <th class="text-right">ملاحظات</th>
                                                <th class="text-right">التاريخ</th>
                                                <th class="text-right">خيارات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($MainData as $Item)
                                            <tr>
                                                <td>{{$Item->id}}</td>
                                                <td>{{$Item->Customer->name}}</td>
                                                <td>{{$Item->amount}}</td>
                                                <td>{{$Item->created_at->format('Y-m-d')}}</td>
                                                <td>{{$Item->short_notes}}</td>
                                                <td><a class="btn btn-danger" href="{{route('payments.delete' , $Item->id)}}">حذف</a> <a class="btn btn-primary" href="{{route('payments.edit.get' , $Item->id)}}">تعديل</a></td>
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
