  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('Adminlte3/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle " >
      <span class="brand-text font-weight-light">E-gudang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" wire:navigate class="nav-link @if(request()->routeIs('dashboard')) active @endif">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @auth
            @if(auth()->user()->isSuperAdmin())
              <li class="nav-header">MENU SUPER ADMIN</li>
              <li class="nav-item">
                <a href="{{route('superadmin.user.index')}}" wire:navigate class="nav-link @yield('menuSuperadminUser')">
                  <i class="nav-icon fas fa-user"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('superadmin.kategori.index')}}" wire:navigate class="nav-link @yield('menuSuperadminKategori')">
                  <i class="nav-icon fas fa-list"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('superadmin.barang.index')}}" wire:navigate class="nav-link @yield('menuSuperadminBarang')">
                  <i class="nav-icon fas fa-warehouse"></i>
                  <p>Barang</p>
                </a>
              </li>
            @else
              <li class="nav-header">ADMIN</li>
              <li class="nav-item">
                <a href="{{route('admin.barang.index')}}" wire:navigate class="nav-link @yield('menuAdminBarang')">
                  <i class="nav-icon fas fa-warehouse"></i>
                  <p>Barang</p>
                </a>
              </li>
            @endif
          @endauth
        </ul>

      </nav>
    </div>
  </aside>