@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.students_promotion_management')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.students_promotion_management')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('students.index')}}" class="default-color">{{__('trans.students_list')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.students_promotion_management')}}</li>
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
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#back_all">{{__('trans.back_for_all')}}</button>
                                <div class="table-responsive mt-4">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th class="alert-secondary">{{__('trans.id')}}</th>
                                                <th class="alert-secondary">{{__('trans.student_name')}}</th>
                                                <th class="alert-danger">{{__('trans.last_stage')}}</th>
                                                <th class="alert-danger">{{__('trans.last_class')}}</th>
                                                <th class="alert-danger">{{__('trans.last_section')}}</th>
                                                <th class="alert-danger">{{__('trans.last_academic_year')}}</th>
                                                <th class="alert-success">{{__('trans.current_stage')}}</th>
                                                <th class="alert-success">{{__('trans.current_class')}}</th>
                                                <th class="alert-success">{{__('trans.current_section')}}</th>
                                                <th class="alert-success">{{__('trans.current_academic_year')}}</th>
                                                <th class="alert-secondary">{{__('trans.actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{$promotion->id}}</td>
                                                <td><a href="{{route('students.show', $promotion->student->id)}}">{{$promotion->student->name}}</a></td>
                                                <td>{{$promotion->last_stage->name}}</td>
                                                <td>{{$promotion->last_class->name}}</td>
                                                <td>{{$promotion->last_section->name}}</td>
                                                <td>{{$promotion->from_academic_year}}</td>
                                                <td>{{$promotion->current_stage->name}}</td>
                                                <td>{{$promotion->current_class->name}}</td>
                                                <td>{{$promotion->current_section->name}}</td>
                                                <td>{{$promotion->to_academic_year}}</td>
                                                <td class="d-flex">
                                                    <button type="button" class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#back-{{ $promotion->id }}">{{__('trans.back')}}<i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @include('pages.students.promotions.back')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.students.promotions.back_all')
    <!-- row closed -->
@endsection
@section('js')
@endsection