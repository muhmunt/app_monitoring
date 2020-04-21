@extends('layouts.app')

@section('content')
    
    <div class="container">
                        
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>            
            @endif
            @if (session('warning'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('warning')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            
            @endif

        {{-- Image --}}
        <div class="jumbotron jumbo rounded">
            <div class="">
                <h6>{{\Carbon\Carbon::parse($event->updated_at)->formatLocalized('%d %B %Y')}}</h6>
                <h1 class="display-3 text-white">{{ucwords($event->name)}}</h1>
                <p class  ="lead text-white">{{str_limit($event->keterangan,150)}}</p>
                <input type="hidden" id="id-event" value="{{ $event->id }}">
                <input type="hidden" id="id-slug" value="{{ $event->slug }}">
                <div class="">
                  
                  <button type="button" class="btn btn-primary btn-large text-white" data-toggle="modal" data-target="#modelId">Masukkan Nis</button>
                  
                  <a href="#" data-id="{{ route('delete.event', $event->id) }}" class="btn btn-danger btn-large text-white">Hapus Event</a>
                    
                </div>
            </div>            
        </div>

        {{-- <h5>{{\Carbon\Carbon::now()}}</h5> --}}
        {{-- Search Form --}}
        
            <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"> <i class="fas fa-search" style="color:#E5386D"></i> </span>
                </div>
                <input type="number" id="keyword" name="keyword" class="form-control form-control-lg" placeholder="Search NIS here..." aria-label="Search" aria-describedby="basic-addon1">
            </div>

        {{-- Pink Divider --}}
        <div class="divider mt-5">
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
                <div class="row p-2" id="list-data">
                    {{-- Card Student List --}}
                    {{-- <div class="col-md-3 p-1" >
                      <div class="card text-center bg-pinkC border-0 shadow" style="height:50vh">
                        <div class="card-body">
                          <h2 class="card-title text-white">Sort <br> by <br> Latest <br>.... <h2>                          
                        </div>
                      </div>
                    </div> --}}

                    {{-- <div class="col-md-3 p-1" id="list-data">
                      
                    </div> --}}
                    {{-- @foreach ($list as $item)
                        
                    <div class="col-md-3 p-1">
                      <div class="card text-center border-0 shadow" style="height:100%">
                        <div class="card-body">
                          <h4 class="card-title" style="text-decoration:underline;text-decoration-color:#E5386D">{{\Carbon\Carbon::parse($item->created_at)->formatLocalized('%T')}}</h4>
                          <div class="ratio img-responsive img-circle mx-auto" style="background-image: url({{asset('img/2.jpg')}});"></div>
                          <h5 class="card-text pt-3 p-2">{{ucwords($item->student->nama)}}</h5>
                          <div class="bottom pt-3">
                                <hr class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{$item->student->nis}}
                                    </div>
                                    <div class="col-md-6">
                                        {{$item->student->rombel->rombel}}
                                    </div>
                                </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>

                    @endforeach --}}

                </div>
            </div>
    </div>    
    {{-- End Card --}}
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header border-0">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{route('studentList.store')}}">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nis:</label>
                  <input type="number" class="form-control" required name="nis" placeholder="Masukkan nis siswa ... " autofocus id="recipient-name">
                  <input type="hidden" name="id_event" value="{{$event->id}}">
                </div>                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    
@endsection
@section('scripts')
    
      <script>        

          $(document).ready(function(){

    
            var id = $('#id-event').val();
            var slug = $('#id-slug').val();
            setTimeout(function(){
               window.location.reload(1);
            }, 60000);
            
              $.ajax({
                url : "{{ url('list/') }}/" +id+"/"+slug,
                dataType : 'json',
                type : 'get',
                success : function(response){
                  
                  $.each(response[0],function(e,i){
                    console.log(i)
                    $("#list-data").append($(`

                    <div class="col-md-3 p-1" id="list-data">
                      <div class="card text-center border-0 shadow" style="height:100%">
                        <div class="card-body">
                          <h4 class="card-title" style="text-decoration:underline;text-decoration-color:#E5386D"></h4>
                          <div class="ratio img-responsive img-circle mx-auto" style="background-image: url({{asset('img/ui-images/user-avatar.svg')}});"></div>
                          <h5 class="card-text pt-3 p-2">`+i.student.nama+`</h5>
                          <div class="bottom pt-3">
                                <hr class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        `+i.student.nis+`
                                    </div>
                                    <div class="col-md-6">
                                        `+i.student.rombel.rombel+`
                                    </div>
                                </div>
                          </div>
                          
                        </div>
                      </div>
                      </div>
                    

                    `))
                  })
                }
            })

            $('#keyword').keyup(function(){
              var id = $('#id-event').val();
              var slug = $('#id-slug').val();
              var txt = $(this).val();

                $.ajax({
                type : 'get',
                url : "{{ url('list/') }}/" +id+"/"+slug+"/search",
                dataType : 'json',
                data: {
                  keyword :txt
                },
                success : function(response){
                  $('#list-data').empty();
                  
                  $.each(response[0],function(e,i){
                    console.log(i)
                    
                    $("#list-data").append($(`

                    <div class="col-md-3 p-1" id="list-data">
                      <div class="card text-center border-0 shadow" style="height:100%">
                        <div class="card-body">
                          <h4 class="card-title" style="text-decoration:underline;text-decoration-color:#E5386D"></h4>
                          <div class="ratio img-responsive img-circle mx-auto" style="background-image: url({{asset('img/ui-images/user-avatar.svg')}});"></div>
                          <h5 class="card-text pt-3 p-2">`+i.student.nama+`</h5>
                          <div class="bottom pt-3">
                                <hr class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        `+i.student.nis+`
                                    </div>
                                    <div class="col-md-6">
                                        `+i.student.rombel.rombel+`
                                    </div>
                                </div>
                          </div>
                          
                        </div>
                      </div>
                      </div>
                    

                    `))
                  })
                }
            })


            });

            $('.btn-danger').on('click', function() {

              Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#1aae6f',
              cancelButtonColor: '#f80031',
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, cancel'
              }).then((result) => {
                  if (result.value) {
                      var data = $(this).data('id')
                      console.log(data)
                      window.location = data;
                  }else{
                      Swal.fire(
                      'Cancelled!',
                      'Your file has been cancel.',
                      'error'
                      )
                  }
              })
            });

          });

      </script>

@endsection