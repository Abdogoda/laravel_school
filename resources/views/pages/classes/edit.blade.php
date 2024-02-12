<div class="modal fade" id="edit-{{$class->id}}-Modal" tabindex="-1" role="dialog" aria-labelledby="edit-{{$class->id}}-ModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="edit-{{$class->id}}-ModalLabel">{{__('trans.edit_class')}} ({{$class->name}})</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <form action="{{route('classes.update', $class->id)}}" method="POST">
         <div class="modal-body">
                 @csrf
                 @method('PUT')
                 <div class="row">
                     <div class="col-md-6">
                         <label for="name_ar" class="mr-sm-2">{{__('trans.class_name_arabic')}}</label>
                         <input type="text" name="name_ar" value="{{$class->getTranslation('name', 'ar')}}" class="form-control border" id="name_ar" required>
                     </div>
                     <div class="col-md-6">
                         <label for="name_en" class="mr-sm-2">{{__('trans.class_name_english')}}</label>
                         <input type="text" name="name_en" value="{{$class->getTranslation('name', 'en')}}" class="form-control border" id="name_en" required>
                     </div>
                     <div class="col-12">
                        <label for="exampleFormControlSelect1" class="mr-sm-2">{{__('trans.stage_name')}}</label>
                        <select class="form-control border" name="stage_id" id="exampleFormControlSelect1">
                            <option value="{{$class->stage->id}}">{{$class->stage->name}}</option>
                            @foreach ($stages as $stage)
                                <option value="{{$stage->id}}">{{$stage->name}}</option>
                            @endforeach
                         </select>
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secnodary" data-dismiss="modal">{{__('trans.close')}}</button>
                 <button type="submit" class="btn btn-success">{{__('trans.edit_class')}}</button>
             </div>
         </form>
     </div>
 </div>
</div>