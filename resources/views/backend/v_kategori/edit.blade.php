@extends('backend.v_layouts.app')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $judul }}</h5>
          <form action="{{ route('backend.kategori.update', $edit->id) }}" method="POST">
            @method('put')
            @csrf

            <div class="form-group">
              <label>Nama Kategori</label>
              <input type="text" name="nama_kategori" value="{{ old('nama_kategori', $edit->nama_kategori) }}"
                class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Masukkan Nama Kategori">
              @error('nama_kategori')
                <span class="invalid-feedback alert-danger" role="alert">
                  {{ $message }}
                </span>
              @enderror
            </div>

            <div class="row mt-3">
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-warning">Perbarui</button>
                <a href="{{ route('backend.user.index') }}">
                  <button type="button" class="btn btn-secondary">Kembali</button>
                </a>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
