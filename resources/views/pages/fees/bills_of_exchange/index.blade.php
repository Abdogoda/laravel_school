@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.bills_of_exchange_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.bills_of_exchange_list')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.bills_of_exchange_list')}}</li>
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
                    <a href='{{route('bills_of_exchange.create')}}' class="button x-small">{{__('trans.add_new_bill_of_exchange')}}</a>
                    <br><br>
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>{{__('trans.id')}}</th>
                                            <th>{{__('trans.student_name')}}</th>
                                            <th>{{__('trans.cost')}}</th>
                                            <th>{{__('trans.time')}}</th>
                                            <th>{{__('trans.notes')}}</th>
                                            <th>{{__('trans.actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($bills_of_exchange as $bill_of_exchange)
                                            <tr>
                                            <td>{{$bill_of_exchange->id}}</td>
                                            <td><a href="{{route('students.show',$bill_of_exchange->student_id)}}">{{$bill_of_exchange->student->name}}</a></td>
                                            <td>${{number_format($bill_of_exchange->amount, 2)}}</td>
                                            <td>{{$bill_of_exchange->created_at->diffForHumans()}}</td>
                                            <td>{{$bill_of_exchange->notes}}</td>
                                                <td>
                                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-{{$bill_of_exchange->id}}-Modal"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{$bill_of_exchange->id}}-Modal"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @include('pages.fees.bills_of_exchange.edit')
                                            @include('pages.fees.bills_of_exchange.delete')
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