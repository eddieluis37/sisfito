<!-- left side start-->
<div class="left-side sticky-left-side">

    <!--logo and iconic logo start-->
    <div class="logo">
        <a><img src="{{ asset('images/logo.png')  }}" alt=""></a>
    </div>

    <div class="left-side-inner">

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            @if(Auth::check())
            <li class="active"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> <span>{{ trans('ui.sidebar.dashboard') }}</span></a></li>
            @endif

                @if(Auth::check() && Auth::user()->hasRole('seccional'))
            <li class="menu-list"><a href=""><i class="fa fa-truck"></i> <span>{{ trans('ui.sidebar.label_car') }}</span></a>
                <ul class="sub-menu-list">
                    @if(Auth::check() && Auth::user()->can(['create-cars', 'read-cars', 'update-cars', 'delete-cars']))
                    <li><a href="{{ url('car') }}"> <i class="fa fa-road"></i><span>{{ trans('ui.sidebar.cars') }}</span></a></li>
                    @endif

                        @if(Auth::check() && Auth::user()->can(['create-colors', 'read-colors', 'update-colors', 'delete-colors']))
                    <li><a href="{{ url('car/color') }}"> <i class="fa fa-dashboard"></i><span>{{ trans('ui.sidebar.colors') }}</span></a></li>
                        @endif

                        @if(Auth::check() && Auth::user()->can(['create-brands', 'read-brands', 'update-brands', 'delete-brands']))
                    <li><a href="{{ url('car/brand') }}"> <i class="fa fa-bookmark"></i><span>{{ trans('ui.sidebar.brands') }}</span></a></li>
                        @endif

                        @if(Auth::check() && Auth::user()->can(['create-prototypes', 'read-prototypes', 'update-prototypes', 'delete-prototypes']))
                    <li><a href="{{ url('car/model') }}"> <i class="fa fa-ticket"></i><span>{{ trans('ui.sidebar.prototypes') }}</span></a></li>
                        @endif

                        @if(Auth::check() && Auth::user()->can(['create-conditions', 'read-conditions', 'update-conditions', 'delete-conditions']))
                    <li><a href="{{ url('car/condition') }}"> <i class="fa fa-flag"></i><span>{{ trans('ui.sidebar.conditions') }}</span></a></li>
                        @endif

                </ul>
            </li>
                @endif

            @if(Auth::check() && Auth::user()->can(['create-clients', 'read-clients', 'update-clients', 'delete-clients']))
                <li><a href="{{ url('client') }}"><i class="fa fa-users"></i> <span>{{ trans('ui.sidebar.clients') }}</span></a></li>
            @endif

            @if(Auth::check() && Auth::user()->can(['create-seccionales', 'read-seccionales', 'update-seccionales', 'delete-seccionales']))
            <li><a href="{{ url('client/seccional') }}"><i class="fa fa-globe"></i> <span>{{ trans('ui.sidebar.seccionales') }}</span></a></li>
            @endif

            @if(Auth::check() && Auth::user()->can(['create-agreements', 'read-agreements', 'update-agreements', 'delete-agreements']))
            <li><a href="{{ url('agreement') }}"><i class="fa fa-pencil-square-o"></i> <span>{{ trans('ui.sidebar.agreements') }}</span></a></li>
            @endif

            @if(Auth::check() && Auth::user()->can(['create-status', 'read-status', 'update-status', 'delete-status']))
            <li><a href="{{ url('agreement/status') }}"><i class="fa fa-file-text-o"></i> <span>{{ trans('ui.sidebar.status') }}</span></a></li>
            @endif

            @if(Auth::check() && Auth::user()->hasRole('admin'))
                <li class="menu-list"><a href=""><i class="fa fa-user"></i> <span>{{ trans('ui.sidebar.admin_users') }}</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{ url('auth/user') }}"> <i class="fa fa-male"></i><span>{{ trans('ui.sidebar.users') }}</span></a></li>
                        <li><a href="{{ url('auth/role') }}"> <i class="fa fa-legal"></i><span>{{ trans('ui.sidebar.roles') }}</span></a></li>
                        <li><a href="{{ url('auth/permission') }}"><i class="fa fa-key"></i> <span>{{ trans('ui.sidebar.permissions') }}</span></a></li>
                    </ul>
                </li>
            @endif

        </ul>
        <!--sidebar nav end-->

    </div>
</div>