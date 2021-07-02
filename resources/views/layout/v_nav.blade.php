 <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/home">
          <strong><i class="fas fa-fw fa-user"></i>
          <span>{{ Auth::user()->username }}</span></strong></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item {{request()->is('home')?'active':''}}">
        <a class="nav-link" href="/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-home"></i>
          <span>Landing</span></a>
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider">

       <!-- Heading -->
      <div class="sidebar-heading">
        Profile
      </div> 

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{request()->is('profile')?'active':''}}">
        <a class="nav-link" href="/profile">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span></a>
      </li>

      @if (auth()->user()->level==1)
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu Admin Master
      </div> 

      <li class="nav-item {{request()->is('peserta')?'active':''}}">
        <a class="nav-link" href="/peserta">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Peserta</span></a>
      </li>

      <li class="nav-item {{request()->is('voucher')?'active':''}}">
        <a class="nav-link" href="/voucher">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Voucher</span></a>
      </li>

      <li class="nav-item {{request()->is('destinasik')?'active':''}}">
        <a class="nav-link" href="/destinasik">
          <i class="fas fa-fw fa-map"></i>
          <span>Destinasi</span></a>
      </li>

      <li class="nav-item {{request()->is('kategori')?'active':''}}">
        <a class="nav-link" href="/kategori">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Kategori Destinasi</span></a>
      </li>

      <li class="nav-item {{request()->is('perangkat')?'active':''}}">
        <a class="nav-link" href="/perangkat">
          <i class="fas fa-fw fa-microchip"></i>
          <span>Perangkat</span></a>
      </li>

      <li class="nav-item {{request()->is('kartu')?'active':''}}">
        <a class="nav-link" href="/kartu">
          <i class="fas fa-fw fa-credit-card"></i>
          <span>Data Kartu</span></a>
      </li>


      <li class="nav-item {{request()->is('fitur')?'active':''}}">
        <a class="nav-link" href="/fitur">
          <i class="fas fa-fw fa-archive"></i>
          <span>Fitur</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{request()->is('transaksi')?'active':''}} {{request()->is('transaksi')?'active':''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-list"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/transaksi"><strong>Riwayat Transaksi</strong></a>  
            <a class="collapse-item" href="/transaksi"><strong>Laporan Transaksi</strong></a>
          </div>
        </div>
      </li>            
      @elseif (auth()->user()->level==2)
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu Admin Destinasi
      </div> 

      <li class="nav-item {{request()->is('destinasik')?'active':''}}">
        <a class="nav-link" href="/destinasik">
          <i class="fas fa-fw fa-map"></i>
          <span>Data Destinasi</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{request()->is('transaksi')?'active':''}} {{request()->is('transaksi')?'active':''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-list"></i>
          <span>Transaksi Destinasi</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/transaksi"><strong>Riwayat Transaksi</strong></a>  
            <a class="collapse-item" href="/transaksi"><strong>Laporan Transaksi</strong></a>
          </div>
        </div>
      </li>
      @elseif (auth()->user()->level==3)
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu User
      </div> 

      <li class="nav-item {{request()->is('destinasi')?'active':''}}">
        <a class="nav-link" href="/destinasi">
          <i class="fas fa-fw fa-map"></i>
          <span>Destinasi</span></a>
      </li>

      <li class="nav-item {{request()->is('topup')?'active':''}}">
        <a class="nav-link" href="/topup">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Top Up</span></a>
      </li>

       <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{request()->is('transaksi')?'active':''}} {{request()->is('transaksi')?'active':''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-list"></i>
          <span>Transaksi Destinasi</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/transaksi"><strong>Riwayat Transaksi</strong></a>  
            <a class="collapse-item" href="/transaksi"><strong>Laporan Transaksi</strong></a>
          </div>
        </div>
      </li>
      @endif

       <!-- Divider -->
      <hr class="sidebar-divider">
      

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    