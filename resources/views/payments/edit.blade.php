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
                                <h3 class="box-title font-weight-bold">تعديل</h3>
                                <form class="form-horizontal form-material" action="{{route('payments.edit.post' , $ThePayment->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">العميل</label>
                                        <div class="col-md-12">
                                            <select name="customer_id" required class="form-control form-control-line">
                                                <option selected value="{{$ThePayment->Customer->id}}">{{$ThePayment->Customer->name}}</option>
                                                @forelse ($Customers as $Customer)
                                                <option value="{{$Customer->id}}">{{$Customer->name}}</option>
                                                @empty 
                                                <p>لا يوجد عملاء في النظام</p>
                                                @endforelse                             
                                            </select>
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">القيمة</label>
                                        <div class="col-md-12">
                                            <input required type="number" placeholder="أدخل القيمة هنا بالأرقام" value="{{$ThePayment->amount}}" name="amount" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">تاريخ الدفعة</label>
                                        <div class="col-md-12">
                                            <input required type="date" value="{{$ThePayment->created_at->format('Y-m-d')}}" placeholder="تاريخ الدفعة" name="date" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">ملاحظات</label>
                                        <div class="col-md-12">
                                            <textarea rows="6" placeholder="أدخل الملاحظات المطلوبة" name="notes" class="form-control form-control-line">{{$ThePayment->notes}}</textarea>
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
