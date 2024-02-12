@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.students_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4>{{__('trans.students_list')}}</h4>
            <h6 class="text-danger">{{__('trans.todays_date')}} :{{date('Y-m-d')}}</h6>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.students_list')}}</li>
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
                <form action="{{route('attendance.store')}}" method="POST">
                @csrf
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered p-0" id="datatable">
                        <thead class="text-nowrap table-info">
                            <tr>
                                <th>{{__('trans.id')}}</th>
                                <th>{{__('trans.student_name')}}</th>
                                <th>{{__('trans.email')}}</th>
                                <th>{{__('trans.gender')}}</th>
                                <th>{{__('trans.religion')}}</th>
                                <th>{{__('trans.stage')}}</th>
                                <th>{{__('trans.class')}}</th>
                                <th>{{__('trans.section')}}</th>
                                <th>{{__('trans.show')}}</th>
                                <th>{{__('trans.attendance')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td><a href="{{route('teacher_students.show', $student->id)}}">{{$student->name}}</a></td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->gender->title}}</td>
                                    <td>{{$student->religion->name}}</td>
                                    <td>{{$student->stage->name}}</td>
                                    <td>{{$student->class->name}}</td>
                                    <td>{{$student->section->name}}</td>
                                    <td><a href="{{route('teacher_students.show', $student->id)}}" class="btn btn-sm btn-success">{{__('trans.show')}} <i class="fa fa-eye"></i></a></td>
                                    <td class="d-flex">
                                        @if (isset($student->attendance()->where('date', date('Y-m-d'))->first()->student_id))
                                            <?php $status = $student->attendance()->where('date', date('Y-m-d'))->first()->status ?>
                                        @else
                                            <?php $status = "no" ?>
                                        @endif
                                        <label for="attendance-{{$student->id}}-presence" class="block text-gray-500 font-semibold sm:border-r sm:pr:4 m-1">
                                            <input type="radio" name="attendances[{{$student->id}}]" id="attendance-{{$student->id}}-presence" value="presence" class="leading-tight" {{$status == 1 ? "checked" : ""}}>
                                            <span class="text-success">{{__('trans.presence')}}</span>
                                        </label>
                                        <label for="attendance-{{$student->id}}-absence" class="block text-gray-500 font-semibold sm:border-r sm:pr:4 m-1">
                                            <input type="radio" name="attendances[{{$student->id}}]" id="attendance-{{$student->id}}-absence" value="absence" class="leading-tight" {{$status == 0 ? "checked" : ""}}>
                                            <span class="text-danger">{{__('trans.absence')}}</span>
                                        </label>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center"><b>{{__('trans.no_data_available')}}</b></td>
                                </tr>
                            @endforelse 
                        </tbody>
                    </table>
                    </div>
                    <br>
                    <button class="button" type="submit">{{__('trans.submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
