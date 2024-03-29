<!-- Dashboards -->
<li class="menu-item ">
    <a href="#" class="menu-link ">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Dashboards">Dashboard</div>
    </a>

</li>

<!-- registration -->
<li class="menu-item {{ Route::is('catalog.*') ? 'open active' : '' }}">
    <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-copy"></i>
        <div data-i18n="Extended UI">Registration</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item {{ Route::is('catalog.engines.*') ? 'active' : '' }} ">
            <a href="{{route('catalog.engines.index')}}" class="menu-link">
                <div data-i18n="Perfect Scrollbar">Engine</div>
            </a>
        </li>

        <li class="menu-item {{ Route::is('catalog.models.*') ? 'active' : '' }}">
            <a href="{{route('catalog.models.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Model</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('catalog.car-brands.*') ? 'active' : '' }}">
            <a href="{{route('catalog.car-brands.index')}}" class="menu-link">
                <div data-i18n="Text Divider"> Make</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('catalog.car-years.*') ? 'active' : '' }}">
            <a href="{{route('catalog.car-years.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Year</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('catalog.services.*') ? 'active' : '' }}">
            <a href="{{route('catalog.services.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Services</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('catalog.engine-oils.*') ? 'active' : '' }}">
            <a href="{{route('catalog.engine-oils.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Engine oil</div>
            </a>
        </li>

        <li class="menu-item {{ Route::is('catalog.air-filters.*') ? 'active' : '' }}">
            <a href="{{route('catalog.air-filters.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Air filters</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('catalog.fuel-filters.*') ? 'active' : '' }}">
            <a href="{{route('catalog.fuel-filters.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Fuel filters</div>
            </a>
        </li>


        <li class="menu-item {{ Route::is('catalog.oil-filters.*') ? 'active' : '' }}">
            <a href="{{route('catalog.oil-filters.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Oil filters</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('catalog.transmission-filters.*') ? 'active' : '' }} ">
            <a href="{{route('catalog.transmission-filters.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Transmission filters</div>
            </a>
        </li>


        <li class="menu-item {{ Route::is('catalog.year-combinations.*') ? 'active' : '' }} ">
            <a href="{{route('catalog.year-combinations.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Year Combination</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('catalog.make-combinations.*') ? 'active' : '' }} ">
            <a href="{{route('catalog.make-combinations.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Make Combination</div>
            </a>
        </li>

        <li class="menu-item {{ Route::is('catalog.model-combinations.*') ? 'active' : '' }} ">
            <a href="{{route('catalog.model-combinations.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Model Combination</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('catalog.liter-combinations.*') ? 'active' : '' }} ">
            <a href="{{route('catalog.liter-combinations.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Liter Combination</div>
            </a>
        </li>


    </ul>
</li>
<li class="menu-item {{ Route::is('management.*') ? 'open active' : '' }}">
    <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-copy"></i>
        <div data-i18n="Extended UI">Time Slot</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item {{ Route::is('management.bays.*') ? 'active' : '' }} ">
            <a href="{{route('management.bays.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Text Divider">Bay</div>
            </a>
        </li>

        <li class="menu-item {{ Route::is('management.bay-timeslots.*') ? 'active' : '' }} ">
            <a href="{{route('management.bay-timeslots.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Text Divider">Bay Time Slot</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('management.leave-managements.*') ? 'active' : '' }} ">
            <a href="{{route('management.leave-managements.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Text Divider">Leave Management</div>
            </a>
        </li>
    </ul>
</li>

<li class="menu-item {{ Route::is('users.*') ? 'active' : '' }}">
    <a href="{{route('users.index')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div data-i18n="Text Divider">Register Customers</div>
    </a>
</li>


{{--<!--Credit Invoice  -->--}}
{{--<li class="menu-item">--}}
{{--    <a href="dashboard.html" class="menu-link ">--}}
{{--        <i class="menu-icon tf-icons bx bx-file"></i>--}}
{{--        <div data-i18n="Dashboards">Credit Invoice</div>--}}
{{--    </a>--}}

{{--</li>--}}

{{--<li class="menu-item">--}}
{{--    <a href="incoming-services.html" class="menu-link">--}}
{{--        <i class="menu-icon tf-icons bx bx-file"></i>--}}
{{--        <div data-i18n="Text Divider">Incoming services</div>--}}
{{--    </a>--}}
{{--</li>--}}

<li class="menu-item {{ Route::is('catalog.booking.*') ? 'active' : '' }}">
    <a href="{{route('catalog.booking')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div data-i18n="Text Divider">Incoming Booking</div>
    </a>
</li>
