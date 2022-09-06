@extends('master')

@section('sub-judul','Update Terima')
@section('content')


<section class="content">

<!-- Default box -->
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">Update Terima</h3>

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
    <div>
            <table cellpadding="1" cellspacing="1" style="width:500px">
              <tbody>
                <tr>
                  <td>
                  <p>Tanggal Penerimaan:</p>
                  </td>
                  <td>{{$kirim->terima_mailroom}}</td>
                </tr>
                <tr>
                  <td>
                  <p>No Resi:</p>
                  </td>
                  <td>{{$kirim->no_resi}}</td>
                </tr>
                <tr>
                  <td>
                  <p>Kurir:</p>
                  </td>
                  <td>{{$kirim->Kurir->nama}}</td>
                </tr>
                <tr>
                  <td>
                  <p>pengirim:</p>
                  </td>
                  <td>{{$kirim->User1->name}}</td>
                  
                </tr>
                <tr>
                  <td>
                  <p>penerima:</p>
                  </td>
                  <td>{{$kirim->nama_guest}}, {{$kirim->kota_guest}}</td>
                </tr>
                <tr>
                  <td>
                  <p>Tipe Barang:</p>
                  </td>
                  <td>{{$kirim->tipe_barang}}</td>
                </tr>
              </table>
            </div>
        
    <form class="form-horizontal" role="form" action="{{route('kirim.updateterima', $kirim->id)}}" method='POST' enctype="multipart/form-data">
      @csrf
      @method('patch')

                <div class="form-group">
                    <label for="terima_mailroom" class=" col-form-label">Tanggal Penerimaan</label>
                <div >
                    <input type="datetime-local" class="form-control @error('terima_mailroom') is-invalid @enderror datetimepicker-input" id="terima_mailroom" name="terima_mailroom" placeholder="Tulis disini...." >
                    
                    @error('terima_mailroom')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
      
                <div class="form-group">
                    <label for="terima_user" class=" col-form-label">Tanggal Pengambilan</label>
                <div >
                    <input type="datetime-local" class="form-control @error('terima_user') is-invalid @enderror datetimepicker-input" id="terima_user" name="terima_user" placeholder="Tulis disini...." >
                    
                    @error('terima_user')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="id_user3" class=" col-form-label">Penerima</label>
                <div >
                  <select class="form-control" id='id_user3' name='id_user3'>
                  <option value="" holder>Pilih penerima</option>
                    @foreach($user as $result)
                    @if($result->role == '3')
                      <option value="{{$result->id}}" >{{$result->name}} - {{$result->UnitKerja->nama}} </option>
                     @endif
                    @endforeach
                  </select>
                </div>
                </div>
                
    </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <a type="button" class="btn btn-secondary" href="{{route('kirim.index')}}">Tutup</a>
    <button type="submit" class="btn btn-success">Update</button>
    </form> 
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>

@endsection