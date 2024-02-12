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
            <h4 class="mb-0">{{__('trans.students_list')}}</h4>
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
                <a href='{{route('students.create')}}' class="button x-small">{{__('trans.add_new_student')}} <i class="fa fa-plus"></i></a>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered p-0" id="datatable">
                        <thead class="text-nowrap">
                            <tr>
                                <th>{{__('trans.id')}}</th>
                                <th>{{__('trans.student_name')}}</th>
                                <th>{{__('trans.email')}}</th>
                                <th>{{__('trans.gender')}}</th>
                                <th>{{__('trans.religion')}}</th>
                                <th>{{__('trans.stage')}}</th>
                                <th>{{__('trans.class')}}</th>
                                <th>{{__('trans.section')}}</th>
                                <th>{{__('trans.academic_year')}}</th>
                                <th>{{__('trans.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td><a href="{{route('students.show', $student->id)}}">{{$student->name}}</a></td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->gender->title}}</td>
                                    <td>{{$student->religion->name}}</td>
                                    <td>{{$student->stage->name}}</td>
                                    <td>{{$student->class->name}}</td>
                                    <td>{{$student->section->name}}</td>
                                    <td>{{$student->academic_year}}</td>
                                    <td>
                                        <div>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown">{{__('trans.actions')}}</button>
                                                <ul class="dropdown-menu">
                                                  <li><a href="{{route('students.show', $student->id)}}" class="dropdown-item"><i class="fa fa-eye text-info"></i> {{__('trans.show_student')}}</a></li>
                                                  <li><a href="{{route('students.edit', $student->id)}}" class="dropdown-item"><i class="fa fa-edit text-primary"></i> {{__('trans.edit_student')}}</a></li>
                                                  <li><button type='button' class="dropdown-item" data-toggle="modal" data-target="#delete-{{$student->id}}-Modal"><i class="fa fa-trash text-danger"></i> {{__('trans.delete_student')}}</button></li>
                                                  <li><hr class="dropdown-divider"></li>
                                                  <li><a href="{{url('fee_invoices/create/'. $student->id)}}" class="dropdown-item"><span class="text-secondary">$+</span> {{__('trans.add_fee')}}</a></li>
                                                  <li><a href="{{url('student_receipts/create/'. $student->id)}}" class="dropdown-item"><span class="text-dark">$-</span> {{__('trans.add_new_receipt')}}</a></li>
                                                  <li><a href="{{url('exclude_fees/create/'. $student->id)}}" class="dropdown-item"><span class="text-success">$*</span> {{__('trans.add_new_exclude_fee')}}</a></li>
                                                  <li><a href="{{url('bills_of_exchange/create/'. $student->id)}}" class="dropdown-item"><i class="fa fa-money text-warning"></i> {{__('trans.add_new_bill_of_exchange')}}</a></li>
                                                </ul>
                                              </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('pages.students.delete')
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center"><b>{{__('trans.no_data_available')}}</b></td>
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
