@extends('backend.v_layouts.app')
@section('content')
  <!-- contentAwal -->
  <div class="row mt-3">
    <div class="col-12">
      <a href="{{ route('backend.kategori.create') }}">
        <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i>
          Tambah</button>
      </a>
      <div class="card mt-3">
        <div class="card-body">
          <h5 class="card-title"> {{ $judul }} </h5>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($index as $row)
                  <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $row->nama_kategori }} </td>
                    <td>
                      <a href="{{ route('backend.kategori.edit', $row->id) }}" title="Ubah Data">
                        <button type="button" class="btn btn-warning btn-sm" title="Ubah Data"><i
                            class="far fa-edit"></i> Ubah</button>
                      </a>
                      <form method="POST" action="{{ route('backend.kategori.destroy', $row->id) }}"
                        style="display: inline-block;">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm show_confirm"
                          data-konf-delete="{{ $row->nama_kategori }}" title='Hapus Data'>
                          <i class="fas fa-trash"></i> Hapus</button>
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
  <!-- contentAkhir -->
@endsection
