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
   <p class="text-muted">{{__('trans.welcome_teacher_dashboard')}} <b class="text-success">{{auth()->user()->name}}</b></p>
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
<!-- row -->
<div class="row">
 <div class="col-lg-6 col-md-6 mb-30">
  <div class="card card-statistics h-100">
   <div class="card-body">
    <div class="clearfix">
     <div class="float-left">
      <span class="text-success">
       <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
      </span>
     </div>
     <div class="float-right text-right">
      <p class="card-text text-dark">{{__('trans.students_count')}}</p>
      <h4>{{$data['teacher_students']->count()}}</h4>
     </div>
    </div>
    <p class="text-muted pt-3 mb-0 mt-2 border-top">
     <i class="fa fa-binoculars mr-1" aria-hidden="true"></i> <a href="{{route('teacher_students.index')}}">{{__('trans.view_details')}}</a>
    </p>
   </div>
  </div>
 </div>
 <div class="col-lg-6 col-md-6 mb-30">
  <div class="card card-statistics h-100">
   <div class="card-body">
    <div class="clearfix">
     <div class="float-left">
      <span class="text-primary">
       <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
      </span>
     </div>
     <div class="float-right text-right">
      <p class="card-text text-dark">{{__('trans.sections_count')}}</p>
      <h4>{{$data['teacher_sections']->count()}}</h4>
     </div>
    </div>
    <p class="text-muted pt-3 mb-0 mt-2 border-top">
      <i class="fa fa-binoculars mr-1" aria-hidden="true"></i> <a href="{{route('teacher_sections.index')}}">{{__('trans.view_details')}}</a>
    </p>
   </div>
  </div>
 </div>
</div>
<!-- Orders Status widgets-->
<div class="row">
  <div  style="min-height: 400px;" class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">
            <div class="tab nav-border" style="position: relative;">
                <div class="d-flex flex-column flex-md-row flex-wrap align-items-center justify-content-between">
                    <div class="w-100">
                        <h5 style="font-family: 'Cairo', sans-serif" class="card-title">{{__('trans.lateast_operation_on_system')}}</h5>
                    </div>
                    <div class="d-flex nav-tabs-custom">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="students_table-tab" data-toggle="tab" href="#students_table" role="tab" aria-controls="students_table" aria-selected="true">{{__('trans.students')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="teachers_table-tab" data-toggle="tab" href="#teachers_table" role="tab" aria-controls="teachers_table" aria-selected="false">{{__('trans.teachers')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="gardians_table-tab" data-toggle="tab" href="#gardians_table" role="tab" aria-controls="gardians_table" aria-selected="false">{{__('trans.gardians')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    {{--students Table--}}
                    <div class="tab-pane fade active show" id="students_table" role="tabpanel" aria-labelledby="students_table-tab">
                        <div class="table-responsive mt-15">
                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                <thead>
                                <tr class="table-info">
                                    <th>#</th>
                                    <th>{{__('trans.student_name')}}</th>
                                    <th>{{__('trans.email')}}</th>
                                    <th>{{__('trans.gender')}}</th>
                                    <th>{{__('trans.stage')}}</th>
                                    <th>{{__('trans.class')}}</th>
                                    <th>{{__('trans.section')}}</th>
                                    <th>{{__('trans.added_date')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><a href="{{route('students.show', $student->id)}}">{{$student->name}}</a></td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->gender->title}}</td>
                                            <td>{{$student->stage->name}}</td>
                                            <td>{{$student->class->name}}</td>
                                            <td>{{$student->section->name}}</td>
                                            <td class="text-success">{{$student->created_at}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--teachers Table--}}
                    <div class="tab-pane fade" id="teachers_table" role="tabpanel" aria-labelledby="teachers_table-tab">
                        <div class="table-responsive mt-15">
                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                <thead>
                                <tr class="table-info">
                                    <th>#</th>
                                    <th>{{__('trans.teacher_name')}}</th>
                                    <th>{{__('trans.gender')}}</th>
                                    <th>{{__('trans.joining_date')}}</th>
                                    <th>{{__('trans.specialization')}}</th>
                                    <th>{{__('trans.added_date')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$teacher->name}}</td>
                                            <td>{{$teacher->gender->title}}</td>
                                            <td>{{$teacher->joining_date}}</td>
                                            <td>{{$teacher->specialization->title}}</td>
                                            <td class="text-success">{{$teacher->created_at}}</td>
                                          </tr>
                                    @empty
                                        <tr>
                                            <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--parents Table--}}
                    <div class="tab-pane fade" id="gardians_table" role="tabpanel" aria-labelledby="gardians_table-tab">
                        <div class="table-responsive mt-15">
                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                <thead>
                                    <tr class="table-info">
                                        <th>#</th>
                                        <th>{{__('trans.gardian_name')}}</th>
                                        <th>{{__('trans.student_name')}}</th>
                                        <th>{{__('trans.relationship')}}</th>
                                        <th>{{__('trans.email')}}</th>
                                        <th>{{__('trans.national_id')}}</th>
                                        <th>{{__('trans.phone')}}</th>
                                        <th>{{__('trans.added_date')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse(\App\Models\Gardian::latest()->take(5)->get() as $gardian)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$gardian->name}}</td>
                                            <td><a href="{{route('students.show', $gardian->student_id)}}">{{$gardian->student->name}}</a></td>
                                            <td>{{$gardian->relationship->title}}</td>
                                            <td>{{$gardian->email}}</td>
                                            <td>{{$gardian->national_id}}</td>
                                            <td>{{$gardian->phone}}</td>
                                            <td class="text-success">{{$gardian->created_at}}</td>
                                          </tr>
                                    @empty
                                        <tr>
                                            <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                        </tr>  
                                    @endforelse
                                </tbody>
                            </table>
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