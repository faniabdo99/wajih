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
                            @include('layout.alerts')
                            <div class="white-box">
                                <h3 class="box-title font-weight-bold">تعديل {{$TheEmployee->name}}</h3>
                                <form class="form-horizontal form-material" action="{{route('employee.edit.post' , $TheEmployee->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">الاسم</label>
                                        <div class="col-md-12">
                                            <input required type="text" placeholder="أدخل اسم الموظف هنا" value="{{$TheEmployee->name}}" name="name" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">الراتب الشهري</label>
                                        <div class="col-md-12">
                                            <input required type="number" placeholder="أدخل الراتب هنا بالأرقام" value="{{$TheEmployee->salary}}"  name="salary" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">الراتب الأسبوعي</label>
                                        <div class="col-md-12">
                                            <input required type="number" placeholder="أدخل الراتب هنا بالأرقام" value="{{$TheEmployee->salary_week}}" step="0.01" name="salary_week" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">الراتب اليومي</label>
                                        <div class="col-md-12">
                                            <input required type="number" placeholder="أدخل الراتب هنا بالأرقام" value="{{$TheEmployee->salary_day}}" step="0.01" name="salary_day" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">سعر الساعة</label>
                                        <div class="col-md-12">
                                            <input required type="number" step="0.01" placeholder="أدخل الراتب هنا بالأرقام" value="{{$TheEmployee->salary_hour}}"  step="0.01" name="salary_hour" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">تحديث</button>
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
</body>

</html>
