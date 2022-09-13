@extends('master')

@section('sub-judul','Paket Dikirim')
@section('content')
 
 
 <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tabel Kirim Paket @if(auth()->user()->role == '2') ( {{auth()->user()->Unitkerja->nama}} ) @endif</h3>

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
            @if(auth()->user()->role != '3')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Tambah Kirim Paket
            </button>
            @endif
            <div class="table-responsive">
                <table id="dataterima" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Penerimaan</th>
                    <th>No Resi</th>
                    <th>Kurir</th>
                    <th>Pengirim</th>
                    <th>Penerima</th>
                    <th>Tipe Barang</th>
                    <th>Status Pengambilan</th>
                    @if(auth()->user()->role == '1')
                    <th>Action</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @if(auth()->user()->role == '1')
                @foreach($kirim as $result => $hasil)
                <tr>
                    <td>{{$loop->iteration}}</td>
                      @if ($hasil->terima_mailroom == null)
                        <td><span class="badge badge-danger">No Mailroom</span></td>
                      @else 
                        <td><span class="badge badge-success">{{$hasil->terima_mailroom->format('d-m-Y H:i')}}</></span></td>
                      @endif
                      @if ($hasil->no_resi == null)
                        <td><span class="badge badge-danger">Resi Kosong</span></td>
                      @else 
                        <td><span class="badge badge-success">{{$hasil->no_resi}}</></span></td>
                      @endif
                      @if ($hasil->id_kurir == null)
                        <td><span class="badge badge-danger">Kurir Kosong</span></td>
                      @else 
                        <td><span class="badge badge-success">{{$hasil->Kurir->nama}}</></span></td>
                      @endif 
                        <td>{{$hasil->User1->name}} <br> {{$hasil->User1->alamat}}, {{$hasil->User1->kota}}<br>{{$hasil->User1->email}} </td>
                        <td>{{$hasil->nama_guest}}<br> {{$hasil->alamat_guest}}, {{$hasil->kota_guest}} </td>
                        <td>{{$hasil->tipe_barang}} </td>
                      @if ($hasil->id_user3 == null)
                        <td><a type="button" class="btn btn-danger" href="{{route('kirim.updateview', $hasil->id)}}">Belum Diambil</a></td>
                      @else  
                        <td><span class="badge badge-success">{{$hasil->User3->name}}</span>,<br>{{$hasil->User3->npk}}, {{$hasil->User3->UnitKerja->nama}}<br>{{$hasil->terima_user->format('d-m-Y')}}</td>
                      @endif
                        <td>
                        <form action="{{route('kirim.destroy', $hasil->id)}}" method="POST">
                              @csrf 
                              @method('delete')
                            <a type="button" class="btn btn-warning" href="{{route('kirim.edit', $hasil->id)}}"><i class="fas fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('data akan dihapus...')" ><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
                  @elseif(auth()->user()->role == '2')
                    @foreach($kirim as $result => $hasil)
                      @if ($hasil->User1->id_unit_kerja == auth()->user()->id_unit_kerja ?? $hasil->User3->id_unit_kerja == auth()->user()->id_unit_kerja)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          @if ($hasil->terima_mailroom == null)
                          <td><span class="badge badge-danger">No Mailroom</span></td>
                          @else 
                            <td><span class="badge badge-success">{{$hasil->terima_mailroom->format('d-m-Y H:i')}}</></span></td>
                          @endif
                          @if ($hasil->no_resi == null)
                          <td><span class="badge badge-danger">Resi Kosong</span></td>
                          @else 
                            <td><span class="badge badge-success">{{$hasil->no_resi}}</></span></td>
                          @endif
                          @if ($hasil->id_kurir == null)
                          <td><span class="badge badge-danger">Kurir Kosong</span></td>
                          @else 
                            <td><span class="badge badge-success">{{$hasil->Kurir->nama}}</></span></td>
                          @endif
                          <td>{{$hasil->User1->name}} <br> {{$hasil->User1->alamat}}, {{$hasil->User1->kota}}<br>{{$hasil->User1->email}} </td>
                          <td>{{$hasil->nama_guest}}<br> {{$hasil->alamat_guest}}, {{$hasil->kota_guest}} </td>
                          <td>{{$hasil->tipe_barang}} </td>
                          @if ($hasil->id_user3 == null)
                          <td><span class="badge badge-danger">Belum Diambil</span></td>
                          @else 
                            <td><span class="badge badge-success">{{$hasil->User3->name}}</span>,<br>{{$hasil->User3->npk}}, {{$hasil->User3->UnitKerja->nama}}<br>{{$hasil->terima_user->format('d-m-Y')}}</td>
                          @endif
                        </tr>
                      @endif
                    @endforeach
                    @elseif(auth()->user()->role == '3')
                    @foreach($kirim as $result => $hasil)
                      @if (!empty($hasil->id_kurir) && $hasil->kurir->nama == auth()->user()->posisi )
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          @if ($hasil->terima_mailroom == null)
                          <td><span class="badge badge-danger">No Mailroom</span></td>
                          @else 
                            <td><span class="badge badge-success">{{$hasil->terima_mailroom->format('d-m-Y H:i')}}</></span></td>
                          @endif
                          @if ($hasil->no_resi == null)
                          <td><span class="badge badge-danger">Resi Kosong</span></td>
                          @else 
                            <td><span class="badge badge-success">{{$hasil->no_resi}}</></span></td>
                          @endif
                          @if ($hasil->id_kurir == null)
                          <td><span class="badge badge-danger">Kurir Kosong</span></td>
                          @else 
                            <td><span class="badge badge-success">{{$hasil->Kurir->nama}}</></span></td>
                          @endif
                          <td>{{$hasil->User1->name}} <br> {{$hasil->User1->alamat}}, {{$hasil->User1->kota}}<br>{{$hasil->User1->email}} </td>
                          <td>{{$hasil->nama_guest}}<br> {{$hasil->alamat_guest}}, {{$hasil->kota_guest}} </td>
                          <td>{{$hasil->tipe_barang}} </td>
                          @if ($hasil->id_user3 == null)
                          <td><span class="badge badge-danger">Belum Diambil</span></td>
                          @else 
                            <td><span class="badge badge-success">{{$hasil->User3->name}}</span>,<br>{{$hasil->User3->npk}}, {{$hasil->User3->UnitKerja->nama}}<br>{{$hasil->terima_user->format('d-m-Y')}}</td>
                          @endif
                        </tr>
                      @endif
                    @endforeach
                  @endif
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
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Kirim Paket</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" action="{{route('kirim.store')}}" method='POST' enctype="multipart/form-data">
      @csrf
            <div class="card-body">
            @if(auth()->user()->role == '1')
                <div class="form-group">
                    <label for="terima_mailroom" class=" col-form-label">Tanggal Penerimaan</label>
                <div >
                    <input type="datetime-local" class="form-control @error('terima_mailroom') is-invalid @enderror datetimepicker-input" id="terima_mailroom" name="terima_mailroom" placeholder="Tulis disini...." >
                    
                    @error('terima_mailroom')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                
              @endif 
                <div class="form-group">
                    <label for="id_user1" class=" col-form-label">Pengirim</label>
                <div >
                  <select class="form-control" id="id_user1" name='id_user1'>
                  <option value="" holder>Pilih Pengirim</option>
                    @foreach($user as $result)
                      <option value="{{$result->id}}">{{$result->name}} - {{$result->UnitKerja->nama}}</option>
                      @endforeach
                  </select>
                </div>
                </div>
                <div class="form-group">
                    <label for="nama_guest" class=" col-form-label">Nama Penerima</label>
                <div >
                <input type="text" class="form-control @error('nama_guest') is-invalid @enderror" id="nama_guest" name="nama_guest" placeholder="Tulis disini....">
                    @error('nama_guest')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="alamat_guest" class=" col-form-label">Alamat Penerima</label>
                <div >
                <textarea class="form-control @error('alamat_guest') is-invalid @enderror" id="alamat_guest" name="alamat_guest" rows="2"  placeholder="Enter ..."></textarea>
                    @error('alamat_guest')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="kota_guest" class=" col-form-label">Kota Penerima</label>
                <div >
                <input type="text" class="form-control @error('kota_guest') is-invalid @enderror" id="kota_guest" name="kota_guest" placeholder="Tulis disini....">
                    @error('kota_guest')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="tipe_barang" class=" col-form-label">Tipe Barang</label>
                <div >
                  <select class="form-control" id="tipe_barang" name='tipe_barang'>
                    <option value="" holder>Pilih Bareng</option>
                    <option value="Surat">Surat</option>
                    <option value="Dokumen">Dokumen</option>
                    <option value="Barang">Barang</option> 
                  </select>
                </div>
                </div>
                @if(auth()->user()->role == '1')
                <div class="form-group">
                    <label for="no_resi" class=" col-form-label">No_resi</label>
                <div >
                    <input type="text" class="form-control @error('no_resi') is-invalid @enderror" id="no_resi" name="no_resi" placeholder="Tulis disini....">
                    @error('no_resi')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="id_kurir" class=" col-form-label">Kurir</label>
                <div >
                  <select class="form-control" id="id_kurir" name='id_kurir'>
                  <option value="" holder>Pilih Kurir</option>
                    @foreach($kurir as $result)
                      <option value="{{$result->id}}">{{$result->nama}}</option>
                      @endforeach
                  </select>
                </div>
                </div>
                @endif
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
