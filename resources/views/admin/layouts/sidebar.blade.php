<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
      <img src={{ asset('assets/dist/img/logo-removebg-preview.png') }} alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DANA SISWA</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src={{ asset('assets/dist/img/profilep.png') }} class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->role }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          {{-- Dashboard --}}
          <li class="nav-item">
            <a href="/admin" class="nav-link">
              <i class="iconify mr-2 mb-1" data-icon="ic:baseline-space-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/tabungan" class="nav-link">
              <i class="iconify mr-2  mb-1" data-icon="fa6-solid:sack-dollar"></i> 
              <p>
                Tabungan Siswa
              </p>
            </a>
          </li>

          {{-- Deposit --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="iconify mr-2 mb-1" data-icon="bi:safe2-fill" data-flip="horizontal"></i> 
              <p>
                Deposit
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/deposit/validasi" class="nav-link">
                  <i class="far fa-circle nav-icon mr-2"></i>
                  <p>Validasi Deposit</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('deposit.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon mr-2"></i>
                  <p>Riwayat Deposit</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Penarikan --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="iconify mr-2 mb-1" data-icon="fa-solid:money-bill-wave-alt"></i> 
              <p>
                Penarikan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/penarikan/validasi" class="nav-link">
                  <i class="far fa-circle nav-icon mr-2"></i>
                  <p>Validasi Penarikan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/penarikan" class="nav-link">
                  <i class="far fa-circle nav-icon mr-2"></i>
                  <p>Riwayat Penarikan</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- User --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="iconify mr-2 mb-1" data-icon="bxs:user"></i> 
              <p>
                Users
                <i class="right fas fa-angle-left " ></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/users/validasi" class="nav-link">
                  <i class="far fa-circle nav-icon mr-2"></i>
                  <p>Validasi User</p>
                </a> 
              </li>
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon mr-2"></i>
                  <p>User Info</p>
                </a>
              </li>
            </ul>
          </li>

         {{-- Website --}}
         <li class="nav-item">
          <a href="/website" class="nav-link">
            <i class="iconify mr-2 mb-1" data-icon="mdi:web"></i>
            <p>
              Berita
              <i class="right fas fa-angle-left "></i>
            </p>
          </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"> 
                <a href="/berita/tambah-berita" class="nav-link">
                  <i class="far fa-circle nav-icon mr-2"></i>
                  <p>Tambah Berita</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/berita/kelola-berita" class="nav-link"> 
                  <i class="far fa-circle nav-icon mr-2"></i>
                  <p>Kelola Berita</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/kategori/tambah-kategori" class="nav-link">
                  <i class="far fa-circle nav-icon mr-2"></i>
                  <p>Tambah Kategori Berita</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/kategori/kelola-kategori" class="nav-link">
                  <i class="far fa-circle nav-icon mr-2"></i>
                  <p>Kelola Kategori Berita</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="/website" class="nav-link">
              <i class="iconify mr-2" data-icon="mdi:web"></i>
              <p>
                 FAQ
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/faq/tambah-faq" class="nav-link">
                    <i class="far fa-circle nav-icon mr-2"></i>
                    <p>Tambah FAQ</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/faq/kelola-faq" class="nav-link">
                    <i class="far fa-circle nav-icon mr-2"></i>
                    <p>Kelola FAQ</p>
                  </a>
                </li>
              </ul>
          </li>
          
          
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @can('SuperAdmin')
            <div class="info">
              <p class="m-0" style="color: aliceblue"> ADMINISTRATOR TOOL</p>
              <li class="nav-item">
                <a href="/add-admin" class="nav-link">
                  <i class="fa-solid fa-user-plus mr-2"></i>
                    <p>
                      Add Admin
                    </p>
                  </a>
                </li>
            </div>
          @endcan
            
          </div>
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="fas fa-home mr-2"></i>
              <p>
                Back To Home
              </p>
            </a>
          </li>
          
          
          
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>