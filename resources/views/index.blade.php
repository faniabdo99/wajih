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
        <div id="page-wrapper" >
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">الصفحة الرئيسية</h4> </div>
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <a href="{{route('expenses.all')}}">
                            <div class="white-box analytics-info">
                                <h3 class="box-title">فواتير المشتريات</h3>
                                <p>اضافة فاتورة مشتريات</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <a href="{{route('sales.all')}}">
                            <div class="white-box analytics-info">
                                <h3 class="box-title">فواتير المبيعات</h3>
                                <p>اضافة فاتورة مبيعات جديدة</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <a href="{{route('attend.all')}}">
                            <div class="white-box analytics-info">
                                <h3 class="box-title">ادارة حضور الموظفين</h3>
                                <p>ادخال بيانات حضور الموظفين</p>
                            </div>
                        </a>
                    </div>
                </div>
                <!--/.row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <a href="https://facebook.com/faniabdo99" target="_blank"><div class="white-box analytics-info">
                            <h3 class="box-title">الدعم الفني</h3>
                            <p>تواصل مع مطوري البرنامج</p>
                        </div></a>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <a href="{{route('reports.home')}}">
                            <div class="white-box analytics-info">
                                <h3 class="box-title">التقارير</h3>
                                <p>استعراض أداء الشركة في فترة معينة</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <a href="{{route('customers.all')}}">
                            <div class="white-box analytics-info">
                                <h3 class="box-title">ادارة العملاء</h3>
                                <p>ادخال بيانات العملاء</p>
                            </div>
                        </a>
                    </div>
                </div>
                <!--/.row -->
                <!-- ============================================================== -->
            </div>
            <footer class="footer text-center">
                من تطوير شركة Semicolon Group , للدعم الفني و الاقتراحات تواصل معنا
                <a href="https://facebook.com/semicolonGroup2017" target="_blank">Semicolon Group</a>.
            </footer>
            <!-- /.container-fluid -->
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
