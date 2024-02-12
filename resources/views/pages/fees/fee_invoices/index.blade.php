@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.fee_invoices_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.fee_invoices_list')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.fee_invoices_list')}}</li>
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
                    <a href='{{route('fee_invoices.create')}}' class="button x-small">{{__('trans.add_new_fee_invoice')}}</a>
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
                                            <th>{{__('trans.stage')}}</th>
                                            <th>{{__('trans.class')}}</th>
                                            <th>{{__('trans.fee_name')}}</th>
                                            <th>{{__('trans.cost')}}</th>
                                            <th>{{__('trans.time')}}</th>
                                            <th>{{__('trans.notes')}}</th>
                                            <th>{{__('trans.actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($fee_invoices as $fee_invoice)
                                            <tr>
                                            <td>{{$fee_invoice->id}}</td>
                                            <td><a href="{{route('students.show',$fee_invoice->student_id)}}">{{$fee_invoice->student->name}}</a></td>
                                            <td>{{$fee_invoice->stage->name}}</td>
                                            <td>{{$fee_invoice->class->name}}</td>
                                            <td>{{$fee_invoice->fee->name}}</td>
                                            <td>${{number_format($fee_invoice->fee_amount, 2)}}</td>
                                            <td>{{$fee_invoice->created_at->diffForHumans()}}</td>
                                            <td>{{$fee_invoice->notes}}</td>
                                                <td>
                                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-{{$fee_invoice->id}}-Modal"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{$fee_invoice->id}}-Modal"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @include('pages.fees.fee_invoices.edit')
                                            @include('pages.fees.fee_invoices.delete')
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