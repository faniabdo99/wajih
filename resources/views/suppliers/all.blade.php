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
                                <h3 class="box-title">الموردين ({{$MainData->count()}})</h3>
                                <a class="btn btn-success" href="{{route('suppliers.new.get')}}">اضافة مورد جديد</a>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-right">#</th>
                                                <th class="text-right">الاسم</th>
                                                <th class="text-right">المنتجات</th>
                                                <th class="text-right">رقم الجوال</th>
                                                <th class="text-right">الرصيد</th>
                                                <th class="text-right">خيارات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($MainData as $Item)
                                            <tr>
                                                <td>{{$Item->id}}</td>
                                                <td>{{$Item->name}}</td>
                                                <td>{{$Item->goods}}</td>
                                                <td>{{$Item->phone_number}}</td>
                                                <td>{{$Item->Rassed()}}</td>
                                                <td>
                                                    <a class="btn btn-danger" href="{{route('suppliers.delete' , $Item->id)}}">حذف</a>
                                                    <a class="btn btn-primary" href="{{route('suppliers.edit.get' , $Item->id)}}">تعديل</a>
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
</body>

</html>
