<div class="modal fade" id="delete-{{$online_class->id}}-Modal" tabindex="-1" role="dialog" aria-labelledby="delete-{{$online_class->id}}-ModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="delete-{{$online_class->id}}-ModalLabel">{{__('trans.delete_online_class')}} ({{$online_class->name}})</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <form action="{{route('online_classes.destroy', $online_class->id)}}" method="POST">
            <div class="modal-body">
                    @csrf
                    @method('DELETE')
                 <p>{{__('trans.sure_to_delete')}}</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secnodary" data-dismiss="modal">{{__('trans.close')}}</button>
                 <button type="submit" class="btn btn-danger">{{__('trans.delete_online_class')}}</button>
             </div>
         </form>
     </div>
 </div>
</div>