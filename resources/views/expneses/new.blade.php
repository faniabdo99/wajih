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
                                <h3 class="box-title font-weight-bold">اضافة فاتورة مشتريات</h3>
                                <form class="form-horizontal form-material" action="{{route('expenses.new.post')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                      <label class="col-md-12">المورد</label>
                                      <div class="col-md-12">
                                        <select required class="form-control form-control-line" name="supplier_id">
                                          <option value="">ابحث عن مورد</option>
                                          @forelse($Suppliers as $Supplier)
                                            <option value="{{$Supplier->id}}">{{$Supplier->name}}</option>
                                          @empty
                                            <p>لا يوجد بيانات في النظام</p>
                                          @endforelse
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">العنوان</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="أدخل عنوان الفاتورة هنا" name="title" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">نوع المصروفات</label>
                                        <div class="col-md-12">
                                            <select class="form-control" name="type" required>
                                                <option value="salaries">رواتب موظفين</option>
                                                <option value="bills">فواتير</option>
                                                <option value="rental">آجار</option>
                                                <option value="material">مشتريات / بضائع</option>
                                                <option value="others">أخرى</option>
                                            </select>
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">القيمة</label>
                                        <div class="col-md-12">
                                            <input required type="number" placeholder="أدخل القيمة هنا بالأرقام" name="amount" class="form-control form-control-line">
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
