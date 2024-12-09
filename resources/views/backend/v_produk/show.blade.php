@extends('backend.v_layouts.app')
@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">{{ $judul }}</h5>
      <div class="row mt-3">
        <div class="col-md-6">
          <div class="form-group">
            <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" disabled>
              <option value="" {{ old('kategori_id') == '' ? 'selected' : '' }}>- Pilih Kategori -</option>
              @foreach ($kategori as $k)
                <option value="{{ $k->id }}"
                  {{ old('kategori_id', $show->kategori_id == $k->id ? 'selected' : '') }}>{{ $k->nama_kategori }}
                </option>
              @endforeach
            </select>
            @error('kategori_id')
              <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" value="{{ old('nama_produk', $show->nama_produk) }}"
              class="form-control @error('nama_produk') is-invalid @enderror" placeholder="Masukkan Nama Produk" disabled>
            @error('nama_produk')
              <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label>Detail</label>
            <textarea id="ckeditor" name="detail" class="form-control @error('detail') is-invalid @enderror" disabled>
                {{ old('detail', $show->detail) }}
            </textarea>
            @error('detail')
              <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Foto Utama</label> <br>
            <img src="{{ asset('storage/img-produk/' . $show->foto) }}" class="foto-preview" width="100%">
          </div>

          <label>Foto Tambahan</label>
          <div id="foto-container">
            <div class="row">
              @foreach ($show->fotoProduk as $foto)
                <div class="col-md-8">
                  <img src="{{ asset('storage/img-produk/' . $foto->foto) }}" width="100%">
                </div>
                <div class="col-md-4">
                  <form action="{{ route('backend.foto_produk.destroy', $foto->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                </div>
              @endforeach
            </div>
          </div>
          <button type="button" class="btn btn-info add-foto mt-2">Tambah Foto</button>
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

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const fotoContainer = document.getElementById('foto-container');
    const addFotoButton = document.querySelector('.add-foto');
    addFotoButton.addEventListener('click', function() {
      const fotoRow = document.createElement('div');
      fotoRow.classList.add('form-group', 'row');
      fotoRow.innerHTML = `
    <form action="{{ route('backend.foto_produk.store') }}" method="post"
    enctype="multipart/form-data">
    @csrf
    <div class="col-md-12">
    <input type="hidden" name="produk_id" value="{{ $show->id }}">
    <input type="file" name="foto_produk[]" class="form-control @error('foto_produk') is-invalid @enderror">
    <button type="submit" class="btn btn-success">Simpan</button>
    </div>
    </form>
    `;
      fotoContainer.appendChild(fotoRow);
    });
  });
</script>
