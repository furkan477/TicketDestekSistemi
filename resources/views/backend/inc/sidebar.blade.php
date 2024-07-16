<nav class="sidebar sidebar-offcanvas bg-dark" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Destekleri Listele</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic3">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.destek.active')}}">Açık Destekler</a></li>
        </ul>
      </div>
      <div class="collapse" id="ui-basic3">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.destek.terminated')}}">Kapalı Destekler</a></li>
        </ul>
      </div>
      
      <div class="collapse" id="ui-basic3">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.destek.hanger')}}">Askıdaki Destekler</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>