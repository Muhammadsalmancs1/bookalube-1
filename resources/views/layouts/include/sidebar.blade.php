<!-- Dashboards -->
<li class="menu-item ">
    <a href="#" class="menu-link ">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Dashboards">Dashboard</div>
    </a>

</li>

<!-- registration -->
<li class="menu-item active open">
    <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-copy"></i>
        <div data-i18n="Extended UI">Registration</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item {{ Route::is('engines.*') ? 'active' : '' }} ">
            <a href="{{route('engines.index')}}" class="menu-link">
                <div data-i18n="Perfect Scrollbar">Engine</div>
            </a>
        </li>

        <li class="menu-item {{ Route::is('models.*') ? 'active' : '' }}">
            <a href="{{route('models.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Model</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('car-brands.*') ? 'active' : '' }}">
            <a href="{{route('car-brands.index')}}" class="menu-link">
                <div data-i18n="Text Divider"> Make</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('car-years.*') ? 'active' : '' }}" >
            <a href="{{route('car-years.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Year</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('services.*') ? 'active' : '' }}" >
            <a href="{{route('services.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Services</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('engine-oils.*') ? 'active' : '' }}" >
            <a href="{{route('engine-oils.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Engine oil</div>
            </a>
        </li>

        <li class="menu-item {{ Route::is('air-filters.*') ? 'active' : '' }}">
            <a href="{{route('air-filters.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Air filters</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('fuel-filters.*') ? 'active' : '' }}">
            <a href="{{route('fuel-filters.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Fuel filters</div>
            </a>
        </li>


        <li class="menu-item {{ Route::is('oil-filters.*') ? 'active' : '' }}">
            <a href="{{route('oil-filters.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Oil filters</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('transmission-filters.*') ? 'active' : '' }} ">
            <a href="{{route('transmission-filters.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Transmission filters</div>
            </a>
        </li>


        <li class="menu-item {{ Route::is('year-combinations.*') ? 'active' : '' }} ">
            <a href="{{route('year-combinations.index')}}" class="menu-link">
                <div data-i18n="Text Divider">Year Combination</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="make-combination.html" class="menu-link">
                <div data-i18n="Text Divider">Make Combination</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="model-combination.html" class="menu-link">
                <div data-i18n="Text Divider">Model Combination</div>
            </a>
        </li>


    </ul>
</li>

<!--Credit Invoice  -->
<li class="menu-item">
    <a href="dashboard.html" class="menu-link ">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div data-i18n="Dashboards">Credit Invoice</div>
    </a>

</li>
<li class="menu-item ">
    <a href="register-customers.html" class="menu-link">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div data-i18n="Text Divider">Register Customers</div>
    </a>
</li>
<li class="menu-item">
    <a href="incoming-services.html" class="menu-link">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div data-i18n="Text Divider">Incoming services</div>
    </a>
</li>
