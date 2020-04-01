@extends('layouts.app')

@section('content')

  <style>
    .card-height{
      height: 100%;    
    }

    @media only screen and (max-width: 2000px) {
      .card-height{
        height: 200px;    
      } 
    }
    @media only screen and (max-width: 600px) {
      .card-height{
        height: 100%;    
      } 
    }
    @media only screen and (max-width: 800px) {
      .card-height{
        height: 100%;    
      } 
    }
  </style>

    <div class="container">

        <div class="header">
            <div class="row">
                {{-- Text Left --}}
                <div class="col-md-4">
                    <h2 class="georgia font-weight-bold">Event, Scan, List to Monitoring.</h2>
                    <p class="font-weight-bold">Wikrama High Shool <span class="text-grey">student monitoring.</span></p>
                </div>
                
                {{-- space --}}
                <div class="col-md-4">
                    
                </div>
                
                {{-- Text Right --}}
                <div class="col-md-4">
                    <h2 class="georgia font-weight-bold">"Start Your Day with Bismillah"</h2>
                </div>
            </div>
        </div>

        {{-- Pink Divider --}}
        <div class="divider">
            <div class="row">
                <div class="col-md-3">
                    <p><i class="fas fa-heart text-pink"></i> Monitoring Today</p>   
                </div>
                <div class="col-md-9">
                    <hr style="border:1px solid #E5386D;margin-left:-11%">
                </div>
            </div>
        </div>
        
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>{{session('success')}}</strong> 
            </div>            
            @endif

        {{-- Image --}}
        <div class="jumbotron rounded">
          <div class="p-3">
            <h1 class="display-3 text-white">Event Student Wikrama</h1>
            <p class="lead text-white">Memantau peserta didik SMK WIKRAMA hanya dalam 1 aplikasi. Dengan cara Scan Barcode menggunakan Handphone Bapak/Ibu Guru SMK WIKRAMA.</p>
            
            <p class="lead">                  
              
              {{-- @foreach ($max as $m)                
                        <a class="btn btn-primary btn-sm" href="{{route('list',[$m->event->id,$m->event->slug])}}" role="button">Lihat selengkapnya disini ... </a>
              @endforeach --}}
                        
                </p>
            </div>            
        </div>

        {{-- Search Form --}}
        <form action="{{route('search')}}" method="GET">
          <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"> <i class="fas fa-search" style="color:#E5386D"></i> </span>
              </div>
              <input type="search" name="keyword" class="form-control form-control-lg" placeholder="Search here..." aria-label="Search" aria-describedby="basic-addon1">
          </div>                                                        
        </form>

        {{-- Pink Divider --}}
        <div class="divider pt-3">
          <div class="row">
              <div class="col-md-3">
                  <p><i class="fas fa-heart text-pink"></i> Monitoring Today ({{$count}})</p>   
              </div>
              <div class="col-md-9">
                  <hr style="border:1px solid #E5386D;margin-left:-13%">
              </div>
          </div>
        </div>

        {{-- Event Grind --}}
        <div class="grid">
                <div class="row p-2">
                    {{-- Left Content --}}
                    <div class="col-md-2 p-1">
                      <button class="btn btn-lg bg-pink waves text-white shadow" data-toggle="modal" data-target="#modelId">Tambah Event <br><small>klik disini..</small></button>
                    </div>                
                    
                    {{-- Right Content --}}
                    <div class="col-md-10">                        
                        <div class="row">
                          @foreach ($event as $key => $e)
                          <?php
                              if ($key === 0) {
                                $color = 'bg-pinkA';
                                $img = 'img/ui-images/undrawA.svg';
                                $text = 'text-white';
                              }elseif($key == 1){
                                $color = 'bg-pinkB';
                                $img = 'img/ui-images/undrawB.svg';
                                $text = 'text-warning';
                              }elseif($key == 2){
                                $color = 'bg-pinkC';
                                $img = 'img/ui-images/undrawC.svg';
                                $text = 'text-white';
                              }else{
                                $color = 'bg-pinkD';
                                $img = 'img/ui-images/undrawD.svg';
                                $text = 'text-warning';
                              }
                          ?>
                          
                          <div class="col-md-6 p-1">
                            <a href="{{route('list',[$e->id,$e->slug])}}">
                              <div class="card text-left card-height {{$color}} shadow border-0 waves p-4" style="">
                                  <div class="card-body pt-3">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <img src="{{$img}}" class="rounded" style="width:80%;height:80%" alt="">
                                      </div>
                                      <div class="col-md-6">
                                        <h6>{{\Carbon\Carbon::parse($e->updated_at)->formatLocalized('%d %B %Y')}}</h6>
                                        <h4 class="card-title">{{$e->name}}</h4>
                                        <span class="{{$text}}">Monitoring Today</span> <br>
                                        Lihat selengkapnya ...
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </a>
                            </div>
                            @endforeach
                          </div>
                          <div class="pt-5">
                            {!!$event->render()!!}                          
                          </div>
                        </div>

                </div>
            </div>
    </div>    
    {{-- End Card --}}
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header border-0">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Event</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{route('create.event')}}">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nama Kegiatan:</label>
                  <input type="text" class="form-control" required name="nama" placeholder="Masukkan nama kegiatan ..." autofocus id="recipient-name">
                </div>
                <label for="message-text" class="col-form-label">Keterangan:</label>
                <textarea name="keterangan" class="form-control" id="" rows="5"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah Event</button>
            </div>
          </form>
          </div>
        </div>
      </div>
@endsection
@section('scripts')
    
      <script>

          $(document).ready(function(){

            

          });

      </script>

@endsection