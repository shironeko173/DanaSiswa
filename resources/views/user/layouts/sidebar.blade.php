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
      <div class="info" style="color: azure">
        <h6 class="d-block">{{Auth::user()->nama}}</h6>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="/user" class="nav-link">
            <i class="bi bi-layout-text-window-reverse mr-2"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/Deposit-User" class="nav-link">
            <i class="bi bi-cash-stack mr-2"></i>
            <p>
              Deposito
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/Penarikan-User" class="nav-link">
            <i class="bi bi-wallet2 mr-2"></i>
            <p>
              Penarikan 
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/history" class="nav-link">
            <i class="bi bi-bank mr-2"></i>
            <p>
              Riwayat Transaksi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Akun
              <i class="fas fa-angle-left right "></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/biodata" class="nav-link">
                <p>Biodata Akun</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/gantipassword" class="nav-link">
                <p>Ganti Password</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="/Frequently-Asked-Questions" class="nav-link">
            <i class="bi bi-question-circle mr-2"></i>
            <p>
              FAQ
            </p>
          </a>
        </li>
        
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
          </div>
        </div>
        <li class="nav-item">
          <a href="/home" class="nav-link">
            <i class="fas fa-home mr-2"></i>
            <p>
              Back To Home
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>