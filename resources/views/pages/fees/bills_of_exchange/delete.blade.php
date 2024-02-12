<div class="modal fade" id="delete-{{$bill_of_exchange->id}}-Modal" tabindex="-1" role="dialog" aria-labelledby="delete-{{$bill_of_exchange->id}}-ModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="delete-{{$bill_of_exchange->id}}-ModalLabel">{{__('trans.delete_bill_of_exchange')}} ({{$bill_of_exchange->student->name}})</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <form action="{{route('bills_of_exchange.destroy', $bill_of_exchange->id)}}" method="POST">
            <div class="modal-body">
                    @csrf
                    @method('DELETE')
                 <p>{{__('trans.sure_to_delete')}}</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secnodary" data-dismiss="modal">{{__('trans.close')}}</button>
                 <button type="submit" class="btn btn-danger">{{__('trans.delete_bill_of_exchange')}}</button>
             </div>
         </form>
     </div>
 </div>
</div>