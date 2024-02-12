<div class="modal fade" id="edit-{{$receipt->id}}-Modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="editModalLabel">{{__('trans.edit_receipt')}} ({{$receipt->student->name}})</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <form action="{{route('student_receipts.update', $receipt->id)}}" method="POST">
             @csrf
             @method('PUT')
             <input type="hidden" name="test" value="test">
             <div class="modal-body">
                 <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="student_id" class="mr-sm-2">{{ trans('trans.student_name') }}</label>
                        <select name="student_id" id="student_id" class="form-control border" required style="height: auto">
                            <option selected disabled>{{__('trans.choose_from_list')}}...</option>
                            @foreach ($students as $student)
                                <option {{$receipt->student_id == $student->id ? "selected" : ""}} value="{{$student->id}}">{{$student->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cost" class="mr-sm-2">{{ trans('trans.cost') }}</label>
                        <input type="number" name="cost" id="cost" class="form-control border" value="{{$receipt->debit}}" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="notes" class="mr-sm-2">{{ trans('trans.notes') }}</label>
                        <input type="text" name="notes" value="{{$receipt->description}}" id="notes" class="form-control border">
                    </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secnodary" data-dismiss="modal">{{__('trans.close')}}</button>
                 <button type="submit" class="btn btn-success">{{__('trans.edit_receipt')}}</button>
             </div>
         </form>
     </div>
 </div>
</div>