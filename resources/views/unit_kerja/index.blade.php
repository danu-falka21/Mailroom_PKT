@extends('master')

@section('sub-judul','Departemen')
@section('content')
 
 
 <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tabel Departemen</h3>

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
            Tambah Unit Kerja
            </button>
                <table id="dataterima" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Departemen</th>
                    <th>Kompartemen</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach($unit_kerja as $result => $hasil)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$hasil->nama}} </td>
                    <td>{{$hasil->kompartemen}} </td>
                    <td>
                    <form action="{{route('unit-kerja.destroy', $hasil->id)}}" method="POST">
                          @csrf 
                          @method('delete')
                        <a type="button" class="btn btn-warning" href="{{route('unit-kerja.edit', $hasil->id)}}">Ubah</a>
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
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Unit Kerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" action="{{route('unit-kerja.store')}}" method='POST' enctype="multipart/form-data">
      @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama" class=" col-form-label">Nama Departemen</label>
                <div >
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Tulis disini....">
                    @error('nama')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="kompartemen" class=" col-form-label">Kompartemen</label>
                <div >
                    <input type="text" class="form-control @error('kompartemen') is-invalid @enderror" id="kompartemen" name="kompartemen" placeholder="Tulis disini....">
                    @error('kompartemen')<div class="invalid-feedback">{{$message}}</div> @enderror
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
