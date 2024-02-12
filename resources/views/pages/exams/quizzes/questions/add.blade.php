<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="addModalLabel">{{__('trans.add_new_question')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('questions.store')}}" method="POST" autocomplete="off">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="question" class="mr-sm-2">{{__('trans.question_name')}}</label>
                            <textarea name="question" class="form-control border" id="question" required></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="score" class="mr-sm-2">{{__('trans.score')}}</label>
                            <input type="number" name="score" class="form-control border" min="1" id="score" required>
                        </div>
                        <hr>
                        <hr>
                        <div class="col-12 mb-3">
                            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;">{{__('trans.answers')}}</h5><br>
                            <div class="repeater">
                                <div data-repeater-list="list_answers">
                                    <div data-repeater-item>
                                        <div class="row mb-3 shadow">
                                            <div class="col-8">
                                                <input class="form-control border" type="text" name="answer" id="answer" placeholder="{{__('trans.answer')}}" required />
                                            </div>
                                            <div class="col-4">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label for="status" class="block text-gray-500 font-semibold sm:border-r sm:pr:4 m-1">
                                                        <input type="checkbox" name="status" id="status" class="leading-tight" >
                                                        <span class="text-success">{{__('trans.right_answer')}}</span>
                                                    </label>
                                                    <button class="btn btn-danger btn-sm" data-repeater-delete><i class="fa fa-trash"></i></button>
                                                </div>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secnodary" data-dismiss="modal">{{__('trans.close')}}</button>
                    <button type="submit" class="btn btn-success">{{__('trans.add_new_question')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>