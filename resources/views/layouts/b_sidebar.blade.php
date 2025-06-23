<aside class="main-sidebar elevation-4 sidebar-dark-success">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link navbar-gray">
    <img src="{{ asset('images/PITAHCLogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">PITAHC ACCESS</span>
  </a>
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                @include('livewire.menu')
            </ul>
        </nav>
    </div>
</aside>
