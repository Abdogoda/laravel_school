@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.add_new_gardian')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.add_new_gardian')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('gardians.index')}}" class="default-color">{{__('trans.gardians_list')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.add_new_gardian')}}</li>
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
                <a href='{{route('gardians.index')}}' class="button x-small">{{__('trans.gardians_list')}}</a>
                <br><br>
                <form action="{{route('gardians.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="email">{{trans('trans.email')}} <span class="text-danger">*</span></label>
                            <input type="email" name="email" value="{{old('email')}}" id="email" class="form-control border">
                            @error('email')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password">{{trans('trans.password')}} <span class="text-danger">*</span></label>
                            <input type="text" name="password" value="{{old('password')}}"  id="password" class="form-control border">
                            @error('password')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="name">{{trans('trans.gardian_name')}} <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control border">
                            @error('name')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">{{trans('trans.phone')}} <span class="text-danger">*</span></label>
                            <input type="text" name="phone" value="{{old('phone')}}" minlength="11" maxlength="11" id="phone" class="form-control border">
                            @error('phone')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="national_id">{{trans('trans.national_id')}} <span class="text-danger">*</span></label>
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
                            <label for="gender_id">{{trans('trans.gender')}} <span class="text-danger">*</span></label>
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
                            <label for="nationality_id">{{trans('trans.nationality')}} <span class="text-danger">*</span></label>
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
                            <label for="religion_id">{{trans('trans.religion')}} <span class="text-danger">*</span></label>
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
                            <label for="blood_id">{{trans('trans.blood')}} <span class="text-danger">*</span></label>
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
                            <label for="birth_of_date">{{trans('trans.birth_of_date')}} <span class="text-danger">*</span></label>
                            <div class='input-group date'>
                                <input class="form-control border" type="date" id="birth_of_date" name="birth_of_date" value="{{old('birth_of_date')}}"  data-date-format="yyyy-mm-dd"  >
                            </div>
                            @error('birth_of_date')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="job">{{trans('trans.job')}} <span class="text-danger">*</span></label>
                            <div class='input-group'>
                                <input class="form-control border" type="text"  id="job" name="job" value="{{old('job')}}">
                            </div>
                            @error('job')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="student_id">{{trans('trans.student_name')}} <span class="text-danger">*</span></label>
                            <select class="custom-select my-1 mr-sm-2" id="student_id" name="student_id">
                                <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                @foreach($students as $student)
                                    <option {{ old('student_id') == $student->id ? "selected" : "" }} value="{{$student->id}}">{{$student->name}}</option>
                                @endforeach
                            </select>
                            @error('student_id')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="relationship_id">{{trans('trans.relationship')}} <span class="text-danger">*</span></label>
                            <select class="custom-select my-1 mr-sm-2" id="relationship_id" name="relationship_id">
                                <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                @foreach($relationships as $relationship)
                                    <option {{ old('relationship_id') == $relationship->id ? "selected" : "" }} value="{{$relationship->id}}">{{$relationship->title}}</option>
                                @endforeach
                            </select>
                            @error('relationship_id')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="attachments">{{trans('trans.attachments')}} <br><span class="text-muted">{{__('trans.maximum_3_attachments')}}</span></label>
                            <input type="file" multiple class="form-control my-1 mr-sm-2" id="attachments" name="attachments[]" accept="image/*" />
                            @error('attachments')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="address">{{trans('trans.address')}} <span class="text-danger">*</span></label>
                            <textarea class="form-control border" id="address" name="address" rows="4">{{old('address')}}</textarea>
                            @error('address')
                            <div class="text-danger mt-1">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button class="button small-x" type="submit">{{trans('trans.add_new_gardian')}}</button>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
