@extends('layouts.element.main')

@section('title', 'Import')

@section('custom-css')
    <style>
        .breadcrumb-item + .breadcrumb-item::before{
            content: '-';
            color: #5e72e4;
        }
    </style>
@endsection

@section('content')



@include('layouts.element.navbar')

    <!-- Header -->
    <div class="header bg-gradient-info pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                  
                  <div class="jumbotron col-md-12">
                    <p class="lead">Selamat datang Admin di halaman Dashboard :)</p>
                    <h1 class="display-3 text-dark">Event Student</h1>
                    <hr class="my-2">                    
                  </div>                  
                    {{-- <div class="col-xl-3 col-lg-6 p-2">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                            <div class="row">
                                <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Data Siswa</h5>
                                
                                </div>
                                <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-users"></i>
                                </div>
                                </div>
                            </div>
                            <p class="mt-2 mb-0 text-muted text-sm">
                                <span class="h2 font-weight-bold mb-0 text-dark">{{$countStudent}}</span>
                            </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 p-2">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Event</h5>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-chart-pie"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-2 mb-0 text-muted text-sm">
                                  <span class="h2 font-weight-bold mb-0 text-dark">{{$countEvent}}</span>
                              </p>
                            </div>
                        </div>
                    </div> --}}
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        
    </div>

@endsection
