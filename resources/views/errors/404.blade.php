@include('layout.head')

<body>
    <!-- Preloader -->
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1 class="text-danger">404</h1>
                <h3 class="text-uppercase">الصفحة غير موجودة</h3>
                <a href="{{route('home')}}" class="btn btn-danger btn-rounded waves-effect waves-light m-b-40">عودة للرئيسية</a>
            </div>
        </div>
    </section>
</body>
</html>
