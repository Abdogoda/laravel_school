@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.dashboard')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title mb-3">
 <div class="row">
  <div class="col-sm-6">
   <h3 class="mb-1"> {{__('trans.dashboard')}}</h3>
   <p class="text-muted">{{__('trans.welcome_student_dashboard')}} <b class="text-success">{{auth()->user()->name}}</b></p>
  </div>
  <div class="col-sm-6">
   <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
   </ol>
  </div>
 </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

 
 <livewire:calendar/>
 
 <!-- row closed -->
@endsection
@section('js')
@stack('scripts')

@endsection