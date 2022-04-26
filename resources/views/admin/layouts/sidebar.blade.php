<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('assest') }}/images/avt1.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Tài Khoản Admin</p>
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

        

        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Quản lý Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('category.index')}}"><i class="fa fa-circle-o"></i>Menu cha</a></li>
            <li><a href="{{ route('category-sub.index')}}"><i class="fa fa-circle-o"></i>Menu con</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Quản lý sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('product.index')}}"><i class="fa fa-circle-o"></i>Tất cả sản phẩm</a></li>
            <li><a href="{{ route('add.product')}}"><i class="fa fa-circle-o"></i>Thêm sản phẩm</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Thuộc tính sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('attr-product.index')}}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
            <li><a href="{{ route('attr-product.create')}}"><i class="fa fa-circle-o"></i>Thêm mới màu</a></li>
            <li><a href="{{ route('attr-product.edit', 1)}}"><i class="fa fa-circle-o"></i>Thêm mới size</a></li>
          </ul>
        </li>
        
        <li>
          <a href="">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">Hot</small>
            </span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>