@extends('layouts.master')
@section('css')

@section('title')
{{__('trans.quizzes_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title mb-3">
 <div class="row">
  <div class="col-sm-6">
   <h3 class="mb-1"> {{__('trans.quizzes_list')}}</h3>
  </div>
  <div class="col-sm-6">
   <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
    <li class="breadcrumb-item active">{{__('trans.quizzes_list')}}</li>
</ol>
  </div>
 </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
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
             <div class="table-responsive">
                 <table class="table table-striped table-bordered p-0" id="datatable">
                     <thead class="text-nowrap">
                         <tr>
                             <th>{{__('trans.id')}}</th>
                             <th>{{__('trans.subject_name')}}</th>
                             <th>{{__('trans.teacher_name')}}</th>
                             <th>{{__('trans.quiz_name')}}</th>
                             <th>{{__('trans.score_enter_quiz')}}</th>
                         </tr>
                     </thead>
                     <tbody>
                         @forelse ($quizzes as $quiz)
                             <tr>
                                 <td>{{$quiz->id}}</td>
                                 <td>{{$quiz->subject->name}}</td>
                                 <td>{{$quiz->teacher->name}}</td>
                                 <td>{{$quiz->name}}</td>
                                 <td>
                                  <a href="{{route('student_quizzes.show', $quiz->id)}}" class="btn btn-sm btn-success">{{__('trans.start_quiz')}} <i class="fas fa-person-booth"></i></a>
                                 </td>
                             </tr>
                         @empty
                             <tr>
                                 <td colspan="7" class="text-center"><b>{{__('trans.no_data_available')}}</b></td>
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

@endsection