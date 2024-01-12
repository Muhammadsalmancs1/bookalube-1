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
        <li class="menu-item">
            <a href="make.html" class="menu-link">
                <div data-i18n="Text Divider"> Make</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="year.html" class="menu-link">
                <div data-i18n="Text Divider">Year</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="services.html" class="menu-link">
                <div data-i18n="Text Divider">Services</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="engine-oil.html" class="menu-link">
                <div data-i18n="Text Divider">Engine oil</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="air-filters.html" class="menu-link">
                <div data-i18n="Text Divider">Air filters</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="fuel-filter.html" class="menu-link">
                <div data-i18n="Text Divider">Fuel filters</div>
            </a>
        </li>


        <li class="menu-item">
            <a href="Oil-filters.html" class="menu-link">
                <div data-i18n="Text Divider">Oil filters</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="transmission-filters.html" class="menu-link">
                <div data-i18n="Text Divider">Transmission filters</div>
            </a>
        </li>


        <li class="menu-item">
            <a href="year-combination.html" class="menu-link">
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
