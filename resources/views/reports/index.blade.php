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
            <!-- ============================================================== -->
            <!-- Page Content -->
            <!-- ============================================================== -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- /row -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="white-box">
                                <h3 class="box-title">كشف حساب حسب التاريخ</h3>  
                                <form class="form-horizontal form-material" action="{{route('reports.client')}}" method="post">
                                    @csrf
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
                                        <label class="col-md-12">تاريخ البداية</label>
                                        <div class="col-md-12">
                                            <input required type="date" name="start_date" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">تاريخ النهاية</label>
                                        <div class="col-md-12">
                                            <input required type="date" name="end_date" class="form-control form-control-line">
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">كشف حساب</button>
                                        </div>
                                    </div>
                                </form>                          
                            </div>
                            <div class="white-box">
                                <h3 class="box-title">كشف حساب شهري</h3>  
                                <form class="form-horizontal form-material" action="{{route('reports.client')}}" method="post">
                                    @csrf
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
                                        <label class="col-md-12">اختر الشهر</label>
                                        <div class="col-md-12">
                                            <select name="month" required class="form-control form-control-line">
                                                @for($i=1 ; $i<13 ; $i++)
                                                   <option @if(date('n') == $i) selected @endif value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">كشف حساب</button>
                                        </div>
                                    </div>
                                 </div>
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <div class="white-box">
                                    <h3 class="box-title">كشف حساب شهري للشركة</h3>  
                                    <form class="form-horizontal form-material" action="{{route('reports.company')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label class="col-md-12">اختر الشهر</label>
                                            <div class="col-md-12">
                                                <select name="month" required class="form-control form-control-line">
                                                    @for($i=1 ; $i<13 ; $i++)
                                                        <option @if(date('n') == $i) selected @endif value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-success">كشف حساب</button>
                                            </div>
                                        </div>
                                     </div>
                                    </form>
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
