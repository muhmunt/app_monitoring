

<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-2" href="javascript:;">        
        <img width="100px" style="max-height: 100px;" src="{{asset('/img/background/dashboard.png')}}" class="navbar-brand-img">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{asset('assets/argon/img/theme/team-1-800x800.jpg')}}">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
            </div>
            <h6 class="text-overflow m-0"><span>Welcome!</span></h6>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="{{asset('assets/argon/img/brand/blue.png')}}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a id="dashboard-id" class="nav-link" href="{{url('/admin')}}">
                    <i class="fa fa-tachometer-alt text-warning"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a id="student-id" class="nav-link" href="{{route('student.index')}}">
                    <i class="fas fa-user text-blue"></i>
                    Data Siswa 
                </a>
            </li>
            <li class="nav-item">
                <a id="rayon-id" class="nav-link" href="{{route('rayons.index')}}">
                    <i class="fas fa-map-marked-alt text-green"></i>
                    List Rayon 
                </a>
            </li>
            <li class="nav-item">
                <a id="rombel-id" class="nav-link" href="{{route('rombels.index')}}">
                    <i class="fas fa-user-friends text-info"></i>
                    List Rombel 
                </a>
            </li>
            <li class="nav-item">
                <a id="event-id" class="nav-link" href="{{route('events.index')}}">
                    <i class="fa fa-list-alt text-warning"></i>
                    Event
                </a>
            </li>
            {{-- <li class="nav-item">
                <a id="account-id" class="nav-link" href="">
                    <i class="ni ni-badge text-default"></i>
                    Account Admin
                </a>
            </li>
            <li class="nav-item">
                <a id="role-id" class="nav-link" href="">
                    <i class="fa fa-users-cog text-default"></i>
                    Role
                </a>
            </li> --}}
        </ul>

      </div>
    </div>
</nav>

@section('scripts')

    <script>
        $(document).ready(function(){

            // var url = window.location.href;
            // var urls = url.split('localhost/app_monitoring/public/');
            // // console.log(url);
            // var param = urls[1].split('edit');
            // var p = param[0].split('admin');
            // var asli = p[1].split('/');
            // //console.log(asli);

            // if( urls[1] == 'admin/student' || urls[1] == 'admin/student/' || urls[1] == 'admin/student/create' || urls[1] == 'admin/student/'+asli[2]+'/edit' ){
            //     $('.nav-item a').removeClass('test');
            //     $('#student-id i').removeClass('text-default');
            //     $('#student-id').addClass('test');
            // }else if( urls[1] == 'admin/events' || urls[1] == 'admin/events/' || urls[1] == 'admin/events/create' || urls[1] == 'admin/events/'+asli[2]+'/edit' ){
            //     $('.nav-item a').removeClass('test');
            //     $('#event-id i').removeClass('text-default');
            //     $('#event-id').addClass('test');
            // }else if( urls[1] == 'admin/rayons' || urls[1] == 'admin/rayons/' || urls[1] == 'admin/rayons/create' || urls[1] == 'admin/rayons/'+asli[2]+'/edit' ){
            //     $('.nav-item a').removeClass('test');
            //     $('#rayon-id i').removeClass('text-default');
            //     $('#rayon-id').addClass('test');
            // }else if( urls[1] == 'admin/rombels' || urls[1] == 'admin/rombels/' || urls[1] == 'admin/rombels/create' || urls[1] == 'admin/rombels/'+asli[2]+'/edit' ){
            //     $('.nav-item a').removeClass('test');
            //     $('#rombel-id i').removeClass('text-default');
            //     $('#rombel-id').addClass('test');
            // }else{
            //     $('.nav-item a').removeClass('test');
            //     $('#dashboard-id i').removeClass('text-default');
            //     $('#dashboard-id').addClass('test');
            // }

        })
    </script>

@endsection
