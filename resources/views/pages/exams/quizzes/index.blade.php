@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.quizzes_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.quizzes_list')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.quizzes_list')}}</li>
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
                <button type='button' class="button x-small" data-toggle="modal" data-target="#addModal">{{__('trans.add_new_quiz')}}</button>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered p-0" id="datatable">
                        <thead class="text-nowrap">
                            <tr>
                                <th>{{__('trans.id')}}</th>
                                <th>{{__('trans.quiz_name')}}</th>
                                <th>{{__('trans.teacher_name')}}</th>
                                <th>{{__('trans.subject')}}</th>
                                <th>{{__('trans.stage')}}</th>
                                <th>{{__('trans.class')}}</th>
                                <th>{{__('trans.section')}}</th>
                                <th>{{__('trans.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($quizzes as $quiz)
                                <tr>
                                    <td>{{$quiz->id}}</td>
                                    <td>{{$quiz->name}}</td>
                                    <td><a href="{{route('quizzes.show', $quiz->id)}}">{{$quiz->teacher->name}}</a></td>
                                    <td>{{$quiz->subject->name}}</td>
                                    <td>{{$quiz->stage->name}}</td>
                                    <td>{{$quiz->class->name}}</td>
                                    <td>{{$quiz->section->name}}</td>
                                    <td class="d-flex">
                                        <button type='button' class="btn btn-primary btn-sm m-1" data-toggle="modal" data-target="#edit-{{$quiz->id}}-Modal">{{__('trans.edit')}} <i class="fa fa-edit"></i></button>
                                        <a href='{{route('quizzes.show', $quiz->id)}}' class="btn btn-success btn-sm m-1" >{{__('trans.show')}} <i class="fa fa-eye"></i></a>
                                        <button type='button' class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#delete-{{$quiz->id}}-Modal">{{__('trans.delete')}} <i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @include('pages.exams.quizzes.edit')
                                @include('pages.exams.quizzes.delete')
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center"><b>{{__('trans.no_data_available')}}</b></td>
                                </tr>
                            @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('pages.exams.quizzes.add')
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
