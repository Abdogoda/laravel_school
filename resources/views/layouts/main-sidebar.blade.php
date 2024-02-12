<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                @if (auth('web')->check())
                    @include('layouts.sidebars.admin')
                @endif
                @if (auth('student')->check())
                    @include('layouts.sidebars.student')
                @endif
                @if (auth('teacher')->check())
                    @include('layouts.sidebars.teacher')
                @endif
                @if (auth('gardian')->check())
                    @include('layouts.sidebars.gardian')
                @endif
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
