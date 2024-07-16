<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Destek Hattı</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">User</a>
        </div>
      </div>
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Destek Sayfamız
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('destek.show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Destek Talebi Oluştur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('destek.list.active')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Devam Eden Taleblerim</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('destek.list.son')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sonlandırılan Taleblerim</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('destek.list.askı')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Askıda Olan Taleblerim</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>