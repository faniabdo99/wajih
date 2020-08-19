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
                                <h3 class="box-title font-weight-bold">تعديل {{$TheCustomer->name}}</h3>
                                <form class="form-horizontal form-material" action="{{route('customers.edit.post' , $TheCustomer->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">الاسم</label>
                                        <div class="col-md-12">
                                            <input required type="text" placeholder="أدخل اسم العميل هنا" value="{{$TheCustomer->name}}" name="name" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">اسم الشركة</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="أدخل اسم الشركة هنا" name="company_name" value="{{$TheCustomer->company_name}}" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">رقم الجوال</label>
                                        <div class="col-md-12">
                                            <input type="number" placeholder="أدخل رقم الجوال هنا" name="phone_number" value="{{$TheCustomer->phone_number}}" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">البريد الإلكتروني</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="أدخل البريد الإلكتروني هنا" name="email" value="{{$TheCustomer->email}}" class="form-control form-control-line">
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
