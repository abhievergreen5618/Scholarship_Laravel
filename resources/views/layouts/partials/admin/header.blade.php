<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      

    <li class="nav-item">
<a class="nav-link" data-widget="fullscreen" href="#" role="button">
<i class="fas fa-expand-arrows-alt"></i>
</a>
</li>
     
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->

      {{-- Profile popup --}}
        <li class="nav-item dropdown user user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                @php $imglink = (!empty(Auth::user()->profile_img)) ? asset('images/').'/'.Auth::user()->profile_img : asset('images/imguserr.png'); @endphp
                <img src="{{ $imglink }}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ ucfirst(Auth::user()->name) }}</span>
            </a>
            <ul class="dropdown-menu">

                <li class="user-header">
                    <img src="{{ $imglink }}" class="img-circle" alt="User Image">
                    <p>
                        {{ ucfirst(Auth::user()->name) }}
                        {{-- <small>Member since Nov. 2012</small> --}}
                    </p>
                </li>
                <div class="dropdown-divider"></div>
                <li class="text-center">
                    {{ ucfirst(Auth::user()->email) }}

                </li>
                <div class="dropdown-divider"></div>
                <li class="user-footer">
                    
                    <div class="float-right">
                        {{-- <a href="#" class="btn btn-danger btn-flat">Sign out</a> --}}

                        <a class="btn btn-danger btn-flat" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
    </ul>
  </nav>
  <!-- /.navbar -->
