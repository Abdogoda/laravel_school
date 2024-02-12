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
   <p class="text-muted">{{__('trans.welcome_gardian_dashboard')}} <b class="text-success">{{auth()->user()->name}}</b></p>
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


<div class="row">
  <div class="col-md-12 mb-30">
      <div class="card card-statistics h-100">
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-md-3">
                <img src="{{URL::asset('assets/images/student.png')}}"/>
              </div>
              <div class="col-md-9">
                <div class="card-body">
                    <h5>{{$student->gender->title == 'male' ? __('trans.my_son') : __('trans.my_daughter')}}</h5>
                    <h3 style="font-family: 'Cairo', sans-serif" class="card-title">{{$student->name}}</h3>
                    <p class="text-muted mb-4">{{__('trans.student_information')}}</p>
                  <div>
                      <div class="d-flex justify-content-between">
                          <span>{{__('trans.stage')}}</span><span>{{$student->stage->name}}</span>
                      </div>
                      <div class="d-flex justify-content-between">
                          <span>{{__('trans.class')}}</span><span>{{$student->class->name}}</span>
                      </div>
                      <div class="d-flex justify-content-between">
                          <span>{{__('trans.section')}}</span><span>{{$student->section->name}}</span>
                      </div>

                      <div class="d-flex justify-content-between">
                      @if(\App\Models\Degree::where('student_id', $student->id)->count() == 0)
                          <span>{{__('trans.quizzes_count')}}</span><span
                              class="text-danger">{{\App\Models\Degree::where('student_id',$student->id)->count()}}</span>
                      @else
                          <span>{{__('trans.quizzes_count')}}</span><span
                              class="text-success">{{\App\Models\Degree::where('student_id',$student->id)->count()}}</span>
                      @endif
                      </div>
                  </div>
              </div>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
 
 <livewire:calendar/>
 
 <!-- row closed -->
@endsection
@section('js')
@stack('scripts')

@endsection