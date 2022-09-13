@extends('master')

@section('sub-judul','kurir')
@section('content')
 
 
 <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tabel kurir</h3>

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
            Tambah kurir
            </button>
                <table id="dataterima" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kurir</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>No. Telepon</th>
                    <th>email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kurir as $result => $hasil)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$hasil->nama}}</td>
                    <td>{{$hasil->alamat}}</td>
                    <td>{{$hasil->kota}}</td>
                    <td>{{$hasil->no_telepon}}</td>
                    <td>{{$hasil->email}}</td>
                    <td>
                    <form action="{{route('kurir.destroy', $hasil->id)}}" method="POST">
                          @csrf 
                          @method('delete')
                        <a type="button" class="btn btn-warning" href="{{route('kurir.edit', $hasil->id)}}">Ubah</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('data akan dihapus...')" >Hapus</button>
                        </form>
                    </td>
                  </tr>
                @endforeach
                </tbody>
                </table>
                
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
        <h5 class="modal-title" id="staticBackdropLabel">Tambah kurir</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" action="{{route('kurir.store')}}" method='POST' enctype="multipart/form-data">
      @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama" class=" col-form-label">Nama Kurir</label>
                <div >
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Tulis disini....">
                    @error('nama')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="alamat" class=" col-form-label">Alamat</label>
                <div >
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Tulis disini....">
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
                    <label for="no_telepon" class=" col-form-label">No. Telepon</label>
                <div >
                    <input type="tel" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="Tulis disini....">
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
