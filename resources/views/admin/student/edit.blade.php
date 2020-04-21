@extends('layouts.element.main')

@section('title', 'Siswa || Edit')

@section('custom-css')
    <style>
        .breadcrumb-item + .breadcrumb-item::before{
            content: '-';
            color: #5e72e4;
        }
    </style>
@endsection

@section('content')

<!-- Navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Brand -->
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{route('index')}}">EventStudent</a>
    
    <!-- User -->
    <ul class="navbar-nav align-items-center d-none d-md-flex">
      <li class="nav-item dropdown">
        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="media align-items-center">
            <span class="avatar avatar-sm rounded-circle">            
            <img alt="Image placeholder" src="{{asset('assets/img/man-1.png')}}">
            </span>
            <div class="media-body ml-2 d-none d-lg-block">
              <span class="mb-0 text-sm  font-weight-bold"></span>
            </div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
          <div class=" dropdown-header noti-title">
            <h6 class="text-overflow m-0">Welcome!</h6>
          </div>
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
  </div>
</nav>
<!-- End Navbar -->
<!-- Header -->
<div class="header bg-gradient-info pb-8 pt-5 pt-md-8">
</div>
<div class="container-fluid mt--7">

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-inner--text">
                {{session('success')}}
        </span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif
    @if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <span class="alert-inner--icon"><i class="fas fa-exclamation-triangle"></i></span>
        <span class="alert-inner--text">
                {{session('warning')}}
        </span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif
          <!-- Table -->
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-bottom-1">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-links" style="background:none;">
                            <li class="breadcrumb-item">
                                <a href="{{url('/admin')}}">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('student.index') }}">
                                    Student
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-auto text-right">

                </div>
            </div>
        </div>
        <div class="card-body" style="background: #f7f8f9;">
                <form action="{{route('student.update',$student->id)}}" method="POST" enctype="multipart/form-data" id="form-register">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 p-1">
                            <div class="form-group">
                                <label class="form-control-label">
                                    Nis Siswa
                                </label>
                                <input type="number" name="nis" class="form-control form-control-alternative" readonly value="{{$student->nis}}" placeholder="Masukkan Nis...">
                            </div>
                        </div>
                        <div class="col-md-6 p-1">
                            <div class="form-group">
                                <label class="form-control-label">
                                    Nama Siswa
                                </label>
                                <input type="text" name="nama" class="form-control form-control-alternative" value="{{ucwords($student->nama)}}" placeholder="Masukkan nama siswa">
                            </div>
                        </div>
                        <div class="col-md-6 p-1">
                            <div class="form-group">
                                <label class="form-control-label">
                                  Jenis Kelamin
                                </label>
                                <select name="jk" class="form-control">
                                
                                  @if ($student->jk == 'l')
                                  <option value="l" selected >
                                      Laki - laki
                                  </option>                                  
                                  <option value="p" >
                                      Perempuan
                                  </option>                                  
                                  @else
                                  <option value="p" selected >
                                      Perempuan
                                  </option>                                  
                                  <option value="l" >
                                      Laki - laki
                                  </option>
                                  @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 p-1">
                            <div class="form-group">
                                <label class="form-control-label">
                                    Rombel
                                </label>
                                <select name="rombel" class="form-control form-control-alternative" id="">
                                 @foreach ($rombel as $b)
                                  @php
                                    $cek = $b->id ==  $student->rombel->id;
                                  @endphp
                                  <option value="{{ $b->id }}" {{ $cek  ? 'selected = selected' : ''  }}>
                                      {{ $b->rombel }}
                                  </option>                                  
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 p-1">
                            <div class="form-group">
                                <label class="form-control-label">
                                    Rayon
                                </label>
                                <select name="rayon" class="form-control form-control-alternative" id="">
                                    @foreach ($rayon as $y)
                                     @php
                                       $cek = $y->id ==  $student->rayon->id;
                                     @endphp
                                     <option value="{{ $y->id }}" {{ $cek  ? 'selected = selected' : ''  }}>
                                         {{ $y->rayon }}
                                     </option>                                  
                                   @endforeach
                                   </select>
                            </div>
                        </div>
                        
                        <div class="col-md-8"></div>
                        <div class="col text-right">
                            <button type="submit" class="btn btn-icon btn-primary" style="border-radius: 22px;">
                                <span class="btn-inner--text">Kirim</span>
                            </button>
                        </div>
                    </div>
                    </form>
        </div>
        <div class="card-footer py-4">

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

<script src="{{ asset('/assets/js/jquery-3.4.1.min.js') }}"></script>

    <script>
        $(document).ready(function () {

            

        });
    </script>
{!! JsValidator::formRequest('App\Http\Requests\StudentRequest', '#form-register') !!}