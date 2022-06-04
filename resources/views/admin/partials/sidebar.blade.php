
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
    
       <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.categories.index')}}">
         <i class="bi bi-list-nested"></i>
          <span>Categories</span>
        </a>
      </li>

       <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.brands.index')}}">
         <i class="bi bi-tags-fill"></i>
          <span>Brands</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.products.index')}}">
          <i class="bi bi-cart"></i>
          <span>Products</span>
        </a>
      </li>

       <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.settings.edit')}}">
          <i class="bi bi-gear"></i>
          <span>General Settings</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}" href="{{route('admin.orders.index')}}">
          <i class="bi bi-cart-check-fill"></i>
          <span>Orders</span>
        </a>
      </li>


    </ul>

  </aside><!-- End Sidebar-->