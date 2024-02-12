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
                <a href="{{route('students.index')}}" class="button m-1 mb-3">{{__('trans.students_list')}}</a>
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
                        <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                             aria-labelledby="home-02-tab">
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
                            <br><br>
                            <h3>{{__('trans.actions')}}</h3>
                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{route('students.show', $student->id)}}" class="button m-1"><i class="fa fa-eye"></i> {{__('trans.show_student')}}</a>
                                <a href="{{route('students.edit', $student->id)}}" class="button m-1"><i class="fa fa-edit"></i> {{__('trans.edit_student')}}</a>
                                <button type='button' class="button m-1" data-toggle="modal" data-target="#delete-{{$student->id}}-Modal"><i class="fa fa-trash"></i> {{__('trans.delete_student')}}</button>
                                <a href="{{url('fee_invoices/create/'. $student->id)}}" class="button m-1">$+ {{__('trans.add_fee')}}</a>
                                <a href="{{url('student_receipts/create/'. $student->id)}}" class="button m-1">$- {{__('trans.add_new_receipt')}}</a>
                                <a href="{{url('exclude_fees/create/'. $student->id)}}" class="button m-1">$* {{__('trans.add_new_exclude_fee')}}</a>
                                <a href="{{url('bills_of_exchange/create/'. $student->id)}}" class="button m-1"><i class="fa fa-money"></i> {{__('trans.add_new_bill_of_exchange')}}</a>
                            </div>
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
                                        <th scope="col">{{trans('trans.actions')}}</th>
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
                                            <td colspan="2">
                                                <a class="btn btn-success btn-sm" href="{{route('gardians.show', $gardian->id)}}">{{trans('trans.show')}}<i class="fa fa-eye"></i></a>

                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $gardian->id }}-gardian" title="{{ trans('trans.delete') }}">{{trans('trans.delete')}} <i class="fa fa-trash"></i>
                                                </button>

                                            </td>
                                        </tr>
                                        @include('pages.students.delete_gardian')
                                    @empty
                                    <tr>
                                     <td class="text-muted text-center" colspan="6">{{__('trans.no_data_available')}} <br> <a href="{{route('gardians.create')}}" class="btn btn-primary">{{__('trans.add_new_gardian')}} <i class="fa fa-plus"></i></a></td>
                                    </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile-03" role="tabpanel"
                             aria-labelledby="profile-03-tab">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <form method="post" action="{{route('upload_student_attachments')}}" enctype="multipart/form-data">
                                     @csrf
                                     @method('POST')
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label for="attachments">
                                                 {{trans('trans.attachments')}} 
                                                 <span class="text-danger">*</span> <br>
                                                 <span class="text-muted">({{__('trans.maximum_3_attachments_and_used') . $student->attachments->count() }})</span>
                                                </label>
                                                @if ($student->attachments->count() < 3)
                                                 <input type="file" class="form-control border" accept="image/*" name="attachments[]" multiple id="attachments" required>
                                                 <input type="hidden" name="student_id" value="{{$student->id}}">
                                                 @error('attachments')
                                                 <div class="text-danger mt-1">*{{ $message }}</div>
                                                 @enderror
                                                @endif
                                               </div>
                                               @if ($student->attachments->count() < 3)
                                                  <button type="submit" class="button">{{trans('trans.add_attachment')}}</button>
                                               @endif
                                        </div>
                                    </form>
                                </div>
                                <br>
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

                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $attachment->id }}-attachment">{{trans('trans.delete')}} <i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        @include('pages.students.delete_attachment')
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
@include('pages.students.delete')
@endsection
@section('js')
@endsection