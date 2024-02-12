<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="addModalLabel">{{__('trans.add_new_fee')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('fees.store')}}" method="POST">
            <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name_ar" class="mr-sm-2">{{__('trans.fee_name_arabic')}}</label>
                            <input type="text" name="name_ar" class="form-control border" id="name_ar" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name_en" class="mr-sm-2">{{__('trans.fee_name_english')}}</label>
                            <input type="text" name="name_en" class="form-control border" id="name_en" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stage_id">{{trans('trans.stage')}} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="custom-select form-control border mr-sm-2" required name="stage_id" id="stage_id">
                                    <option selected disabled>{{trans('trans.choose_from_list')}}...</option>
                                    @foreach($stages as $stage)
                                        <option {{old('stage_id') == $stage->id ? "selected" : ""}} value="{{ $stage->id }}">{{ $stage->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="class_id">{{trans('trans.class_name')}} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="custom-select form-control border mr-sm-2" name="class_id" id="class_id">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="academic_year">{{trans('trans.academic_year')}} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="custom-select form-control border mr-sm-2" required name="academic_year" id="academic_year">
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
                        <div class="col-md-6 mb-3">
                            <label for="cost" class="mr-sm-2">{{__('trans.cost')}}</label>
                            <input type="number" name="cost" class="form-control border" id="cost" required>
                        </div>
                        <div class="col-12">
                            <label for="notes" class="mr-sm-2">{{__('trans.notes')}}</label>
                            <textarea name="notes" class="form-control border" id="notes" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secnodary" data-dismiss="modal">{{__('trans.close')}}</button>
                    <button type="submit" class="btn btn-success">{{__('trans.add_new_fee')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>