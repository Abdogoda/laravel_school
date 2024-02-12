<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{__('trans.ag_international_school')}}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    @if (App::getLocale() == 'en')
        <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
    @else
        <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
    @endif
</head>

<body>
    <div class="wrapper">
        <section class=" d-flex align-items-center page-section-ptb login" style="height:100vh; background-image: url('{{ asset('assets/images/sativa.png')}}');">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">
                   <div class="col-md-10 col-lg-8 p-4 login-fancy bg-white shadow border rounded-3">
                       <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">{{__('trans.select_login_method')}}</h3>
                       <div class="selection-boxes form-inline">
                           <a class="btn btn-default col-6 col-md-3 d-flex align-items-center flex-column" href="{{route('login_form','student')}}">
                               <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/student.png')}}">
                               <h5 class="mt-1 text-muted">{{__('trans.student')}}</h5>
                           </a>
                           <a class="btn btn-default col-6 col-md-3 d-flex align-items-center flex-column" href="{{route('login_form','gardian')}}">
                               <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/parent.png')}}">
                               <h5 class="mt-1 text-muted">{{__('trans.gardian')}}</h5>
                           </a>
                           <a class="btn btn-default col-6 col-md-3 d-flex align-items-center flex-column" href="{{route('login_form','teacher')}}">
                               <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/teacher.png')}}">
                               <h5 class="mt-1 text-muted">{{__('trans.teacher')}}</h5>
                           </a>
                           <a class="btn btn-default col-6 col-md-3 d-flex align-items-center flex-column" href="{{route('login_form','admin')}}">
                               <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/admin.png')}}">
                               <h5 class="mt-1 text-muted">{{__('trans.admin')}}</h5>
                           </a>
                       </div>
                   </div>
                </div>
            </div>
        </section>
    </div>


    <script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
    <script type="text/javascript"> var plugin_path="{{asset('assets/js/')}}"; </script>
    @yield('js')
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>

</body>

</html>