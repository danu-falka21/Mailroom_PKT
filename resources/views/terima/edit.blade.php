@extends('master')

@section('sub-judul','Edit Terima')
@section('content')


<section class="content">

<!-- Default box -->
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">Edit Terima</h3>

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
    <form class="form-horizontal" role="form" action="{{route('terima.update', $terima->id)}}" method='POST' enctype="multipart/form-data">
      @csrf
      @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="terima_mailroom" class=" col-form-label">Tanggal Penerimaan</label>
                <div >
                    <input type="datetime-local" class="form-control @error('terima_mailroom') is-invalid @enderror datetimepicker-input" id="terima_mailroom" name="terima_mailroom" placeholder="Tulis disini...." value="{{$terima->terima_mailroom}}">
                    
                    @error('terima_mailroom')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="no_resi" class=" col-form-label">No Resi</label>
                <div >
                    <input type="text" class="form-control @error('no_resi') is-invalid @enderror" id="no_resi" name="no_resi" value="{{$terima->no_resi}}">
                    @error('no_resi')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="id_kurir" class=" col-form-label">Kurir</label>
                <div >
                  <select class="form-control" id="id_kurir" name='id_kurir'>
                  <option value="" holder>Pilih Kurir</option>
                    @foreach($kurir as $result)
                      <option value="{{$result->id}}" @if( $terima->id_kurir == $result->id) selected @endif>{{$result->nama}}</option>
                      @endforeach
                  </select>
                </div>
                </div>
                <div class="form-group">
                    <label for="id_user1" class=" col-form-label">Penerima</label>
                <div >
                  <select class="form-control" id='id_user1' name='id_user1'>
                  <option value="" holder>Pilih penerima</option>
                    @foreach($user as $result)
                      <option value="{{$result->id}}" @if( $terima->id_user1 == $result->id) selected @endif>{{$result->name}} - {{$result->UnitKerja->nama}} </option>
                      @endforeach
                  </select>
                </div>
                </div>
                <div class="form-group">
                    <label for="nama_guest" class=" col-form-label">Nama Pengirim</label>
                <div >
                <input type="text" class="form-control @error('nama_guest') is-invalid @enderror" id="nama_guest" name="nama_guest" value="{{$terima->nama_guest}}">
                    @error('nama_guest')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="alamat_guest" class=" col-form-label">Alamat Pengirim</label>
                <div >
                <textarea class="form-control @error('alamat_guest') is-invalid @enderror" id="alamat_guest" name="alamat_guest" rows="2"  >{{$terima->alamat_guest}}</textarea>
                    @error('alamat_guest')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="kota_guest" class=" col-form-label">Kota Pengirim</label>
                <div >
                <input type="text" class="form-control @error('kota_guest') is-invalid @enderror" id="kota_guest" name="kota_guest" value="{{$terima->kota_guest}}">
                    @error('kota_guest')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="tipe_barang" class=" col-form-label">Tipe Barang</label>
                <div >
                  <select class="form-control" id="tipe_barang" name='tipe_barang'>
                    <option value="" holder>Pilih Bareng</option>
                    <option value="Surat" @if( $terima->tipe_barang == "Surat") selected @endif>Surat</option>
                    <option value="Dokumen" @if( $terima->tipe_barang == "Dokumen") selected @endif>Dokumen</option>
                    <option value="Barang" @if( $terima->tipe_barang == "Barang") selected @endif>Barang</option> 
                  </select>
                </div>
                </div>
                <div class="form-group">
                    <label for="terima_user" class=" col-form-label">Tanggal Pengambilan</label>
                <div >
                    <input type="datetime-local" class="form-control @error('terima_user') is-invalid @enderror datetimepicker-input" id="terima_user" name="terima_user" placeholder="Tulis disini...." value="{{$terima->terima_user}}">
                    
                    @error('terima_user')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                
                <div class="form-group">
                    <label for="id_user3" class=" col-form-label">Penerima</label>
                <div >
                  <select class="form-control" id='id_user3' name='id_user3'>
                  <option value="" holder>Pilih penerima</option>
                    @foreach($user as $result)
                      <option value="{{$result->id}}" @if( $terima->id_user3 == $result->id) selected @endif>{{$result->name}} - {{$result->UnitKerja->nama}} </option>
                      @endforeach
                  </select>
                </div>
                </div>
            </div>
    </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <a type="button" class="btn btn-secondary" href="{{route('terima.index')}}">Tutup</a>
    <button type="submit" class="btn btn-success">Update</button>
    </form> 
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>

@endsection