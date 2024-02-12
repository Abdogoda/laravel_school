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

    <div id="pre-loader">
        <img src="{{URL::asset('assets/images/pre-loader/loader-01.svg')}}" alt="">
    </div>
    <section class="d-flex align-items-center page-section-ptb login" style="height:100vh; background-image: url('{{ asset('assets/images/sativa.png')}}');">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <div class="col-lg-4 col-md-6 login-fancy-bg bg" style="background-image: url('{{ asset('assets/images/login-bg.jpg')}}');">
                    <div class="login-fancy text-center">
                        <h1 class="text-white mb-20" style="font-size: 60px">{{__('trans.welcome')}}</h1>
                        <p class="mb-20 text-white">{{__('trans.login_message')}}</p>
                        <ul class="list-unstyled float-end d-flex align-items-end flex-wrap justify-content-between pb-30">
                            <li><a class="text-white" href="#"> {{__('trans.term_of_use')}}</a> </li>
                            <li><a class="text-white" href="#"> {{__('trans.privacy_policy')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">
                            @if($type == 'student')
                                {{__('trans.login_as_student')}}
                            @elseif($type == 'gardian')
                                {{__('trans.login_as_gardian')}}
                            @elseif($type == 'teacher')
                                {{__('trans.login_as_teacher')}}
                            @else
                                {{__('trans.login_as_admin')}}
                            @endif
                        </h3>
                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            <input type="hidden" value="{{$type}}" name="type">
                            <div class="section-field mb-20">
                                <label class="mb-10" for="name">{{__('trans.email')}} <span class="text-danger">*</span></label>
                                <input id="email" type="email" class="form-control border @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10" for="Password">{{__('trans.password')}} <span class="text-danger">*</span></label>
                                <input id="password" type="password" class="form-control border @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="section-field">
                                <div class="remember-checkbox mb-30">
                                    <input type="checkbox" class="form-control border" name="two" id="two" />
                                    <label for="two">{{__('trans.remember_me')}}</label>
                                    <a href="#" class="float-right">{{__('trans.forgot_password')}}</a>
                                </div>
                                <div class="mb-3">
                                    <a class="text-success" href="{{route('selections')}}">{{__('trans.select_login_method')}}</a>
                                </div>
                            </div>
                            <button class="button"><span>{{__('trans.sign_in')}}</span><i class="fa fa-check"></i></button>
                        </form>
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