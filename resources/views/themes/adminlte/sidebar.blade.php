<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/themes/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="/home"><i class="fa fa-circle-o"></i> Home</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Senarai Users</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> Lihat Semua</a></li>
          <li><a href="{{ route('users.create') }}"><i class="fa fa-circle-o"></i> Tambah User</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-cogs"></i>
          <span>Senarai Assets</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('assets.index') }}"><i class="fa fa-circle-o"></i> Lihat Semua</a></li>
          <li><a href="{{ route('assets.create') }}"><i class="fa fa-circle-o"></i> Tambah Asset</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-shopping-cart"></i>
          <span>Senarai Tempahan</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('tempahan.index') }}"><i class="fa fa-circle-o"></i> Lihat Semua</a></li>
          <li><a href="{{ route('tempahan.create') }}"><i class="fa fa-circle-o"></i> Tambah tempahan</a></li>
        </ul>
      </li>
  </section>
  <!-- /.sidebar -->
</aside>
