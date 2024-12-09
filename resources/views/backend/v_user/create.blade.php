@extends('backend.v_layouts.app')
@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">{{ $judul }}</h5>
      <form action="{{ route('backend.user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Foto</label>
              <img class="foto-preview">
              <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                onchange="previewFoto()">
              @error('foto')
                <div class="invalid-feedback alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="col-md-8">
            <div class="form-group">
              <label>Hak Akses</label>
              <select name="role" class="form-control @error('role') is-invalid @enderror">
                <option value="" {{ old('role') == '' ? 'selected' : '' }}>- Pilih Hak Akses -</option>
                <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Super Admin</option>
                <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>Admin</option>
              </select>
              @error('role')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label>Nama</label>
              <input type="text" onkeypress="return hanyaAngka(event)" name="nama" value="{{ old('nama') }}"
                class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama">
              @error('nama')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" value="{{ old('email') }}"
                class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email">
              @error('email')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label>HP</label>
              <input type="text" onkeypress="return hanyaAngka(event)" name="hp" value="{{ old('hp') }}"
                class="form-control @error('hp') is-invalid @enderror" placeholder="Masukkan HP">
              @error('hp')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" value="{{ old('password') }}"
                class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password">
              @error('password')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label>Konfirmasi Password</label>
              <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                class="form-control @error('password_confirmation') is-invalid @enderror"
                placeholder="Konfirmasi Password">
              @error('password_confirmation')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('backend.user.index') }}">
              <button type="button" class="btn btn-secondary">Kembali</button>
            </a>
          </div>
        </div>


      </form>
    </div>
  </div>
@endsection
