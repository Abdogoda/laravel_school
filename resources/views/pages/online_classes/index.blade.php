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
                <a href='{{route('online_classes.create')}}' class="button x-small">{{__('trans.add_new_online_class')}}</a>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered p-0" id="datatable">
                        <thead class="text-nowrap">
                            <tr>
                                <th class="table-info">{{__('trans.id')}}</th>
                                <th class="table-info">{{__('trans.stage')}}</th>
                                <th class="table-info">{{__('trans.class')}}</th>
                                <th class="table-info">{{__('trans.section')}}</th>
                                <th class="table-info">{{__('trans.teacher_name')}}</th>
                                <th class="table-info">{{__('trans.class_topic')}}</th>
                                <th class="table-info">{{__('trans.start_date')}}</th>
                                <th class="table-info">{{__('trans.duration')}}</th>
                                <th class="table-info">{{__('trans.class_link')}}</th>
                                <th class="table-info">{{__('trans.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($online_classes as $online_class)
                                <tr>
                                    <td>{{$online_class->id}}</td>
                                    <td>{{$online_class->name}}</td>
                                    <td>{{$online_class->stage->name}}</td>
                                    <td>{{$online_class->class->name}}</td>
                                    <td>{{$online_class->section->name}}</td>
                                    <td>{{$online_class->teacher->name}}</td>
                                    <td>{{$online_class->topic}}</td>
                                    <td>{{$online_class->start_at}}</td>
                                    <td>{{$online_class->duration}}</td>
                                    <td class="d-flex">
                                        <button type='button' class="btn btn-success btn-sm m-1" data-toggle="modal" data-target="#edit-{{$online_class->id}}-Modal">{{__('trans.edit')}} <i class="fa fa-edit"></i></button>
                                        <button type='button' class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#delete-{{$online_class->id}}-Modal">{{__('trans.delete')}} <i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @include('pages.online_classes.delete')
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center"><b>{{__('trans.no_data_available')}}</b></td>
                                </tr>
                            @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@endsection
