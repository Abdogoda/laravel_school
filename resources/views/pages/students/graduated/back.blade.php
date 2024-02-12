<div class="modal fade" id="back-{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{__('trans.back')}}</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">
             <form action="{{route('graduated.destroy', $student->id)}}" method="post">
                 @csrf
                 @method('DELETE')
                 <h5 style="font-family: 'Cairo', sans-serif;">{{__('trans.sure_to_back')}} ({{$student->name}})</h5>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('trans.close')}}</button>
                     <button type="submit" class="btn btn-success">{{trans('trans.back')}}</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
</div>