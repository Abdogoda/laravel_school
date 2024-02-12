<div class="modal fade" id="delete-{{$fee_invoice->id}}-Modal" tabindex="-1" role="dialog" aria-labelledby="delete-{{$fee_invoice->id}}-ModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="delete-{{$fee_invoice->id}}-ModalLabel">{{__('trans.delete_fee_invoice')}} ({{$fee_invoice->name}})</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <form action="{{route('fee_invoices.destroy', $fee_invoice->id)}}" method="POST">
            <div class="modal-body">
                    @csrf
                    @method('DELETE')
                 <p>{{__('trans.sure_to_delete')}}</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secnodary" data-dismiss="modal">{{__('trans.close')}}</button>
                 <button type="submit" class="btn btn-danger">{{__('trans.delete_fee_invoice')}}</button>
             </div>
         </form>
     </div>
 </div>
</div>