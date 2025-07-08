<aside class="main-sidebar sidebar-dark-success elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
    <img src="{{ asset('images/PITAHCLogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
        <span class="brand-text font-weight-light">PITAHC IMS</span>
    </a>
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.b_menu')
            </ul>
        </nav>
    </div>
</aside>
