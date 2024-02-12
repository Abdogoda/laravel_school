@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.graduated_students')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.graduated_students')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('students.index')}}" class="default-color">{{__('trans.students_list')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.graduated_students')}}</li>
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
                                <a href="{{route('graduated.create')}}" class="button">{{__('trans.add_new_graduate')}}</a>
                                <div class="table-responsive mt-4">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>{{__('trans.id')}}</th>
                                                <th>{{__('trans.student_name')}}</th>
                                                <th>{{__('trans.email')}}</th>
                                                <th>{{__('trans.stage')}}</th>
                                                <th>{{__('trans.class_name')}}</th>
                                                <th>{{__('trans.section_name')}}</th>
                                                <th>{{__('trans.actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($graduated as $student)
                                            <tr>
                                                <td>{{$student->id}}</td>
                                                <td><a href="{{route('students.show', $student->id)}}">{{$student->name}}</a></td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student->stage->name}}</td>
                                                <td>{{$student->class->name}}</td>
                                                <td>{{$student->section->name}}</td>
                                                <td class="d-flex">
                                                    <button type="button" class="btn btn-success btn-sm m-1" data-toggle="modal" data-target="#back-{{ $student->id }}">{{__('trans.back')}}</button>
                                                    <button type="button" class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#delete-{{ $student->id }}">{{__('trans.delete_student')}}</button>
                                                </td>
                                            </tr>
                                            @include('pages.students.graduated.back')
                                            @include('pages.students.graduated.delete')
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
    <!-- row closed -->
@endsection
@section('js')
@endsection