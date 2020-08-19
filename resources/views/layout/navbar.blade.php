        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="nav-toggler open-close hidden-md hidden-lg" href="javascript:void(0)"><i class="fas fa-bars"></i></a>
                    </li>
                    @auth
                    <li>
                        <a class="profile-pic" href="{{route('myAccount.edit.get')}}"> <b class="hidden-xs">{{auth()->user()->company_name}}</b> <img src="{{auth()->user()->main_image}}" alt="user-img" width="36" class="img-circle"></a>
                    </li>
                
                    @endauth
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class=" open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="{{route('home')}}"><i class="fas fa-home" aria-hidden="true"></i>الرئيسية</a>
                    </li>
                    <li>
                        <a href="{{route('employee.all')}}"><i class="fas fa-users" aria-hidden="true"></i>الموظفين</a>
                    </li>
                    <li>
                        <a href="{{route('attend.all')}}"><i class="fas fa-fingerprint " aria-hidden="true"></i>حضور الموظفين</a>
                    </li>
                    <li>
                        <a href="{{route('customers.all')}}"><i class="fas fa-user-tie " aria-hidden="true"></i>العملاء</a>
                    </li>
                    <li>
                        <a href="{{route('payments.all')}}"><i class="fas fa-money-bill-alt" aria-hidden="true"></i>الدفعات</a>
                    </li>
                    <li>
                        <a href="{{route('expenses.all')}}"><i class="fas fa-shopping-cart" aria-hidden="true"></i>المشتريات</a>
                    </li>
                    <li>
                        <a href="{{route('sales.all')}}"><i class="fas fa-dollar-sign " aria-hidden="true"></i>المبيعات</a>
                    </li>
                    <li>
                        <a href="{{route('reports.home')}}"><i class="fas fa-file-pdf " aria-hidden="true"></i>التقارير </a>
                    </li>
                    @auth 
                    <li>
                        <a href="{{route('logout')}}"><i class="fas fa-sign-out-alt" aria-hidden="true"></i>تسجيل الخروج </a>
                    </li>
                    @endauth
                    
                </ul>
              
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
