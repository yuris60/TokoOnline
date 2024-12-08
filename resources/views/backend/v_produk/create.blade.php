@extends('backend.v_layouts.app')
@section('content')
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">{{ $judul }}</h4>
      <form action="{{ route('backend.produk.store') }}" method="POST" enctype="multipart/form-data">
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
              <label>Kategori</label>
              <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror">
                <option value="" {{ old('kategori_id') == '' ? 'selected' : '' }}>- Pilih Kategori -</option>
                @foreach ($kategori as $k)
                  <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                @endforeach
              </select>
              @error('kategori_id')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label>Nama Produk</label>
              <input type="text" name="nama_produk" value="{{ old('nama_produk') }}"
                class="form-control @error('nama_produk') is-invalid @enderror" placeholder="Masukkan Nama Produk">
              @error('nama_produk')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label>Detail</label>
              <textarea id="ckeditor" name="detail" class="form-control @error('detail') is-invalid @enderror"></textarea>
              @error('detail')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label>Harga</label>
              <input type="text" onkeypress="return hanyaAngka(event)" name="harga" value="{{ old('harga') }}"
                class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga">
              @error('harga')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label>Berat</label>
              <input type="text" onkeypress="return hanyaAngka(event)" name="berat" value="{{ old('berat') }}"
                class="form-control @error('berat') is-invalid @enderror" placeholder="Masukkan Berat">
              @error('berat')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label>Stok</label>
              <input type="text" onkeypress="return hanyaAngka(event)" name="stok" value="{{ old('stok') }}"
                class="form-control @error('stok') is-invalid @enderror" placeholder="Masukkan Stok">
              @error('stok')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('backend.produk.index') }}">
              <button type="button" class="btn btn-secondary">Kembali</button>
            </a>
          </div>
        </div>


      </form>
    </div>
  </div>
@endsection
