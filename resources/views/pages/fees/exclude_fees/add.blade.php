@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.add_new_exclude_fee')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.add_new_exclude_fee')}} @isset ($student_info) ( <a href="{{route('students.show', $student_info->id)}}">{{$student_info->name}}</a> ) @endisset</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('exclude_fees.index')}}" class="default-color">{{__('trans.exclude_fees_list')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.add_new_exclude_fee')}}</li>
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
                <a href='{{route('exclude_fees.index')}}' class="button x-small">{{__('trans.exclude_fees_list')}}</a>
                <br><br>
                <form class="row" action="{{ route('exclude_fees.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="student_id" class="mr-sm-2">{{ trans('trans.student_name') }}</label>
                                <select name="student_id" id="student_id" class="form-control border" required style="height: auto">
                                    @isset ($student_info)
                                        <option selected value="{{$student_info->id}}">{{$student_info->name}} {{" "}} ({{number_format($student_info->accounts->sum('debit') - $student_info->accounts->sum('credit'), 2)}}$)</option>
                                    @else
                                        <option selected disabled>{{__('trans.choose_from_list')}}...</option>
                                        @foreach ($students as $student)
                                            <option value="{{$student->id}}">{{$student->name}}  {{" "}}  ({{number_format($student->accounts->sum('debit') - $student->accounts->sum('credit'), 2)}}$)</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cost" class="mr-sm-2">{{ trans('trans.cost') }}</label>
                                <input type="number" name="cost" id="cost" class="form-control border" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="notes" class="mr-sm-2">{{ trans('trans.notes') }}</label>
                                <input type="text" name="notes" id="notes" class="form-control border">
                            </div>
                        </div>
                        <div class="row mt-20 mb-20">
                            <div class="col-12">
                                <button type="submit" class="button">{{ trans('trans.add_new_exclude_fee') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')


@endsection
