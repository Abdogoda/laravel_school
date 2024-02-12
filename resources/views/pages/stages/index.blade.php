@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.stages_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.stages_list')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.stages_list')}}</li>
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
                <button type='button' class="button x-small" data-toggle="modal" data-target="#addModal">{{__('trans.add_new_stage')}}</button>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered p-0" id="datatable">
                        <thead class="text-nowrap">
                            <tr>
                                <th>{{__('trans.id')}}</th>
                                <th>{{__('trans.stage_name')}}</th>
                                <th>{{__('trans.notes')}}</th>
                                <th>{{__('trans.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stages as $stage)
                                <tr>
                                    <td>{{$stage->id}}</td>
                                    <td>{{$stage->name}}</td>
                                    <td>{{$stage->notes}}</td>
                                    <td class="d-flex">
                                        <button type='button' class="btn btn-success btn-sm m-1" data-toggle="modal" data-target="#edit-{{$stage->id}}-Modal">{{__('trans.edit')}} <i class="fa fa-edit"></i></button>
                                        <button type='button' class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#delete-{{$stage->id}}-Modal">{{__('trans.delete')}} <i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @include('pages.stages.edit')
                                @include('pages.stages.delete')
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center"><b>{{__('trans.no_data_available')}}</b></td>
                                </tr>
                            @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('pages.stages.add')
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
