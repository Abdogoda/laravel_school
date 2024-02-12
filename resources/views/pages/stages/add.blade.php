<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="addModalLabel">{{__('trans.add_new_stage')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('stages.store')}}" method="POST">
            <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name_ar" class="mr-sm-2">{{__('trans.stage_name_arabic')}}</label>
                            <input type="text" name="name_ar" class="form-control border" id="name_ar" required>
                        </div>
                        <div class="col-md-6">
                            <label for="name_en" class="mr-sm-2">{{__('trans.stage_name_english')}}</label>
                            <input type="text" name="name_en" class="form-control border" id="name_en" required>
                        </div>
                        <div class="col-12">
                            <label for="notes" class="mr-sm-2">{{__('trans.notes')}}</label>
                            <textarea name="notes" class="form-control border" id="notes" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secnodary" data-dismiss="modal">{{__('trans.close')}}</button>
                    <button type="submit" class="btn btn-success">{{__('trans.add_new_stage')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>