<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="addModalLabel">{{__('trans.add_new_subject')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('subjects.store')}}" method="POST" autocomplete="off">
            <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name_ar" class="mr-sm-2">{{__('trans.subject_name_arabic')}}</label>
                            <input type="text" name="name_ar" class="form-control border" id="name_ar" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name_en" class="mr-sm-2">{{__('trans.subject_name_english')}}</label>
                            <input type="text" name="name_en" class="form-control border" id="name_en" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stage_id" class="mr-sm-2">{{__('trans.stage_name')}}</label>
                            <select name="stage_id" class="form-control border" style="height: auto" id="stage_id" required>
                                <option selected disabled>{{__('trans.choose_from_list')}}...</option>
                                @foreach ($stages as $stage)
                                    <option value="{{$stage->id}}">{{$stage->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="class_id" class="mr-sm-2">{{__('trans.class_name')}}</label>
                            <select name="class_id" class="form-control border" style="height: auto" id="class_id" required>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="teacher_id" class="mr-sm-2">{{__('trans.teacher_name')}}</label>
                            <select name="teacher_id" class="form-control border" style="height: auto" id="teacher_id" required>
                                <option selected disabled>{{__('trans.choose_from_list')}}...</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secnodary" data-dismiss="modal">{{__('trans.close')}}</button>
                    <button type="submit" class="btn btn-success">{{__('trans.add_new_subject')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>