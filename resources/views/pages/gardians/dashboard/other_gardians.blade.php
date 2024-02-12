@extends('layouts.master')
@section('css')
@endsection

@section('title')
{{__('trans.gardians_list')}}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
 <div class="row">
     <div class="col-sm-6">
         <h4 class="mb-0">{{__('trans.gardians_list')}}</h4>
     </div>
     <div class="col-sm-6">
         <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
             <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
             <li class="breadcrumb-item active">{{__('trans.gardians_list')}}</li>
         </ol>
     </div>
 </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
 <div class="col-md-12 mb-30">
     <div class="card card-statistics h-100">
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-striped table-bordered p-0" id="datatable">
                     <thead class="text-nowrap">
                         <tr>
                             <th>{{__('trans.id')}}</th>
                             <th>{{__('trans.gardian_name')}}</th>
                             <th>{{__('trans.student_name')}}</th>
                             <th>{{__('trans.email')}}</th>
                             <th>{{__('trans.phone')}}</th>
                             <th>{{__('trans.gender')}}</th>
                             <th>{{__('trans.relationship')}}</th>
                         </tr>
                     </thead>
                     <tbody>
                         @forelse ($gardians as $gardian)
                             <tr>
                                 <td>{{$gardian->id}}</td>
                                 <td>{{$gardian->name}}</td>
                                 <td>{{$gardian->student->name}}</td>
                                 <td>{{$gardian->email}}</td>
                                 <td>{{$gardian->phone}}</td>
                                 <td>{{$gardian->gender->title}}</td>
                                 <td>{{$gardian->relationship->title}}</td>
                             </tr>
                         @empty
                             <tr>
                                 <td colspan="6" class="text-center"><b>{{__('trans.no_data_available')}}</b></td>
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
@stack('scripts')

@endsection