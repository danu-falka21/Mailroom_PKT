@extends('master')

@section('sub-judul','Edit Unit Kerja')
@section('content')


<section class="content">

<!-- Default box -->
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">Edit Unit Kerja</h3>

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
    <form class="form-horizontal" role="form" action="{{route('unit-kerja.update', $unit_kerja->id)}}" method='POST' enctype="multipart/form-data">
      @csrf
      @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="nama" class=" col-form-label">Nama Departemen</label>
                <div >
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$unit_kerja->nama}}">
                    @error('nama')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="kompartemen" class=" col-form-label">Nama Unit Kerja</label>
                <div >
                    <input type="text" class="form-control @error('kompartemen') is-invalid @enderror" id="kompartemen" name="kompartemen" value="{{$unit_kerja->kompartemen}}">
                    @error('kompartemen')<div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                </div>
            </div>
    </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <a type="button" class="btn btn-secondary" href="{{route('unit-kerja.index')}}">Tutup</a>
    <button type="submit" class="btn btn-success">Update</button>
    </form> 
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>

@endsection