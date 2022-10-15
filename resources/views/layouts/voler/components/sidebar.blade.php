<div id="sidebar" class='active'>
  <div class="sidebar-wrapper active">
    <div class="sidebar-header text-center">
      <h2>SPK</h2>
    </div>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-item active ">
          <a href="{{ url('admin') }}" class='sidebar-link'>
            <i data-feather="home" width="20"></i>
            <span>Halaman Utama</span>
          </a>
        </li>

        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i data-feather="package" width="20"></i>
            <span>Olah Data</span>
          </a>
          <ul class="submenu ">
            <li><a href="{{ route('kriteria.index') }}">Kriteria</a></li>
            <li><a href="{{ route('subkriteria.index') }}">Subkriteria</a></li>
            <li><a href="component-breadcrumb.html">Alternatif</a></li>
            <li><a href="component-buttons.html">Nilai Bobot</a></li>
          </ul>
        </li>
        
        <li class='sidebar-title'>Hasil Perhitungan</li>
        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i data-feather="package" width="20"></i>
            <span>Metode SAW</span>
          </a>
          <ul class="submenu ">
            <li><a href="component.html">Matriks Ternormalisasi (R)</a></li>
            <li><a href="component-badge.html">Hasil</a></li>
          </ul>
        </li>
        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i data-feather="package" width="20"></i>
            <span>Metode WP</span>
          </a>
          <ul class="submenu ">
            <li><a href="component-card.html">Vektor S dan V</a></li>
            <li><a href="component-card.html">Hasil</a></li>
          </ul>
        </li>

        <li class='sidebar-title'>Pengaturan</li>
        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i data-feather="book" width="20"></i>
            <span>Laporan</span>
          </a>
          <ul class="submenu ">
            <li><a href="error-403.html">403</a></li>
            <li><a href="error-404.html">404</a></li>
            <li><a href="error-500.html">500</a></li>
          </ul>
        </li>
        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i data-feather="user" width="20"></i>
            <span>Pengguna</span>
          </a>
          <ul class="submenu ">
            <li><a href="auth-login.html">Login</a></li>
            <li><a href="auth-register.html">Register</a></li>
            <li><a href="auth-forgot-password.html">Forgot Password</a></li>
          </ul>
        </li>

      </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>
