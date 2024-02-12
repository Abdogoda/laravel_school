@extends('layouts.master')
@section('css')
@livewireStyles
@endsection

@section('title')
{{__('trans.quiz')}}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title mb-3">
 <div class="row">
  <div class="col-sm-6">
   <h3 class="mb-1"> {{__('trans.quiz')}} ({{$quiz->name}})</h3>
  </div>
  <div class="col-sm-6">
   <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('student_quizzes.index')}}" class="default-color">{{__('trans.quizzes_list')}}</a></li>
    <li class="breadcrumb-item active">{{__('trans.quiz')}} ({{$quiz->name}})</li>
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
        <br><br>
        @livewire('quiz-create', ['quiz' => $quiz])
    </div>
</div>

<!-- row closed -->
@endsection
@section('js')
@livewireScripts
@endsection