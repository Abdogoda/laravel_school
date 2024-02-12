@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.edit_student')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.edit_student') ." (". $student->name .")"}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('students.index')}}" class="default-color">{{__('trans.students_list')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.edit_student')}}</li>
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
                <div class="d-flex flex-wrap">
                    <a href="{{route('students.index')}}" class="button m-1 mb-3">{{__('trans.students_list')}}</a>
                    <a href="{{route('students.show', $student->id)}}" class="button m-1 mb-3">{{__('trans.show_student')}} <i class="fa fa-eye"></i></a>
                </div>
                <form method="post" action="{{ route('students.update', $student) }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h4 style="font-family: 'Cairo', sans-serif;" class='color-green mb-3'>{{trans('trans.personal_information')}}</h4>
                    <div class="form-row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="name_ar">{{trans('trans.student_name_arabic')}} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" name="name_ar" value="{{$student->getTranslation('name', 'ar')}}" id="name_ar" class="form-control border">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name_en">{{trans('trans.student_name_english')}} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" name="name_en" value="{{$student->getTranslation('name', 'en')}}" id="name_en" class="form-control border">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">{{trans('trans.email')}} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="email" id="email" value="{{$student->email}}" name="email" class="form-control border" >
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password">{{trans('trans.password')}} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" name="password" value="" id="password" class="form-control border" >
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="phone">{{trans('trans.phone')}}</label>
                            <div class="input-group">
                                <input type="text" name="phone" value="{{$student->phone}}" id="phone" class="form-control border" maxlength="11" minlength="11">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="national_id">{{trans('trans.national_id')}} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" name="national_id" value="{{$student->national_id}}" id="national_id" class="form-control border" maxlength="14" minlength="14">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="passport_id">{{trans('trans.passport_id')}}</label>
                            <div class="input-group">
                                <input type="text" name="passport_id" value="{{$student->passport_id}}" id="passport_id" class="form-control border" maxlength="14" minlength="14">
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 mb-3">
                            <label for="gender_id">{{trans('trans.gender')}} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="custom-select mr-sm-2" required name="gender_id" id="gender_id">
                                    <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                    @foreach($genders as $gender)
                                        <option {{$student->gender_id == $gender->id ? "selected" : ""}} value="{{ $gender->id }}">{{ $gender->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 mb-3">
                            <label for="nationality_id">{{trans('trans.nationality')}} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="custom-select mr-sm-2" required name="nationality_id" id="nationality_id">
                                    <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                    @foreach($nationalities as $nationality)
                                        <option {{$student->nationality_id == $nationality->id ? "selected" : ""}} value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 mb-3">
                            <label for="blood_id">{{trans('trans.blood')}} <span class="text-danger">*</span></label>
                        <div class="input-group">
                                <select class="custom-select mr-sm-2" required name="blood_id" id="blood_id">
                                    <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                    @foreach($bloods as $blood)
                                        <option {{$student->blood_id == $blood->id ? "selected" : ""}} value="{{ $blood->id }}">{{ $blood->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 mb-3">
                            <label for="religion_id">{{trans('trans.religion')}} <span class="text-danger">*</span></label>
                        <div class="input-group">
                                <select class="custom-select mr-sm-2" required name="religion_id" id="religion_id">
                                    <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                    @foreach($religions as $religion)
                                        <option {{$student->religion_id == $religion->id ? "selected" : ""}} value="{{ $religion->id }}">{{ $religion->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="birth_of_date">{{trans('trans.birth_of_date')}} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control border" type="date" id="birth_of_date" name="birth_of_date" value="{{$student->birth_of_date}}"  data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                        @if ($student->attachments->count() < 3)
                            <div class="col-md-6 mb-3">
                                <label for="attachments">{{trans('trans.attachments')}} <span class="text-muted">({{__('trans.maximum_3_attachments_and_used') . $student->attachments->count() }})</span></label>
                                <div class="input-group">
                                    <input type="file" multiple class="form-control border" id="attachments" name="attachments[]" accept="image/*" />
                                </div>
                            </div>
                        @endif
                        @if ($student->attachments->count() > 0)
                            <div class="col-12 d-flex flex-wrap">
                                @foreach ($student->attachments as $attachment)
                                    <div class="border p-1 m-1">
                                        <img src="{{asset('storage/'.$attachment->path)}}" alt="{{$attachment->name}}" style="width: 100px">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <h4 style="font-family: 'Cairo', sans-serif;" class='color-green mb-3'>{{trans('trans.student_information')}}</h4>
                    <div class="form-row mb-3">
                        <div class="col-md-4 col-lg-3 mb-3">
                            <label for="stage_id">{{trans('trans.stage')}} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="custom-select mr-sm-2" required name="stage_id" id="stage_id">
                                    <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                    @foreach($stages as $stage)
                                        <option {{$student->stage_id == $stage->id ? "selected" : ""}} value="{{ $stage->id }}">{{ $stage->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 mb-3">
                            <label for="class_id">{{trans('trans.class_name')}} <span class="text-danger">*</span></label>
                        <div class="input-group">
                                <select class="custom-select mr-sm-2" name="class_id" id="class_id">
                                    <option selected value="{{$student->class_id}}">{{$student->class->name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 mb-3">
                            <label for="section_id">{{trans('trans.section_name')}} <span class="text-danger">*</span></label>
                        <div class="input-group">
                                <select class="custom-select mr-sm-2" name="section_id" id="section_id">
                                    <option selected value="{{$student->section_id}}">{{$student->section->name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 mb-3">
                            <label for="academic_year">{{trans('trans.academic_year')}} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="custom-select mr-sm-2" required name="academic_year" id="academic_year">
                                    <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option {{$student->academic_year == $year ? "selected" : ""}} value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="button" type="submit">{{trans('trans.edit_student')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('select[name="stage_id"]').on('change', function () {
                var stage_id = $(this).val();
                if (stage_id) {
                    $.ajax({
                        url: "{{ URL::to('get_stage_classes') }}/" + stage_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="class_id"]').empty();
                            $('select[name="section_id"]').empty();
                            $('select[name="class_id"]').append('<option selected disabled>{{trans('trans.choose_from_list')}}...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
        </script>


    <script>
        $(document).ready(function () {
            $('select[name="class_id"]').on('change', function () {
                var class_id = $(this).val();
                if (class_id) {
                    $.ajax({
                        url: "{{ URL::to('get_class_sections') }}/" + class_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $('select[name="section_id"]').append('<option selected disabled>{{trans('trans.choose_from_list')}}...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection