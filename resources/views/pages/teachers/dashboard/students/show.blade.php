@extends('layouts.master')
@section('css')
@section('title')
    {{__('trans.show_student')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('trans.show_student')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
             <div class="d-flex flex-wrap">
                <a href="{{route('teacher_students.index')}}" class="button m-1 mb-3">{{__('trans.students_list')}}</a>
             </div>
                <div class="tab nav-border">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                               role="tab" aria-controls="home-02"
                               aria-selected="true">{{trans('trans.student_information')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                               role="tab" aria-controls="profile-02"
                               aria-selected="false">{{trans('trans.gardians')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-03-tab" data-toggle="tab" href="#profile-03"
                               role="tab" aria-controls="profile-03"
                               aria-selected="false">{{trans('trans.attachments')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-04-tab" data-toggle="tab" href="#profile-04"
                               role="tab" aria-controls="profile-04"
                               aria-selected="false">{{trans('trans.attendance')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="home-02" role="tabpanel" aria-labelledby="home-02-tab">
                            <table class="table table-striped table-bordered table-hover" style="text-align:center">
                                <tbody>
                                   <tr>
                                       <th scope="row">{{trans('trans.student_name_arabic')}}</th>
                                       <td>{{$student->getTranslation('name', 'ar') }}</td>
                                       <th scope="row">{{trans('trans.student_name_english')}}</th>
                                       <td>{{$student->getTranslation('name', 'en') }}</td>
                                       <th scope="row">{{trans('trans.email')}}</th>
                                       <td>{{$student->email}}</td>
                                   </tr>

                                   <tr>
                                       <th scope="row">{{trans('trans.national_id')}}</th>
                                       <td>{{$student->national_id}}</td>
                                       <th scope="row">{{trans('trans.passport_id')}}</th>
                                       <td>{{$student->passport_id}}</td>
                                       <th scope="row">{{trans('trans.birth_of_date')}}</th>
                                       <td>{{$student->birth_of_date}}</td>
                                   </tr>

                                   <tr>
                                       <th scope="row">{{trans('trans.gender')}}</th>
                                       <td>{{$student->gender->title}}</td>
                                       <th scope="row">{{trans('trans.nationality')}}</th>
                                       <td>{{$student->nationality->name}}</td>
                                       <th scope="row">{{trans('trans.blood')}}</th>
                                       <td>{{$student->blood->name}}</td>
                                   </tr>

                                   <tr>
                                       <th scope="row">{{trans('trans.stage_name')}}</th>
                                       <td>{{ $student->stage->name }}</td>
                                       <th scope="row">{{trans('trans.class')}}</th>
                                       <td>{{$student->class->name}}</td>
                                       <th scope="row">{{trans('trans.section')}}</th>
                                       <td>{{$student->section->name}}</td>
                                   </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="profile-02" role="tabpanel"
                             aria-labelledby="profile-02-tab">
                            <div class="card card-statistics">
                                <table class="table center-aligned-table mb-0 table table-hover"
                                       style="text-align:center">
                                    <thead>
                                    <tr class="table-secondary">
                                        <th scope="col">#</th>
                                        <th scope="col">{{trans('trans.gardian_name')}}</th>
                                        <th scope="col">{{trans('trans.email')}}</th>
                                        <th scope="col">{{trans('trans.phone')}}</th>
                                        <th scope="col">{{trans('trans.relationship')}}</th>
                                        <th scope="col">{{trans('trans.address')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($student->gardians as $gardian)
                                        <tr style='text-align:center;vertical-align:middle'>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$gardian->name}}</td>
                                            <td>{{$gardian->email}}</td>
                                            <td>{{$gardian->phone}}</td>
                                            <td>{{$gardian->relationship->title}}</td>
                                            <td>{{$gardian->address}}</td>
                                        </tr>
                                    @empty
                                    <tr>
                                     <td class="text-muted text-center" colspan="6">{{__('trans.no_data_available')}}</td>
                                    </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile-03" role="tabpanel"
                             aria-labelledby="profile-03-tab">
                            <div class="card card-statistics">
                                <table class="table center-aligned-table mb-0 table table-hover"
                                       style="text-align:center">
                                    <thead>
                                    <tr class="table-secondary">
                                        <th scope="col">#</th>
                                        <th scope="col">{{trans('trans.attachment')}}</th>
                                        <th scope="col">{{trans('trans.created_at')}}</th>
                                        <th scope="col">{{trans('trans.actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($student->attachments as $attachment)
                                        <tr style='text-align:center;vertical-align:middle'>
                                            <td>{{$loop->iteration}}</td>
                                            <td><img src="{{asset('storage/'.$attachment->path)}}" alt="attachment-{{$attachment->id}}" width="50px"></td>
                                            <td>{{$attachment->created_at->diffForHumans()}}</td>
                                            <td colspan="2">
                                                <a class="btn btn-info btn-sm" href="{{route('download_attachment', $attachment->id)}}" role="button">{{trans('trans.download')}} <i class="fa fa-download"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                     <td colspan="4" class="text-muted text-center">{{__('trans.no_data_available')}}</td>
                                    </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile-04" role="tabpanel"
                             aria-labelledby="profile-04-tab">
                            <div class="card card-statistics p-2">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr class="table-secondary">
                                            <th scope="col">#</th>
                                            <th>{{__('trans.stage')}}</th>
                                            <th>{{__('trans.class')}}</th>
                                            <th>{{__('trans.section')}}</th>
                                            <th>{{__('trans.date')}}</th>
                                            <th>{{__('trans.status')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($student->attendance as $attendance)
                                            <tr style='text-align:center;vertical-align:middle'>
                                                <td>{{$loop->iteration}}</td>
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
                                        @empty
                                        <tr>
                                         <td class="text-muted text-center" colspan="6">{{__('trans.no_data_available')}}</td>
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
</div>
@endsection
@section('js')
@endsection