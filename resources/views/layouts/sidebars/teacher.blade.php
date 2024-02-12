<ul class="nav navbar-nav side-menu" id="sidebarnav">
    <!-- menu item Dashboard-->
    <li>
        <a href="{{url('/dashboard')}}" class="">
            <div class="pull-left mb-2"><i class="ti-home"></i><span class="right-nav-text">{{__('trans.dashboard')}}</span>
            </div>
        </a>
    </li>
    <!-- menu item profile-->
    <li>
        <a href="{{route('teacher_profile.index')}}" >
            <div class="pull-left"><i class="fas fa-id-card-alt"></i><span class="right-nav-text">{{__('trans.profile')}}</span>
            </div>
        </a>
    </li>
    <!-- menu item sections-->
    <li>
        <a href="{{route('teacher_sections.index')}}" >
            <div class="pull-left"><i class="fas fa-chalkboard"></i><span class="right-nav-text">{{__('trans.sections')}}</span>
            </div>
        </a>
    </li>
    <!-- menu item students-->
    <li>
        <a href="{{route('teacher_students.index')}}" >
            <div class="pull-left"><i class="fas fa-user-graduate"></i><span class="right-nav-text">{{__('trans.students')}}</span>
            </div>
        </a>
    </li>
    <!-- menu item exams-->
    <li>
        <a href="{{route('quizzes.index')}}" >
            <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">{{__('trans.quizzes_list')}}</span>
            </div>
        </a>
    </li>
    <!-- menu item reports-->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#reports">
            <div class="pull-left"><i class="fas fa-list"></i><span
                    class="right-nav-text">{{__('trans.reports')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="reports" class="collapse" data-parent="#sidebarnav">
            <li><a href="{{route('teacher_reports.attendance')}}">{{__('trans.attendance_report')}}</a></li>
            <li><a href="{{route('teacher_reports.exams')}}">{{__('trans.exams_report')}}</a></li>
        </ul>
    </li>
    <!-- menu item Online Classes-->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#online_classes">
            <div class="pull-left"><i class="fa fa-camera"></i><span
                    class="right-nav-text">{{__('trans.online_classes')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="online_classes" class="collapse" data-parent="#sidebarnav">
            <li><a href="{{route('online_classes.index')}}">{{__('trans.direct_connection_with_zoom')}}</a></li>
        </ul>
    </li>
</ul>