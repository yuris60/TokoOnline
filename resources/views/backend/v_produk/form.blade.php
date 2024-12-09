@extends('backend.v_layouts.app')
@section('content')
  <div class="row mt-3">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $judul }}</h5>
          <form action="{{ route('backend.laporan.cetakproduk') }}" class="form-horizontal" method="POST" target="_blank">
            @csrf

            <div class="form-group">
              <label>Tanggal Awal</label>
              <input type="date" onkeypress="return hanyaAngka(event)" name="tanggal_awal"
                value="{{ old('tanggal_awal') }}" class="form-control @error('tanggal_awal') is-invalid @enderror"
                placeholder="Masukkan Tanggal Awal">
              @error('tanggal_awal')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label>Tanggal Akhir</label>
              <input type="date" onkeypress="return hanyaAngka(event)" name="tanggal_akhir"
                value="{{ old('tanggal_akhir') }}" class="form-control @error('tanggal_akhir') is-invalid @enderror"
                placeholder="Masukkan Tanggal Akhir">
              @error('tanggal_akhir')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Cetak</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
