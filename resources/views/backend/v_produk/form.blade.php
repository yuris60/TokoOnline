@extends('backend.v_layouts.app')
@section('content')
  <div class="row mt-3">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $judul }}</h5>

          <form class="form-horizontal" action="{{ route('backend.laporan.cetakproduk') }}" method="POST" target="_blank">
            @csrf
            <div class="form-group">
              <label>Tanggal Awal</label>
              <input type="date" name="tanggal_awal" onkeypress="return hanyaAngka(event)"
                value="{{ old('tanggal_awal') }}" class="form-control @error('tanggal_awal') is-invalid @enderror"
                placeholder="Masukkan Jumlah Pinjam">
              @error('tanggal_awal')
                <span class="invalid-feedback alert-danger" role="alert">
                  {{ $message }}
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label>Tanggal Akhir</label>
              <input type="date" name="tanggal_akhir" onkeypress="return hanyaAngka(event)"
                value="{{ old('tanggal_akhir') }}" class="form-control @error('tanggal_akhir') is-invalid @enderror"
                placeholder="Masukkan Jumlah Pinjam">
              @error('tanggal_akhir')
                <span class="invalid-feedback alert-danger" role="alert">
                  {{ $message }}
                </span>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-4">Cetak</button>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection
