@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.add_new_fee_invoice')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.add_new_fee_invoice')}} @isset ($student_info) ( {{$student_info->name}} ) @endisset</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('fee_invoices.index')}}" class="default-color">{{__('trans.fee_invoices_list')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.add_new_fee_invoice')}}</li>
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
                <a href='{{route('fee_invoices.index')}}' class="button x-small">{{__('trans.fee_invoices_list')}}</a>
                <br><br>
                <form class="row" action="{{ route('fee_invoices.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="list_fee_invoices">
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="student_id" class="mr-sm-2">{{ trans('trans.student_name') }}</label>
                                            <select name="student_id" id="student_id" class="custom-select border" required>
                                                @isset ($student_info)
                                                    <option selected value="{{$student_info->id}}">{{$student_info->name}}</option>
                                                @else
                                                    <option selected disabled>{{__('trans.choose_from_list')}}...</option>
                                                    @foreach ($students as $student)
                                                        <option value="{{$student->id}}">{{$student->name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="fee_id" class="mr-sm-2">{{ trans('trans.fee_name') }}</label>
                                            <select name="fee_id" id="fee_id" class="custom-select border" required>
                                                <option selected disabled>{{__('trans.choose_from_list')}}...</option>
                                                @foreach ($fees as $fee)
                                                    <option value="{{$fee->id}}">{{$fee->name}} (${{$fee->cost}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="delete_row" class="mr-sm-2">{{ trans('trans.actions') }}</label>
                                            <input class="btn btn-danger btn-block" id="delete_row"  data-repeater-delete
                                            type="button" value="{{ trans('trans.delete_row') }}" />
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="notes" class="mr-sm-2">{{ trans('trans.notes') }}</label>
                                            <input type="text" name="notes" id="notes" class="form-control border">
                                        </div>
                                    </div>
                                    <hr>
                                    <hr>
                                </div>
                            </div>
                            <div class="row mt-20 mb-20">
                                <div class="col-12">
                                    <input class="button black" data-repeater-create type="button" value="{{ trans('trans.add_row') }}"/>
                                    <button type="submit" class="button">{{ trans('trans.submit') }}</button>
                                </div>
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
