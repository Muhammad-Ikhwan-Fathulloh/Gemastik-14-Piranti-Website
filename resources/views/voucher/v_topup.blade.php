@extends('layout.v_template')

@section('title','Top Up')
@section('halaman','Top Up')

@section('content')
<div class="card border-light mb-3 bg-ku">
  <div class="card-header">
    <i class="fas fa-fw fa-barcode"></i> <strong>Scan QR Code Voucher</strong>
  </div>
  <div class="card-body">
    <form action="/voucher/edit" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
          <label class="text-white" for="">ID Voucher</label>
          <input  type="text" name="uids" id="uids" class="form-control" placeholder="Scan ID Voucher">
          @error('uids') <div class="alert alert-danger">{{ $message }}</div> @enderror
      </div>
      <div class="form-group">
            <button class="btn btn-success btn-sm">Top Up</button>
          </div>
          </form>
           <hr>
      <div class="row">
        <div class="col">
          <button class="btn btn-sm btn-light" data-toggle="modal" data-target="#scanner"><i class="fas fa-fw fa-camera"></i> <strong>Camera Depan</strong></button>
        </div>
        <div class="col">
          <button class="btn btn-sm btn-light" data-toggle="modal" data-target="#scanners"><i class="fas fa-fw fa-camera"></i> <strong>Camera Belakang</strong></button>
        </div>
      </div>
     

  </div>
</div>

<hr>
<div class="modal modal-danger fade" id="scanner">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-ku">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-fw fa-barcode"></i> Scan QR Code Voucher</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-white center">
        <video id="preview" width="250" height="200"></video>
      </div>
    </div>
  </div>
</div>

<div class="modal modal-danger fade" id="scanners">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-ku">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-fw fa-barcode"></i> Scan QR Code Voucher</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-white center">
        <video id="previews" width="250" height="200"></video>
      </div>
    </div>
  </div>
</div>

@livewire('topup')
@endsection