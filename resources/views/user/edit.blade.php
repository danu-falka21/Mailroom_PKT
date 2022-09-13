@extends('master')

@section('sub-judul','Edit User')
@section('content')


<section class="content">

<!-- Default box -->
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">Edit User</h3>

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
    <form class="form-horizontal" role="form" action="{{route('user.update', $user->id)}}" method='POST' enctype="multipart/form-data">
      @csrf
      @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class=" col-form-label">Nama User</label>
                <div >
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$user->name}}">
                    @error('name')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="rfid" class=" col-form-label">RFID</label>
                <div >
                    <input type="text" class="form-control @error('rfid') is-invalid @enderror" id="rfid" name="rfid" value="{{$user->rfid}}">
                    @error('rfid')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="npk" class=" col-form-label">NPK</label>
                <div >
                    <input type="text" class="form-control @error('npk') is-invalid @enderror" id="npk" name="npk" value="{{$user->npk}}">
                    @error('npk')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="id_unit_kerja" class=" col-form-label">Unit Kerja</label>
                <div >
                <select class="form-control" id="id_unit_kerja" name='id_unit_kerja'>
                  <option value="" holder>Pilih Unit Kerja</option>
                    @foreach($unit_kerja as $result)
                      <option value="{{$result->id}}" @if( $result->id == $user->id_unit_kerja) selected @endif>{{$result->nama}}</option>
                      @endforeach
                  </select>
                    @error('id_unit_kerja')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="posisi" class=" col-form-label">Posisi</label>
                <div >
                    <input type="text" class="form-control @error('posisi') is-invalid @enderror" id="posisi" name="posisi" value="{{$user->posisi}}">
                    @error('posisi')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="alamat" class=" col-form-label">Alamat</label>
                <div >
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{$user->alamat}}">
                    @error('alamat')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="kota" class=" col-form-label">Kota</label>
                <div >
                    <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" value="{{$user->kota}}">
                    @error('kota')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="no_telepon" class=" col-form-label">No Telepon</label>
                <div >
                    <input type="tel" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon"  value="{{$user->no_telepon}}">
                    @error('no_telepon')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="email" class=" col-form-label">Email</label>
                <div >
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$user->email}}">
                    @error('email')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="password" class=" col-form-label">Password</label>
                <div >
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="">
                    @error('password')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="role" class=" col-form-label">Role</label>
                <div >
                
                  <select class="form-control" id="role" name='role'>
                      <option value="" holder>Pilih Role</option>
                      <option value="2" @if( $result->role == 2) selected @endif>User</option>
                      <option value="3" @if( $result->role == 3) selected @endif>Kurir - User</option>
                      <option value="1" @if( $result->role == 1) selected @endif>Admin</option>
                    </select>
                     
                     
                    @error('name')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
            </div>
    </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <a type="button" class="btn btn-secondary" href="{{route('user.index')}}">Tutup</a>
    <button type="submit" class="btn btn-success">Update</button>
    </form> 
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>

@endsection