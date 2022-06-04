
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('user.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
    
      <li class="nav-item">
        <a class="nav-link collapsed {{ Route::currentRouteName() == 'user.orders.index' ? 'active' : '' }}" href="{{route('user.orders.index')}}">
          <i class="bi bi-cart-check-fill"></i>
          <span>Orders</span>
        </a>
      </li>


    </ul>

  </aside><!-- End Sidebar-->