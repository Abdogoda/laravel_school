<div class="modal fade" id="edit-{{$fee_invoice->id}}-Modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="editModalLabel">{{__('trans.edit_fee_invoice')}} ({{$fee_invoice->id}})</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <form action="{{route('fee_invoices.update', $fee_invoice)}}" method="POST">
             @csrf
             @method('PUT')
             <input type="hidden" name="test" value="test">
             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-6 mb-3">
                         <label for="student_id" class="mr-sm-2">{{__('trans.student_name')}}</label>
                         <select name="student_id" id="student_id" class="custom-select border" required>
                              <option selected disabled>{{__('trans.choose_from_list')}}...</option>
                              @foreach ($students as $student)
                                  <option {{$fee_invoice->student_id == $student->id ? "selected" : ""}} value="{{$student->id}}">{{$student->name}}</option>
                              @endforeach
                      </select>
                     </div>
                     <div class="col-md-6 mb-3">
                         <label for="fee_id" class="mr-sm-2">{{ trans('trans.fee_name') }}</label>
                         <select name="fee_id" id="fee_id" class="custom-select border" required>
                             <option selected disabled>{{__('trans.choose_from_list')}}...</option>
                             @foreach ($fees as $fee)
                                 <option {{$fee_invoice->fee_id == $fee->id ? "selected" : ""}} value="{{$fee->id}}">{{$fee->name}} (${{$fee->cost}})</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="col-md-12 mb-3">
                          <label for="notes" class="mr-sm-2">{{ trans('trans.notes') }}</label>
                          <input type="text" name="notes" id="notes" class="form-control border" value="{{$fee_invoice->notes}}">
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secnodary" data-dismiss="modal">{{__('trans.close')}}</button>
                 <button type="submit" class="btn btn-success">{{__('trans.edit_fee_invoice')}}</button>
             </div>
         </form>
     </div>
 </div>
</div>