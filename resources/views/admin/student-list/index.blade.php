@extends('layouts.element.main')

@section('title', 'Daftar Siswa')

@section('custom-css')
    <style>
        .breadcrumb-item + .breadcrumb-item::before{
            content: '-';
            color: #5e72e4;
        }
    </style>
@endsection

@section('content')

@php
    $session = Session::get('user');
@endphp

@include('layouts.element.navbar')

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
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('warning')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            
            @endif
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-1">
            <div class="row">
                <div class="col-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-links" style="background:none;">
                            <li class="breadcrumb-item">
                                <a href="{{route('events.index')}}">
                                    Daftar Event
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Daftar Siswa {{$event->name}}
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-4 text-right">
                    <button class="btn btn-icon btn-neutral btn-round" data-toggle="modal" 
                        data-target="#addEvent"><span class="btn-inner--text">Add</span>
                        <span class="btn-inner--icon">
                            <i class="ni ni-fat-add"></i>
                        </span></button>
                </div>
            </div>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="table-category">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nis</th>
                <th scope="col">Nama</th>
                <th scope="col">Rombel</th>
                <th scope="col">Rayon</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <?php $no = 1; ?>
            <tbody>                    
            @foreach ($student as $item)
            
                <tr>
                    <td>
                        {{$no++}}.
                    </td>
                    <td>
                        {{$item->student->nis}}
                    </td>
                    <td>
                        {{$item->student->nama}}
                    </td>
                    <td>
                        {{$item->student->rombel->rombel}}
                    </td>
                    <td>
                        {{$item->student->rayon->rayon}}
                    </td>
                    <td>
                        <div class="dropdown-item">
                            <a href="#" data-id="{{route('adminStudentList.destroy',$item->id)}}" class="btn-danger badge badge-pill badge-danger">
                                Delete
                            </a>
                        </div>
                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-8"></div>
        {{-- <div class="col-md-4 text-right">{!! $student->render() !!}</div> --}}
    </div>
    <div class="card-footer py-4">
            
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Modal  addevent --}}
<div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{route('studentList.store')}}" enctype="multipart/form-data" id="form-register">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title text-dark" id="exampleModalLabel">Masukkan Nis Siswa</h2>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}

                        <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nis:</label>
                                <input type="number" class="form-control" required name="nis" placeholder="Masukkan nis siswa ... " autofocus id="recipient-name">
                                <input type="hidden" name="id_event" value="{{$event->id}}">
                              </div> 

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
{{-- Modal  edit event --}}
<div class="modal fade" id="editEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{route('events.update')}}" enctype="multipart/form-data" id="update-form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title text-dark" id="exampleModalLabel">Ubah Event</h2>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}
                        <input type="hidden" value="" name="id" id="idEvent">
                        <div class="form-group">
                            <label>Nama Event</label>
                            <input type="text" name="nama" value="" id="namaEvent" placeholder="Masukkan nama event ..." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="keterangan" rows="5"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

<script src="{{ asset('/assets/js/jquery-3.4.1.min.js') }}"></script>
<script>
    $(document).ready(function () {

        $('#table-category').DataTable({            
        });

        $('.btn-edit').on('click',function(){
            // console.log('test');
            var rayon = $(this).data('rayon');            
            var id = $(this).data('id');
            $("#namaEvent").val(rayon);            
            $('#idEvent').val(id);            
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
{!! JsValidator::formRequest('App\Http\Requests\EventRequest', '#form-register') !!}
{!! JsValidator::formRequest('App\Http\Requests\EventRequest', '#update-form') !!}