<ul class="nav navbar-nav side-menu" id="sidebarnav">
 <!-- menu item Dashboard-->
 <li>
     <a href="{{url('/dashboard')}}" class="">
         <div class="pull-left mb-2"><i class="ti-home"></i><span class="right-nav-text">{{__('trans.dashboard')}}</span>
         </div>
     </a>
 </li>
 <!-- menu item stages-->
 <li>
     <a href="javascript:void(0);" data-toggle="collapse" data-target="#stages">
         <div class="pull-left"><i class="fas fa-school"></i><span
                 class="right-nav-text">{{__('trans.stages')}}</span></div>
         <div class="pull-right"><i class="ti-plus"></i></div>
         <div class="clearfix"></div>
     </a>
     <ul id="stages" class="collapse" data-parent="#sidebarnav">
         <li><a href="{{route('stages.index')}}">{{__('trans.stages_list')}}</a></li>
     </ul>
 </li>
 <!-- menu item classes-->
 <li>
     <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes">
         <div class="pull-left"><i class="fa fa-building"></i><span
                 class="right-nav-text">{{__('trans.classes')}}</span></div>
         <div class="pull-right"><i class="ti-plus"></i></div>
         <div class="clearfix"></div>
     </a>
     <ul id="classes" class="collapse" data-parent="#sidebarnav">
         <li><a href="{{route('classes.index')}}">{{__('trans.classes_list')}}</a></li>
     </ul>
 </li>
 <!-- menu item sections -->
 <li>
     <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections">
         <div class="pull-left"><i class="ti-menu-alt"></i><span
                 class="right-nav-text">{{__('trans.sections')}}</span></div>
         <div class="pull-right"><i class="ti-plus"></i></div>
         <div class="clearfix"></div>
     </a>
     <ul id="sections" class="collapse" data-parent="#sidebarnav">
         <li><a href="{{route('sections.index')}}">{{__('trans.sections_list')}}</a></li>
     </ul>
 </li>
 <!-- menu item students-->
 <li>
     <a href="javascript:void(0);" data-toggle="collapse" data-target="#students">
         <div class="pull-left"><i class="fas fa-user-graduate"></i><span
                 class="right-nav-text">{{__('trans.students')}}</span></div>
         <div class="pull-right"><i class="ti-plus"></i></div>
         <div class="clearfix"></div>
     </a>
     <ul id="students" class="collapse" data-parent="#sidebarnav">
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#students_list">{{trans('trans.students_list')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
             <ul id="students_list" class="collapse">
                 <li><a href="{{route('students.index')}}">{{__('trans.students_list')}}</a></li>
                 <li><a href="{{route('students.create')}}">{{__('trans.add_new_student')}}</a></li>
             </ul>
         </li>
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#students_promotion">{{trans('trans.students_promotion')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
             <ul id="students_promotion" class="collapse">
                 <li><a href="{{route('promotions.index')}}">{{__('trans.students_promotion')}}</a></li>
                 <li><a href="{{route('promotions.create')}}">{{__('trans.students_promotion_management')}}</a></li>
             </ul>
         </li>
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#graduated_students">{{trans('trans.graduated_students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
             <ul id="graduated_students" class="collapse">
                 <li><a href="{{route('graduated.index')}}">{{__('trans.graduated_students')}}</a></li>
                 <li><a href="{{route('graduated.create')}}">{{__('trans.add_new_graduate')}}</a></li>
             </ul>
         </li>
     </ul>
 </li>
 <!-- menu item teachers-->
 <li>
     <a href="javascript:void(0);" data-toggle="collapse" data-target="#teachers">
         <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i><span
                 class="right-nav-text">{{__('trans.teachers')}}</span></div>
         <div class="pull-right"><i class="ti-plus"></i></div>
         <div class="clearfix"></div>
     </a>
     <ul id="teachers" class="collapse" data-parent="#sidebarnav">
         <li><a href="{{route('teachers.index')}}">{{__('trans.teachers_list')}}</a></li>
         <li><a href="{{route('teachers.create')}}">{{__('trans.add_new_teacher')}}</a></li>
     </ul>
 </li>
 <!-- menu item gardians-->
 <li>
     <a href="javascript:void(0);" data-toggle="collapse" data-target="#gardians">
         <div class="pull-left"><i class="fas fa-user-tie"></i><span
                 class="right-nav-text">{{__('trans.gardians')}}</span></div>
         <div class="pull-right"><i class="ti-plus"></i></div>
         <div class="clearfix"></div>
     </a>
     <ul id="gardians" class="collapse" data-parent="#sidebarnav">
         <li><a href="{{route('gardians.index')}}">{{__('trans.gardians_list')}}</a></li>
         <li><a href="{{route('gardians.create')}}">{{__('trans.add_new_gardian')}}</a></li>
     </ul>
 </li>
 <!-- menu item accounts-->
 <li>
     <a href="javascript:void(0);" data-toggle="collapse" data-target="#accounts">
         <div class="pull-left"><i class="fa fa-money"></i><span
                 class="right-nav-text">{{__('trans.accounts')}}</span></div>
         <div class="pull-right"><i class="ti-plus"></i></div>
         <div class="clearfix"></div>
     </a>
     <ul id="accounts" class="collapse" data-parent="#sidebarnav">
         <li><a href="{{route('fees.index')}}">{{__('trans.study_fees_list')}}</a></li>
         <li><a href="{{route('fee_invoices.index')}}">{{__('trans.fee_invoices_list')}}</a></li>
         <li><a href="{{route('student_receipts.index')}}">{{__('trans.receipts_list')}}</a></li>
         <li><a href="{{route('exclude_fees.index')}}">{{__('trans.exclude_fees_list')}}</a></li>
         <li><a href="{{route('bills_of_exchange.index')}}">{{__('trans.bills_of_exchange_list')}}</a></li>
     </ul>
 </li>
 <!-- menu item attendance-->
 <li>
     <a href="javascript:void(0);" data-toggle="collapse" data-target="#attendance">
         <div class="pull-left"><i class="fa fa-list"></i><span
                 class="right-nav-text">{{__('trans.attendance')}}</span></div>
         <div class="pull-right"><i class="ti-plus"></i></div>
         <div class="clearfix"></div>
     </a>
     <ul id="attendance" class="collapse" data-parent="#sidebarnav">
         <li><a href="{{route('attendance.index')}}">{{__('trans.attendance_list')}}</a></li>
     </ul>
 </li>
 <!-- menu item subjects-->
 <li>
     <a href="javascript:void(0);" data-toggle="collapse" data-target="#subjects">
         <div class="pull-left"><i class="ti-book"></i><span
                 class="right-nav-text">{{__('trans.subjects')}}</span></div>
         <div class="pull-right"><i class="ti-plus"></i></div>
         <div class="clearfix"></div>
     </a>
     <ul id="subjects" class="collapse" data-parent="#sidebarnav">
         <li><a href="{{route('subjects.index')}}">{{__('trans.subjects_list')}}</a></li>
     </ul>
 </li>
 <!-- menu item exams-->
 <li>
     <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams">
         <div class="pull-left"><i class="fas fa-check"></i><span
                 class="right-nav-text">{{__('trans.exams')}}</span></div>
         <div class="pull-right"><i class="ti-plus"></i></div>
         <div class="clearfix"></div>
     </a>
     <ul id="exams" class="collapse" data-parent="#sidebarnav">
         <li><a href="{{route('exams.index')}}">{{__('trans.exams_list')}}</a></li>
     </ul>
 </li>
 <!-- menu item library-->
 <li>
     <a href="javascript:void(0);" data-toggle="collapse" data-target="#library">
         <div class="pull-left"><i class="fa fa-book"></i><span
                 class="right-nav-text">{{__('trans.library')}}</span></div>
         <div class="pull-right"><i class="ti-plus"></i></div>
         <div class="clearfix"></div>
     </a>
     <ul id="library" class="collapse" data-parent="#sidebarnav">
         <li><a href="{{route('library.index')}}">{{__('trans.books_list')}}</a></li>
     </ul>
 </li>
 <!-- menu item Users -->
 <li>
     <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
         <div class="pull-left"><i class="fa fa-users"></i><span
                 class="right-nav-text">{{__('trans.users')}}</span></div>
         <div class="pull-right"><i class="ti-plus"></i></div>
         <div class="clearfix"></div>
     </a>
     <ul id="users" class="collapse" data-parent="#sidebarnav">
         <li><a href="{{url('/')}}">{{__('trans.users_list')}}</a></li>
     </ul>
 </li>
 <!-- menu item Settings-->
 <li>
     <a href="{{route('settings.index')}}" >
         <div class="pull-left"><i class="fa fa-gear"></i><span class="right-nav-text">{{__('trans.settings')}}</span>
         </div>
     </a>
 </li>
</ul>