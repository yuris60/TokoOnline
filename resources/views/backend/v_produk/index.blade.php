@extends('backend.v_layouts.app')
@section('content')
  <div class="row mt-3">
    <div class="col-12">
      <a href="{{ route('backend.produk.create') }}">
        <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
      </a>
      <div class="card mt-3">
        <div class="card-body">
          <h5 class="card-title">{{ $judul }}</h5>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Kategori</th>
                  <th>Status</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($index as $row)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset('storage/img-produk/' . $row->foto) }}" width="50px" alt="Foto Produk"></td>
                    <td>{{ $row->kategori->nama_kategori }}</td>
                    <td>
                      @if ($row->status == 1)
                        <span class="badge bg-success">Tampil</span>
                      @elseif($row->status == 0)
                        <span class="badge bg-danger">Tidak Tampil</span>
                      @endif
                    </td>
                    <td>{{ $row->nama_produk }}</td>
                    <td>Rp{{ number_format($row->harga, 0, ',', '.') }}</td>
                    <td>{{ $row->stok }}</td>
                    <td>
                      <a href="{{ route('backend.produk.show', $row->id) }}">
                        <button type="button" class="btn btn-info btn-sm" title="Show Data">
                          <i class="fas fa-image"> Gambar</i>
                        </button>
                      </a>
                      <a href="{{ route('backend.produk.edit', $row->id) }}">
                        <button type="button" class="btn btn-warning btn-sm" title="Ubah Data">
                          <i class="far fa-edit"></i> Ubah
                        </button>
                      </a>

                      <form method="POST" action="{{ route('backend.produk.destroy', $row->id) }}"
                        style="display: inline-block;">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm show_confirm"
                          data-konf-delete="{{ $row->nama_produk }}" title='Hapus Data'>
                          <i class="fas fa-trash"></i> Hapus
                        </button>
                      </form>

                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
