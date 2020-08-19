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
                            <div class="white-box">
                                <h3 class="box-title font-weight-bold">اضافة فاتورة مبيعات</h3>
                                <form class="form-horizontal form-material" action="{{route('sales.new.post')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">العنوان</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="أدخل عنوان الفاتورة هنا" name="title" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">العميل</label>
                                        <div class="col-md-12">
                                            <select name="customer_id" required class="form-control form-control-line">
                                                @forelse ($Customers as $Customer)
                                                <option value="{{$Customer->id}}">{{$Customer->name}}</option>
                                                @empty 
                                                <p>لا يوجد عملاء في النظام</p>
                                                @endforelse                             
                                            </select>
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">رقم الموديل</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="أدخل رقم الموديل" name="model_number" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">الكمية</label>
                                        <div class="col-md-12">
                                            <input required type="number" placeholder="أدخل القيمة هنا بالأرقام" name="pieces" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">سعر بيع القطعة</label>
                                        <div class="col-md-12">
                                            <input required type="number" step="0.01" placeholder="أدخل القيمة هنا بالأرقام" name="price_per_piece" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">تاريخ البيع</label>
                                        <div class="col-md-12">
                                            <input required type="date" placeholder="تاريخ البيع" name="date" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">ملاحظات</label>
                                        <div class="col-md-12">
                                            <textarea rows="6" placeholder="أدخل الملاحظات المطلوبة" name="notes" class="form-control form-control-line"></textarea>
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">اضافة فاتورة</button>
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
