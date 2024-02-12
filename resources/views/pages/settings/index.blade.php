@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.settings')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.settings')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.settings')}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form enctype="multipart/form-data" method="post" action="{{route('settings.update','test')}}">
                    @csrf @method('PUT')
                    <div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label font-weight-semibold">{{__('trans.school_name')}}<span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input name="school_name" value="{{ $setting['school_name'] }}" required type="text" class="form-control" placeholder="Name of School">
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label for="current_session" class="col-2 col-form-label font-weight-semibold">{{__('trans.academic_year')}}<span class="text-danger">*</span></label>
                            <div class="col-10">
                                <select data-placeholder="Choose..." required name="current_session" id="current_session" class="form-control" style="height: auto">
                                    <option value=""></option>
                                    @for($y=date('Y', strtotime('- 3 years')); $y<=date('Y', strtotime('+ 1 years')); $y++)
                                        <option {{ ($setting['current_session'] == (($y-=1).'-'.($y+=1))) ? 'selected' : '' }}>{{ ($y-=1).'-'.($y+=1) }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label class="col-2 col-form-label font-weight-semibold">{{__('trans.school_title')}}</label>
                            <div class="col-10">
                                <input name="school_title" value="{{ $setting['school_title'] }}" type="text" class="form-control" placeholder="School Acronym">
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label class="col-2 col-form-label font-weight-semibold">{{__('trans.phone')}}</label>
                            <div class="col-10">
                                <input name="phone" value="{{ $setting['phone'] }}" type="text" class="form-control" placeholder="Phone">
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label class="col-2 col-form-label font-weight-semibold">{{__('trans.email')}}</label>
                            <div class="col-10">
                                <input name="email" value="{{ $setting['email'] }}" type="email" class="form-control" placeholder="School Email">
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label class="col-2 col-form-label font-weight-semibold">{{__('trans.address')}}<span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input required name="address" value="{{ $setting['address'] }}" type="text" class="form-control" placeholder="School Address">
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label class="col-2 col-form-label font-weight-semibold">{{__('trans.end_of_first_term')}}</label>
                            <div class="col-10">
                                <input name="end_first_term" value="{{ $setting['end_first_term'] }}" type="text" class="form-control date-pick" placeholder="Date Term Ends">
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label class="col-2 col-form-label font-weight-semibold">{{__('trans.end_of_second_term')}}</label>
                            <div class="col-10">
                                <input name="end_second_term" value="{{ $setting['end_second_term'] }}" type="text" class="form-control date-pick" placeholder="Date Term Ends">
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label class="col-2 col-form-label font-weight-semibold">{{__('trans.school_logo')}}</label>
                            <div class="col-10">
                                <div class="mb-3">
                                    <img style="width: 100px" height="100px" src="{{ asset('storage/'.$setting['logo']) }}" alt="">
                                </div>
                                <input name="logo" accept="image/*" type="file" class="file-input" data-show-caption="false" data-show-upload="false" data-fouc>
                            </div>
                        </div><hr>
                    </div>
                    <hr>
                    <button class="button" type="submit">{{trans('trans.submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@endsection