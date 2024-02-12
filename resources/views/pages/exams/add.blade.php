<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="addModalLabel">{{__('trans.add_new_exam')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('exams.store')}}" method="POST" autocomplete="off">
            <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name_ar" class="mr-sm-2">{{__('trans.exam_name_arabic')}}</label>
                            <input type="text" name="name_ar" class="form-control border" id="name_ar" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name_en" class="mr-sm-2">{{__('trans.exam_name_english')}}</label>
                            <input type="text" name="name_en" class="form-control border" id="name_en" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="term" class="mr-sm-2">{{__('trans.term')}}</label>
                            <input type="number" name="term" class="form-control border" id="term" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="academic_year" class="mr-sm-2">{{__('trans.academic_year')}}</label>
                            <select class="custom-select mr-sm-2" required name="academic_year" id="academic_year">
                                <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                @php
                                    $current_year = date("Y");
                                @endphp
                                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                    <option value="{{ $year}}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secnodary" data-dismiss="modal">{{__('trans.close')}}</button>
                    <button type="submit" class="btn btn-success">{{__('trans.add_new_exam')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>