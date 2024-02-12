@extends('layouts.master')
@section('css')
@endsection

@section('title')
{{$student->gender->title == 'male' ? __('trans.my_son') : __('trans.my_daughter')}} ({{$student->name}})
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
 <div class="row">
  <div class="col-sm-6">
   <h4 class="mb-0">{{$student->gender->title == 'male' ? __('trans.my_son') : __('trans.my_daughter')}} ({{$student->name}})</h4>
  </div>
  <div class="col-sm-6">
   <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('my_children')}}" class="default-color">{{__('trans.my_children')}}</a></li>
    <li class="breadcrumb-item active">{{$student->gender->title == 'male' ? __('trans.my_son') : __('trans.my_daughter')}} ({{$student->name}})</li>
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
 <div class="col-md-12 mb-30">
  <div class="card card-statistics h-100">
   <div class="card-body">
    <h5>{{__('trans.attendance_report')}} ({{$student->name}})</h5>
    <div class="table-responsive">
     <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
         <thead>
         <tr>
             <th>{{__('trans.stage')}}</th>
             <th>{{__('trans.class')}}</th>
             <th>{{__('trans.section')}}</th>
             <th class="alert-success">{{__('trans.date')}}</th>
             <th class="alert-warning">{{__('trans.status')}}</th>
         </tr>
         </thead>
         <tbody>
         @foreach($student->attendance as $attendance)
             <tr>
                <td>{{$attendance->stage->name}}</td>
                <td>{{$attendance->class->name}}</td>
                <td>{{$attendance->section->name}}</td>
                <td>{{$attendance->date}}</td>
                <td>
                    @if($attendance->status == 0)
                        <span class="btn-danger">{{__('trans.absence')}}</span>
                    @else
                        <span class="btn-success">{{__('trans.presence')}}</span>
                    @endif
                </td>
             </tr>
         @endforeach
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