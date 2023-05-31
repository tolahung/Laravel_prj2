
<!DOCTYPE html>
<head>
    <title>admin login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('/pubadmin/css/bootstrap.min.css')}}" >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('/pubadmin/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('/pubadmin/css/style-responsive.css')}}" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('/pubadmin/css/font.css')}}" type="text/css"/>
    <link href="{{asset('/pubadmin/css/font-awesome.css')}}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="{{asset('/pubadmin/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="log-w3">
    <div class="w3layouts-main">
        <h2>Đăng nhập</h2>
        <?php
           $message = \Illuminate\Support\Facades\Session::get('message');
            if($message){
                echo $message;
                \Illuminate\Support\Facades\Session::put('message', null);
            }
        ?>

        <form action="{{url('/getadmin-login')}}" method="post">
            @csrf
            <input type="text" class="ggg" name="admin_email" placeholder="Nhập email" required="">
            <input type="password" class="ggg" name="admin_password" placeholder="Nhập password" required="">
            <span><input type="checkbox" />Nhớ đăng nhập</span>
            <h6><a href="#">Forgot Password?</a></h6>
            <div class="clearfix"></div>
            <input type="submit" value="Đăng nhập" name="login">
        </form>
{{--        <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p>--}}
    </div>
</div>
<script src="{{asset('/pubadmin/js/bootstrap.js')}}"></script>
<script src="{{asset('/pubadmin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('/pubadmin/js/scripts.js')}}"></script>
<script src="{{asset('/pubadmin/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('/pubadmin/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{asset('/pubadmin/js/flot-chart/excanvas.min.js')}}"></script><![endif]-->
<script src="{{asset('/pubadmin/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
