<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{ asset('/backend/') }}/assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{ session()->get('adminName') }}</span>
                  <span class="text-secondary text-small">Owner</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/category/add') }}">Add</a></li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/category/manage') }}">Manage</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#brand" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Brand</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="brand">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/brand/add') }}">Add</a></li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/brand/manage') }}">Manage</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="product">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/product/add') }}">Add</a></li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/product/manage') }}">Manage</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#orders" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Orders</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="orders">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/order/today') }}">Today Orders</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="{{ url('/order/all') }}">All Orders</a>
                </li>
                </ul>
              </div>
            </li>

          </ul>
        </nav>
