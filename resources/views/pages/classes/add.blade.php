<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="addModalLabel">
                    {{ trans('trans.add_new_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row" action="{{ route('classes.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="list_classes">
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <label for="class_name_arabic" class="mr-sm-2">{{ trans('trans.class_name_arabic') }}</label>
                                            <input class="form-control border" type="text" name="name_ar" id="class_name_arabic" required />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <label for="class_name_english" class="mr-sm-2">{{ trans('trans.class_name_english') }}</label>
                                            <input class="form-control border" type="text" name="name_en" id="class_name_english" required />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <label for="exampleFormControlSelect1" class="mr-sm-2">{{ trans('trans.stage_name') }}</label>
                                            <div class="box">
                                                <select class="form-control border" name="stage_id" id="exampleFormControlSelect1" required>
                                                    <option value="" disabled>{{__('trans.choose_from_list')}}</option>
                                                    @foreach ($stages as $stage)
                                                        <option value="{{ $stage->id }}">{{ $stage->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <label for="delete_row" class="mr-sm-2">{{ trans('trans.actions') }}</label>
                                            <input class="btn btn-danger btn-block" id="delete_row" data-repeater-delete
                                                type="button" value="{{ trans('trans.delete_row') }}" />
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row mt-20 mb-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('trans.add_row') }}"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('trans.close') }}</button>
                                <button type="submit" class="btn btn-success">{{ trans('trans.add_new_class') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>