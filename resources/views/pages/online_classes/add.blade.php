@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.online_classes_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.online_classes_list')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.online_classes_list')}}</li>
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
                <a href='{{route('online_classes.index')}}' class="button x-small">{{__('trans.add_new_online_class')}}</a>
                <br><br>
                <form action="{{route('online_classes.store')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="stage_id" class="mr-sm-2">{{__('trans.stage_name')}} <span class="text-danger">*</span></label>
                            <select name="stage_id" class="form-control border" style="height: auto" id="stage_id" required>
                                <option selected disabled>{{__('trans.choose_from_list')}}...</option>
                                @foreach ($stages as $stage)
                                    <option value="{{$stage->id}}">{{$stage->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="class_id" class="mr-sm-2">{{__('trans.class_name')}} <span class="text-danger">*</span></label>
                            <select name="class_id" class="form-control border" style="height: auto" id="class_id" required>
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="section_id" class="mr-sm-2">{{__('trans.section_name')}} <span class="text-danger">*</span></label>
                            <select name="section_id" class="form-control border" style="height: auto" id="section_id" required>
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="topic" class="mr-sm-2">{{__('trans.class_topic')}} <span class="text-danger">*</span></label>
                            <input type="text" name="topic" class="form-control border" id="topic" required>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="class_date" class="mr-sm-2">{{__('trans.class_date')}} <span class="text-danger">*</span></label>
                            <input type="datetime-local" name="class_date" class="form-control border" id="class_date" required>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="duration" class="mr-sm-2">{{__('trans.duration')}} <span class="text-danger">*</span></label>
                            <input type="number"
                            min="5" name="duration" class="form-control border" id="duration" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">{{__('trans.submit')}}</button>
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
