@extends('layouts.master')
@section('css')
@section('title')
    {{trans('trans.students_promotion')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.students_promotion')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('students.index')}}" class="default-color">{{__('trans.students_list')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.students_promotion')}}</li>
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
                    @if (Session::has('error_promotions'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('error_promotions')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h4 style="font-family: Cairo" class="color-green">{{__('trans.old_stages')}}</h4>
                    <form method="post" action="{{ route('promotions.store') }}">
                        @csrf
                        @method('POST')
                        <div class="form-row  mb-4">
                            <div class="form-group mb-3 col-md-6 col-lg-3">
                                <label for="old_stage_id">{{trans('trans.stages')}}<span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="old_stage_id" name="old_stage_id" required>
                                    <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                    @foreach($stages as $stage)
                                        <option value="{{$stage->id}}">{{$stage->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3 col-md-6 col-lg-3">
                                <label for="old_class_id">{{trans('trans.class_name')}}<span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="old_class_id" name="old_class_id" required>
                                </select>
                            </div>
                            <div class="form-group mb-3 col-md-6 col-lg-3">
                                <label for="old_section_id">{{trans('trans.section_name')}}<span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="old_section_id" name="old_section_id" required>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-lg-3 mb-3">
                                <label for="old_academic_year">{{trans('trans.academic_year')}} <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" required name="old_academic_year" id="old_academic_year">
                                    <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <h4 style="font-family: Cairo" class="color-green">{{__('trans.new_stages')}}</h4>
                        <div class="form-row">
                            <div class="form-group mb-3 col-md-6 col-lg-3">
                                <label for="new_stage_id">{{trans('trans.stage')}}<span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="new_stage_id" id="new_stage_id">
                                    <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                    @foreach($stages as $stage)
                                        <option value="{{$stage->id}}">{{$stage->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3 col-md-6 col-lg-3">
                                <label for="new_class_id">{{trans('trans.class_name')}}<span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="new_class_id" name="new_class_id" >
                                </select>
                            </div>
                            <div class="form-group mb-3 col-md-6 col-lg-3">
                                <label for="new_section_id">:{{trans('trans.section_name')}} <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="new_section_id" name="new_section_id" >
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-lg-3 mb-3">
                                <label for="new_academic_year">{{trans('trans.academic_year')}} <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" required name="new_academic_year" id="new_academic_year">
                                    <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="button">{{__('trans.save')}}</button>
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
     $('select[name="old_stage_id"]').on('change', function () {
         var stage_id = $(this).val();
         if (stage_id) {
             $.ajax({
                 url: "{{ URL::to('get_stage_classes') }}/" + stage_id,
                 type: "GET",
                 dataType: "json",
                 success: function (data) {
                     $('select[name="old_class_id"]').empty();
                     $('select[name="old_section_id"]').empty();
                     $('select[name="old_class_id"]').append('<option selected disabled>{{trans('trans.choose_from_list')}}...</option>');
                     $.each(data, function (key, value) {
                         $('select[name="old_class_id"]').append('<option value="' + key + '">' + value + '</option>');
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
     $('select[name="old_class_id"]').on('change', function () {
         var class_id = $(this).val();
         if (class_id) {
             $.ajax({
                 url: "{{ URL::to('get_class_sections') }}/" + class_id,
                 type: "GET",
                 dataType: "json",
                 success: function (data) {
                     $('select[name="old_section_id"]').empty();
                     $('select[name="old_section_id"]').append('<option selected disabled>{{trans('trans.choose_from_list')}}...</option>');
                     $.each(data, function (key, value) {
                         $('select[name="old_section_id"]').append('<option value="' + key + '">' + value + '</option>');
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
     $('select[name="new_stage_id"]').on('change', function () {
         var stage_id = $(this).val();
         if (stage_id) {
             $.ajax({
                 url: "{{ URL::to('get_stage_classes') }}/" + stage_id,
                 type: "GET",
                 dataType: "json",
                 success: function (data) {
                     $('select[name="new_class_id"]').empty();
                     $('select[name="new_section_id"]').empty();
                     $('select[name="new_class_id"]').append('<option selected disabled>{{trans('trans.choose_from_list')}}...</option>');
                     $.each(data, function (key, value) {
                         $('select[name="new_class_id"]').append('<option value="' + key + '">' + value + '</option>');
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
     $('select[name="new_class_id"]').on('change', function () {
         var class_id = $(this).val();
         if (class_id) {
             $.ajax({
                 url: "{{ URL::to('get_class_sections') }}/" + class_id,
                 type: "GET",
                 dataType: "json",
                 success: function (data) {
                     $('select[name="new_section_id"]').empty();
                     $('select[name="new_section_id"]').append('<option selected disabled>{{trans('trans.choose_from_list')}}...</option>');
                     $.each(data, function (key, value) {
                         $('select[name="new_section_id"]').append('<option value="' + key + '">' + value + '</option>');
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