<div class="modal fade" id="edit-{{$book->id}}-Modal" tabindex="-1" role="dialog" aria-labelledby="edit-{{$book->id}}-ModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="edit-{{$book->id}}-ModalLabel">{{__('trans.edit_book')}} ({{$book->title}})</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <form action="{{route('library.update', $book->id)}}" method="POST" enctype="multipart/form-data">
         <div class="modal-body">
                 @csrf
                 @method('PUT')
                 <div class="row">
                    <div class="col-md-6 col-lg-4 mb-3">
                        <label for="title_ar" class="mr-sm-2">{{__('trans.book_title_arabic')}}</label>
                        <input type="text" value="{{$book->getTranslation('title', 'ar')}}" name="title_ar" class="form-control border" id="title_ar" required>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-3">
                        <label for="title_en" class="mr-sm-2">{{__('trans.book_title_english')}}</label>
                        <input type="text" value="{{$book->getTranslation('title', 'en')}}" name="title_en" class="form-control border" id="title_en" required>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-3">
                        <label for="file" class="mr-sm-2">{{__('trans.file')}}</label>
                        <input type="file" value=""  name="file" class="form-control border" id="file" accept="application/pdf">
                    </div>
                    <div class="col-md-6 col-lg-4 mb-3">
                        <label for="stage_id">{{trans('trans.stage')}} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select class="custom-select mr-sm-2" required name="stage_id" id="stage_id">
                                <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                @foreach($stages as $stage)
                                    <option {{$book->stage_id == $stage->id ? "selected" : ""}} value="{{ $stage->id }}">{{ $stage->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-3">
                        <label for="class_id">{{trans('trans.class_name')}} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select class="custom-select mr-sm-2" name="class_id" id="class_id">
                                <option selected value="{{$book->class_id}}">{{$book->class->name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-3">
                        <label for="section_id">{{trans('trans.section_name')}} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select class="custom-select mr-sm-2" name="section_id" id="section_id">
                                <option selected value="{{$book->section_id}}">{{$book->section->name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="teacher_id">{{trans('trans.teacher_name')}} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select class="custom-select mr-sm-2" required name="teacher_id" id="teacher_id">
                                <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                @foreach($teachers as $teacher)
                                    <option {{$book->teacher_id == $teacher->id ? "selected" : ""}} value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secnodary" data-dismiss="modal">{{__('trans.close')}}</button>
                 <button type="submit" class="btn btn-success">{{__('trans.edit_book')}}</button>
             </div>
         </form>
     </div>
 </div>
</div>