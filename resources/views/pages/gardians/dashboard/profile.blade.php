@extends('layouts.master')
@section('css')

@section('title')
    {{__('trans.profile')}}
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.profile')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.profile')}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="card-body">
        <section class="bg-gray">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{URL::asset('assets/images/teacher.png')}}"
                                 alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 style="font-family: Cairo" class="my-3">{{$gardian->name}}</h5>
                            <p class="text-muted mb-1">{{$gardian->email}}</p>
                            <p class="text-muted mb-4">{{__('trans.gardian')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{route('gardian_profile.update')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4 mb-1">
                                        <p class="mb-0">{{__('trans.user_name')}}</p>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="name" value="{{$gardian->name}}" class="form-control border">
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4 mb-1">
                                        <p class="mb-0">{{__('trans.email')}}</p>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="text-muted mb-0">
                                            <input type="email" name="email" value="{{ $gardian->email }}" class="form-control border">
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4 mb-1">
                                        <p class="mb-0">{{__('trans.phone')}}</p>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="text-muted mb-0">
                                            <input type="text" minlength="11" maxlength="11" name="phone" value="{{ $gardian->phone }}" class="form-control border">
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                 <div class="col-sm-4 mb-1">
                                        <p class="mb-0">{{__('trans.edit_password')}}</p>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="text-muted mb-0">
                                            <input type="password" id="password" class="form-control border" name="password">
                                        </p><br>
                                        <p class="mx-3">
                                            <input type="checkbox" class="form-check-input" onclick="myFunction()" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">{{__('trans.show_password')}}</label>
                                           </p>
                                          </div>
                                         </div>
                                         <hr>
                                   <div class="row">
                                       <div class="col-sm-4 mb-1">
                                           <p class="mb-0">{{__('trans.address')}}</p>
                                       </div>
                                       <div class="col-sm-12">
                                           <p class="text-muted mb-0">
                                               <textarea name="address"  class="form-control border">{{ $gardian->address }}</textarea>
                                           </p>
                                       </div>
                                   </div>
                                   <hr>
                                <button type="submit" class="btn btn-success">{{__('trans.edit_data')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection