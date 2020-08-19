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
                        <h4 class="page-title">معلومات الحساب</h4></div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        @include('layout.alerts')
                        <div class="white-box">
                            <form class="form-horizontal form-material" action="{{route('myAccount.edit.post')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-12">الاسم</label>
                                    <div class="col-md-12">
                                        <input type="text" name="name" placeholder="ادخل اسمك هنا" value="{{auth()->user()->name}}" class="form-control form-control-line" required>
                                     </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">اسم الشركة</label>
                                    <div class="col-md-12">
                                        <input type="text" name="company_name" placeholder="ادخل اسم شركتك هنا" value="{{auth()->user()->company_name}}" class="form-control form-control-line" required> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">شعار الشركة</label>
                                    <div class="col-md-12">
                                        <input type="file" name="company_image" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">البريد الالكتروني</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="ادخل بريدك الالكتروني هنا" value="{{auth()->user()->email}}" class="form-control form-control-line" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">كلمة المرور</label>
                                    <div class="col-md-12">
                                        <input type="password" name="password" placeholder="ادخل كلمة المرور الجديدة هنا" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">تأكيد كلمة المرور</label>
                                    <div class="col-md-12">
                                        <input type="password" name="password_conf"  placeholder="ادخل تأكيد كلمة المرور الجديدة هنا" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">تحديث البيانات</button>
                                    </div>
                                </div>
                            </form>
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
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    @include('layout.scripts')
</body>

</html>
