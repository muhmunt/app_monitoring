@extends('layouts.element.main')

@section('title', 'Admin')

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
                
                <h3>Langkah - langkah melakukan import data siswa</h3>
                <div class="row">

                  <div class="owl-carousel">
                    <div>
                        <div class="card text-left border-0 shadow">
                            <div class="p-2">
                                <h3 class="card-title text-dark">Step 1.</h3>
                                <h3 class="card-title text-dark">Buat file excel dengan format seperti berikut ini. Untuk rombel dan rayon diisi menggunakan id rombel dan id rayon yang telah di sediakan di step selanjutnya(Silahkan di slide).</h3>
                                <hr>
                                <p class="card-text">Keterangan : </p>
                                <p>1. Untuk kolom A harus dikosongkan karena akan diisi otomatis oleh database. 
                                    <br>2. Kolom B diisi NIS siswa. 
                                    <br>3. Kolom C diisi Nama Lengkap siswa.
                                    <br>4. Kolom D diisi Jenis kelamin siswa.
                                    <br>5. Kolom E diisi ID ROMBEL masing - masing siswa.
                                    <br>6. Terakhir di kolom F diisi ID RAYON masing - masing siswa. </p>
                            </div>
                            <div class="p-3 mx-auto">
                                <img class="card-img-top" style="width:500px;height;300px" src="{{asset('img/content/excel.jpg')}}" alt="">
                            </div>
                            <h4 class="card-title text-dark"></h4>
                            <div class="card-body">
                          </div>
                        </div>
                    </div>
                    <div>
                        <div class="card text-left border-0 shadow">            
                          <div class="card-body">
                            <h3 class="card-title text-dark">Step 2.</h3>
                            <hr>
                            <h3 class="card-title text-dark">Masukkan ID Rombel sesuai dengan data dibawah ini.</h3>
                            <h5 class="card-title text-dark">Daftar ID Rombel</h5>
                            
                            <table class="table" id="table-rombel">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Rombel</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($rombel as $kelas)
                                    <tr>
                                        <td>{{$kelas->id}}</td>
                                        <td>{{$kelas->rombel}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <p class="card-text"></p>
                          </div>
                        </div>
                    </div>
                    <div>
                        <div class="card text-left border-0 shadow">            
                            <div class="card-body">
                              <h3 class="card-title text-dark">Step 3.</h3>
                              <hr>
                              <h3 class="card-title text-dark">Masukkan ID Rayon sesuai dengan data dibawah ini.</h3>
                              <h5 class="card-title text-dark">Daftar ID Rayon</h5>
                              
                              <table class="table" id="table-rayon">
                                  <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Rayon</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach ($rayon as $wilayah)
                                      <tr>
                                          <td>{{$wilayah->id}}</td>
                                          <td>{{$wilayah->rayon}}</td>
                                      </tr>
                                  @endforeach
                                  </tbody>
                              </table>
                              <p class="card-text"></p>
                            </div>
                          </div>
                    </div>
                    <div> 
                        <div class="card text-left">
                          <div class="card-body">
                            <h4 class="card-title text-dark">Step 4.</h4>
                            <p class="card-text">Jika sudah melakukan ketiga langkah tersebut data excel bisa langsung diimport ke database dengan klik <a href="{{route('student.index')}}">disini</a>. selamat mencoba.</p>
                          </div>
                        </div>    
                    </div>
                  </div>                                  
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        
    </div>

@endsection
<script src="{{ asset('/assets/js/jquery-3.4.1.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                loop:false,
                margin:10,
                responsiveClass:true,
                items:1,
            });

            $('#table-rombel').DataTable();
            $('#table-rayon').DataTable();
        });
    </script>