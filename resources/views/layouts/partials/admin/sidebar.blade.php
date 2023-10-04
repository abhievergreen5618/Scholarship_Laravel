<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Scholarship</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
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
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Classes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.classes')}}" class="nav-link active">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Class</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.class.index')}}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>View All Classes</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Subjects
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.subject.add')}}" class="nav-link active">
                  <i class="fas fa-plus  nav-icon"></i>
                  <p>Add Subject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.subjects.index')}}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>View All Subjects</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Scholarship Type
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.scholarshiptype.add')}}" class="nav-link active">
                  <i class="fas fa-plus  nav-icon"></i>
                  <p>Add Scholarship</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.scholarshiptype.index')}}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>View All Scholarship</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
              <p>
              Students
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.user.add')}}" class="nav-link active">
                  <i class="fas fa-plus  nav-icon"></i>
                  <p>Add Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>View All Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.user.result')}}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Upload Result</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.user.admitcard')}}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Admit Card</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Fees
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="{{route('admin.fee.add')}}" class="nav-link active">
                  <i class="fas fa-plus  nav-icon"></i>
                  <p>Add Fee</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="{{route('admin.fee.index')}}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>View Fee Details</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Revenue
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.payment.index')}}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Payment</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Session
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.session.add')}}" class="nav-link active">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Session</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.session.index')}}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>View All Session</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
