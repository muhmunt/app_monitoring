@extends('layouts.element.main')

@section('title', 'Siswa')

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
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-1">
            <div class="row">
                <div class="col-5 p-1">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-links" style="background:none;">
                            <li class="breadcrumb-item">
                                <a href="">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Data Siswa
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-7 p-1 text-right">                    
                    {{-- <a href="{{ route('export_excel') }}" class="btn btn-icon btn-neutral btn-round btn-success">
                        <span class="btn-inner--text">Export</span>
                        <span class="btn-inner--icon">
                            <i class="fas fa-file-export"></i>
                        </span>
                    </a>                     --}}
                    {{-- btn import --}}                    
                    <button class="btn btn-icon btn-neutral btn-round" data-toggle="modal" data-target="#importExcel"><span class="btn-inner--icon">
                    <i class="fas fa-file-import"></i>
                    </span><span class="btn-inner--text">Import</span></button>
                    
                    <button class="btn btn-icon btn-neutral btn-round" data-toggle="modal" data-target="#tambahSiswa"><span class="btn-inner--text">Add</span>
                        <span class="btn-inner--icon">
                            <i class="ni ni-fat-add"></i>
                        </span></button>
                                        
                </div>
            </div>
        </div>

        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="table-student">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nis</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Rombel</th>
                <th scope="col">Rayon</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
                @php
                    $no = 1;
                @endphp
            <tbody>
                    @foreach ($data as $s)
                <tr>
                    <td>{{$no++}}.</td>
                    <td>{{$s->nis}}</td>
                    <td>{{ucwords($s->nama)}}</td>
                    @if ($s->jk == 'l' )
                    <td>Laki - laki</td>
                    @else 
                    <td>Perempuan</td>
                    @endif
                    <td>{{$s->rombel->rombel}}</td>                    
                    <td>{{strtoupper($s->rayon->rayon)}}</td>                    
                    <td>
                        <a href="{{route('student.edit',$s->id)}}" class="badge badge-pill badge-success">
                            Edit
                        </a>    
                        <a href="#" data-id="{{ route('student.destroy', $s->id) }}" class="btn-danger badge badge-pill badge-danger">
                            Delete
                        </a>
                            
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light pt-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div style="min-width: 6rem;" class="dropdown-menu dropdown-menu-left dropdown-menu-arrow">
                                {{-- <div class="dropdown-item">
                                    
                                </div>
                                <div class="dropdown-item">
                                    
                                </div> --}}
                                <form action="{{route('generate',[$s->nis,str_slug($s->nama),$s->jk])}}" method="POST">
                                    {{ csrf_field() }}
                                <div class="dropdown-item">
                                    <input type="hidden" name="qrcode" value="{{$s->nis}}">
                                        <button type="submit" class="btn-sm btn btn-primary"><span class="btn-inner--text"></span>
                                            <span class="btn-inner--icon">
                                                <i class="fas fa-qrcode"></i>
                                            </span>generate Qr code</button>
                                        </div>
                                    </form>
                                    
                            </div>
                          </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            
        </div>

        <div class="card-footer py-4">
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Import Excel -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{route('import_excel')}}" enctype="multipart/form-data" id="form-register">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title text-dark" id="exampleModalLabel">Import Excel</h2>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}

                        <label>Pilih file excel</label>
                        <p>Sudah baca tata cara melakukan import siswa? kalau belum bisa baca <a href="{{route('dashboard')}}">disini</a>.</p>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Modal  add student --}}
<div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{route('student.store')}}" enctype="multipart/form-data" id="student-form">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-dark" id="exampleModalLabel">Tambah Siswa</h2>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <input type="hidden" value="" name="id" id="idEvent">
                    <div class="form-group">
                        <label>Nis</label>
                        <input type="number" name="nis" value="" placeholder="Masukkan nis siswa ..." class="form-control">
                    </div>                    
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama" value="" placeholder="Masukkan nama siswa ..." class="form-control">
                    </div>                    
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk" class="form-control">
                            <option value="l">Laki - laki</option>
                            <option value="p">Perempuan</option>
                        </select>
                    </div>                    
                    <div class="form-group">
                        <label>Rombel</label>
                        <select name="rombel" class="form-control" id="">
                        @foreach ($rombel as $r)
                            <option value="{{$r->id}}">{{$r->rombel}}</option>    
                        @endforeach
                        </select>
                    </div>                    
                    <div class="form-group">
                        <label>Rayon</label>
                        <select name="rayon" class="form-control" id="">
                            @foreach ($rayon as $y)
                                <option value="{{$y->id}}">{{$y->rayon}}</option>    
                            @endforeach
                            </select>
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
@endsection

<script src="{{ asset('/assets/js/jquery-3.4.1.min.js') }}"></script>
<script>
    $(document).ready(function () {

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

        $('#table-student').DataTable({

        });

    });
</script>
{!! JsValidator::formRequest('App\Http\Requests\ImportRequest', '#form-register') !!}
{!! JsValidator::formRequest('App\Http\Requests\StudentRequest', '#student-form') !!}
