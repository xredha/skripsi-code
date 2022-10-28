<div id="sidebar" class='active'>
  <div class="sidebar-wrapper active">
    <div class="sidebar-header text-center">
      <h2>SPK</h2>
    </div>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-item active ">
          <a href="{{ route('dashboard.index') }}" class='sidebar-link'>
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
            <li><a href="{{ route('alternatif.index') }}">Alternatif</a></li>
            <li><a href="{{ route('nilai-bobot.index') }}">Nilai Bobot</a></li>
          </ul>
        </li>
        
        <li class='sidebar-title'>Hasil Perhitungan</li>
        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i data-feather="package" width="20"></i>
            <span>Metode SAW</span>
          </a>
          <ul class="submenu ">
            <li><a href="{{ route('saw.index') }}">Matriks Ternormalisasi (R)</a></li>
            <li><a href="{{ route('saw.hasil') }}">Hasil</a></li>
          </ul>
        </li>
        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i data-feather="package" width="20"></i>
            <span>Metode WP</span>
          </a>
          <ul class="submenu ">
            <li><a href="{{ route('wp.index') }}">Vektor S dan V</a></li>
            <li><a href="{{ route('wp.hasil') }}">Hasil</a></li>
          </ul>
        </li>

        <li class='sidebar-title'>Pengaturan</li>
        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i data-feather="user" width="20"></i>
            <span>Pengguna</span>
          </a>
          <ul class="submenu ">
            <li><a href="{{ route('user.index') }}">Olah Data User</a></li>
          </ul>
        </li>

      </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>
