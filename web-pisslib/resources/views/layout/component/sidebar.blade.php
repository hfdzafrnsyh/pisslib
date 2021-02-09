    <!-- Sidebar -->
    <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon rotate-n-15">
          <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">Pisslib</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
     
      <div class="user-image text-center mt-2 mb-2 ">
      <img src="{{ asset('wp-pisslib/image/' . auth()->user()->image) }}" class="rounded-circle" alt="profile" style="width:100px;height:100px;">
      <h4 class="text-white">{{ auth()->user()->name }}</h4>
      </div>
     
      <hr class="sidebar-divider my-0">


      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>



      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="/datauser">
          <i class="fas fa-fw fa-users"></i>
          <span>User</span></a>
      </li>



      <hr class="sidebar-divider my-0">
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="/books">
          <i class="fas fa-fw fa-book"></i>
          <span>Books</span></a>
      </li>



      <hr class="sidebar-divider my-0">




      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
