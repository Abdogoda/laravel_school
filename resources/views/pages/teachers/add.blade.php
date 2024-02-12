@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.add_new_teacher')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.add_new_teacher')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('teachers.index')}}" class="default-color">{{__('trans.teachers_list')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.add_new_teacher')}}</li>
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
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a href='{{route('teachers.index')}}' class="button x-small">{{__('trans.teachers_list')}}</a>
                <br><br>
                <form action="{{route('teachers.store')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="name_ar">{{trans('trans.teacher_name_arabic')}}</label>
                            <input type="text" name="name_ar" value="{{old('name_ar')}}" id="name_ar" class="form-control border">
                            @error('name_ar')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name_en">{{trans('trans.teacher_name_english')}}</label>
                            <input type="text" name="name_en" value="{{old('name_en')}}" id="name_en" class="form-control border">
                            @error('name_en')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">{{trans('trans.email')}}</label>
                            <input type="email" name="email" value="{{old('email')}}" id="email" class="form-control border">
                            @error('email')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password">{{trans('trans.password')}}</label>
                            <input type="text" name="password" value="{{old('password')}}"  id="password" class="form-control border">
                            @error('password')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="phone">{{trans('trans.phone')}}</label>
                            <input type="text" name="phone" value="{{old('phone')}}" minlength="11" maxlength="11" id="phone" class="form-control border">
                            @error('phone')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="national_id">{{trans('trans.national_id')}}</label>
                            <input type="text" name="national_id" value="{{old('national_id')}}"  minlength="14" maxlength="14" id="national_id" class="form-control border">
                            @error('national_id')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="passport_id">{{trans('trans.passport_id')}}</label>
                            <input type="text" name="passport_id" value="{{old('passport_id')}}" minlength="14" maxlength="14" id="passport_id" class="form-control border">
                            @error('passport_id')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-3 col-lg-3">
                            <label for="gender_id">{{trans('trans.gender')}}</label>
                            <select class="custom-select my-1 mr-sm-2" id="gender_id" name="gender_id">
                                <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                @foreach($genders as $gender)
                                    <option {{ old('gender_id') == $gender->id ? "selected" : "" }} value="{{$gender->id}}">{{$gender->title}}</option>
                                @endforeach
                            </select>
                            @error('gender_id')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mb-3 col-lg-3">
                            <label for="nationality_id">{{trans('trans.nationality')}}</label>
                            <select class="custom-select my-1 mr-sm-2" id="nationality_id" name="nationality_id">
                                <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                @foreach($nationalities as $nationality)
                                    <option {{ old('nationality_id') == $nationality->id ? "selected" : "" }} value="{{$nationality->id}}">{{$nationality->name}}</option>
                                @endforeach
                            </select>
                            @error('nationality_id')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mb-3 col-lg-3">
                            <label for="religion_id">{{trans('trans.religion')}}</label>
                            <select class="custom-select my-1 mr-sm-2" id="religion_id" name="religion_id">
                                <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                @foreach($religions as $religion)
                                    <option {{ old('religion_id') == $religion->id ? "selected" : "" }} value="{{$religion->id}}">{{$religion->name}}</option>
                                @endforeach
                            </select>
                            @error('religion_id')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mb-3 col-lg-3">
                            <label for="blood_id">{{trans('trans.blood')}}</label>
                            <select class="custom-select my-1 mr-sm-2" id="blood_id" name="blood_id">
                                <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                @foreach($bloods as $blood)
                                    <option {{ old('blood_id') == $blood->id ? "selected" : "" }} value="{{$blood->id}}">{{$blood->name}}</option>
                                @endforeach
                            </select>
                            @error('blood_id')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="birth_of_date">{{trans('trans.birth_of_date')}}</label>
                            <div class='input-group date'>
                                <input class="form-control border" type="date" id="birth_of_date" name="birth_of_date" value="{{old('birth_of_date')}}"  data-date-format="yyyy-mm-dd"  >
                            </div>
                            @error('birth_of_date')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="joining_date">{{trans('trans.joining_date')}}</label>
                            <div class='input-group date'>
                                <input class="form-control border" type="date"  id="joining_date" name="joining_date" value="{{old('joining_date')}}"  data-date-format="yyyy-mm-dd"  >
                            </div>
                            @error('joining_date')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="specialization_id">{{trans('trans.specialization')}}</label>
                            <select class="custom-select my-1 mr-sm-2" id="specialization_id" name="specialization_id">
                                <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                @foreach($specializations as $specialization)
                                    <option {{ old('specialization_id') == $specialization->id ? "selected" : "" }} value="{{$specialization->id}}">{{$specialization->title}}</option>
                                @endforeach
                            </select>
                            @error('specialization_id')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="address">{{trans('trans.address')}}</label>
                            <textarea class="form-control border" id="address" name="address" rows="4">{{old('specialization_id')}}</textarea>
                            @error('address')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button class="button small-x" type="submit">{{trans('trans.add_new_teacher')}}</button>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
