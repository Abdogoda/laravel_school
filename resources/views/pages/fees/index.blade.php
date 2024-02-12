@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.study_fees_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.study_fees_list')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.fees_list')}}</li>
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
                <a href='{{route('fees.create')}}' class="button x-small" data-toggle="modal" data-target="#addModal">{{__('trans.add_new_fee')}} <i class="fa fa-plus"></i></a>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered p-0" id="datatable">
                        <thead class="text-nowrap">
                            <tr>
                                <th>{{__('trans.id')}}</th>
                                <th>{{__('trans.fee_name')}}</th>
                                <th>{{__('trans.stage')}}</th>
                                <th>{{__('trans.class_name')}}</th>
                                <th>{{__('trans.academic_year')}}</th>
                                <th>{{__('trans.cost')}}</th>
                                <th>{{__('trans.notes')}}</th>
                                <th>{{__('trans.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($fees as $fee)
                                <tr>
                                    <td>{{$fee->id}}</td>
                                    <td>{{$fee->name}}</td>
                                    <td>{{$fee->stage->name}}</td>
                                    <td>{{$fee->class->name}}</td>
                                    <td>{{$fee->academic_year}}</td>
                                    <td>{{$fee->cost}}</td>
                                    <td>{{$fee->notes}}</td>
                                    <td class="d-flex">
                                        <button type='button' class="btn btn-primary btn-sm m-1" data-toggle="modal" data-target="#edit-{{$fee->id}}-Modal"><i class="fa fa-edit"></i></button>
                                        <button type='button' class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#delete-{{$fee->id}}-Modal"><i class="fa fa-trash"></i></button>
                                        <a href='{{route('fees.show', $fee->id)}}' class="btn btn-success btn-sm m-1" ><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                @include('pages.fees.edit')
                                @include('pages.fees.delete')
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center"><b>{{__('trans.no_data_available')}}</b></td>
                                </tr>
                            @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.fees.add')
<!-- row closed -->
@endsection
@section('js')

<script>
    $(document).ready(function () {
        $('select[name="stage_id"]').on('change', function () {
            var stage_id = $(this).val();
            if (stage_id) {
                $.ajax({
                    url: "{{ URL::to('get_stage_classes') }}/" + stage_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="class_id"]').empty();
                        $('select[name="class_id"]').append('<option selected disabled>{{trans('trans.choose_from_list')}}...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            }
            else {
                console.log('AJAX load did not work');
            }
        });
    });
    </script>

@endsection
