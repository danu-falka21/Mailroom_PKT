@extends('master')

@section('sub-judul','Edit Kurir')
@section('content')


<section class="content">

<!-- Default box -->
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">Edit Kurir</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <form class="form-horizontal" role="form" action="{{route('kurir.update', $kurir->id)}}" method='POST' enctype="multipart/form-data">
      @csrf
      @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="nama" class=" col-form-label">Nama Kurir</label>
                <div >
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$kurir->nama}}">
                    @error('nama')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="alamat" class=" col-form-label"> Alamat</label>
                <div >
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" Name="alamat" value="{{$kurir->alamat}}">
                    @error('alamat')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="kota" class=" col-form-label">kota</label>
                <div >
                    <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" value="{{$kurir->kota}}">
                    @error('kota')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="no_telepon" class=" col-form-label">No Telepon</label>
                <div >
                    <input type="tel" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="{{$kurir->no_telepon}}">
                    @error('no_telepon')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="email" class=" col-form-label">Email Kurir</label>
                <div >
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$kurir->email}}">
                    @error('email')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                
            </div>
    </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <a type="button" class="btn btn-secondary" href="{{route('kurir.index')}}">Tutup</a>
    <button type="submit" class="btn btn-success">Update</button>
    </form> 
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>

@endsection