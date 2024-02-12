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
        <a href="{{route('student_profile.index')}}" >
            <div class="pull-left"><i class="fas fa-id-card-alt"></i><span class="right-nav-text">{{__('trans.profile')}}</span>
            </div>
        </a>
    </li>
    <!-- menu item quizzes-->
    <li>
        <a href="{{route('student_quizzes.index')}}" >
            <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">{{__('trans.quizzes')}}</span>
            </div>
        </a>
    </li>
</ul>