@extends('layouts.master')
@section('css')
@section('title')
    {{trans('trans.add_new_graduate')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.add_new_graduate')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('graduated.index')}}" class="default-color">{{__('trans.graduated_students')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.add_new_graduate')}}</li>
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
                    <form method="post" action="{{ route('graduated.store') }}">
                        @csrf
                        @method('POST')
                        <div class="form-row mb-4">
                            <div class="form-group mb-3 col-md-6 col-lg-4">
                                <label for="stage_id">{{trans('trans.stage')}}<span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="stage_id" name="stage_id" required>
                                    <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                    @foreach($stages as $stage)
                                        <option value="{{$stage->id}}">{{$stage->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3 col-md-6 col-lg-4">
                                <label for="class_id">{{trans('trans.class_name')}}<span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="class_id" name="class_id" required>
                                </select>
                            </div>
                            <div class="form-group mb-3 col-md-6 col-lg-4">
                                <label for="section_id">{{trans('trans.section_name')}}<span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="section_id" name="section_id" required>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-lg-3 mb-3">
                                <label for="academic_year">{{trans('trans.academic_year')}} <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" required name="academic_year" id="academic_year">
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