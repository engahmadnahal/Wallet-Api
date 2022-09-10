

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('home.index')}}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">{{__('dash.app_name')}}</h2>
                </a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="#"><i class="fa-solid fa-house"></i></i><span class="menu-title" data-i18n="{{__('dash.home')}}">{{__('dash.home')}}</span></a>
                <ul class="menu-content">
                    <li class="{{ActiveRoute::isActive('home.index')}}"><a href="{{route('home.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">{{__('dash.anlytics')}}</span></a>
                    </li>
                    
                </ul>
            </li>


           
           
          
            <li class="navigation-header "><span>{{__('dash.content_manger')}}</span>
                <li class=" nav-item"><a href="#"><i class="fa-solid fa-money-bill-transfer"></i><span class="menu-title" data-i18n="{{__('dash.charge')}}">{{__('dash.charge')}}</span></a>
                    <ul class="menu-content">
                        <li class="{{ActiveRoute::isActive('cities.index')}}"><a  href="{{route('cities.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="{{__('dash.list')}}">{{__('dash.list')}}</span></a>
                        </li>
    
                        <li class="{{ActiveRoute::isActive('cities.create')}}"><a  href="{{route('cities.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="{{__('dash.create')}}">{{__('dash.create')}}</span></a>
                        </li>
                        </li>
                    </ul>
                </li>

                <li class="nav-item"><a href="#"><i class="fa-solid fa-user"></i><span class="menu-title" data-i18n="{{__('dash.pay_points')}}">{{__('dash.pay_points')}}</span></a>
                    <ul class="menu-content">
                        
                        <li class="{{ActiveRoute::isActive('pay_points.index')}}"><a  href="{{route('pay_points.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="{{__('dash.list')}}">{{__('dash.list')}}</span></a>
                        </li>
    
                        <li class="{{ActiveRoute::isActive('pay_points.create')}}"><a  href="{{route('pay_points.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="{{__('dash.create')}}">{{__('dash.create')}}</span></a>
                        </li>
                        
                        </li>
                    </ul>
                </li>

                    <li class=" nav-item"><a href="#"><i class="fa-solid fa-layer-group"></i><span class="menu-title" data-i18n="{{__('dash.add_categores')}}">{{__('dash.add_categores')}}</span></a>
                        <ul class="menu-content">
                            <li class="{{ActiveRoute::isActive('categories.index')}}"><a  href="{{route('categories.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="{{__('dash.list')}}">{{__('dash.list')}}</span></a>
                            </li>
        
                            <li class="{{ActiveRoute::isActive('categories.create')}}"><a  href="{{route('categories.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="{{__('dash.create')}}">{{__('dash.create')}}</span></a>
                            </li>
                            </li>
                        </ul>
                    </li>

                    <li class=" nav-item"><a href="#"><i class="fa-solid fa-building-columns"></i><span class="menu-title" data-i18n="{{__('dash.add_institutions')}}">{{__('dash.add_institutions')}}</span></a>
                        <ul class="menu-content">
                            <li class="{{ActiveRoute::isActive('sub_categories.index')}}"><a  href="{{route('sub_categories.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="{{__('dash.list')}}">{{__('dash.list')}}</span></a>
                            </li>
        
                            <li class="{{ActiveRoute::isActive('sub_categories.create')}}"><a  href="{{route('sub_categories.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="{{__('dash.create')}}">{{__('dash.create')}}</span></a>
                            </li>
                            </li>
                        </ul>
                    </li>


     


            <li class="navigation-header "><span>{{__('dash.hr')}}</span>
            </li>
            

            {{-- For Pay Points --}}
            <li class="nav-item"><a href="#"><i class="fa-solid fa-people-group"></i><span class="menu-title" data-i18n="{{__('dash.psychiatrist')}}">{{__('dash.employees')}}</span></a>
                <ul class="menu-content">
                    
                    <li class="{{ActiveRoute::isActive('employees.index')}}"><a  href="{{route('employees.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="{{__('dash.list')}}">{{__('dash.list')}}</span></a>
                    </li>

                    <li class="{{ActiveRoute::isActive('employees.create')}}"><a  href="{{route('employees.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="{{__('dash.create')}}">{{__('dash.create')}}</span></a>
                    </li>
                    
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href="#"><i class="fa-solid fa-users"></i></i><span class="menu-title" data-i18n="{{__('dash.users')}}">{{__('dash.users')}}</span></a>
                <ul class="menu-content">
                    
                    <li class="{{ActiveRoute::isActive('users.index')}}"><a  href="{{route('users.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="{{__('dash.list')}}">{{__('dash.list')}}</span></a>
                    </li>

                   
                    
                    </li>
                </ul>
            </li>

            


            <li class="navigation-header "><span>{{__('dash.reports')}}</span>
                <li class=" nav-item"><a href="#"><i class="fa-solid fa-file-invoice-dollar"></i><span class="menu-title" data-i18n="{{__('dash.reports')}}">{{__('dash.reports')}}</span></a>
                    <ul class="menu-content">
                        <li class="{{ActiveRoute::isActive('cities.index')}}"><a  href="{{route('cities.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="{{__('dash.reports_mony')}}">{{__('dash.reports_mony')}}</span></a>
                        </li>
    
                        <li class="{{ActiveRoute::isActive('cities.create')}}"><a  href="{{route('cities.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="{{__('dash.reports_pay_points')}}">{{__('dash.reports_pay_points')}}</span></a>
                        </li>
                        </li>
                    </ul>
                </li>


            <li class="navigation-header "><span>{{__('dash.settings')}}</span>
                <li class=" nav-item"><a href="#"><i class="fa-solid fa-city"></i><span class="menu-title" data-i18n="{{__('dash.cities')}}">{{__('dash.cities')}}</span></a>
                    <ul class="menu-content">
                        <li class="{{ActiveRoute::isActive('cities.index')}}"><a  href="{{route('cities.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="{{__('dash.list')}}">{{__('dash.list')}}</span></a>
                        </li>
    
                        <li class="{{ActiveRoute::isActive('cities.create')}}"><a  href="{{route('cities.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="{{__('dash.create')}}">{{__('dash.create')}}</span></a>
                        </li>
                        </li>
                    </ul>
                </li>

            <li class=" nav-item"><a href="#"><i class="fa-solid fa-gears"></i><span class="menu-title" data-i18n="{{__('dash.role_permission')}}">{{__('dash.role_permission')}}</span></a>
                <ul class="menu-content">
                   
                    <li><a href="{{route('roles.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="{{__('dash.permission')}}">{{__('dash.permission')}}</span></a>
                    </li>
                    </li>
                </ul>
            </li>

            <!-- END: Settings -->

        </ul>
    </div>
</div>