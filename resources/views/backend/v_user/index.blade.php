@extends('backend.v_layouts.app')
@section('content')
  <div class="row mt-3">
    <div class="col-12">
      <a href="{{ route('backend.user.create') }}">
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
                  <th>Email</th>
                  <th>Nama</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($index as $row)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->email }}</td>
                    <td>
                      @if ($row->role == 1)
                        <span class="badge bg-primary">Super Admin</span>
                      @elseif($row->role == 0)
                        <span class="badge bg-cyan">Admin</span>
                      @endif
                    </td>
                    <td>
                      @if ($row->status == 1)
                        <span class="badge bg-success">Aktif</span>
                      @elseif($row->status == 0)
                        <span class="badge bg-danger">Non Aktif</span>
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('backend.user.edit', $row->id) }}">
                        <button type="button" class="btn btn-warning btn-sm" title="Ubah Data">
                          <i class="far fa-edit"></i> Ubah
                        </button>
                      </a>

                      <form method="POST" action="{{ route('backend.user.destroy', $row->id) }}"
                        style="display: inline-block;">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm show_confirm"
                          data-konf-delete="{{ $row->nama }}" title='Hapus Data'>
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
