@extends('master')

@section('sub-judul','User')
@section('content')
 
 
 <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tabel User</h3>

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

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Tambah User
            </button>
            <div class="table-responsive">
                <table id="dataterima" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>RFID</th>
                    <th>NPK</th>
                    <th>Unit Kerja</th>
                    <th>Posisi</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>no_telepon</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach($user as $result => $hasil)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td> {{$hasil->name}} </td>
                    <td> {{$hasil->email}} </td>
                    <td> {{$hasil->rfid}} </td>
                    <td> {{$hasil->npk}} </td>
                    <td> {{$hasil->UnitKerja->nama}}</td>
                    <td> {{$hasil->posisi}} </td>
                    <td> {{$hasil->alamat}} </td>
                    <td> {{$hasil->kota}} </td>
                    <td> {{$hasil->no_telepon}} </td>
                    <td> 
                        @if($hasil->role == 2)
                         <span class=" badge badge-success">User </span>
                         
                         @else
                         <span class=" badge badge-warning">Admin </span>
                         @endif
                    </td>
                    <td >
                        <form action="{{route('user.destroy', $hasil->id)}}" method="POST">
                          @csrf 
                          @method('delete')
                        <a type="button" class="btn btn-warning" href="{{route('user.edit', $hasil->id)}}"><i class="fas fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('data akan dihapus...')"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
                </table>
              </div>
                
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" action="{{route('user.store')}}" method='POST' enctype="multipart/form-data">
      @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class=" col-form-label">Nama User</label>
                <div >
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Tulis disini....">
                    @error('name')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="rfid" class=" col-form-label">RFID</label>
                <div >
                    <input type="text" class="form-control @error('rfid') is-invalid @enderror" id="rfid" name="rfid" placeholder="Tulis disini....">
                    @error('rfid')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="npk" class=" col-form-label">NPK</label>
                <div >
                    <input type="text" class="form-control @error('npk') is-invalid @enderror" id="npk" name="npk" placeholder="Tulis disini....">
                    @error('npk')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="id_unit_kerja" class=" col-form-label">Unit Kerja</label>
                <div >
                  <select class="form-control" id="id_unit_kerja" name='id_unit_kerja'>
                  <option value="" holder>Pilih Unit Kerja</option>
                    @foreach($unit_kerja as $result)
                      <option value="{{$result->id}}">{{$result->nama}}</option>
                      @endforeach
                  </select>
                </div>
                </div>
                <div class="form-group">
                    <label for="posisi" class=" col-form-label">Posisi</label>
                <div >
                    <input type="text" class="form-control @error('posisi') is-invalid @enderror" id="posisi" name="posisi" placeholder="Tulis disini....">
                    @error('posisi')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                
                <div class="form-group">
                    <label for="alamat" class=" col-form-label">Alamat</label>
                <div >
                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="2"  placeholder="Enter ..."></textarea>
                    @error('alamat')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="kota" class=" col-form-label">Kota</label>
                <div >
                    <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" placeholder="Tulis disini....">
                    @error('kota')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="no_telepon" class=" col-form-label">No Telepon</label>
                <div >
                    <input type="number" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" placeholder="Tulis disini....">
                    @error('no_telepon')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                
                <div class="form-group">
                    <label for="email" class=" col-form-label">Email</label>
                <div >
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Tulis disini....">
                    @error('email')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="password" class=" col-form-label">Password</label>
                <div >
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Tulis disini....">
                    @error('password')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="role" class=" col-form-label">Role</label>
                <div >
                    <select class="form-control" id="role" name='role'>
                      <option value="" holder>Pilih Role</option>
                      <option value="2">User</option>
                      <option value="3">Kurir - User</option>
                      <option value="1">Admin</option>
                    </select>
                    @error('role')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-success">Simpan</button>
        </form> 
      </div>
    </div>
  </div>
</div>
    @endsection
