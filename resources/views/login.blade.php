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
                        <h4 class="page-title">تسجيل الدخول</h4></div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        @include('layout.alerts')
                        <div class="white-box">
                            <form class="form-horizontal form-material" method="post" action="{{route('login.post')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="col-md-12">البريد الإلكتروني</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="youremail@gmail.com" class="form-control form-control-line" name="email" id="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">كلمة المرور</label>
                                    <div class="col-md-12">
                                        <input type="password" name="password" placeholder="كلمة المرور" class="form-control form-control-line" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">دخول</button>
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
