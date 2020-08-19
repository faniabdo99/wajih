<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@auth {{auth()->user()->company_name}} @endauth @guest تسجيل الدخول @endguest  - المحاسبة</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="@auth {{auth()->user()->main_image}} @endauth" type="image/x-icon">
    <!-- Bootstrap Core CSS -->
    <link href="{{url('public/css/')}}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    {{-- <link rel="stylesheet" href="{{url('public/css/')}}/fontAwesome.css"/> --}}
    <!-- Menu CSS -->
    <link href="{{url('public/plugins')}}/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <script src="{{url('public/plugins')}}/DataTables/datatables.min.css"></script>
    <!-- Custom CSS -->
    <link href="{{url('public/css')}}/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{url('public/css')}}/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>