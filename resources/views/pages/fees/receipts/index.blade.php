@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.receipts_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.receipts_list')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.receipts_list')}}</li>
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
                    <a href='{{route('student_receipts.create')}}' class="button x-small">{{__('trans.add_new_receipt')}}</a>
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
                                        @foreach($receipts as $receipt)
                                            <tr>
                                            <td>{{$receipt->id}}</td>
                                            <td><a href="{{route('students.show',$receipt->student_id)}}">{{$receipt->student->name}}</a></td>
                                            <td>${{number_format($receipt->debit, 2)}}</td>
                                            <td>{{$receipt->created_at->diffForHumans()}}</td>
                                            <td>{{$receipt->notes}}</td>
                                                <td>
                                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-{{$receipt->id}}-Modal"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{$receipt->id}}-Modal"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @include('pages.fees.receipts.edit')
                                            @include('pages.fees.receipts.delete')
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