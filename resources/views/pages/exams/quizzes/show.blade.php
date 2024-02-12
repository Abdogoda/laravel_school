@extends('layouts.master')
@section('css')

@section('title')
{{$quiz->name}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">
             {{$quiz->name}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}" class="default-color">{{__('trans.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('quizzes.index')}}" class="default-color">{{__('trans.quizzes_list')}}</a></li>
                <li class="breadcrumb-item active">{{$quiz->name}}</li>
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
             <button type='button' class="button x-small" data-toggle="modal" data-target="#edit-{{$quiz->id}}-Modal">{{__('trans.edit_quiz')}} <i class="fa fa-edit"></i></button>
             <button type='button' class="button red x-small" data-toggle="modal" data-target="#delete-{{$quiz->id}}-Modal">{{__('trans.delete_quiz')}} <i class="fa fa-trash"></i></button><br><br>
             <p><b>{{__('trans.quiz_name_arabic')}}</b>: {{$quiz->getTranslation('name', 'ar')}}</p>
             <p><b>{{__('trans.quiz_name_english')}}</b>: {{$quiz->getTranslation('name', 'en')}}</p>
             <p><b>{{__('trans.teacher_name')}}</b>: {{$quiz->teacher->name}}</p>
             <p><b>{{__('trans.subject')}}</b>: {{$quiz->subject->name}}</p>
             <p><b>{{__('trans.stage')}}</b>: {{$quiz->stage->name}}</p>
             <p><b>{{__('trans.class')}}</b>: {{$quiz->class->name}}</p>
             <p><b>{{__('trans.section')}}</b>: {{$quiz->section->name}}</p>
             <br><br><hr><br><br>
                <button type='button' class="button x-small" data-toggle="modal" data-target="#addModal">{{__('trans.add_new_question')}}</button>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered p-0" id="datatable">
                        <thead class="text-nowrap">
                            <tr>
                                <th>{{__('trans.id')}}</th>
                                <th>{{__('trans.quiz_name')}}</th>
                                <th>{{__('trans.question_name')}}</th>
                                <th>{{__('trans.answers')}}</th>
                                <th>{{__('trans.right_answer')}}</th>
                                <th>{{__('trans.score')}}</th>
                                <th>{{__('trans.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($quiz->questions as $question)
                                <tr>
                                    <td class="align-top">{{$question->id}}</td>
                                    <td class="align-top">{{$question->quiz->name}}</td>
                                    <td class="align-top">{{$question->name}}</td>
                                    <td class="align-top">
                                        <ul>
                                            @forelse ($question->answers as $answer)
                                                <li>{{$answer->text}}</li>
                                            @empty
                                                <li>---------------NONE---------------</li>
                                            @endforelse
                                        </ul>
                                    </td>
                                    <td class="align-top text-success">{{$question->answers()->where('status', '1')->first()->text}}</td>
                                    <td class="align-top">{{$question->score}}</td>
                                    <td class="d-flex">
                                        <button type='button' class="btn btn-success btn-sm m-1" data-toggle="modal" data-target="#edit-{{$question->id}}-Modal">{{__('trans.edit')}} <i class="fa fa-edit"></i></button>
                                        <button type='button' class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#delete-{{$question->id}}-Modal">{{__('trans.delete')}} <i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @include('pages.exams.quizzes.questions.edit')
                                @include('pages.exams.quizzes.questions.delete')
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
    @include('pages.exams.quizzes.questions.add')
    @include('pages.exams.quizzes.edit')
    @include('pages.exams.quizzes.delete')
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
