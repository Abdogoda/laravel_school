<div class="modal fade" id="edit-{{$section->id}}-Modal" tabindex="-1" role="dialog" aria-labelledby="edit-{{$section->id}}-ModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="edit-{{$section->id}}-ModalLabel">{{__('trans.edit_section')}} ({{$section->name}})</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <form action="{{route('sections.update', $section->id)}}" method="POST">
         <div class="modal-body">
                 @csrf
                 @method('PUT')
                 <div class="row">
                     <div class="col-md-6">
                         <label for="name_ar" class="mr-sm-2">{{__('trans.section_name_arabic')}}</label>
                         <input type="text" name="name_ar" value="{{$section->getTranslation('name', 'ar')}}" class="form-control border" id="name_ar" required>
                     </div>
                     <div class="col-md-6">
                         <label for="name_en" class="mr-sm-2">{{__('trans.section_name_english')}}</label>
                         <input type="text" name="name_en" value="{{$section->getTranslation('name', 'en')}}" class="form-control border" id="name_en" required>
                     </div>
                     <div class="col-6 mb-3">
                         <label for="stage_id" class="mr-sm-2">{{ trans('trans.stage_name') }}</label>
                         <div class="box">
                             <select class="form-control border" name="stage_id" id="stage_id" >
                                 <option value="" disabled>{{__('trans.choose_from_list')}}</option>
                                 <option value="{{$section->stage->id}}">{{$section->stage->name}}</option>
                                 @foreach ($stages as $stage)
                                 <option value="{{ $stage->id }}">{{ $stage->name }}</option>
                                 @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="class_id" class="mr-sm-2">{{ trans('trans.class_name') }}</label>
                            <div class="box">
                                <select class="form-control border" name="class_id" id="class_id" >
                                    <option value="" disabled>{{__('trans.choose_from_list')}}</option>
                                    <option value="{{$section->class->id}}">{{$section->class->name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="teacher_id" class="mr-sm-2">{{ trans('trans.teacher_name') }}</label>
                            <div class="box">
                                <select multiple class="form-control border" name="teacher_id[]" id="teacher_id" >
                                    <option value="" disabled>{{__('trans.choose_from_list')}}</option>
                                    @foreach ($teachers as $teacher)
                                        <?php $test = false; ?>
                                        @foreach ($section->teachers as $section_teacher)
                                            @if ($section_teacher->id == $teacher->id)
                                                <?php $test=true; ?>
                                            @endif
                                        @endforeach
                                        <option {{$test == true ? "selected" : ""}} value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="mr-sm-2">{{__('trans.status')}}</label>
                            <input type="checkbox" name="status" {{$section->status == '1' ? 'checked' : ''}} id="status">
                        </div>
                    </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secnodary" data-dismiss="modal">{{__('trans.close')}}</button>
                 <button type="submit" class="btn btn-success">{{__('trans.edit_section')}}</button>
             </div>
         </form>
     </div>
 </div>
</div>