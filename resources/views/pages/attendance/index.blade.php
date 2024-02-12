@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.sections_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('trans.sections_list')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{__('trans.sections_list')}}</li>
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
                <button type='button' class="button x-small" data-toggle="modal" data-target="#addModal">{{__('trans.add_new_section')}} <i class="fa fa-plus"></i></button>
                <br><br>
                <div class="accordion plus-icon shadow">
                    @forelse ($stages as $stage)
                        <div class="acd-group">
                            <a href="#" class="acd-heading">{{$stage->name}}</a>
                            <div class="acd-des">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered p-0" id="datatable">
                                        <thead class="text-nowrap">
                                            <tr>
                                                <th>{{__('trans.id')}}</th>
                                                <th>{{__('trans.class_name')}}</th>
                                                <th>{{__('trans.section_name')}}</th>
                                                <th>{{__('trans.status')}}</th>
                                                <th>{{__('trans.actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($stage->sections as $section)
                                                <tr>
                                                    <td>{{$section->id}}</td>
                                                    <td>{{$section->class->name}}</td>
                                                    <td>{{$section->name}}</td>
                                                    <td>
                                                        <h3 class="">
                                                            <span class='badge bg-{{$section->status == 1 ? "success" : "danger"}} text-white p-2'>
                                                                {{$section->status == 1 ? __('trans.active') : __('trans.disabled')}}
                                                            </span>
                                                        </h3>
                                                    </td>
                                                    <td class="d-flex">
                                                        <a href='{{route('attendance.show', $section->id)}}' class="btn btn-warning btn-sm m-1">{{__('trans.students_list')}}</a>
                                                    </td>
                                                </tr>
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
                    @empty
                        <h3 class="text-muted shadow p-2 text-center">{{__('trans.no_data_available')}}</h3>
                    @endforelse 
                </div>
            </div>
        </div>
    </div>
    {{-- @include('pages.sections.add') --}}
</div>
<!-- row closed -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('select[name="stage_id"]').on('change', function(){
                var stage_id = $(this).val();
                if(stage_id){
                    $.ajax({
                        url: "{{URL::to('get_stage_classes')}}/" + stage_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data){
                            $('select[name="class_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>')
                            })
                        }
                    })
                }else{
                    console.log('AJAX LOAD DID NOT WORK SUCCESSFULLY!');
                }
            })
        });
    </script>
@endsection
