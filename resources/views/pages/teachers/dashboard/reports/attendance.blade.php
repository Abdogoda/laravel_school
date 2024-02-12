@extends('layouts.master')
@section('css')

@section('title')
    {{__('trans.attendance_report')}}
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.attendance_report')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.attendance_report')}}</li>
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{route('teacher_reports.attendance_search')}}" autocomplete="off">
                    @csrf
                    <h5>{{__('trans.search_informations')}}</h5><br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student">{{__('trans.students')}}</label>
                                <select class="custom-select mr-sm-2" name="student_id">
                                    <option value="0">{{__('trans.all')}}</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-body datepicker-form">
                            <div class="input-group" data-date-format="yyyy-mm-dd">
                                <span class="input-group-addon">{{__('trans.from_date')}}</span>
                                <input type="text"  class="form-control range-from date-picker-default" placeholder="{{__('trans.from_date')}}" required name="from">
                                <span class="input-group-addon">{{__('trans.to_date')}}</span>
                                <input class="form-control range-to date-picker-default" placeholder="{{__('trans.to_date')}}" type="text" required name="to">
                            </div>
                        </div>
                    </div>
                    <button class="button" type="submit">{{trans('trans.submit')}}</button>
                </form>
                @isset($students_report)
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                            <thead>
                            <tr>
                                <th>{{__('trans.id')}}</th>
                                <th>{{__('trans.student_name')}}</th>
                                <th>{{__('trans.email')}}</th>
                                <th>{{__('trans.gender')}}</th>
                                <th>{{__('trans.religion')}}</th>
                                <th>{{__('trans.stage')}}</th>
                                <th>{{__('trans.class')}}</th>
                                <th>{{__('trans.section')}}</th>
                                <th class="alert-success">{{__('trans.date')}}</th>
                                <th class="alert-warning">{{__('trans.status')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students_report as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                        <td><a href="{{route('teacher_students.show', $student->student->id)}}">{{$student->student->name}}</a></td>
                                        <td>{{$student->student->email}}</td>
                                        <td>{{$student->student->gender->title}}</td>
                                        <td>{{$student->student->religion->name}}</td>
                                        <td>{{$student->stage->name}}</td>
                                        <td>{{$student->class->name}}</td>
                                        <td>{{$student->section->name}}</td>
                                        <td>{{$student->date}}</td>
                                    <td>

                                        @if($student->status == 0)
                                            <span class="btn-danger">{{__('trans.absence')}}</span>
                                        @else
                                            <span class="btn-success">{{__('trans.presence')}}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @endisset

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection