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
        <a href="{{route('gardian_profile.index')}}" >
            <div class="pull-left"><i class="fas fa-id-card-alt"></i><span class="right-nav-text">{{__('trans.profile')}}</span>
            </div>
        </a>
    </li>
    <!-- menu item children-->
    <li>
        <a href="{{route('my_children')}}" >
            <div class="pull-left"><i class="fas fa-user-graduate"></i><span class="right-nav-text">{{__('trans.my_children')}}</span>
            </div>
        </a>
    </li>
    <!-- menu item gardians-->
    <li>
        <a href="{{route('other_gardians')}}" >
            <div class="pull-left"><i class="fas fa-user-tie"></i><span class="right-nav-text">{{__('trans.other_gardians')}}</span>
            </div>
        </a>
    </li>
</ul>