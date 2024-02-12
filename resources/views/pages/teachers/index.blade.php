@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.teachers_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.teachers_list')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.teachers_list')}}</li>
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
                <a href='{{route('teachers.create')}}' class="button x-small">{{__('trans.add_new_teacher')}} <i class="fa fa-plus"></i></a>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered p-0" id="datatable">
                        <thead class="text-nowrap">
                            <tr>
                                <th>{{__('trans.id')}}</th>
                                <th>{{__('trans.teacher_name')}}</th>
                                <th>{{__('trans.email')}}</th>
                                <th>{{__('trans.phone')}}</th>
                                <th>{{__('trans.gender')}}</th>
                                <th>{{__('trans.joining_date')}}</th>
                                <th>{{__('trans.specialization')}}</th>
                                <th>{{__('trans.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($teachers as $teacher)
                                <tr>
                                    <td>{{$teacher->id}}</td>
                                    <td><a href="{{route('teachers.show', $teacher->id)}}">{{$teacher->name}}</a></td>
                                    <td>{{$teacher->email}}</td>
                                    <td>{{$teacher->phone}}</td>
                                    <td>{{$teacher->gender->title}}</td>
                                    <td>{{$teacher->joining_date}}</td>
                                    <td>{{$teacher->specialization->title}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('teachers.show', $teacher->id)}}" class="btn btn-success btn-sm m-1" >{{__('trans.edit')}} <i class="fa fa-edit"></i></a>
                                        <button type='button' class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#delete-{{$teacher->id}}-Modal">{{__('trans.delete')}} <i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @include('pages.teachers.delete')
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
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
