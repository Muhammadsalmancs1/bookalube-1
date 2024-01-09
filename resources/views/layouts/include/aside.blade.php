<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{url('/')}}" class="">

            <img src="{{ asset('theme/img/Asset 1.png')}}" alt="" class="">
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        @include('layouts.include.sidebar')
    </ul>
</aside>
