@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.subjects_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.subjects_list')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.subjects_list')}}</li>
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
                <button type='button' class="button x-small" data-toggle="modal" data-target="#addModal">{{__('trans.add_new_subject')}}</button>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered p-0" id="datatable">
                        <thead class="text-nowrap">
                            <tr>
                                <th>{{__('trans.id')}}</th>
                                <th>{{__('trans.subject_name')}}</th>
                                <th>{{__('trans.stage')}}</th>
                                <th>{{__('trans.class')}}</th>
                                <th>{{__('trans.teacher_name')}}</th>
                                <th>{{__('trans.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subjects as $subject)
                                <tr>
                                    <td>{{$subject->id}}</td>
                                    <td>{{$subject->name}}</td>
                                    <td>{{$subject->stage->name}}</td>
                                    <td>{{$subject->class->name}}</td>
                                    <td>{{$subject->teacher->name}}</td>
                                    <td class="d-flex">
                                        <button type='button' class="btn btn-success btn-sm m-1" data-toggle="modal" data-target="#edit-{{$subject->id}}-Modal">{{__('trans.edit')}} <i class="fa fa-edit"></i></button>
                                        <button type='button' class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#delete-{{$subject->id}}-Modal">{{__('trans.delete')}} <i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @include('pages.subjects.edit')
                                @include('pages.subjects.delete')
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center"><b>{{__('trans.no_data_available')}}</b></td>
                                </tr>
                            @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('pages.subjects.add')
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
@endsection
